<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class usuarios_tipo extends controller {

    public function index_action() {

        //Inicializa o Template
        $this->template->run();

        $model = new usuarios_tipoModel();
        $sql = "stStatus <> 0"; //somente os nao excluidos
        $usuarios_tipo_lista = $model->getUsuariosTipo($sql);
        //Passa a lista de registros
        $this->smarty->assign('usuarios_tipo_lista', $usuarios_tipo_lista);
        //Chama o Smarty
        $this->smarty->assign('title', 'Tipos de Usu&aacute;rios');
        $this->smarty->display('usuarios_tipo/usuarios_tipo_lista.html');
    }

//Funcao de Busca
    public function busca_usuarios_tipo() {

        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscamensagem']) ? $_POST['buscamensagem'] : '';
        //$texto = '';
        $model = new usuarios_tipoModel();
        $sql = "stStatus <> 0 and upper(descricao) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getUsuariosTipo($sql);

        //var_dump($resultado);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('usuarios_tipo_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'Tipos de Usu&aacute;rios');
            $this->smarty->assign('buscamensagem', $texto);
            $this->smarty->display('usuarios_tipo/usuarios_tipo_lista.html');
        } else {
            $this->smarty->assign('usuarios_tipo_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'Tipos de Usu&aacute;rios');
            $this->smarty->assign('buscamensagem', $texto);
            $this->smarty->display('usuarios_tipo/usuarios_tipo_lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_usuarios_tipo() {

        $idTipoUsuario = $this->getParam('idTipoUsuario');
        // $idLog = ($idLog == true) ? $idLog : NULL;

        $model = new usuarios_tipoModel();

        if ($idTipoUsuario > 0) {
            $registro = $model->getUsuariosTipo('idTipoUsuario=' . $idTipoUsuario);
            $registro = $registro[0];
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }



        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Tipos de Usu&aacute;rios');
        $this->smarty->display('usuarios_tipo/usuarios_tipo_form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_clinTipoUsuario() {
        $model = new usuarios_tipoModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoUsuario'] == NULL)
            $model->setUsuariosTipo($data);
        else
            $model->updUsuariosTipo($data); //update

        header('Location: /usuarios_tipo');
        //return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoUsuario'] = ($post['idTipoUsuario'] != '') ? $post['idTipoUsuario'] : null;
        $data['descricao'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['stStatus'] = ($post['stStatus'] != '') ? $post['stStatus'] : 1;
        return $data;
    }

    // Remove Padrao
    public function del_usuarios_tipo() {
        $idTipoUsuario = $this->getParam('idTipoUsuario');
        if (!is_null($idTipoUsuario)) {
            $model = new usuarios_tipoModel();
            $dados['idTipoUsuario'] = $idTipoUsuario;
            $retorno = $model->delUsuariosTipo($dados);
            //echo $retorno;
        }

        header('Location: /usuarios_tipo');
    }

}

?>
