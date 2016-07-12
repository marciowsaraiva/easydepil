<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class despesa extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new despesaModel();
        $despesa_lista = $model->getDespesa();

        $this->smarty->assign('despesa_lista', $despesa_lista);
        $this->smarty->display('despesa/lista.html');
    }

//Funcao de Busca
    public function busca_despesa() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadsDespesa']) ? $_POST['buscadsDespesa'] : '';
        //$texto = '';
        $model = new despesaModel();
        $sql = "stStatus <> 0 and upper(dsDespesa) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getDespesa($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('despesa_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'despesa');
            $this->smarty->assign('buscadsDespesa', $texto);
            $this->smarty->display('despesa/lista.html');
        } else {
            $this->smarty->assign('despesa_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'despesa');
            $this->smarty->assign('buscadsDespesa', $texto);
            $this->smarty->display('despesa/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_despesa() {

        $idDespesa = $this->getParam('idDespesa');

        $model = new despesaModel();

        if ($idDespesa > 0) {
            $registro = $model->getDespesa('idDespesa=' . $idDespesa);
            $registro = $registro[0]; //Passando Despesa
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelTipoDespesa = new tipodespesaModel();
        $lista_TipoDespesa = array('' => 'SELECIONE');
        foreach ($modelTipoDespesa->getTipoDespesa() as $value) {
            $lista_TipoDespesa[$value['idTipoDespesa']] = $value['dsTipoDespesa'];
        }
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_tipodespesa', $lista_TipoDespesa);
        $this->smarty->assign('title', 'Novo Despesa');
        $this->smarty->display('despesa/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_despesa() {
        $model = new despesaModel();

        $data = $this->trataPost($_POST);

        if ($data['idDespesa'] == NULL)
            $model->setdespesa($data);
        else
            $model->upddespesa($data); //update
        
        header('Location: /despesa');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idDespesa'] = ($post['idDespesa'] != '') ? $post['idDespesa'] : null;
        $data['dsDespesa'] = ($post['dsDespesa'] != '') ? $post['dsDespesa'] : null;
        $data['idTipoDespesa'] = ($post['idTipoDespesa'] != '') ? $post['idTipoDespesa'] : null;
        return $data;
    }

    // Remove Padrao
    public function deldespesa() {
                
        $idDespesa = $this->getParam('idDespesa');
        
        $despesa = $idDespesa;
        
        if (!is_null($despesa)) {    
            $model = new despesaModel();
            $dados['idDespesa'] = $despesa;             
            $model->delDespesa($dados);
        }

        header('Location: /despesa');
    }

    public function relatoriodespesa_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Despesas');
        $this->smarty->display('despesa/relatorio_pre.html');
    }

    public function relatoriodespesa() {
        $this->template->run();

        $model = new despesaModel();
        $despesa_lista = $model->getDespesa();
        //Passa a lista de registros
        $this->smarty->assign('despesa_lista', $despesa_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Despesas');
        $this->smarty->display('despesa/relatorio.html');
    }

}

?>