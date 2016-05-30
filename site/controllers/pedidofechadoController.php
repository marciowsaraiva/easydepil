<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class pedidofechado extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        
        $model = new pedidoModel();
        $registro = $model->getPedido('a.stSituacao = 2');

        $this->smarty->assign('pedidos', $registro);
        $this->smarty->assign('title', 'Pedidos de Compra Fechados');
        $this->smarty->display('pedido/pedidofechado.html');
        
    }
}

?>