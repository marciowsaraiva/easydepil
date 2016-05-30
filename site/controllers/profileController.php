<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class profile extends controller {

    public function index_action() {

        $this->template->run();

        $model = new usuariosModel();
        //$sql = "L.status > 0"; 
        $usuario = $model->getUsuario("idUsuario = '{$_SESSION['user']['usuario']}'");

        //var_dump($usuario);die;

        $email = $usuario[0]['email'];
        $fone1 = $usuario[0]['telefone1'];
        $fone2 = $usuario[0]['telefone2'];

        $this->smarty->assign('email', $email);
        $this->smarty->assign('fone1', $fone1);
        $this->smarty->assign('fone2', $fone2);
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->display('profile/index.html');
    }

}

?>