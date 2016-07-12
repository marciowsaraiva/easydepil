<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class fluxocaixa extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        $this->buscar();
    }

    //Funcao de Inserir
    public function buscar() {
  
        $modelReceita = new receitaModel();
        $modelDespesa = new despesaModel();
        $lista_receita = array('' => 'SELECIONE');
        foreach ($modelReceita->getReceita() as $value) {
            $lista_receita[$value['idReceita']] = $value['dsReceita'];
        }
        $lista_despesa = array('' => 'SELECIONE');
        foreach ($modelDespesa->getDespesa() as $value) {
            $lista_despesa[$value['idDespesa']] = $value['dsDespesa'];
        }
        $modelCliente = new clienteModel();
        $lista_cliente = array('' => 'SELECIONE');
        foreach ($modelCliente->getCliente() as $value) {
            $lista_cliente[$value['idCliente']] = $value['dsCliente'];
        }
        $modelFornecedor = new fornecedorModel();
        $lista_fornecedor = array('' => 'SELECIONE');
        foreach ($modelFornecedor->getFornecedor() as $value) {
            $lista_fornecedor[$value['idFornecedor']] = $value['dsFornecedor'];
        }
        $modelFP = new formapagamentoModel();
        $lista_formapagamento = array('' => 'SELECIONE');
        foreach ($modelFP->getFormaPagamento() as $value) {
            $lista_formapagamento[$value['idFormaPagamento']] = $value['dsFormaPagamento'];
        }
                
        $this->smarty->assign('lista_receita', $lista_receita);
        $this->smarty->assign('lista_despesa', $lista_despesa);
        $this->smarty->assign('lista_cliente', $lista_cliente);
        $this->smarty->assign('lista_fornecedor', $lista_fornecedor);
        $this->smarty->assign('lista_formapagamento', $lista_formapagamento);
        $this->smarty->assign('registro', null);
        $this->smarty->assign('title', 'Fluxo de caixa');
        $this->smarty->display('fluxocaixa/fluxocaixa.tpl');
    }
    
    public function delreceita() {                
        $idFinanceiro = $this->getParam('idFinanceiro');
        $model = new fluxocaixaModel();
        $where = 'idFinanceiro = ' . $idFinanceiro;             
        $model->delFinanceiro($where);
        header('Location: /fluxocaixa'); 
    }
    public function mostrar() {
        $dtDe = isset($_POST['dtDe']) ? $_POST['dtDe'] : null;
        $dtAte = isset($_POST['dtAte']) ? $_POST['dtAte'] : null;
        $idCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : null;
        $idFornecedor = isset($_POST['idFornecedor']) ? $_POST['idFornecedor'] : null;
        $idDespesa = isset($_POST['idDespesa']) ? $_POST['idDespesa'] : null;
        $idReceita = isset($_POST['idReceita']) ? $_POST['idReceita'] : null;
        $dsObservacao = isset($_POST['dsObservacao']) ? $_POST['dsObservacao'] : null;

        $where = "f.idFinanceiro > 0";
        if ($dtDe) {
            $where .= " and f.dtFinanceiro >= '" . substr($dtDe,6,4) . '-' . substr($dtDe,3,2) . '-' . substr($dtDe,0,2) . "'";
        }
        if ($dtAte) {
            $where .= " and f.dtFinanceiro <= '" . substr($dtAte,6,4)  . '-' .  substr($dtAte,3,2)  . '-' .  substr($dtAte,0,2)  . "'";
        }
        if ($idCliente) {
            $where .= " and f.idCliente = " . $idCliente;
        }
        if ($idFornecedor) {
            $where .= " and f.idFornecedor = " . $idFornecedor;
        }
        if ($idDespesa) {
            $where .= " and f.idDespesa = " . $idDespesa;
        }
        if ($idReceita) {
            $where .= " and f.idReceita = " . $idReceita;
        }
        if ($dsObservacao) {
            $where .= " and f.dsObservacao like '%" . $dsObservacao . "%'";
        }
        
//        var_dump($where); die;
        $model = new fluxocaixaModel();
        $registro = $model->getFluxoCaixa($where);
//        print_a_die($registro);
        $this->smarty->assign('dtDe', $dtDe);
        $this->smarty->assign('dtAte', $dtAte);
        $this->smarty->assign('idReceita', $idReceita);
        $this->smarty->assign('idDespesa', $idDespesa);
        $this->smarty->assign('idCliente', $idCliente);
        $this->smarty->assign('idFornecedor', $idFornecedor);
        $this->smarty->assign('dsObservacao', $dsObservacao);
        $this->smarty->assign('registro', $registro);
        $html = $this->smarty->fetch('fluxocaixa/lista.tpl');
        
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                         
    }
}

?>