<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class lancarreceita extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        $this->novo_lancarreceita();
    }

//Funcao de Busca
    public function busca_lancarreceita() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new lancarreceitaModel();
        $sql = "stStatus <> 0 and upper(dsFinanceiro) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getFinanceiro($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('lancarreceita_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'lancarreceita');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('lancarreceita/lista.html');
        } else {
            $this->smarty->assign('lancarreceita_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'lancarreceita');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('lancarreceita/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_lancarreceita() {
  
        $idFinanceiro = null;
        
        $model = new lancarreceitaModel();
        if (isset($idFinanceiro)) {
            if ((bool) $idFinanceiro) {
                $registro = $model->getFinanceiroReceita('a.idFinanceiro=' . $idFinanceiro);  
                if ($registro) {
                    $registro = $registro[0];
                }
            }
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelReceita = new receitaModel();
        $lista_receita = array('' => 'SELECIONE');
        foreach ($modelReceita->getReceita() as $value) {
            $lista_receita[$value['idReceita']] = $value['dsReceita'];
        }
        $modelCliente = new clienteModel();
        $lista_cliente = array('' => 'SELECIONE');
        foreach ($modelCliente->getCliente() as $value) {
            $lista_cliente[$value['idCliente']] = $value['dsCliente'];
        }
        $modelFP = new formapagamentoModel();
        $lista_formapagamento = array('' => 'SELECIONE');
        foreach ($modelFP->getFormaPagamento() as $value) {
            $lista_formapagamento[$value['idFormaPagamento']] = $value['dsFormaPagamento'];
        }
        
        $datadehoje = date('Y-m-d');
        $where = "a.dtFinanceiro = '" . $datadehoje ."' and stTipo = 'C'";
        $receitas = $model->getFinanceiroReceitasHoje($where);  
        if (!$receitas) {
            $receitas = null;
        }
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_receita', $lista_receita);
        $this->smarty->assign('lista_cliente', $lista_cliente);
        $this->smarty->assign('lista_formapagamento', $lista_formapagamento);
        $this->smarty->assign('receitas', $receitas);
        $this->smarty->assign('title', 'Nova Receita');
        $this->smarty->display('lancarreceita/form_novo.tpl');
    }

    /**
     * 
     */
    public function gravar_receita() {
        
        $model = new lancarreceitaModel();

        $data = $this->trataPost($_POST);

        $id = $model->setFinanceiro($data);
        $_SESSION['receita']['id'] = $id;
        $jsondata["html"] = "lancarreceita/form_novo.tpl";
        $jsondata["idFinanceiro"] = $id;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
        
    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data = array();
        $data['idFinanceiro'] = null;
        $data['idCliente'] = ($post['idCliente'] != '') ? $post['idCliente'] : null;
        $data['idReceita'] = ($post['idReceita'] != '') ? $post['idReceita'] : null;
        $data['stTipo'] = 'C';
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
        $data['dtFinanceiro'] = ($post['dtFinanceiro'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST["dtFinanceiro"]))) : date('Y-m-d h:m:s');
        $data['vlFinanceiro'] = ($post['vlFinanceiro'] != '') ? $post['vlFinanceiro'] : null;
        $data['idFormaPagamento'] = ($post['idFormaPagamento'] != '') ? $post['idFormaPagamento'] : null;
        return $data;
    }

    public function delreceita() {                
        $idFinanceiro = $this->getParam('idFinanceiro');
        $model = new lancarreceitaModel();
        $where = 'idFinanceiro = ' . $idFinanceiro;             
        $model->delFinanceiro($where);
        header('Location: /lancarreceita');        
        
    }

    public function relatoriolancarreceita_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Financeiros');
        $this->smarty->display('lancarreceita/relatorio_pre.html');
    }

    public function relatoriolancarreceita() {
        $this->template->run();

        $model = new lancarreceitaModel();
        $lancarreceita_lista = $model->getFinanceiro();
        //Passa a lista de registros
        $this->smarty->assign('lancarreceita_lista', $lancarreceita_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Financeiros');
        $this->smarty->display('lancarreceita/relatorio.html');
    }

}

?>