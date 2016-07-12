<?php

class permissoes {

    public function __construct() {
        // echo "chegou no permissoes...";

    }

    public function check_login($public_pages) {

        $system = new System();
        if (!isset($_SESSION['user']['usuario']) && !in_array($system->getUrl(), $public_pages)) {
            header('Location:/login');
            die;
        }
    }

    public function is_logged() {
        if (isset($_SESSION['user']['usuario']))
            return true;
        else
            return false;
    }

    public function is_expired() {
        //$segundos = null;
        $registro = isset($_SESSION['user']['registro']) ? $_SESSION['user']['registro'] : '1999-01-01';
        $limite = isset($_SESSION['user']['limite']) ? $_SESSION['user']['limite'] : 0;
        if ($registro) {// verifica se a session  registro esta ativa
            $segundos = time() - $registro;
        }

        // fim da verificação da session registro

        /* verifica o tempo de inatividade 
          se ele tiver ficado mais de 900 segundos sem atividade ele destroi a session
          se não ele renova o tempo e ai é contado mais 900 segundos */
//        if ($segundos > $limite) {
//            die('is expired!!! chegou' . $segundos . ' - ' . $limite);
//            //session_destroy();
//            // die("Sua seção expirou.");
//            // fim da verificação de inatividade
//            //die('expirou '.$_SESSION['user']['registro']);
//            $_SESSION['user'] = null;
//            header('Location: /login/sessao_expirada');
//            die;
//        } else {
            $_SESSION['user']['registro'] = time();
//        }
    }

    public function restante_para_expirar() {
        $segundos = 0;
        $registro = isset($_SESSION['user']['registro']) ? $_SESSION['user']['registro'] : null;
        //$limite =  isset($_SESSION['user']['limite'])?$_SESSION['user']['limite']:null;
        if ($registro) {// verifica se a session  registro esta ativa
            $segundos = time() - $registro;
        }
        return $segundos;
    }

    public function controleAcesso() {

        $idUsuario = isset($_SESSION['user']['usuario'])?$_SESSION['user']['usuario']:NULL;
        
        //android

        if (!is_null($idUsuario) && $idUsuario != 1) {
            $acesso = false;
            $system = new System();
            // autoload
            if(preg_match("/^(autoload)\/(.*)$/i", "{$system->_controller}/{$system->_action}")){
              $acesso = true;
            }
            //Verifica se é do perfil Administrador
            if (!$acesso) {
                if(isset($_SESSION['user']['perfil'])) {
                    //Percorre todos os perfis
                    foreach($_SESSION['user']['perfil'] as $perfis) {
                        if($perfis['idPerfil']) {
                            return true;
                        }
                    }
                }
            }

            require_once './models/controleAcessoModel.php';
            $ca_model = new controleAcessoModel();

            $controller = $system->getController();
            $idUsuario = $_SESSION['user']['usuario'];

            $acesso = ($acesso) ? $acesso : $ca_model->getAcesso("d.idUsuario = '{$idUsuario}' AND a.des = '{$controller}'");
            
            //ACESSO NEGADO
            if ($acesso == 0) {
                $_SESSION['erro']['msg'] = 'ACESSO NEGADO. VOCE NAO TEM PERMISSAO PARA ACESSAR ESSA PAGINA.';
                header("Location: /erro");
                die;
            }
            
            return true;
        }
    }

}
