<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tratamento extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tratamentoModel();
        $tratamento_lista = $model->getTratamento();

        $this->smarty->assign('tratamento_lista', $tratamento_lista);
        $this->smarty->display('tratamento/lista.html');
    }

//Funcao de Busca
    public function busca_tratamento() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadsTratamento']) ? $_POST['buscadsTratamento'] : '';
        //$texto = '';
        $model = new tratamentoModel();
        $sql = "stStatus <> 0 and upper(dsTratamento) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTratamento($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tratamento_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tratamento');
            $this->smarty->assign('buscadsTratamento', $texto);
            $this->smarty->display('tratamento/lista.html');
        } else {
            $this->smarty->assign('tratamento_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tratamento');
            $this->smarty->assign('buscadsTratamento', $texto);
            $this->smarty->display('tratamento/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tratamento() {

        $idTratamento = $this->getParam('idTratamento');

        $model = new tratamentoModel();

        if ($idTratamento > 0) {
            $registro = $model->getTratamento('idTratamento=' . $idTratamento);
            $registro = $registro[0]; //Passando Tratamento
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelTipoTratamento = new tipotratamentoModel();
        $lista_TipoTratamento = array('' => 'SELECIONE');
        foreach ($modelTipoTratamento->getTipoTratamento() as $value) {
            $lista_TipoTratamento[$value['idTipoTratamento']] = $value['dsTipoTratamento'];
        }
        $modelReceita = new receitaModel();
        $lista_receita = array('' => 'SELECIONE');
        foreach ($modelReceita->getReceita() as $value) {
            $lista_receita[$value['idReceita']] = $value['dsReceita'];
        }
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_tipotratamento', $lista_TipoTratamento);
        $this->smarty->assign('lista_receita', $lista_receita);
        $this->smarty->assign('title', 'Novo Tratamento');
        $this->smarty->display('tratamento/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tratamento() {
        $model = new tratamentoModel();

        $data = $this->trataPost($_POST);

        if ($data['idTratamento'] == NULL)
            $model->settratamento($data);
        else
            $model->updtratamento($data); //update
        
        header('Location: /tratamento');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTratamento'] = ($post['idTratamento'] != '') ? $post['idTratamento'] : null;
        $data['dsTratamento'] = ($post['dsTratamento'] != '') ? $post['dsTratamento'] : null;
        $data['dsTempo'] = ($post['dsTempo'] != '') ? $post['dsTempo'] : null;
        $data['idTipoTratamento'] = ($post['idTipoTratamento'] != '') ? $post['idTipoTratamento'] : null;
        $data['idReceita'] = ($post['idReceita'] != '') ? $post['idReceita'] : null;
        $data['vlTratamento'] = ($post['vlTratamento'] != '') ? $post['vlTratamento'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltratamento() {
                
        $idTratamento = $this->getParam('idTratamento');
        
        $tratamento = $idTratamento;
        
        if (!is_null($tratamento)) {    
            $model = new tratamentoModel();
            $dados['idTratamento'] = $tratamento;             
            $model->delTratamento($dados);
        }

        header('Location: /tratamento');
    }

    public function relatoriotratamento_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tratamentos');
        $this->smarty->display('tratamento/relatorio_pre.html');
    }

    public function relatoriotratamento() {
        $this->template->run();

        $model = new tratamentoModel();
        $tratamento_lista = $model->getTratamento();
        //Passa a lista de registros
        $this->smarty->assign('tratamento_lista', $tratamento_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tratamentos');
        $this->smarty->display('tratamento/relatorio.html');
    }

}

?>