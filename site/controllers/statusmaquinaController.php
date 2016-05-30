<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class statusmaquina extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new statusmaquinaModel();
        $statusmaquina_lista = $model->getStatusMaquina();

        $this->smarty->assign('statusmaquina_lista', $statusmaquina_lista);
        $this->smarty->display('statusmaquina/lista.html');
    }

//Funcao de Busca
    public function busca_statusmaquina() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new statusmaquinaModel();
        $sql = "stStatus <> 0 and upper(dsStatusMaquina) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getStatusMaquina($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('statusmaquina_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'statusmaquina');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statusmaquina/lista.html');
        } else {
            $this->smarty->assign('statusmaquina_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'statusmaquina');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statusmaquina/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_statusmaquina() {

        $idStatusMaquina = $this->getParam('idStatusMaquina');

        $model = new statusmaquinaModel();

        if ($idStatusMaquina > 0) {

            $registro = $model->getStatusMaquina('idStatusMaquina=' . $idStatusMaquina);
            $registro = $registro[0]; //Passando StatusMaquina
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new statusmaquinaModel();
        //criar uma lista
        $lista_tipos = $objLista->getStatusMaquina('idStatusMaquina <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idStatusMaquina']] = $value['dsStatusMaquina'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_statusmaquina', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Status de Maquina');
        $this->smarty->display('statusmaquina/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_statusmaquina() {
        $model = new statusmaquinaModel();

        $data = $this->trataPost($_POST);

        if ($data['idStatusMaquina'] == NULL)
            $model->setstatusmaquina($data);
        else
            $model->updstatusmaquina($data); //update
        
        header('Location: /statusmaquina');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idStatusMaquina'] = ($post['idStatusMaquina'] != '') ? $post['idStatusMaquina'] : null;
        $data['dsStatusMaquina'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delstatusmaquina() {
                
        $idStatusMaquina = $this->getParam('idStatusMaquina');
        
        $statusmaquina = $idStatusMaquina;
        
        if (!is_null($statusmaquina)) {    
            $model = new statusmaquinaModel();
            $dados['idStatusMaquina'] = $statusmaquina;             
            $model->delStatusMaquina($dados);
        }

        header('Location: /statusmaquina');
    }

    public function relatoriostatusmaquina_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Status de Maquinas');
        $this->smarty->display('statusmaquina/relatorio_pre.html');
    }

    public function relatoriostatusmaquina() {
        $this->template->run();

        $model = new statusmaquinaModel();
        $statusmaquina_lista = $model->getStatusMaquina();
        //Passa a lista de registros
        $this->smarty->assign('statusmaquina_lista', $statusmaquina_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Status de Maquinas');
        $this->smarty->display('statusmaquina/relatorio.html');
    }

}

?>