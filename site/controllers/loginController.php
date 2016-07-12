<?php

class login extends controller {

    public function index_action() {
        if (isset($_SESSION['user']['usuario'])) {
            header("Location:/login/logout");
            die;
        } else {
            //$this->template->fetchJS('/files/js/login.js');
            $this->template->run();
            if (isset($_SESSION['login']['mensagem'])) {
                $this->smarty->assign('mensagem', $_SESSION['login']['mensagem']);
                $_SESSION['login']['mensagem'] = null;
            } else
                $this->smarty->assign('mensagem', '');
            $this->smarty->display('login/login.html');
        }
    }

    public function logar() {

        $mail = trim($_REQUEST['email']);
        $pass = $_REQUEST['password'];

        $user = new usuariosModel();

        // Valida pelo login
        $registro = $user->getUsuarioInicial("L.email = '" . $mail . "'");
        //Verifica se usuario possui perfil 
        
        if ($registro == null) {
            $this->smarty->assign('mensagem', 'Usuário inválido e/ou inexistente');
            $this->smarty->display('login/login.html');
            $_SESSION['Profissional']['id'] = null;
            die;
            //  var_dump($registro);die;
        } else {
            $_SESSION['Profissional']['id'] = $registro[0]['idProfissional'];
        }

        $objUserPerfil = new usuario_perfilModel();
        $sql = 'UP.stStatus <> 0' . ' AND idUsuario = ' . $registro[0]['idUsuario'];
        $user_perfil = $objUserPerfil->getUsuarioPerfil($sql);
//        var_dump($user_perfil);die;

        if (sizeof($user_perfil) == 0) {
            $_SESSION['login']['mensagem'] = "Usuario não possui perfil";
            header("Location: " . "/login");
            exit();
        }
        
        $objpm = new perfil_menuModel();
        $sqlpm = 'PM.idPerfil = ' . $user_perfil[0]['idPerfil'];
        $perfmenu = $objpm->getPerfilMenu($sqlpm);
//        var_dump($perfmenu);die;
        if(sizeof($perfmenu)==0){
            $_SESSION['login']['mensagem'] = "Perfil do usario não possui menu associado";
            header("Location: " . "/login");
            exit();
        }
        
//        if(($registro[0]['idProjeto'] == null || $registro[0]['idProjeto'] == '')){
//            $_SESSION['login']['mensagem'] = "Não possui projeto, entre em contato com o suporte";
//            header("Location: " . "/login");
//            exit();
//        }


        if (isset($registro[0]['email'])) {

            if (trim($registro[0]['senha']) == trim($pass)) {
                $_SESSION['user']['usuario'] = $registro[0]['idUsuario'];
                $_SESSION['user']['senha'] = $registro[0]['senha'];
                $_SESSION['user']['nome'] = $registro[0]["dsUsuario"];
                $_SESSION['user']['projeto']['idProjeto'] = $registro[0]["idProjeto"];

                //     print_a_die($_SESSION['user']['projeto']['idProjeto']);

                $_SESSION['user']['login'] = $mail;

                $idPerfil = $user->getPerfilByUsuario($_SESSION['user']['usuario']);
                $_SESSION['user']['perfil'] = is_null($idPerfil) ? 0 : $idPerfil;
                if ($_SESSION['user']['perfil'] == 0) {
                    $_SESSION['user'] = null;
                    $_SESSION['login'] = null;
                    //echo json_encode($retorno, true);
                    $_SESSION['login']['mensagem'] = "Você não tem um Perfil associado a este usuario";
                    header("Location: " . "/login");
                    exit();
                }

                $_SESSION['user']['tipousuario'] = $registro[0]["idTipoUsuario"];
                if ($_SESSION['user']['perfil'] > 0)
                    $_SESSION['user']['controllers_autorizados'] = $user->getMenuByPerfil($_SESSION['user']['perfil']);
                else
                    $_SESSION['user']['controllers_autorizados'] = 0;

                $_SESSION['user']['registro'] = time(); // armazena o momento em que autenticado //
                $_SESSION['user']['limite'] = TEMPO_LIMITE; // armazena o tempo limite sem atividade //
                //Somente Gera menu caso exista um perfil

                if ($_SESSION['user']['perfil'] > 0)
                    $_SESSION['user']['menu'] = $this->geramenu();

//                // Recupera o Projeto em caso de Parceiro
//                $projetos = new projetoModel();
//                
//                if (isset($_SESSION['user']['projeto']['idProjeto'])) {
//                    $proj_res = $projetos->getprojeto("a.idProjeto=" . $_SESSION['user']['projeto']['idProjeto'] . " AND a.stStatus=1");                    
//                    if(isset($proj_res[0]['nome'])){
//                        $_SESSION['user']['projeto']['nome'] = $proj_res[0]['dsProjeto'];
//                    }else{
//                        $proj_res = $projetos->getprojeto("a.stStatus=1");
//                        $_SESSION['user']['projeto']['nome'] = $proj_res[0]['dsProjeto'];
//                    }
//                } else {
//                    $proj_res = $projetos->getprojeto("stStatus=1");
//                }

//                    $util = new util(); // reislemos em 24042015
//                    $util->debug_no_log('LOGIN NO PORTAL', 1);
                
                //$retorno = array('msg' => 'Login Realizado com sucesso', 'stStatus' => 'success'); //error, success
                header("Location: /dashboard");
                exit();
            } else {
                //$retorno = array('msg' => 'Senha inválida', 'stStatus' => 'error'); //error, success
                //echo json_encode($retorno, true);
                $_SESSION['login']['mensagem'] = "Senha inválida";
                header("Location: " . "/login");
                exit();
            }
        } else {
            // $retorno = array('msg' => 'Usuario não encontrado', 'stStatus' => 'error'); //error, success
            // echo json_encode($retorno, true);
            $_SESSION['login']['mensagem'] = "Usuario não encontrado";
            header("Location: " . "/login");
            exit();
        }
    }

    public function geramenu() {
        $objMenu = new menuModel();
        //die_a($_SESSION['user']['controllers_autorizados']);

        $retorno = $objMenu->getMenuByUsuario($_SESSION['user']['controllers_autorizados']);

        $menu_pai = null;
        foreach ($retorno as $key => $value) {
            if ($value['tipo'] == 1) {
                $menu_pai[] = array('id' => $value['idMenu'],
                    'descricao' => $value['descricao'],
                    'link' => $value['url']);
            }
        }
        $menu_filho = null;
        foreach ($retorno as $key => $value1) {
            if ($value1['parent_menu'] != 0) {
                $menu_filho[] = array('id_pai' => $value1['parent_menu'],
                    'descricao' => $value1['descricao'],
                    'link' => $value1['url']);
            }
        }

        $menu_principal = null;
        foreach ($menu_pai as $key => $value) {

            $menu_principal[] = array('id' => $value['id'], 'id_pai' => 0, 'id_filho' => 0, 'descricao' => $value['descricao'], 'link' => $value['link']);
            if (isset($menu_filho)) {

                foreach ($menu_filho as $key1 => $value1) {
                    if ($value['id'] == $value1['id_pai']) {
                        $menu_principal[$key]['filhos'][] = array('id' => $key1, 'id_pai' => $value1['id_pai'], 'id_filho' => 0, 'descricao' => $value1['descricao'], 'link' => $value1['link']);
                    }
                }
            }
        }


        $this->smarty->assign('dados_menu', $menu_principal);
        $_SESSION['user']['menu_sidebar'] = $this->smarty->fetch('comuns/sidebar_dinamico.tpl');
        $menu = $_SESSION['user']['menu_sidebar'];
        return $menu;
    }

    public function logout() {
        //Log
//        $log_o = new logModel;
//        $log_o->logPadrao('saiu do portal', 21);
        //session_unset();
        //session_destroy();
        $_SESSION['user'] = null;
        $_SESSION['login'] = null;
        $this->template->run();
        // $this->smarty->display('/login');
        header("Location: " . "/index.html");
        exit();
    }

    //Acesso Negado
    public function negado() {
        $this->template->run();
        $this->smarty->display('login/acesso_negado.html');
        exit();
    }

    //sessao_expirada
    public function sessao_expirada() {
        //Log
        $log_o = new logModel;
        $log_o->logPadrao('sessao expirada após ' . round(TEMPO_LIMITE / 60, 1) . ' minutos ', 1);
        $_SESSION['user'] = null;
        session_destroy();
        //$this->template->run();
        //$this->smarty->display('/index.html');
        header('Location: /index.html');
        // die('chegou');
        exit();
    }

}

?>