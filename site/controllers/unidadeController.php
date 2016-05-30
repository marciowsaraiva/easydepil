<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class unidade extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new unidadeModel();
        $unidade_lista = $model->getUnidade();

        $this->smarty->assign('unidade_lista', $unidade_lista);
        $this->smarty->display('unidade/lista.html');
    }


//Funcao de Busca
    public function busca_unidade() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new unidadeModel();
        $sql = "upper(dsUnidade) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getUnidade($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('unidade_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'unidade');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('unidade/lista.html');
        } else {
            $this->smarty->assign('unidade_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'unidade');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('unidade/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_unidade() {

        $idUnidade = $this->getParam('idUnidade');

        $model = new unidadeModel();

        if ($idUnidade > 0) {

            $registro = $model->getUnidade('idUnidade=' . $idUnidade);
            $registro = $registro[0]; //Passando Unidade
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new unidadeModel();
        //criar uma lista
        $lista_tipos = $objLista->getUnidade('idUnidade <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idUnidade']] = $value['dsUnidade'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_unidade', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'nova unidade');
        $this->smarty->display('unidade/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_unidade() {
        $model = new unidadeModel();

        $data = $this->trataPost($_POST);

        if ($data['idUnidade'] == NULL)
            $model->setunidade($data);
        else
            $model->updunidade($data); //update
        
        header('Location: /unidade');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idUnidade'] = ($post['idUnidade'] != '') ? $post['idUnidade'] : null;
        $data['dsUnidade'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delunidade() {
                
        $idUnidade = $this->getParam('idUnidade');
        
        $unidade = $idUnidade;
        
        if (!is_null($unidade)) {    
            $model = new unidadeModel();
            $dados['idUnidade'] = $unidade;             
            $model->delUnidade($dados);
        }

        header('Location: /unidade');
    }

    public function relatoriounidade_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Unidades');
        $this->smarty->display('unidade/relatorio_pre.html');
    }

    public function relatoriounidade() {
        $this->template->run();

        $model = new unidadeModel();
        $unidade_lista = $model->getUnidade();
        //Passa a lista de registros
        $this->smarty->assign('unidade_lista', $unidade_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Unidades');
        $this->smarty->display('unidade/relatorio.html');
    }

}

?>