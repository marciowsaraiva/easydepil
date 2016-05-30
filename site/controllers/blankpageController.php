<?php

/*
 * Classe: blankpage
 *
 */

class blankpage extends controller {

    public function index_action() {

        //Inicializa o Template
        $this->template->run();

        //Chama o Smarty
        $this->smarty->assign('title', 'blank-page');
        $this->smarty->display('blank/blank-page.html');
    }

}

?>