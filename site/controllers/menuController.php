<?php

class menu extends controller {

    public function index_action() {

        //Inicializa o Template
        $this->template->run();

        $model = new menuModel();
        $sql = "M.status <> 0"; //somente os nao excluidos
        $menu_lista = $model->getMenu($sql);
        //Passa a lista de registros
        $this->smarty->assign('menu_lista', $menu_lista);
        //Chama o Smarty
        $this->smarty->assign('title', 'Menu');
        $this->smarty->display('menu/menu_lista.html');
    }

//Funcao de Busca
    public function busca_menu() {

        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new menuModel();
        $sql = "M.stStatus <> 0 and upper(M.descricao) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMenu($sql);

        //var_dump($resultado);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('menu_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'Menu');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('menu/menu_lista.html');
        } else {
            $this->smarty->assign('menu_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'Viculos');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('menu/menu_lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_menu() {

        $idMenu = $this->getParam('idMenu');
        // $idMenu = ($idMenu == true) ? $idMenu : NULL;

        $model = new menuModel();

        if ($idMenu > 0) {
            $registro = $model->getMenu('M.idMenu=' . $idMenu);
            $registro = $registro[0];
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }

        //Obter lista a de tipos fk
        $objListaMenus = new menuModel();
        //criar uma lista
        $lista_menu = $objListaMenus->getMenu('M.status <>0');
        foreach ($lista_menu as $value) {
            $lista_menu_final[$value['idMenu']] = $value['descricao'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_menu', $lista_menu_final);

        //Obter lista a de Menus Pais fk
        $objMenuPai = new menuModel();
        //criar uma lista  
        $lista_MenuPai = $objMenuPai->getMenu('M.parent_menu = 0 and M.status <>0');
        $lista_MenusPais[0] = '<< MENU PAI >>';
        foreach ($lista_MenuPai as $value) {
            $lista_MenusPais[$value['idMenu']] = $value['descricao'];
        }
        //Passar a lista de Parceiros
        $this->smarty->assign('lista_MenusPais', $lista_MenusPais);

        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Menu');
        $this->smarty->display('menu/menu_form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_menu() {
        $model = new menuModel();

        $data = $this->trataPost($_POST);
        
        if (($data['parent_menu'] == NULL) || ($data['parent_menu'] == '0')){
            $data['tipo'] = 1;            
        }else {
            $data['tipo'] = 0;
        }
        
        if ($data['idMenu'] == NULL)
            $model->setMenu($data);
        else
            $model->updMenu($data); //update

        header('Location: /menu');
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idMenu']        = ($post['idMenu'] != '')      ? $post['idMenu'] : null;
        $data['descricao']      = ($post['descricao'] != '')    ? $post['descricao'] : null;
        $data['url']            = ($post['url'] != '')          ? $post['url'] : null;
        $data['parent_menu']    = ($post['parent_menu'] != '')  ? $post['parent_menu'] : null;
        $data['tipo']           = ($post['tipo'] != '')         ? $post['tipo'] : null;
        $data['target']         = ($post['target'] != '')       ? $post['target'] : null;
        $data['status']         = ($post['status'] != '')       ? $post['status'] : 1;
        $data['ordem']         = ($post['ordem'] != '')       ? $post['ordem'] : 1;
        return $data;
    }

    // Remove Padrao
    public function delmenu() {
        $idMenu = $this->getParam('idMenu');

        if (!is_null($idMenu)) {
            $model = new menuModel();
            $dados['idMenu'] = $idMenu;
            $retorno = $model->delMenu($dados);
            //echo $retorno;
        }

        header('Location: /menu');
    }

    public function relatoriomenu_pre() {
        //gerar o relatorio
        //Obter lista a de Menus Pais fk
        $objMenuPai = new menuModel();
        //criar uma lista  
        $lista_MenuPai = $objMenuPai->getMenu('M.parent_menu = 0 and M.status <>0');
        $lista_MenusPais[0] = '<< TODOS >>';
        foreach ($lista_MenuPai as $value) {
            $lista_MenusPais[$value['idMenu']] = $value['descricao'];
        }
        //Passar a lista de Parceiros
        $this->smarty->assign('lista_MenusPais', $lista_MenusPais);

        //Inicializa o Template
        $this->template->run();

        //Chama o Smarty
        $this->smarty->assign('title', 'Pre Relatorio de Menu');
        $this->smarty->display('menu/relatoriomenu_pre.html');
    }

    public function relatoriomenu() {
        $idMenu = $this->getParam('parent_menu');

        //Chama A ferramenta de Conversao de DAtas
        //$Tool = new date;
        //gerar o relatorio
        //Inicializa o Template
        $this->template->run();

        $model = new menuModel();

        if (isset($idMenu)) {
            $sql = "M.status <> 0";
        } else {
            $sql = "M.parent_menu ='.$idMenu.'and M.status <> 0";
        }

        $menu_lista = $model->getMenu($sql);
        //Passa a lista de registros
        $this->smarty->assign('menu_lista', $menu_lista);

        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio Menu');
        $this->smarty->display('menu/relatoriomenu.html');
    }
}