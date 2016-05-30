<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class perfil extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new perfilModel();
        $perfil_lista = $model->getPerfil('stStatus <> 0');

        $this->smarty->assign('perfil_lista', $perfil_lista);
        $this->smarty->display('perfil/perfil_lista.html');
    }

    public function insere_menu() {

        $idPerfil = $_POST['idPerfil'];
        $idMenu = $_POST['idMenu'];

        //$perfil_desc = $_POST['descricao'];
        $dados['idPerfil'] = $idPerfil;
        $dados['idMenu'] = $idMenu;
        $objmodel = new perfil_menuModel();
        $objmodel->setPerfilMenu($dados);

        header('Location: /perfil/novo_perfil/idPerfil/' . $idPerfil);
    }

    public function excluir_menu() {

        //inserir o menu item
        $idPerfil = $this->getParam('idPerfil');
        $idMenu = $this->getParam('idMenu');

        $where = 'idPerfil = ' . $idPerfil . ' and idMenu = ' . $idMenu;
        $objmodel = new perfil_menuModel();
        $objmodel->delPerfilMenu($where);

        //Volta para a tela de Edição
        header('Location: /perfil/novo_perfil/idPerfil/' . $idPerfil);
    }

//Funcao de Busca
    public function busca_perfil() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new perfilModel();
        $sql = "stStatus <> 0 and upper(dsPerfil) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getPerfil($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('perfil_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'perfil');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('perfil/perfil_lista.html');
        } else {
            $this->smarty->assign('perfil_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'perfil');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('perfil/perfil_lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_perfil() {

        $idPerfil = $this->getParam('idPerfil');

        $model = new perfilModel();

        if ($idPerfil > 0) {

            $registro = $model->getPerfil('idPerfil=' . $idPerfil.' and stStatus <> 0');
            $registro = $registro[0]; //Passando Perfil
            
            //Abrir o dataset dos Items (Menu)
            $objItem = new perfil_menuModel;
            $lista_de_mp = $objItem->getPerfilMenu('PM.idPerfil=' . $idPerfil);
            if (isset($lista_de_mp)){
                $this->smarty->assign('lista_de_mp', $lista_de_mp);
            }
            else{
                $this->smarty->assign('lista_de_mp', null);
            }
                
            
            $excluidos = '';
            $where_in = '';
            foreach ($lista_de_mp as $value) {
                if ($excluidos == ''){
                    $excluidos = $value['idMenu'];
                }else{
                    $excluidos = $excluidos . ',' . $value['idMenu'];
                }
            }
            if ($excluidos != ''){
                $where_in = 'and M.idMenu not in (' . $excluidos . ')';
            }

            //Abrir o dataset Menus para Popular a listas
            $lista_de_menus = null;
            $objMenu = new menuModel;
            if ($where_in != '') {
               $lista_de_menus_s = $objMenu->getMenu('M.status > 0 ' . $where_in.' '); // order by M.parent_menu, M.descricao
            }else{
               $lista_de_menus_s = $objMenu->getMenu('M.status > 0'); // order by M.parent_menu, M.descricao 
            }
            
            if (isset($lista_de_menus_s)){
                foreach ($lista_de_menus_s as $value) {
                    if (isset($value['descricao_pai'])){
                        $lista_de_menus[$value['idMenu']] = $value['descricao_pai'].'/'.$value['descricao'];
                    }else{
                        $lista_de_menus[$value['idMenu']] = $value['descricao'];
                    }
                }
            }
             
                        
            
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new perfilModel();
        //criar uma lista
        $lista_tipos = $objLista->getPerfil('idPerfil <> 0 and stStatus <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idPerfil']] = $value['dsPerfil'];
        }
       if (isset($lista_de_menus)){
            $this->smarty->assign('lista_de_menus', $lista_de_menus);
       }
       else
       {
           $this->smarty->assign('lista_de_menus', null);
       }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_perfil', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'novo perfil');
        $this->smarty->display('perfil/perfil_form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_perfil() {
        $model = new perfilModel();

        $data = $this->trataPost($_POST);

        if ($data['idPerfil'] == NULL)
            $model->setperfil($data);
        else
            $model->updperfil($data); //update
        
        header('Location: /perfil');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idPerfil'] = ($post['idPerfil'] != '') ? $post['idPerfil'] : null;
        $data['dsPerfil'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delperfil() {
                
        $idPerfil = $this->getParam('idPerfil');
        
        $perfil = $idPerfil;
        
        // Removendo Perfis
        
        
        $where = "idPerfil = " . $idPerfil;
        $objmodel = new perfil_menuModel();
        $objmodel->delPerfilMenu($where);

          
        if (!is_null($perfil)) {    
            $model = new perfilModel();
            $dados['idPerfil'] = $perfil;             
            $model->delPerfil($dados);
        }

        header('Location: /perfil');
    }

    public function relatorioperfil_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio perfil');
        $this->smarty->display('perfil/relatorioperfil_pre.html');
    }

    public function relatorioperfil() {
        $this->template->run();

        $model = new perfilModel();
        $perfil_lista = $model->getPerfil();
        //Passa a lista de registros
        $this->smarty->assign('perfil_lista', $perfil_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Perfis');
        $this->smarty->display('perfil/relatorioperfil.html');
    }

}

?>