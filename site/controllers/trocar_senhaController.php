<?php

class trocar_senha extends controller {

    public function troca_senha() {
        $model = new usuariosModel();
        
        $idUsuario = $_SESSION['user']['usuario'];
        
        $dados = $model->getTrocaSenha('ts.stStatus <> 0 and ts.idUsuario = '.$idUsuario);

        //var_dump($dados);die;

        $this->smarty->assign('title', 'TROCAR SENHA');
        $this->smarty->assign('dados', $dados[0]);
        $this->smarty->display('usuarios/trocar_senha.tpl');
    }

    public function grava_senha() {

        $model = new usuariosModel();

        $array = array();



        $array['idUsuario'] = $_POST['idUsuario'];
        $array['senha'] = $_POST['nova_senha'];

        $model->updUsuario($array);
        $log_o = new logModel;
        $log_o->logPadrao('trocou a senha', 1);

        header("Location: /dashboard");
        //jogar para home
    }

    public function valida_senha() {
        $idUsuario = $this->getParam('idUsuario');
        $nova_senha = $this->getParam('nova_senha');



        $model = new usuariosModel();
        $dados = $model->getTrocaSenha("ts.stStatus <> 0 and ts.idUsuario = '{$idUsuario}'");



        $return = array();
        $return['stStatus'] = true;

        //print_a_die($dados[0]['Senha']);

        if ($dados[0]['Senha'] === $nova_senha) {
            $return['stStatus'] = false;
        }

        echo json_encode($return);
        die;
    }

}

?>