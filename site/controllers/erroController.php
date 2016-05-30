<?php

class erro extends controller {

    public function index_action() {

        //$msg = "Whoops!";
        $msg = isset($_SESSION['erro']['msg']) ? $_SESSION['erro']['msg'] : null;

        if (DEBUG_APP) {
            //Chama o Smarty           
            $data = date("d-m-Y hh:mm:ss");
            enviaemail('jreislemos@outlook.com', $msg, 'clinução - Aviso SAC ' . $data);
        }

        $this->template->setTitle('Whoops!');
        $this->smarty->assign('title', 'Erro');
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('comuns/erro.tpl');
    }

}
