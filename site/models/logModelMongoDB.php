<?php

/**
 * Classe para interacao do Log com o banco de dados do tipo nao relacional
 *  MongoDB
 * 
 * @link http://wikisuporte.tecnologiafox.com.br/index.php/MongoDB_-_Instala%C3%A7%C3%A3o_e_Utiliza%C3%A7%C3%A3o Manual interno de instalacao e utilizacao
 */
class logModelMongoDB {

    /**
     * Manipulacao da collection de log
     * 
     * @var object Classe com os objetos para manipular somente a "log"
     */
    private $collection;

    /**
     * Construtor da classe
     */
    public function __construct() {
        try {
            //Vamos conectar no MongoDB
            $connection = new MongoClient("mongodb://" . MONGODB_USER . ":" . MONGODB_PASS . "@" . MONGODB_HOST . "/" . MONGODB_DATABASE);
            $database = $connection->selectDB(MONGODB_DATABASE);

            //Agora, por seguranca, vamos selecionar a colection "log" para
            // trabalhar somente nela e deixar ela exposta para a classe
            $this->collection = $database->selectCollection('log');
        } catch (Exception $exc) {
            exit('Erro ao conectar no MongoDB de log: ' . $exc->getMessage());
        }
    }

    /**
     * Estrutura da Tabela vazia utilizada para novos cadastros
     * 
     * @return array Estrutura do array 
     */
    public function estrutura_vazia() {
        $estrutura = array(
            0 => array(
                'idLog' => NULL,
                'idUsuario' => NULL,
                'mensagem' => NULL,
                'idLogTipo' => NULL,
                'stStatus' => NULL,
                'data' => NULL,
            )
        );

        return $estrutura;
    }

    /**
     * Recupera os dados do LOG, no modelo do MongoDB
     * 
     * @param array $where Clausulas de busca
     * @param array $sort Clausula de ordenacao
     * @param int $limit Quantidades de registros e paginacao
     * @return array
     */
    public function getLog($where = array(), $sort = array(), $limit = array('limit' => 100, 'skip' => 0)) {
        //Validacao e verificacao
        $whereQuery = (is_array($where) || is_object($where)) ? $where : array();
        $sortQuery = (is_array($sort) || is_object($sort)) ? $sort : array();
        $limitQuery = (!empty($limit['limit'])) ? $limit['limit'] : NULL;
        $skipQuery = (!empty($limit['skip'])) ? $limit['skip'] : NULL;

        //Faz a busca na collection
        $returnMongo = $this->collection->find($whereQuery)
                ->sort($sortQuery)
                ->limit($limitQuery)
                ->skip($skipQuery);
        
        //Timeout
        $returnMongo->timeout((MONGODB_TIMEOUT * 1000));

        return $returnMongo;
    }

    /**
     * Persistencia de um novo registro de log
     * 
     * @param array $dados Dados para a gravacao do log
     * @return string|boolean
     */
    public function setLog($dados) {
        //Recupera o ultimo ID
        $dados['idLog'] = (empty($dados['idLog'])) ? ( ++$this->getLastID()['idLog']) : $dados['idLog'];

        //Verifica se a data chegou, caso contrario, vamos adicionar "agora"]
        $dados['data'] = (empty($dados['data'])) ? date("Y-m-d H:i:s") : $dados['data'];

        //Gravacao do log
        $result = $this->collection->insert($dados);

        //Verfica se inseriu
        if (!empty($result['ok']) && $result['ok'] == true) {
            return $dados['idLog'];
        } else {
            return false;
        }
    }

    /**
     * Atualizacao de determinado registro
     * 
     * @param array $dados Dados para serem atualizados com a chave a procurar
     * @return boolean
     */
    public function updLog($dados) {
        //Vamos verificar se chegou o "idLog"
        if (empty($dados['idLog'])) {
            return false;
        }

        //Vamos atualizar
        $novoDado = array('$set' => $dados);
        $result = $this->collection->update(array('idLog' => $dados['idLog']), $novoDado);

        //Vamos verificar se esta tudo OK
        if (!empty($result['ok']) && $result['ok'] == true && $result['updatedExisting'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Remove determinado registro
     * 
     * @param array $dados Array com o "idLog" para remover
     * @return boolean
     */
    public function delLog($dados) {
        //Vamos verificar se chegou o "idLog"
        if (empty($dados['idLog'])) {
            return false;
        }

        //Vamos apagar
        $result = $this->collection->remove(array('idLog' => $dados['idLog']));

        //Vamos verificar se removeu com sucesso
        if (!empty($result['ok']) && $result['ok'] == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Estrutura da Tabela Vazia Utilizada para novos Cadastros
     * 
     * @param string $mensagem Mensagem a ser gravada
     * @param int $tipo_log Tipo do log
     */
    public function logPadrao($mensagem = '', $tipo_log = 1) {
        $dados = array();

        $dados['idLog'] = NULL;

        //Caso nao esteja logado define ao admin
        if (empty($_SESSION['user']['usuario'])) {
            $dados['idUsuario'] = 1;
            $mensagem = 'sem admin - ' . $mensagem;
        } else {
            $dados['idUsuario'] = $_SESSION['user']['usuario'];
        }

        $dados['mensagem'] = $mensagem;
        $dados['idLogTipo'] = $tipo_log;
        $dados['stStatus'] = 1;
        $dados['data'] = date('Y-m-d H:i:s');

        //Gravacao
        $this->setLog($dados);
    }

    /**
     * Total de registros da collection de log
     * 
     * @return int
     */
    public function TotalDeRegistros() {
        return $this->collection->count();
    }

    /**
     * Recupera o ultimo registro inserido
     * 
     * @return array
     */
    private function getLastID() {
        $result = iterator_to_array($this->collection->find()->sort(array('_id' => -1))->limit(1));

        $resultFinal = array();
        foreach ($result as $each) {
            $resultFinal[] = $each;
        }

        return $resultFinal[0];
    }

    /**
     * Faz o parse da string
     * 
     * @param string $where Clausula "where"
     * @param string $orderBy Clausula "order by"
     * @param string $limit Clausula "limit"
     * @return \PHPSQLParser
     */
    private function parseQuery($where, $orderBy, $limit) {
        //Verifica se chegou algo
        $orderByFinal = (empty($orderBy)) ? '' : 'ORDER BY ' . $orderBy;
        $limitFinal = (empty($limit)) ? '' : 'LIMIT ' . $limit;

        //Montagem da query
        $SQL = "SELECT * FROM log L WHERE {$where} {$orderByFinal} {$limitFinal};";

        //Parse
        require_once(LIBS . DIRECTORY_SEPARATOR . 'PHP-SQL-Parser' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'PHPSQLParser.php');
        $parser = new PHPSQLParser($SQL, true);

        return $parser;
    }

    /**
     * Converte a instrucao SQL para o operador especial do MongoDB
     * 
     * @todo Implementar todos os operadores
     * @param string $string Operador SQL
     * @return string
     */
    private function parseSpecialOperators($string) {
        switch (strtoupper($string)) {
            case '=': return '$eq';
            case '>': return '$gt';
            case '>=': return '$gte';
            case '<': return '$lt';
            case '<=': return '$lte';
            case '<>': return '$ne';
            case '!=': return '$ne';
        }
    }

}
