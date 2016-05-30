<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipousuario extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipousuarioModel();
        $tipousuario_lista = $model->getTipoUsuario();

        $this->smarty->assign('tipousuario_lista', $tipousuario_lista);
        $this->smarty->display('tipousuario/lista.html');
    }

//Funcao de Busca
    public function busca_tipousuario() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipousuarioModel();
        $sql = "stStatus <> 0 and upper(dsTipoUsuario) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoUsuario($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipousuario_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipousuario');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipousuario/lista.html');
        } else {
            $this->smarty->assign('tipousuario_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipousuario');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipousuario/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipousuario() {

        $idTipoUsuario = $this->getParam('idTipoUsuario');

        $model = new tipousuarioModel();

        if ($idTipoUsuario > 0) {

            $registro = $model->getTipoUsuario('idTipoUsuario=' . $idTipoUsuario);
            $registro = $registro[0]; //Passando TipoUsuario
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipousuarioModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoUsuario('idTipoUsuario <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoUsuario']] = $value['dsTipoUsuario'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipousuario', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Usuário');
        $this->smarty->display('tipousuario/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipousuario() {
        $model = new tipousuarioModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoUsuario'] == NULL)
            $model->settipousuario($data);
        else
            $model->updtipousuario($data); //update
        
        header('Location: /tipousuario');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
      //  print_a_die($post);
        $data['idTipoUsuario'] = ($post['idTipoUsuario'] != '') ? $post['idTipoUsuario'] : null;
        $data['dsTipoUsuario'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        if($post['stInclui']) {
            $data['stInclui'] = 1;
        } else {
            $data['stInclui'] = 0;
        }
        if($post['stConsulta']) {
            $data['stConsulta'] = 1;
        } else {
            $data['stConsulta'] = 0;
        }
        return $data;
    }

    // Remove Padrao
    public function deltipousuario() {
                
        $idTipoUsuario = $this->getParam('idTipoUsuario');
        
        $tipousuario = $idTipoUsuario;
        
        if (!is_null($tipousuario)) {    
            $model = new tipousuarioModel();
            $dados['idTipoUsuario'] = $tipousuario;             
            $model->delTipoUsuario($dados);
        }

        header('Location: /tipousuario');
    }

    public function relatoriotipousuario_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Usuário');
        $this->smarty->display('tipousuario/relatorio_pre.html');
    }

    public function relatoriotipousuario() {
        $this->template->run();

        $model = new tipousuarioModel();
        $tipousuario_lista = $model->getTipoUsuario();
        //Passa a lista de registros
        $this->smarty->assign('tipousuario_lista', $tipousuario_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Usuário');
        $this->smarty->display('tipousuario/relatorio.html');
    }

}

?>