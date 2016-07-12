<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class statuscliente extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new statusclienteModel();
        $statuscliente_lista = $model->getStatusCliente();

        $this->smarty->assign('statuscliente_lista', $statuscliente_lista);
        $this->smarty->display('statuscliente/lista.html');
    }

//Funcao de Busca
    public function busca_statuscliente() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new statusclienteModel();
        $sql = "stStatus <> 0 and upper(dsStatusCliente) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getStatusCliente($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('statuscliente_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'statuscliente');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statuscliente/lista.html');
        } else {
            $this->smarty->assign('statuscliente_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'statuscliente');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statuscliente/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_statuscliente() {

        $idStatusCliente = $this->getParam('idStatusCliente');

        $model = new statusclienteModel();

        if ($idStatusCliente > 0) {

            $registro = $model->getStatusCliente('idStatusCliente=' . $idStatusCliente);
            $registro = $registro[0]; //Passando StatusCliente
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de statuss fk
        $objLista = new statusclienteModel();
        //criar uma lista
        $lista_statuss = $objLista->getStatusCliente('idStatusCliente <> 0');
        foreach ($lista_statuss as $value) {
            $lista_statuss_log[$value['idStatusCliente']] = $value['dsStatusCliente'];
        }
        //Passar a lista de Status
        $this->smarty->assign('lista_statuscliente', $lista_statuss);
        //var_dump($lista_statuss_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Status de Cliente');
        $this->smarty->display('statuscliente/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_statuscliente() {
        $model = new statusclienteModel();

        $data = $this->trataPost($_POST);

        if ($data['idStatusCliente'] == NULL)
            $model->setstatuscliente($data);
        else
            $model->updstatuscliente($data); //update
        
        header('Location: /statuscliente');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idStatusCliente'] = ($post['idStatusCliente'] != '') ? $post['idStatusCliente'] : null;
        $data['dsStatusCliente'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delstatuscliente() {
                
        $idStatusCliente = $this->getParam('idStatusCliente');
        
        $statuscliente = $idStatusCliente;
        
        if (!is_null($statuscliente)) {    
            $model = new statusclienteModel();
            $dados['idStatusCliente'] = $statuscliente;             
            $model->delStatusCliente($dados);
        }

        header('Location: /statuscliente');
    }

    public function relatoriostatuscliente_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Status de Cliente');
        $this->smarty->display('statuscliente/relatorio_pre.html');
    }

    public function relatoriostatuscliente() {
        $this->template->run();

        $model = new statusclienteModel();
        $statuscliente_lista = $model->getStatusCliente();
        //Passa a lista de registros
        $this->smarty->assign('statuscliente_lista', $statuscliente_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Status de Cliente');
        $this->smarty->display('statuscliente/relatorio.html');
    }

}

?>