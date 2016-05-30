<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class entradaestoque extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        $this->novo_entradaestoque();
    }

//Funcao de Busca
    public function busca_entradaestoque() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new entradaestoqueModel();
        $sql = "stStatus <> 0 and upper(dsMovimento) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMovimento($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('entradaestoque_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'entradaestoque');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('entradaestoque/lista.html');
        } else {
            $this->smarty->assign('entradaestoque_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'entradaestoque');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('entradaestoque/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_entradaestoque() {
  
        $idMovimento = null;
        if (isset($_SESSION['movimento']['id'])) {
            if (!is_null($_SESSION['movimento']['id'])) {
                $idMovimento = $_SESSION['movimento']['id'];
            }
        }
        
        $model = new entradaestoqueModel();
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
        foreach ($modelTipoMovimento->getTipoMovimento("stDC='E'") as $value) {
            $lista_tipomovimento[$value['idTipoMovimento']] = $value['dsTipoMovimento'];
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
        
        $movimentoitens = array();
        $valortotal = null;
        if($idMovimento) {
            $where = "a.idMovimento = " . $idMovimento . " and t.stDC = 'E'";
            $movimentoitens = $model->getMovimentoItens($where);
            $totalmovimento = $model->getTotalMovimentoItens($where);
            $valortotal = $totalmovimento[0]['totalmovimento'];
        }        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_tipomovimento', $lista_tipomovimento);
        $this->smarty->assign('lista_fornecedor', $lista_fornecedor);
        $this->smarty->assign('lista_insumo', $lista_insumo);
        $this->smarty->assign('lista_centrocusto', $lista_centrocusto);
        $this->smarty->assign('lista_localestoque', $lista_localestoque);
        $this->smarty->assign('lista_maquina', $lista_maquina);
        $this->smarty->assign('lista_os', $lista_OS);
        $this->smarty->assign('lista_motivo', $lista_Motivo);
        $this->smarty->assign('movimentoitens', $movimentoitens);
        $this->smarty->assign('totalmovimento', $valortotal);
        $this->smarty->assign('title', 'Novo Movimento');
        $this->smarty->display('entradaestoque/form_novo.tpl');
    }
    // Gravar Padrao
    public function novaentrada() {
        $_SESSION['movimento']['id'] = null;
        $jsondata["idMovimento"] = null;
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
    
    public function lerpedido() {
        $idItem = null;
        $data = $this->trataPost($_POST);
        $datacabec = array('dtMovimento' => $data['dtMovimento']);
        $nrPedido = $_POST['nrPedido'];
        if (is_null($data['idTipoMovimento'])) {
            $modelTM = new tipomovimentoModel();
            // se for compras, atualizar dados do item
            $tm = $modelTM->getTipoMovimento("dsTipoMovimento like '%Compras%'");
            if($tm) {
                $data['idTipoMovimento'] = $tm[0]['idTipoMovimento'];
            } else {
                $data['idTipoMovimento'] = 1;
            }
        }

        if ($nrPedido) {
            $modelPedido = new pedidoModel();
            $where = 'nrPedido = ' . $nrPedido . ' and stSituacao = 1';
            $retorno = $modelPedido->getPedido($where);
            if ($retorno) {
                $idFornecedor = $retorno[0]['idFornecedor'];
                if (!$idFornecedor) {
                    $idFornecedor = null;
                }
                $data['idFornecedor'] = $idFornecedor;
                if (is_null($data['dsObservacao'])) {
                    $data['dsObservacao'] = $retorno[0]['dsObservacao'];
                }

                $model = new entradaestoqueModel();
                $idMovimento = $model->setMovimento($data);
                $where = 'nrPedido = ' . $nrPedido;
                $retorno = $modelPedido->getPedidoItens($where);
                if ($retorno) {
                    foreach ($retorno as $value) {
                        $dados = array();
                        $dados['idMovimentoItem'] = null;
                        $dados['idInsumo'] = ($value['idInsumo'] != '') ? $value['idInsumo'] : null;
                        $dados['qtMovimento'] = ($value['qtPedido'] != '') ? $value['qtPedido'] : null;
                        $dados['vlMovimento'] = ($value['vlPedido'] != '') ? $value['vlPedido'] : null;
                        $dados['idLocalEstoque'] = ($value['idLocalEstoque'] != '') ? $value['idLocalEstoque'] : null;
                        $dados['idMovimento'] = $idMovimento;
                        $dados['idTipoMovimento'] = $data['idTipoMovimento'];
                        $dados['dsObservacao'] = ($value['dsObservacao'] != '') ? $value['dsObservacao'] : null;
                        // dados do item    
                        $dataitemoutros = array();
                        $dataitemoutros['idTipoMovimento'] = $data['idTipoMovimento'];
                        $dataitemoutros['idFornecedor'] = $data['idFornecedor'];
                        $dataitemoutros['idCentroCusto'] = ($value['idCentroCusto'] != '') ? $value['idCentroCusto'] : null;
                        $dataitemoutros['idMaquina'] = ($value['idMaquina'] != '') ? $value['idMaquina'] : null;
                        $dataitemoutros['idOS'] = ($value['idOS'] != '') ? $value['idOS'] : null;
                        $dataitemoutros['idMotivo'] = ($value['idMotivo'] != '') ? $value['idMotivo'] : null;
                        $dataitemoutros['nrNota'] = $data['nrNota'];
                     //   var_dump($dataitemoutros);
                        
                        $retornado = $this->gravar_itemmesmo($datacabec, $dados,$dataitemoutros);
                        $idItem = $retornado['id']; 
                        $idOrigemInformacao = $retornado['idOrigemInformacao'];
                    }
                }
            }
        }
        $jsondata["html"] = "entradaestoque/form_novo.tpl";
        if ($idMovimento) {
            
            $modelPedido = new pedidoModel();
            $dados = array('stSituacao' => 2, 'idUsuarioBaixa' => $_SESSION['user']['usuario'], 'dtBaixa' => date('Y-m-d h:m:s'), 'nrNota' => $data['nrNota'], 'idOrigemInformacao' => $idOrigemInformacao);
            $where = 'nrPedido = ' . $nrPedido;
            $modelPedido->updPedido($dados, $where);
            
            
            $_SESSION['movimento']['id'] = $idMovimento;            
            $jsondata["idMovimento"] = $idMovimento;
            $jsondata["ok"] = true;
        } else {
            $_SESSION['movimento']['id'] = null;
            $jsondata["idMovimento"] = null;
            $jsondata["ok"] = false;
        }
        echo json_encode($jsondata);        
        
    }
    
    public function desabilitaid() {
        $_SESSION['movimento']['id'] = null;
        echo json_encode(true);
    }

    /**
     * 
     */
    public function gravar_movimento() {
        
        $model = new entradaestoqueModel();

        $data = $this->trataPost($_POST);

        $id = $model->setMovimento($data);
        $_SESSION['movimento']['id'] = $id;
        $jsondata["html"] = "entradaestoque/form_novo.tpl";
        $jsondata["idMovimento"] = $id;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }

    public function gravar_item() {
        $datacabec = $this->trataPost($_POST);
        $data = $this->trataPostItem($_POST);
        // dados do item    
        $dataitemoutros = $this->trataPostItemOutros($_POST);        
        $retornado = $this->gravar_itemmesmo($datacabec, $data, $dataitemoutros);
        $id = $retornado['id'];                        

        $jsondata["html"] = "entradaestoque/lista.tpl";
        $jsondata["idMovimentoItem"] = $id;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);        
    }    
    
    /**
     * 
     * @param type $data 'Dados do Cabeçalho do Movimento'
     * @param type $dataitemoutros  'Dados dos insumos do movimento'
     * @return type
     */
    private function gravar_itemmesmo($datacabec, $data, $dataitemoutros) {
        $model = new entradaestoqueModel();
        $id = $model->setMovimentoItem($data);
        $modelInsumo = new insumoModel();
        $idOrigemInformacao = null;
        $mTeveCC = false;
        $mTeveOS = false;
        $mTeveMaquina = false;
        $modelTM = new tipomovimentoModel();
        // se for compras, atualizar dados do item
        $nome = $modelTM->getTipoMovimento("idTipoMovimento = " . $dataitemoutros['idTipoMovimento']);
        $dsTipoMovimento = $nome[0]['dsTipoMovimento'];
        if ($dsTipoMovimento == 'Compras') {
            $where = "idInsumo = " . $data['idInsumo'];
            
            $qtExistente = $modelInsumo->getInsumo($where)[0];
            if (!$qtExistente) {
                $qtNova = $data['qtMovimento'];
            } else {
                $qtNova = $qtExistente['qtEstoque'] + $data['qtMovimento'];
            }
            
            $datainsumo = array(
                'idFornecedorUltimaCompra' => $dataitemoutros['idFornecedor'],
                'idUltimoCentroCusto' => $dataitemoutros['idCentroCusto'],
                'idUltimaOS' => $dataitemoutros['idOS'],
                'idMaquina' => $dataitemoutros['idMaquina'],
                'dtUltimaCompra' => $datacabec['dtMovimento'],
                'nrNotaUltimaCompra' => $dataitemoutros['nrNota'],
                'vlUltimaCompra' => $data['vlMovimento'],
                'qtUltimaCompra' => $data['qtMovimento'],
                'qtEstoque ' => $qtNova                
            );
//            print_a_die($data);
            $model->updMovimentoItem($datainsumo, $where);
        }    
        // pegar a origem da informacao
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
                'dtRateio' => $datacabec['dtMovimento'],
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
                'dtOcorrencia' => $datacabec['dtMovimento'],
                'idTipoOcorrencia' => $idTipoOcorrencia,
                'dtInicio' => $datacabec['dtMovimento'],
                'dtFim' => $datacabec['dtMovimento'],
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
        
        // gravar saida do insumo caso tenha escolhido algum destes itens para aplicacao direta
        if ($mTeveCC === true or $mTeveOS === true or $mTeveMaquina === true) {
            
            // pegar o tipo de movimento de saída
            $retorno = $modelTM->getTipoMovimento("dsTipoMovimento = 'Aplicação Direta'");
            if ($retorno) {
                $idTipoMovimentoSaida = $retorno[0]['idTipoMovimento'];
            } else {
                // não tem tipo de MOVIMENTO, entao criar um e pegar o ID   
                $dadostipomovimento = array(
                    'dsTipoMovimento' => 'Aplicação Direta',
                    'stDC' => 'S'
                );
                $idTipoMovimentoSaida = $modelTM->setTipoMovimento($dadostipomovimento);
            }  
            
            // gravar o movimento de saída
            
            $data['idTipoMovimento'] = $idTipoMovimentoSaida;            
            $id = $model->setMovimentoItem($data);    
            
            $where = "idInsumo = " . $data['idInsumo'];
            $qtExistente = $modelInsumo->getInsumo($where)[0];
            if (!$qtExistente) {
                $qtNova = $data['qtMovimento'];
            } else {
                $qtNova = $qtExistente['qtEstoque'] - $data['qtMovimento'];
            }
            
            $datainsumo = array(
                'qtEstoque ' => $qtNova                
            );
            $model->updMovimentoItem($datainsumo, $where);            
            
        }       
        
        $retornar = array(
          'id' => $id,  
          'idOrigemInformacao' => $idOrigemInformacao 
        );
        return  $retornar;
    }
    
    
    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data = array();
        $data['idMovimento'] = null;
        $data['idFornecedor'] = ($post['idFornecedor'] != '') ? $post['idFornecedor'] : null;
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
        $data['idLocalEstoque'] = ($post['idLocalEstoque'] != '') ? $post['idLocalEstoque'] : null;
        $data['idMovimento'] = ($post['idMovimento'] != '') ? $post['idMovimento'] : null;
        $data['idTipoMovimento'] = ($post['idTipoMovimento'] != '') ? $post['idTipoMovimento'] : null;
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
        return $data;
    }

    private function trataPostItemOutros($post) {
        $dataoutros = array();
        $dataoutros['idTipoMovimento'] = ($post['idTipoMovimento'] != '') ? $post['idTipoMovimento'] : null;
        $dataoutros['idFornecedor'] = ($post['idFornecedor'] != '') ? $post['idFornecedor'] : null;
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
        $model = new entradaestoqueModel();
        $where = 'idMovimentoItem = ' . $idMovimentoItem;             
        $model->delMovimentoItem($where);
        $jsondata["ok"] = true;
        echo json_encode($jsondata);        
    }

    public function relatorioentradaestoque_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Movimentos');
        $this->smarty->display('entradaestoque/relatorio_pre.html');
    }

    public function relatorioentradaestoque() {
        $this->template->run();

        $model = new entradaestoqueModel();
        $entradaestoque_lista = $model->getMovimento();
        //Passa a lista de registros
        $this->smarty->assign('entradaestoque_lista', $entradaestoque_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Movimentos');
        $this->smarty->display('entradaestoque/relatorio.html');
    }

}

?>