<?php

/**
 * Classe para log do sistema
 * 
 * Essa classe faz o roteamento para qual classe será utilizada para gravar o
 *  log, atraves da constante LOG_TYPE definida no config.php, e caso nao
 *  definida utiliza por padrao o modo "MySQL"
 */
class logModel {

    /**
     * Classe que recebera os metodos dependendo do tipo de log
     * @var type 
     */
    private $logClasse;

    /**
     * Construtor da classe, com as verificacoes iniciais para roteamento
     */
    public function __construct() {
        //Para retrocompatibilidade, vamos verificar se existe a constante
        // LOG_TYPE e caso nao exista, vamos continuar com o MySQL por padrao
        $logTipo = (defined('LOG_TYPE')) ? LOG_TYPE : 'MySQL';

        //Existe o arquivo com a classe do tipo que encontramos acima?
        if (!file_exists(PATH_ROOT . 'models/logModel' . $logTipo . '.php')) {
            exit('Nao foi encontrado o arquivo da classe de log "/models/logModel' . $logTipo . '.php"');
        }

        //Vamos expor a classe do tipo do log para utilizar em toda a classe
        $nomeClasse = 'logModel' . $logTipo;
        $this->logClasse = new $nomeClasse();
    }

    /**
     * Estrutura da Tabela Vazia Utilizada para novos Cadastros
     * 
     * @return array Dados padroes
     */
    public function estrutura_vazia() {
        return $this->logClasse->estrutura_vazia();
    }

    /**
     * Recupera o Log
     * 
     * @param string $where Condicao para a Query
     * @return object Conteudo da consulta
     * @deprecated since version 1.0
     */
    public function getLogOLD($where = null) {
        trigger_error('Function getLogOLD deprecated', E_USER_NOTICE);
        
        //return $this->logClasse->getLogOLD($where);
        return false;
    }

    /**
     * Recupera o Log
     * 
     * @param string $where Condicao para a Query
     * @param string $orderby Ordenacao dos dados
     * @param string $limit Limite para os dados
     * @return object Conteudo da consulta
     */
    public function getLog($where = null, $orderby = null, $limit = null) {
        return $this->logClasse->getLog($where, $orderby, $limit);
    }

    /**
     * Grava o log
     * 
     * @param array $array Dados para a insercao
     * @return int ID do insert
     */
    public function setLog($array) {
        return $this->logClasse->setLog($array);
    }

    /**
     * Atualiza o Log
     * 
     * @param array $array Dados para atualizacao
     * @return boolean stStatus da atualizacao
     */
    public function updLog($array) {
        return $this->logClasse->updLog($array);
    }

    /**
     * Remove o Log
     * 
     * @param array $array Dados para remover
     * @return boolean stStatus da remocao
     */
    public function delLog($array) {
        return $this->logClasse->delLog($array);
    }

    /**
     * Estrutura da Tabela Vazia Utilizada para novos Cadastros
     * 
     * @param string $mensagem Mensagem a gravar no log
     * @param int $tipo_log Tipo do log
     */
    public function logPadrao($mensagem = '', $tipo_log = 1) {
        $this->logClasse->logPadrao($mensagem, $tipo_log);
    }

    /**
     * Total de registros
     * 
     * @return int Quantidade de registros
     */
    public function TotalDeRegistros() {
        return $this->logClasse->TotalDeRegistros();
    }

}
