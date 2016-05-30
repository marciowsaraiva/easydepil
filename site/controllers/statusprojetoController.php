<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class statusprojeto extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new statusprojetoModel();
        $statusprojeto_lista = $model->getStatusProjeto();

        $this->smarty->assign('statusprojeto_lista', $statusprojeto_lista);
        $this->smarty->display('statusprojeto/lista.html');
    }

//Funcao de Busca
    public function busca_statusprojeto() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new statusprojetoModel();
        $sql = "stStatus <> 0 and upper(dsStatusProjeto) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getStatusProjeto($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('statusprojeto_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'statusprojeto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statusprojeto/lista.html');
        } else {
            $this->smarty->assign('statusprojeto_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'statusprojeto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statusprojeto/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_statusprojeto() {

        $idStatusProjeto = $this->getParam('idStatusProjeto');

        $model = new statusprojetoModel();

        if ($idStatusProjeto > 0) {

            $registro = $model->getStatusProjeto('idStatusProjeto=' . $idStatusProjeto);
            $registro = $registro[0]; //Passando StatusProjeto
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new statusprojetoModel();
        //criar uma lista
        $lista_tipos = $objLista->getStatusProjeto('idStatusProjeto <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idStatusProjeto']] = $value['dsStatusProjeto'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_statusprojeto', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Status de Projeto');
        $this->smarty->display('statusprojeto/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_statusprojeto() {
        $model = new statusprojetoModel();

        $data = $this->trataPost($_POST);

        if ($data['idStatusProjeto'] == NULL)
            $model->setstatusprojeto($data);
        else
            $model->updstatusprojeto($data); //update
        
        header('Location: /statusprojeto');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idStatusProjeto'] = ($post['idStatusProjeto'] != '') ? $post['idStatusProjeto'] : null;
        $data['dsStatusProjeto'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delstatusprojeto() {
                
        $idStatusProjeto = $this->getParam('idStatusProjeto');
        
        $statusprojeto = $idStatusProjeto;
        
        if (!is_null($statusprojeto)) {    
            $model = new statusprojetoModel();
            $dados['idStatusProjeto'] = $statusprojeto;             
            $model->delStatusProjeto($dados);
        }

        header('Location: /statusprojeto');
    }

    public function relatoriostatusprojeto_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Status de Projetos');
        $this->smarty->display('statusprojeto/relatorio_pre.html');
    }

    public function relatoriostatusprojeto() {
        $this->template->run();

        $model = new statusprojetoModel();
        $statusprojeto_lista = $model->getStatusProjeto();
        //Passa a lista de registros
        $this->smarty->assign('statusprojeto_lista', $statusprojeto_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Status de Projetos');
        $this->smarty->display('statusprojeto/relatorio.html');
    }

}

?>