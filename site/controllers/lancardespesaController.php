<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class lancardespesa extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        $this->novo_lancardespesa();
    }

//Funcao de Busca
    public function busca_lancardespesa() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new lancardespesaModel();
        $sql = "stStatus <> 0 and upper(dsFinanceiro) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getFinanceiro($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('lancardespesa_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'lancardespesa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('lancardespesa/lista.html');
        } else {
            $this->smarty->assign('lancardespesa_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'lancardespesa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('lancardespesa/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_lancardespesa() {
  
        $idFinanceiro = null;
        
        $model = new lancardespesaModel();
        if (isset($idFinanceiro)) {
            if ((bool) $idFinanceiro) {
                $registro = $model->getFinanceiroDespesa('a.idFinanceiro=' . $idFinanceiro);  
                if ($registro) {
                    $registro = $registro[0];
                }
            }
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelDespesa = new despesaModel();
        $lista_despesa = array('' => 'SELECIONE');
        foreach ($modelDespesa->getDespesa() as $value) {
            $lista_despesa[$value['idDespesa']] = $value['dsDespesa'];
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
        $datadehoje = date('Y-m-d');
        $where = "a.dtFinanceiro = '" . $datadehoje ."' and stTipo = 'D'";
        $despesas = $model->getFinanceiroDespesasHoje($where);  
        if (!$despesas) {
            $despesas = null;
        }
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_despesa', $lista_despesa);
        $this->smarty->assign('lista_fornecedor', $lista_fornecedor);
        $this->smarty->assign('lista_formapagamento', $lista_formapagamento);
        $this->smarty->assign('despesas', $despesas);
        $this->smarty->assign('title', 'Nova Despesa');
        $this->smarty->display('lancardespesa/form_novo.tpl');
    }

    /**
     * 
     */
    public function gravar_despesa() {
        
        $model = new lancardespesaModel();

        $data = $this->trataPost($_POST);

        $id = $model->setFinanceiro($data);
        $_SESSION['despesa']['id'] = $id;
        $jsondata["html"] = "lancardespesa/form_novo.tpl";
        $jsondata["idFinanceiro"] = $id;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
        
    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data = array();
        $data['idFinanceiro'] = null;
        $data['idFornecedor'] = ($post['idFornecedor'] != '') ? $post['idFornecedor'] : null;
        $data['idDespesa'] = ($post['idDespesa'] != '') ? $post['idDespesa'] : null;
        $data['stTipo'] = 'D';
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
        $data['dtFinanceiro'] = ($post['dtFinanceiro'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST["dtFinanceiro"]))) : date('Y-m-d h:m:s');
        $data['vlFinanceiro'] = ($post['vlFinanceiro'] != '') ? $post['vlFinanceiro'] : null;
        $data['idFormaPagamento'] = ($post['idFormaPagamento'] != '') ? $post['idFormaPagamento'] : null;
        return $data;
    }

    public function deldespesa() {                
        $idFinanceiro = $this->getParam('idFinanceiro');
        $model = new lancardespesaModel();
        $where = 'idFinanceiro = ' . $idFinanceiro;             
        $model->delFinanceiro($where);
        header('Location: /lancardespesa');        
        
    }

    public function relatoriolancardespesa_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Financeiros');
        $this->smarty->display('lancardespesa/relatorio_pre.html');
    }

    public function relatoriolancardespesa() {
        $this->template->run();

        $model = new lancardespesaModel();
        $lancardespesa_lista = $model->getFinanceiro();
        //Passa a lista de registros
        $this->smarty->assign('lancardespesa_lista', $lancardespesa_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Financeiros');
        $this->smarty->display('lancardespesa/relatorio.html');
    }

}

?>