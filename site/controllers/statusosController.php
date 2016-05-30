<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class statusos extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new statusosModel();
        $statusos_lista = $model->getStatusOS();

        $this->smarty->assign('statusos_lista', $statusos_lista);
        $this->smarty->display('statusos/lista.html');
    }

//Funcao de Busca
    public function busca_statusos() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new statusosModel();
        $sql = "stStatus <> 0 and upper(dsStatusOS) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getStatusOS($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('statusos_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'statusos');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statusos/lista.html');
        } else {
            $this->smarty->assign('statusos_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'statusos');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('statusos/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_statusos() {

        $idStatusOS = $this->getParam('idStatusOS');

        $model = new statusosModel();

        if ($idStatusOS > 0) {

            $registro = $model->getStatusOS('idStatusOS=' . $idStatusOS);
            $registro = $registro[0]; //Passando StatusOS
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new statusosModel();
        //criar uma lista
        $lista_tipos = $objLista->getStatusOS('idStatusOS <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idStatusOS']] = $value['dsStatusOS'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_statusos', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'novo statusos');
        $this->smarty->display('statusos/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_statusos() {
        $model = new statusosModel();

        $data = $this->trataPost($_POST);

        if ($data['idStatusOS'] == NULL)
            $model->setstatusos($data);
        else
            $model->updstatusos($data); //update
        
        header('Location: /statusos');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idStatusOS'] = ($post['idStatusOS'] != '') ? $post['idStatusOS'] : null;
        $data['dsStatusOS'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delstatusos() {
                
        $idStatusOS = $this->getParam('idStatusOS');
        
        $statusos = $idStatusOS;
        
        if (!is_null($statusos)) {    
            $model = new statusosModel();
            $dados['idStatusOS'] = $statusos;             
            $model->delStatusOS($dados);
        }

        header('Location: /statusos');
    }

    public function relatoriostatusos_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio statusos');
        $this->smarty->display('statusos/relatorio_pre.html');
    }

    public function relatoriostatusos() {
        $this->template->run();

        $model = new statusosModel();
        $statusos_lista = $model->getStatusOS();
        //Passa a lista de registros
        $this->smarty->assign('statusos_lista', $statusos_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Perfis');
        $this->smarty->display('statusos/relatorio.html');
    }

}

?>