<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class saidaestoque extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        $this->novo_saidaestoque();
    }

//Funcao de Busca
    public function busca_saidaestoque() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new saidaestoqueModel();
        $sql = "stStatus <> 0 and upper(dsMovimento) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMovimento($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('saidaestoque_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'saidaestoque');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('saidaestoque/lista.html');
        } else {
            $this->smarty->assign('saidaestoque_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'saidaestoque');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('saidaestoque/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_saidaestoque() {
  
        $idMovimento = null;
        if (isset($_SESSION['movimento']['id'])) {
            if (!is_null($_SESSION['movimento']['id'])) {
                $idMovimento = $_SESSION['movimento']['id'];
            }
        }
        
        $model = new saidaestoqueModel();
        if (isset($idMovimento)) {
            if ((bool) $idMovimento) {
                $registro = $model->getMovimento('idMovimento=' . $idMovimento);  
                if ($registro) {
                    $registro = $registro[0];
                }
            }
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelTipoMovimento = new tipomovimentoModel();
        $lista_tipomovimento = array('' => 'SELECIONE');
        foreach ($modelTipoMovimento->getTipoMovimento("stDC='S'") as $value) {
            $lista_tipomovimento[$value['idTipoMovimento']] = $value['dsTipoMovimento'];
        }
        $modelCliente = new clienteModel();
        $lista_cliente = array('' => 'SELECIONE');
        foreach ($modelCliente->getCliente() as $value) {
            $lista_cliente[$value['idCliente']] = $value['dsCliente'];
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
        
        $movimentoitens = array();
        $valortotal = null;
        if($idMovimento) {
            $where = "a.idMovimento = " . $idMovimento . " and t.stDC = 'S'";
            $movimentoitens = $model->getMovimentoItens($where);
            $totalmovimento = $model->getTotalMovimentoItens($where);
            $valortotal = $totalmovimento[0]['totalmovimento'];
        }        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_tipomovimento', $lista_tipomovimento);
        $this->smarty->assign('lista_cliente', $lista_cliente);
        $this->smarty->assign('lista_insumo', $lista_insumo);
        $this->smarty->assign('lista_centrocusto', $lista_centrocusto);
        $this->smarty->assign('lista_maquina', $lista_maquina);
        $this->smarty->assign('lista_os', $lista_OS);
        $this->smarty->assign('lista_motivo', $lista_Motivo);
        $this->smarty->assign('movimentoitens', $movimentoitens);
        $this->smarty->assign('totalmovimento', $valortotal);
        $this->smarty->assign('title', 'Novo Movimento');
        $this->smarty->display('saidaestoque/form_novo.tpl');
    }
    // Gravar Padrao
    public function novasaida() {
        $_SESSION['movimento']['id'] = null;
        $jsondata["idMovimento"] = null;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
    public function lerunidade() {
        $idInsumo = $_POST['idInsumo'];
        $dsUnidade = null;
        $qtEstoque = null;
        $vlUltimaCompra = null;
        $modelUnidade = new unidadeModel();
        $where = 'idInsumo = ' . $idInsumo;
        $retorno = $modelUnidade->getInsumoUnidade($where);
        if ($retorno) {
            $dsUnidade = $retorno[0]['dsUnidade'];
            $qtEstoque = $retorno[0]['qtEstoque'];
            $vlUltimaCompra = $retorno[0]['vlUltimaCompra'];
        }
        $jsondata["dsUnidade"] = $dsUnidade;
        $jsondata["qtEstoque"] = $qtEstoque;
        $jsondata["vlUltimaCompra"] = $vlUltimaCompra;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
    public function desabilitaid() {
        $_SESSION['movimento']['id'] = null;
        echo json_encode(true);
    }
    public function gravar_movimento() {
        
        $model = new saidaestoqueModel();

        $data = $this->trataPost($_POST);

        $id = $model->setMovimento($data);
        $_SESSION['movimento']['id'] = $id;
        $jsondata["html"] = "saidaestoque/form_novo.tpl";
        $jsondata["idMovimento"] = $id;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }

    public function gravar_item() {
        $model = new saidaestoqueModel();
        $data = $this->trataPostItem($_POST);
        $id = $model->setMovimentoItem($data);
        $modelInsumo = new insumoModel();
        $mTeveCC = false;
        $mTeveOS = false;
        $mTeveMaquina = false;
        // dados do item    
        $dataitemoutros = $this->trataPostItemOutros($_POST);        

        // pegar a descrição do tipo de movimento
        $modelTM = new tipomovimentoModel();
        $nome = $modelTM->getTipoMovimento("idTipoMovimento = " . $dataitemoutros['idTipoMovimento']);
        $dsTipoMovimento = $nome[0]['dsTipoMovimento'];

        // atualizar a saida do estoque
        $where = "idInsumo = " . $data['idInsumo'];
        $qtExistente = $modelInsumo->getInsumo($where)[0];
        if (!$qtExistente) {
            $qtNova = $data['qtMovimento'];
        } else {
            $qtNova = $qtExistente['qtEstoque'] - $data['qtMovimento'];
        }

        $datainsumo = array(
            'idUltimoCentroCusto' => $dataitemoutros['idCentroCusto'],
            'idUltimaOS' => $dataitemoutros['idOS'],
            'idMaquina' => $dataitemoutros['idMaquina'],
            'qtEstoque ' => $qtNova                
        );
        $model->updMovimentoItem($datainsumo, $where);

        // pegar a origem da informacao de acordo com a descrição do tipo de movimento
        $modelOI = new origeminformacaoModel();
        $retorno = $modelOI->getOrigemInformacao("dsOrigemInformacao = '" . $dsTipoMovimento . "'");
        if ($retorno) {
            $idOrigemInformacao = $retorno[0]['idOrigemInformacao'];
        } else {
            // não tem origem da informacao, entao criar um e pegar o ID   
            $dadosorigem = array(
                'dsOrigemInformacao' => $dsTipoMovimento
            );
            $idOrigemInformacao = $modelOI->setOrigemInformacao($dadosorigem);
        }
        // sempre que tiver centro de custo, gravar um rateio e depois dar saida por aplicacao direta
        if ($dataitemoutros['idCentroCusto']) {
            $modelOI = new origeminformacaoModel();
            // gravar o rateio do valor
            $dadosaprarateio = array(
                'idRateio' => null,
                'dtRateio' => $data['dtMovimento'],
                'idCentroCusto' => $dataitemoutros['idCentroCusto'],
                'idOrigemInformacao' => $idOrigemInformacao,
                'dsDocOrigem' => $dataitemoutros['nrNota'],
                'vlRateio' => $data['vlMovimento'],
                'stDC' => 'D'                    
            );
            $modelRateio = new rateioModel();
            $modelRateio->setRateio($dadosaprarateio);  

            // dar saida de estoque
            $mTeveCC = true;                    
        }
        if ($dataitemoutros['idMaquina']) {
            // dar saida de estoque
            $mTeveMaquina = true;                    
        }
        // gravar ocorrencia com a Ordem de Serviço
        if ($dataitemoutros['idOS']) {
            // dar saida de estoque
            $mTeveOS = true;   

            // pegar o tipo de ocorrencia
            $modelTO = new tipoocorrenciaModel();
            $retorno = $modelTO->getTipoOcorrencia("dsTipoOcorrencia = '" . $dsTipoMovimento . "'");
            if ($retorno) {
                $idTipoOcorrencia = $retorno[0]['idTipoOcorrencia'];
            } else {
                // não tem tipo de ocorrencia, entao criar um e pegar o ID   
                $dadostipoocorrencia = array(
                    'dsTipoOcorrencia' => $dsTipoMovimento
                );
                $idTipoOcorrencia = $modelTO->setTipoOcorrencia($dadostipoocorrencia);
            }                       
            $dadosOcorrencia = array(
                'idOcorrencia' => null,
                'dsOcorrencia' => 'Compra de ' . $data['qtMovimento'] . ' para uso ',
                'idOS' => $dataitemoutros['idOS'],
                'dtOcorrencia' => $data['dtMovimento'],
                'idTipoOcorrencia' => $idTipoOcorrencia,
                'dtInicio' => $data['dtMovimento'],
                'dtFim' => $data['dtMovimento'],
                'idOrigemInformacao' => $idOrigemInformacao,
                'stStatus' => 1,
                'nrDocumento' => $dataitemoutros['nrNota'],
                'idMotivo' => $dataitemoutros['idCentroCusto']
            );
            $modelOcorrencias = new ocorrenciaModel();            
            $idOcorrencia = $modelOcorrencias->setOcorrencia($dadosOcorrencia);
            $dadosocorrenciainsumo = array(
                    'idOcorrenciasInsumo' => null,
                    'idOcorrencia' => $idOcorrencia,
                    'idOS' => $dataitemoutros['idOS'],
                    'idInsumo' => $data['idInsumo'],
                    'qtUtilizada' => $data['qtMovimento'],
                    'vlInsumo' => $data['vlMovimento'],
                    'stStatus' => 1
                    );
            $modelOcorrencias->setOcorrenciaInsumo($dadosocorrenciainsumo);
        }
        
            
        $jsondata["html"] = "saidaestoque/lista.tpl";
        $jsondata["idMovimentoItem"] = $data['idMovimento'];
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
    
    
    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data = array();
        $data['idMovimento'] = null;
        $data['idCliente'] = ($post['idCliente'] != '') ? $post['idCliente'] : null;
        $data['idTipoMovimento'] = ($post['idTipoMovimento'] != '') ? $post['idTipoMovimento'] : null;
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
        $data['dtMovimento'] = ($post['dtMovimento'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST["dtMovimento"]))) : date('Y-m-d h:m:s');
        $data['nrNota'] = ($post['nrNota'] != '') ? $post['nrNota'] : null;
        $data['nrPedido'] = ($post['nrPedido'] != '') ? $post['nrPedido'] : null;
        $data['idUsuario'] = $_SESSION['user']['usuario'];
        return $data;
    }

    private function trataPostItem($post) {
        $data = array();
        $data['idMovimentoItem'] = null;
        $data['idInsumo'] = ($post['idInsumo'] != '') ? $post['idInsumo'] : null;
        $data['qtMovimento'] = ($post['qtMovimento'] != '') ? $post['qtMovimento'] : null;
        $data['vlMovimento'] = ($post['vlMovimento'] != '') ? $post['vlMovimento'] : null;
        $data['idMovimento'] = ($post['idMovimento'] != '') ? $post['idMovimento'] : null;
        $data['idTipoMovimento'] = ($post['idTipoMovimento'] != '') ? $post['idTipoMovimento'] : null;
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
        return $data;
    }

    private function trataPostItemOutros($post) {
        $dataoutros = array();
        $dataoutros['idTipoMovimento'] = ($post['idTipoMovimento'] != '') ? $post['idTipoMovimento'] : null;
        $dataoutros['idCliente'] = ($post['idCliente'] != '') ? $post['idCliente'] : null;
        $dataoutros['idCentroCusto'] = ($post['idCentroCusto'] != '') ? $post['idCentroCusto'] : null;
        $dataoutros['idMaquina'] = ($post['idMaquina'] != '') ? $post['idMaquina'] : null;
        $dataoutros['idOS'] = ($post['idOS'] != '') ? $post['idOS'] : null;
        $dataoutros['idMotivo'] = ($post['idMotivo'] != '') ? $post['idMotivo'] : null;
        $dataoutros['nrNota'] = ($post['nrNota'] != '') ? $post['nrNota'] : null;
        return $dataoutros;
    }
    // Remove Padrao
    public function delmovimentoitem() {                
        $idMovimentoItem = $_POST['idMovimentoItem'];
        $model = new saidaestoqueModel();
        $where = 'idMovimentoItem = ' . $idMovimentoItem;             
        $model->delMovimentoItem($where);
        $jsondata["ok"] = true;
        echo json_encode($jsondata);        
    }

    public function relatoriosaidaestoque_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Movimentos');
        $this->smarty->display('saidaestoque/relatorio_pre.html');
    }

    public function relatoriosaidaestoque() {
        $this->template->run();

        $model = new saidaestoqueModel();
        $saidaestoque_lista = $model->getMovimento();
        //Passa a lista de registros
        $this->smarty->assign('saidaestoque_lista', $saidaestoque_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Movimentos');
        $this->smarty->display('saidaestoque/relatorio.html');
    }

}

?>