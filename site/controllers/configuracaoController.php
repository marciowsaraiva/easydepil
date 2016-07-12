<?php

class configuracao extends controller {

    public function index_action() {
        $model = new logModel();
        $log_lista = $model->getLog(array('stStatus' => array('$ne' => '0')), array('idLog' => -1));

        //Inicializa o Template
        $this->template->run();

        //Chama o Smarty
        $this->smarty->assign('log_lista', $log_lista);
        $this->smarty->assign('title', 'configuracao');
        $this->smarty->display('configuracao/configuracao_index.html');
    }

}
