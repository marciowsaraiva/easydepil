<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tiposervico extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tiposervicoModel();
        $tiposervico_lista = $model->getTipoServico();

        $this->smarty->assign('tiposervico_lista', $tiposervico_lista);
        $this->smarty->display('tiposervico/lista.html');
    }

//Funcao de Busca
    public function busca_tiposervico() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tiposervicoModel();
        $sql = "stStatus <> 0 and upper(dsTipoServico) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoServico($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tiposervico_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tiposervico');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tiposervico/lista.html');
        } else {
            $this->smarty->assign('tiposervico_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tiposervico');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tiposervico/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tiposervico() {

        $idTipoServico = $this->getParam('idTipoServico');

        $model = new tiposervicoModel();

        if ($idTipoServico > 0) {

            $registro = $model->getTipoServico('idTipoServico=' . $idTipoServico);
            $registro = $registro[0]; //Passando TipoServico
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tiposervicoModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoServico('idTipoServico <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoServico']] = $value['dsTipoServico'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tiposervico', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Servico');
        $this->smarty->display('tiposervico/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tiposervico() {
        $model = new tiposervicoModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoServico'] == NULL)
            $model->settiposervico($data);
        else
            $model->updtiposervico($data); //update
        
        header('Location: /tiposervico');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoServico'] = ($post['idTipoServico'] != '') ? $post['idTipoServico'] : null;
        $data['dsTipoServico'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltiposervico() {
                
        $idTipoServico = $this->getParam('idTipoServico');
        
        $tiposervico = $idTipoServico;
        
        if (!is_null($tiposervico)) {    
            $model = new tiposervicoModel();
            $dados['idTipoServico'] = $tiposervico;             
            $model->delTipoServico($dados);
        }

        header('Location: /tiposervico');
    }

    public function relatoriotiposervico_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Servico');
        $this->smarty->display('tiposervico/relatorio_pre.html');
    }

    public function relatoriotiposervico() {
        $this->template->run();

        $model = new tiposervicoModel();
        $tiposervico_lista = $model->getTipoServico();
        //Passa a lista de registros
        $this->smarty->assign('tiposervico_lista', $tiposervico_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Servico');
        $this->smarty->display('tiposervico/relatorio.html');
    }

}

?>