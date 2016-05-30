<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class formapagamento extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new formapagamentoModel();
        $formapagamento_lista = $model->getFormaPagamento();

        $this->smarty->assign('formapagamento_lista', $formapagamento_lista);
        $this->smarty->display('formapagamento/lista.html');
    }

//Funcao de Busca
    public function busca_formapagamento() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new formapagamentoModel();
        $sql = "stStatus <> 0 and upper(dsFormaPagamento) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getFormaPagamento($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('formapagamento_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'formapagamento');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('formapagamento/lista.html');
        } else {
            $this->smarty->assign('formapagamento_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'formapagamento');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('formapagamento/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_formapagamento() {

        $idFormaPagamento = $this->getParam('idFormaPagamento');

        $model = new formapagamentoModel();

        if ($idFormaPagamento > 0) {

            $registro = $model->getFormaPagamento('idFormaPagamento=' . $idFormaPagamento);
            $registro = $registro[0]; //Passando FormaPagamento
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new formapagamentoModel();
        //criar uma lista
        $lista_tipos = $objLista->getFormaPagamento('idFormaPagamento <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idFormaPagamento']] = $value['dsFormaPagamento'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_formapagamento', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Cliente');
        $this->smarty->display('formapagamento/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_formapagamento() {
        $model = new formapagamentoModel();

        $data = $this->trataPost($_POST);

        if ($data['idFormaPagamento'] == NULL)
            $model->setformapagamento($data);
        else
            $model->updformapagamento($data); //update
        
        header('Location: /formapagamento');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idFormaPagamento'] = ($post['idFormaPagamento'] != '') ? $post['idFormaPagamento'] : null;
        $data['dsFormaPagamento'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delformapagamento() {
                
        $idFormaPagamento = $this->getParam('idFormaPagamento');
        
        $formapagamento = $idFormaPagamento;
        
        if (!is_null($formapagamento)) {    
            $model = new formapagamentoModel();
            $dados['idFormaPagamento'] = $formapagamento;             
            $model->delFormaPagamento($dados);
        }

        header('Location: /formapagamento');
    }

    public function relatorioformapagamento_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Cliente');
        $this->smarty->display('formapagamento/relatorio_pre.html');
    }

    public function relatorioformapagamento() {
        $this->template->run();

        $model = new formapagamentoModel();
        $formapagamento_lista = $model->getFormaPagamento();
        //Passa a lista de registros
        $this->smarty->assign('formapagamento_lista', $formapagamento_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Cliente');
        $this->smarty->display('formapagamento/relatorio.html');
    }

}

?>