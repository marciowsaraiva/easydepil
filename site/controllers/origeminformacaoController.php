<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class origeminformacao extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new origeminformacaoModel();
        $origeminformacao_lista = $model->getOrigemInformacao();

        $this->smarty->assign('origeminformacao_lista', $origeminformacao_lista);
        $this->smarty->display('origeminformacao/lista.html');
    }

//Funcao de Busca
    public function busca_origeminformacao() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new origeminformacaoModel();
        $sql = "stStatus <> 0 and upper(dsOrigemInformacao) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getOrigemInformacao($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('origeminformacao_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'origeminformacao');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('origeminformacao/lista.html');
        } else {
            $this->smarty->assign('origeminformacao_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'origeminformacao');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('origeminformacao/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_origeminformacao() {

        $idOrigemInformacao = $this->getParam('idOrigemInformacao');

        $model = new origeminformacaoModel();

        if ($idOrigemInformacao > 0) {

            $registro = $model->getOrigemInformacao('idOrigemInformacao=' . $idOrigemInformacao);
            $registro = $registro[0]; //Passando OrigemInformacao
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new origeminformacaoModel();
        //criar uma lista
        $lista_tipos = $objLista->getOrigemInformacao('idOrigemInformacao <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idOrigemInformacao']] = $value['dsOrigemInformacao'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_origeminformacao', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Origem do Informacao');
        $this->smarty->display('origeminformacao/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_origeminformacao() {
        $model = new origeminformacaoModel();

        $data = $this->trataPost($_POST);

        if ($data['idOrigemInformacao'] == NULL)
            $model->setorigeminformacao($data);
        else
            $model->updorigeminformacao($data); //update
        
        header('Location: /origeminformacao');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idOrigemInformacao'] = ($post['idOrigemInformacao'] != '') ? $post['idOrigemInformacao'] : null;
        $data['dsOrigemInformacao'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delorigeminformacao() {
                
        $idOrigemInformacao = $this->getParam('idOrigemInformacao');
        
        $origeminformacao = $idOrigemInformacao;
        
        if (!is_null($origeminformacao)) {    
            $model = new origeminformacaoModel();
            $dados['idOrigemInformacao'] = $origeminformacao;             
            $model->delOrigemInformacao($dados);
        }

        header('Location: /origeminformacao');
    }

    public function relatorioorigeminformacao_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Origem da Informacao');
        $this->smarty->display('origeminformacao/relatorio_pre.html');
    }

    public function relatorioorigeminformacao() {
        $this->template->run();

        $model = new origeminformacaoModel();
        $origeminformacao_lista = $model->getOrigemInformacao();
        //Passa a lista de registros
        $this->smarty->assign('origeminformacao_lista', $origeminformacao_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Origem da Informacao');
        $this->smarty->display('origeminformacao/relatorio.html');
    }

}

?>