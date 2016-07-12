<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipotratamento extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipotratamentoModel();
        $tipotratamento_lista = $model->getTipoTratamento();

        $this->smarty->assign('tipotratamento_lista', $tipotratamento_lista);
        $this->smarty->display('tipotratamento/lista.html');
    }

//Funcao de Busca
    public function busca_tipotratamento() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipotratamentoModel();
        $sql = "stStatus <> 0 and upper(dsTipoTratamento) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoTratamento($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipotratamento_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipotratamento');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipotratamento/lista.html');
        } else {
            $this->smarty->assign('tipotratamento_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipotratamento');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipotratamento/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipotratamento() {

        $idTipoTratamento = $this->getParam('idTipoTratamento');

        $model = new tipotratamentoModel();

        if ($idTipoTratamento > 0) {

            $registro = $model->getTipoTratamento('idTipoTratamento=' . $idTipoTratamento);
            $registro = $registro[0]; //Passando TipoTratamento
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipotratamentoModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoTratamento('idTipoTratamento <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoTratamento']] = $value['dsTipoTratamento'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipotratamento', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Tratamento');
        $this->smarty->display('tipotratamento/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipotratamento() {
        $model = new tipotratamentoModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoTratamento'] == NULL)
            $model->settipotratamento($data);
        else
            $model->updtipotratamento($data); //update
        
        header('Location: /tipotratamento');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoTratamento'] = ($post['idTipoTratamento'] != '') ? $post['idTipoTratamento'] : null;
        $data['dsTipoTratamento'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipotratamento() {
                
        $idTipoTratamento = $this->getParam('idTipoTratamento');
        
        $tipotratamento = $idTipoTratamento;
        
        if (!is_null($tipotratamento)) {    
            $model = new tipotratamentoModel();
            $dados['idTipoTratamento'] = $tipotratamento;             
            $model->delTipoTratamento($dados);
        }

        header('Location: /tipotratamento');
    }

    public function relatoriotipotratamento_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Tratamento');
        $this->smarty->display('tipotratamento/relatorio_pre.html');
    }

    public function relatoriotipotratamento() {
        $this->template->run();

        $model = new tipotratamentoModel();
        $tipotratamento_lista = $model->getTipoTratamento();
        //Passa a lista de registros
        $this->smarty->assign('tipotratamento_lista', $tipotratamento_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Tratamento');
        $this->smarty->display('tipotratamento/relatorio.html');
    }

}

?>