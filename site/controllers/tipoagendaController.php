<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipoagenda extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipoagendaModel();
        $tipoagenda_lista = $model->getTipoAgenda();

        $this->smarty->assign('tipoagenda_lista', $tipoagenda_lista);
        $this->smarty->display('tipoagenda/lista.html');
    }

//Funcao de Busca
    public function busca_tipoagenda() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipoagendaModel();
        $sql = "stStatus <> 0 and upper(dsTipoAgenda) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoAgenda($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipoagenda_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipoagenda');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipoagenda/lista.html');
        } else {
            $this->smarty->assign('tipoagenda_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipoagenda');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipoagenda/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipoagenda() {

        $idTipoAgenda = $this->getParam('idTipoAgenda');

        $model = new tipoagendaModel();

        if ($idTipoAgenda > 0) {

            $registro = $model->getTipoAgenda('idTipoAgenda=' . $idTipoAgenda);
            $registro = $registro[0]; //Passando TipoAgenda
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipoagendaModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoAgenda('idTipoAgenda <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoAgenda']] = $value['dsTipoAgenda'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipoagenda', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Agenda');
        $this->smarty->display('tipoagenda/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipoagenda() {
        $model = new tipoagendaModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoAgenda'] == NULL)
            $model->settipoagenda($data);
        else
            $model->updtipoagenda($data); //update
        
        header('Location: /tipoagenda');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoAgenda'] = ($post['idTipoAgenda'] != '') ? $post['idTipoAgenda'] : null;
        $data['dsTipoAgenda'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['dsCor'] = ($post['dsCor'] != '') ? $post['dsCor'] : null;
        $data['dsResumida'] = ($post['dsResumida'] != '') ? $post['dsResumida'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipoagenda() {
                
        $idTipoAgenda = $this->getParam('idTipoAgenda');
        
        $tipoagenda = $idTipoAgenda;
        
        if (!is_null($tipoagenda)) {    
            $model = new tipoagendaModel();
            $dados['idTipoAgenda'] = $tipoagenda;             
            $model->delTipoAgenda($dados);
        }

        header('Location: /tipoagenda');
    }

    public function relatoriotipoagenda_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Agenda');
        $this->smarty->display('tipoagenda/relatorio_pre.html');
    }

    public function relatoriotipoagenda() {
        $this->template->run();

        $model = new tipoagendaModel();
        $tipoagenda_lista = $model->getTipoAgenda();
        //Passa a lista de registros
        $this->smarty->assign('tipoagenda_lista', $tipoagenda_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Agenda');
        $this->smarty->display('tipoagenda/relatorio.html');
    }

}

?>