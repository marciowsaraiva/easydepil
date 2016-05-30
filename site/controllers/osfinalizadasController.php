<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class osfinalizadas extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        unset($_SESSION['os']['id']);
        
        $model = new osModel();
        $registro = $model->getOS('a.idStatusOS = 7');

        $this->smarty->assign('os', $registro);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('osfinalizadas/lista.html');
        
    }

//Funcao de Busca
    public function busca_osfinalizadas() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new osModel();
        $sql = "a.stStatus <> 0 and upper(a.dsOS) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getOS($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('os_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'os');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('osfinalizadas/lista.html');
        } else {
            $this->smarty->assign('os_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'os');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('osfinalizadas/lista.html');
        }
    }
    //Funcao de Inserir
    public function novo_osfinalizadas() {
  
        if (!isset($_SESSION['os']['id'])) {
           $idOS = $this->getParam('idOS');
        } else {
          if ($_SESSION['os']['id'] == 0) {
             $idOS = null;
          } else {
            $idOS = $_SESSION['os']['id'];            
          }
        }
        
        $model = new osModel();
        if (isset($idOS)) {
            if ((bool) $idOS) {
                $registro = $model->getOS('a.idOS=' . $idOS);  
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
        $modelColaborador = new colaboradorModel();
        $lista_colaboradorsolicitante = array('' => 'SELECIONE');
        foreach ($modelColaborador->getColaborador('stFazParteAgenda <> 0') as $value) {
            $lista_colaboradorsolicitante[$value['idColaborador']] = $value['dsColaborador'];
        }
        $lista_colaboradorresponsavel = array('' => 'SELECIONE');
        foreach ($modelColaborador->getColaborador('stFazParteAgenda = 2') as $value) {
            $lista_colaboradorresponsavel[$value['idColaborador']] = $value['dsColaborador'];
        }

        $modelSetor = new setorModel();
        $lista_setorsolicitante = array('' => 'SELECIONE');
        foreach ($modelSetor->getSetor() as $value) {
            $lista_setorsolicitante[$value['idSetor']] = $value['dsSetor'];
        }
        $lista_setoros = array('' => 'SELECIONE');
        foreach ($modelSetor->getSetor() as $value) {
            $lista_setoros[$value['idSetor']] = $value['dsSetor'];
        }
        $tipomanutencao= new tipomanutencaoModel();
        $lista_tipomanutencao= array('' => 'SELECIONE');
        foreach ($tipomanutencao->getTipoManutencao() as $value) {
            $lista_tipomanutencao[$value['idTipoManutencao']] = $value['dsTipoManutencao'];
        }
        $tipofalha= new tipofalhaModel();
        $lista_tipofalha= array('' => 'SELECIONE');
        foreach ($tipofalha->getTipoFalha() as $value) {
            $lista_tipofalha[$value['idTipoFalha']] = $value['dsTipoFalha'];
        }
        $osGrupo = new osgrupoModel();
        $lista_osgrupo= array('' => 'SELECIONE');
        foreach ($osGrupo->getOSGrupo() as $value) {
            $lista_osgrupo[$value['idOSGrupo']] = $value['dsOSGrupo'];
        }
        $ccusto = new centrocustoModel();
        $lista_centrocusto= array('' => 'SELECIONE');
        foreach ($ccusto->getCentroCusto() as $value) {
            $lista_centrocusto[$value['idCentroCusto']] = $value['dsCentroCusto'];
        }
        
        $lista_osstatus = null;
        if($idOS) {
            $lista_osstatus = $model->getOSStatus('a.idOS = ' . $idOS);
        }
        $this->smarty->assign('os_listastatus', $lista_osstatus);
        
        $listatarefas = null;
        if ($idOS) {        
            $listatarefas = $model->getOSTarefas('ost.idOS = ' . $idOS);        
            $this->smarty->assign('listatarefasdatarefa', $listatarefas);    
        }
        $os_listamaquinaparada = null;
        if ($idOS) {        
            $os_listamaquinaparada = $model->getOSMaquinaParada('ost.idOS=' . $idOS);        
            $this->smarty->assign('os_listamaquinaparada', $os_listamaquinaparada);    
        }   
        $motivolOS = new motivoModel();
        $lista_Motivo = array('' => 'SELECIONE');
        foreach ($motivolOS->getMotivo() as $value) {
            $lista_Motivo[$value['idMotivo']] = $value['dsMotivo'];
        }

        $lista_ostarefamaoobra = null;
        $lista_ostarefamaquina = null;
        $lista_ostarefainsumos = null;
        if ($idOS) {
            $where = 't.idOS = ' . $idOS;
            $lista_ostarefainsumos = $model->getOSTarefaInsumo($where);
            $lista_ostarefamaoobra = $model->getOSTarefaMaoObra($where);
            $lista_ostarefamaquina = $model->getOSTarefaMaquina($where);
        }    
                
        $this->smarty->assign('lista_ostarefainsumo', $lista_ostarefainsumos);
        $this->smarty->assign('lista_ostarefamaoobra', $lista_ostarefamaoobra);
        $this->smarty->assign('lista_ostarefamaquina', $lista_ostarefamaquina);
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('idOS', $idOS);
        $this->smarty->assign('lista_setoros', $lista_setoros);
        $this->smarty->assign('lista_setorsolicitante', $lista_setorsolicitante);
        $this->smarty->assign('lista_colaboradorsolicitante', $lista_colaboradorsolicitante);
        $this->smarty->assign('lista_colaboradorresponsavel', $lista_colaboradorresponsavel);
        $this->smarty->assign('lista_tipomanutencao', $lista_tipomanutencao);
        $this->smarty->assign('lista_tipofalha', $lista_tipofalha);
        $this->smarty->assign('lista_osgrupo', $lista_osgrupo);
        $this->smarty->assign('lista_centrocusto', $lista_centrocusto);
        $this->smarty->assign('lista_motivo', $lista_Motivo);
        
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('osfinalizadas/form_novo.tpl');
    }
    // Gravar Padrao
    public function gravar_osfinalizadas() {
        
        $model = new osModel();
        $data = $this->trataPost($_POST);
        
        $model->updOS($data);  
        
        $datastatus = array(
            'idOSMudancaStatus' => null,
            'dtMudanca' => date('Y-m-d h:m:s'),
            'idOS' => $data['idOS'],
            'idStatusOS' => 3,
            'idUsuario' => $_SESSION["user"]["usuario"],
            'dsObservacao' => 'Re-Aberta',
            'idOrigemInformacao' => 1
        );

        $model->setNovoStatusOS($datastatus);
        $jasonretorno = array(
            'html' => ""
        );
        echo json_encode($jasonretorno);                
    }

    private function trataPost($post) {
        $data = array();
        $data['idOS'] = ($post['idOS'] != '') ? $post['idOS'] : null;
        $data['dsRecomendacaoPM'] = ($post['dsRecomendacaoPM'] != '') ? $post['dsRecomendacaoPM'] : null;
        $data['dsRecomendacaoMP'] = ($post['dsRecomendacaoMP'] != '') ? $post['dsRecomendacaoMP'] : null;
        $data['dtEncerrado'] = ($post['dtEncerramento'] != '') ? date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $post["dtEncerramento"]))) : date('Y-m-d h:i:s');
        $data['nrProximaOS'] = ($post['nrProximaOS'] != '') ? $post['nrProximaOS'] : null;
        $data['dtDigitadoEncerramento'] = date("Y-m-d H:i:s");
        $data['stStatus'] = 1;
        $data['idStatusOS'] = 3;
        $data['idUsuarioEncerramento'] = $_SESSION['user']['usuario'];
        return $data;
    }    
}

?>