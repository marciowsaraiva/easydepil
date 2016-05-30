<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class pedido extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        unset($_SESSION['pedido']['id']);
        
        $model = new pedidoModel();
        $registro = $model->getPedido('a.stSituacao = 1');

        $this->smarty->assign('pedidos', $registro);
        $this->smarty->assign('title', 'Pedido de Compra');
        $this->smarty->display('pedido/prelista.html');
        
    }

//Funcao de Busca
    public function busca_pedido() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new pedidoModel();
        $sql = "a.stStatus <> 0 and upper(a.dsPedido) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getPedido($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('pedido_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'pedido');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('pedido/lista.html');
        } else {
            $this->smarty->assign('pedido_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'pedido');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('pedido/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_pedido() {
  
        if (!isset($_SESSION['pedido']['id'])) {
           $idPedido = $this->getParam('idPedido');
        } else {
          if ($_SESSION['pedido']['id'] == 0) {
             $idPedido = null;
          } else {
            $idPedido = $_SESSION['pedido']['id'];            
          }
        }
        
        $model = new pedidoModel();
        if (isset($idPedido)) {
            if ((bool) $idPedido) {
                $registro = $model->getPedido('a.idPedido=' . $idPedido);  
                if ($registro) {
                    $registro = $registro[0];
                } else {
                    //Novo Registro
                    $registro = $model->estrutura_vazia();
                    $registro = $registro[0];                    
                }
            } else {
                //Novo Registro
                $registro = $model->estrutura_vazia();
                $registro = $registro[0];                    
            }
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelFornecedor = new fornecedorModel();
        $lista_fornecedor = array('' => 'SELECIONE');
        foreach ($modelFornecedor->getFornecedor() as $value) {
            $lista_fornecedor[$value['idFornecedor']] = $value['dsFornecedor'];
        }
        $modelInsumo = new insumoModel();
        $lista_insumo = array('' => 'SELECIONE');
        foreach ($modelInsumo->getInsumo() as $value) {
            $lista_insumo[$value['idInsumo']] = $value['dsInsumo'];
        }
        $modelCentroCusto = new centrocustoModel();
        $lista_centrocusto = array('' => 'SELECIONE');
        foreach ($modelCentroCusto->getCentroCusto() as $value) {
            $lista_centrocusto[$value['idCentroCusto']] = $value['dsCentroCusto'];
        }
        $modelMaquina = new maquinaModel();
        $lista_maquina = array('' => 'SELECIONE');
        foreach ($modelMaquina->getMaquina() as $value) {
            $lista_maquina[$value['idMaquina']] = $value['dsMaquina'];
        }
        $modelOS = new osModel();
        $lista_OS = array('' => 'SELECIONE');
        foreach ($modelOS->getOS() as $value) {
            $lista_OS[$value['idOS']] = $value['nrOS'];
        }
        $motivolOS = new motivoModel();
        $lista_Motivo = array('' => 'SELECIONE');
        foreach ($motivolOS->getMotivo() as $value) {
            $lista_Motivo[$value['idMotivo']] = $value['dsMotivo'];
        }
        $localestoque = new localestoqueModel();
        $lista_localestoque = array('' => 'SELECIONE');
        foreach ($localestoque->getLocalEstoque() as $value) {
            $lista_localestoque[$value['idLocalEstoque']] = $value['dsLocalEstoque'];
        }
        
        $pedidoitens = array();
        $valortotal = null;
        if($idPedido) {
            $where = "a.idPedido = " . $idPedido;
            $pedidoitens = $model->getPedidoItens($where);
            $totalpedido = $model->getTotalPedidoItens($where);
            $valortotal = $totalpedido[0]['totalpedido'];
        }        
        
        $this->smarty->assign('nrPedido', null);
        if (!$idPedido) {
            $nrUltimoPedido = $model->getUltimoPedido()[0];
            if ($nrUltimoPedido['ultimo']) {
                
                $registro['nrPedido'] = ($nrUltimoPedido['ultimo'] !='') ? $nrUltimoPedido['ultimo'] + 1 :null;
            }
            
        }
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('idPedido', $idPedido);
        $this->smarty->assign('lista_fornecedor', $lista_fornecedor);
        $this->smarty->assign('lista_insumo', $lista_insumo);
        $this->smarty->assign('lista_localestoque', $lista_localestoque);
        $this->smarty->assign('lista_centrocusto', $lista_centrocusto);
        $this->smarty->assign('lista_maquina', $lista_maquina);
        $this->smarty->assign('lista_os', $lista_OS);
        $this->smarty->assign('lista_motivo', $lista_Motivo);
        $this->smarty->assign('pedidoitens', $pedidoitens);
        $this->smarty->assign('totalpedido', $valortotal);
        $this->smarty->assign('title', 'Novo Pedido de Compra');
        $this->smarty->display('pedido/form_novo.tpl');
    }
    // Gravar Padrao
    public function novopedido() {        
        
        $_SESSION['pedido']['id'] = 0;
        $jsondata["idPedido"] = null;
        $jsondata["ok"] = true;

        echo json_encode($jsondata);
    }
    
    public function alterar_financeiro() { 
    //    var_dump($_POST); die;
        $idFinanceiroParcela = $_POST['idFinanceiroParcela'];
        $dados = array();
        $dados['dtVencimento'] = ($_POST['dtVencimento'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST["dtVencimento"]))) : date('Y-m-d h:m:s');
        $dados['vlParcela']  = ($_POST['vlParcela'] != '') ? $_POST['vlParcela'] : null;
        
        $model = new pedidoModel();
        $where = 'idFinanceiroParcela = ' . $idFinanceiroParcela;             
        $model->updFinanceiroItem($dados, $where);
        $jsondata["ok"] = true;
        echo json_encode($jsondata);        
    }

    public function lerunidade() {
        $idInsumo = $_POST['idInsumo'];
        $dsUnidade = null;
        $qtEstoque = null;
        $modelUnidade = new unidadeModel();
        $where = 'idInsumo = ' . $idInsumo;
        $retorno = $modelUnidade->getInsumoUnidade($where);
        if ($retorno) {
            $dsUnidade = $retorno[0]['dsUnidade'];
            $qtEstoque = $retorno[0]['qtEstoque'];
        }
        $jsondata["dsUnidade"] = $dsUnidade;
        $jsondata["qtEstoque"] = $qtEstoque;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
    
    public function desabilitaid() {
        unset($_SESSION['pedido']['id']);
        echo json_encode(true);
    }
    
    public function gravar_pedido() {
        
        $model = new pedidoModel();

        $data = $this->trataPost($_POST);

        $id = $model->setPedido($data);
        $_SESSION['pedido']['id'] = $id;
        $jsondata["html"] = "pedido/form_novo.tpl";
        $jsondata["idPedido"] = $id;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }

    public function gravar_item() {
        $model = new pedidoModel();
        $data = $this->trataPostItem($_POST);
        $model->setPedidoItem($data);
    
        $jsondata["html"] = "pedido/lista.tpl";
        $jsondata["idPedidoItem"] = $data['idPedido'];
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
    
public function gravar_financeiro() {
        $model = new pedidoModel();
        $totalpedido = $model->getTotalPedidoItens('i.idPedido = ' . $_POST['idPedido'] . ' and i.stSituacao = 1')[0];
        $data = $this->trataPostFinanceiro($_POST);
        $id = $model->setPedidoFinanceiro($data);
        $dataParcela = array();
        $dataParcela['idFinanceiroParcela'] = null;
        $dataParcela['idFinanceiro'] = $id;
        $datavencimento = $_POST['dtPrimeiroVencimento'];
        for ($x=0;$x<$_POST['qtParcelas'];$x++){
            $valor = ($totalpedido['totalpedido'] / $_POST['qtParcelas']);
            $dataParcela['vlParcela'] = $valor;
            $dataParcela['nrParcela'] = $x + 1;
            $dataParcela['dtVencimento'] = $datavencimento;
            $model->setPedidoFinanceiroItem($dataParcela);
        }        
            
        $jsondata["html"] = "pedido/financeiro.tpl";
        $jsondata["idFinanceiro"] = $id;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
        
    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data = array();
        $data['idPedido'] = null;
        $data['idFornecedor'] = ($post['idFornecedor'] != '') ? $post['idFornecedor'] : null;
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
        $data['dtPedido'] = ($post['dtPedido'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST["dtPedido"]))) : date('Y-m-d h:m:s');
        $data['nrPedido'] = ($post['nrPedido'] != '') ? $post['nrPedido'] : null;
        $data['idUsuario'] = $_SESSION['user']['usuario'];
        return $data;
    }

    private function trataPostFinanceiro($post) {
        $data = array();
        $data['idFinanceiro'] = null;
        $data['idPedido'] = ($post['idPedido'] != '') ? $post['idPedido'] : null;
        $data['qtParcelas'] = ($post['qtParcelas'] != '') ? $post['qtParcelas'] : 1;
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
        $data['dtPrevisaoEntrega'] = ($post['dtPrevisaoEntrega'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST["dtPrevisaoEntrega"]))) : date('Y-m-d h:m:s');
        $data['dtPrimeiroVencimento'] = ($post['dtPrimeiroVencimento'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST["dtPrimeiroVencimento"]))) : date('Y-m-d h:m:s');
        return $data;
    }

    private function trataPostItem($post) {
        $data = array();
        $data['idPedidoItem'] = null;
        $data['idInsumo'] = ($post['idInsumo'] != '') ? $post['idInsumo'] : null;
        $data['qtPedido'] = ($post['qtPedido'] != '') ? $post['qtPedido'] : null;
        $data['vlPedido'] = ($post['vlPedido'] != '') ? $post['vlPedido'] : null;
        $data['idPedido'] = ($post['idPedido'] != '') ? $post['idPedido'] : null;
        $data['idOS'] = ($post['idOS'] != '') ? $post['idOS'] : null;
        $data['idMotivo'] = ($post['idMotivo'] != '') ? $post['idMotivo'] : null;
        $data['idMaquina'] = ($post['idMaquina'] != '') ? $post['idMaquina'] : null;
        $data['idCentroCusto'] = ($post['idCentroCusto'] != '') ? $post['idCentroCusto'] : null;
        $data['idLocalEstoque'] = ($post['idLocalEstoque'] != '') ? $post['idLocalEstoque'] : null;
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delpedidoitem() {                
        $idPedidoItem = $_POST['idPedidoItem'];
        $model = new pedidoModel();
        $where = 'idPedidoItem = ' . $idPedidoItem;             
        $model->delPedidoItem($where);
        $jsondata["ok"] = true;
        echo json_encode($jsondata);        
    }

    public function delfinanceiroitem() {                
        $idFinanceiroParcela = $_POST['idFinanceiroParcela'];
        $model = new pedidoModel();
        $where = 'idFinanceiroParcela = ' . $idFinanceiroParcela;             
        $model->delFinanceiroItem($where);
        $jsondata["ok"] = true;
        echo json_encode($jsondata);        
    }

    public function delpedido() {                
        $idPedido = $this->getParam('idPedido');
        $model = new pedidoModel();
        $where = 'idPedido = ' . $idPedido;             
        $model->delPedidoItem($where);
        $model->delPedido($where);
        header('Location: /pedido');        
        return;
    }

    public function financeiro() {           
        $idPedido = $this->getParam('idPedido');
        
        $model = new pedidoModel();
        $registro = $model->getFinanceiro('idPedido = ' . $idPedido);
        if ($registro) {
            $registro = $registro[0];
            $financeiroitens = $model->getFinanceiroParcelas('idFinanceiro = ' . $registro['idFinanceiro']);
            $financeiroitens = $financeiroitens;
        } else {
            $registro = null;
            $financeiroitens = null;
        }
        $totalpedido = $model->getTotalPedidoItens('i.idPedido = ' . $idPedido . ' and i.stSituacao = 1');
        if ($totalpedido) {
            $totalpedido = $totalpedido[0]['totalpedido'];
        } else {
            $totalpedido = null;
        }
        $this->smarty->assign('registrofinanceiro', $registro);
        $this->smarty->assign('financeiroitens', $financeiroitens);
        $this->smarty->assign('title', 'Financeiro');
        $this->smarty->assign('idPedido', $idPedido);
        $this->smarty->assign('totalpedido', $totalpedido);
        $this->smarty->display('pedido/financeiro.tpl');
    }

    public function baixamanual() {                
        $idPedido = $this->getParam('idPedido');
        $model = new pedidoModel();
        $where = 'idPedido = ' . $idPedido;             
        $dados = array('stSituacao' => 2, 'idUsuarioBaixa' => $_SESSION['user']['usuario'], 'dtBaixa' => date('Y-m-d h:m:s'), 'nrNota' => '', 'idOrigemInformacao' => 1);
        $model->updPedido($dados, $where);
        header('Location: /pedidoaberto');        
        return;
    }
    public function relatoriopedido_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Pedidos');
        $this->smarty->display('pedido/relatorio_pre.html');
    }

    public function relatoriopedido() {
        $this->template->run();

        $model = new pedidoModel();
        $pedido_lista = $model->getPedido();
        //Passa a lista de registros
        $this->smarty->assign('pedido_lista', $pedido_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Pedidos');
        $this->smarty->display('pedido/relatorio.html');
    }

}

?>