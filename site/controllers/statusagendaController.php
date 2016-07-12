<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class statusagenda extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new statusagendaModel();
        $statusagenda_lista = $model->getStatusAgenda();

        $this->smarty->assign('statusagenda_lista', $statusagenda_lista);
        $this->smarty->display('statusagenda/lista.html');
    }

//Funcao de Busca
    public function busca_statusagenda() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new statusagendaModel();
        $sql = "stStatus <> 0 and upper(dsStatusAgenda) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getStatusAgenda($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('statusagenda_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'statusagenda');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statusagenda/lista.html');
        } else {
            $this->smarty->assign('statusagenda_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'statusagenda');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statusagenda/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_statusagenda() {

        $idStatusAgenda = $this->getParam('idStatusAgenda');

        $model = new statusagendaModel();

        if ($idStatusAgenda > 0) {

            $registro = $model->getStatusAgenda('idStatusAgenda=' . $idStatusAgenda);
            $registro = $registro[0]; //Passando StatusAgenda
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de statuss fk
        $objLista = new statusagendaModel();
        //criar uma lista
        $lista_statuss = $objLista->getStatusAgenda('idStatusAgenda <> 0');
        foreach ($lista_statuss as $value) {
            $lista_statuss_log[$value['idStatusAgenda']] = $value['dsStatusAgenda'];
        }
        //Passar a lista de Status
        $this->smarty->assign('lista_statusagenda', $lista_statuss);
        //var_dump($lista_statuss_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Status de Agenda');
        $this->smarty->display('statusagenda/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_statusagenda() {
        $model = new statusagendaModel();

        $data = $this->trataPost($_POST);

        if ($data['idStatusAgenda'] == NULL)
            $model->setstatusagenda($data);
        else
            $model->updstatusagenda($data); //update
        
        header('Location: /statusagenda');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idStatusAgenda'] = ($post['idStatusAgenda'] != '') ? $post['idStatusAgenda'] : null;
        $data['dsStatusAgenda'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delstatusagenda() {
                
        $idStatusAgenda = $this->getParam('idStatusAgenda');
        
        $statusagenda = $idStatusAgenda;
        
        if (!is_null($statusagenda)) {    
            $model = new statusagendaModel();
            $dados['idStatusAgenda'] = $statusagenda;             
            $model->delStatusAgenda($dados);
        }

        header('Location: /statusagenda');
    }

    public function relatoriostatusagenda_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Status de Agenda');
        $this->smarty->display('statusagenda/relatorio_pre.html');
    }

    public function relatoriostatusagenda() {
        $this->template->run();

        $model = new statusagendaModel();
        $statusagenda_lista = $model->getStatusAgenda();
        //Passa a lista de registros
        $this->smarty->assign('statusagenda_lista', $statusagenda_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Status de Agenda');
        $this->smarty->display('statusagenda/relatorio.html');
    }

}

?>