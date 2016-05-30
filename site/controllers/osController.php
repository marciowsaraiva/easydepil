<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class os extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        unset($_SESSION['os']['id']);
        
        $model = new osModel();
        $registro = $model->getOS('a.idStatusOS = 1');

        $this->smarty->assign('os', $registro);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('os/lista.html');
        
    }

//Funcao de Busca
    public function busca_os() {
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
            $this->smarty->display('os/lista.html');
        } else {
            $this->smarty->assign('os_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'os');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('os/lista.html');
        }
    }
    //Funcao de Inserir
    public function novo_os() {
  
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
        foreach ($modelColaborador->getColaborador('stFazParteAgenda = 2') as $value) {
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
        $tipomanutencao= new tipomanutencaoModel();
        $lista_tipomanutencao= array('' => 'SELECIONE');
        foreach ($tipomanutencao->getTipoManutencao() as $value) {
            $lista_tipomanutencao[$value['idTipoManutencao']] = $value['dsTipoManutencao'];
        }
        $ccusto = new centrocustoModel();
        $lista_centrocusto= array('' => 'SELECIONE');
        foreach ($ccusto->getCentroCusto() as $value) {
            $lista_centrocusto[$value['idCentroCusto']] = $value['dsCentroCusto'];
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
       
        $this->smarty->assign('nrOS', null);
        if (!$idOS) {
            $nrUltimoOS = $model->getUltimaOS()[0];
            if ($nrUltimoOS['UltimaOS']) {                
                $registro['nrOS'] = ($nrUltimoOS['UltimaOS'] !='') ? $nrUltimoOS['UltimaOS'] + 1 :null;
            }            
        }
        
        $lista_osstatus = null;
        if($idOS) {
            $lista_osstatus = $model->getOSStatus('a.idOS = ' . $idOS);
        }
        $this->smarty->assign('os_listastatus', $lista_osstatus);
        
        $colaboradoresos = null;
        
        if ($idOS) {
            $valores = $this->calculaDatas($registro['dtInicio'], $registro['dtFim']);
            $this->smarty->assign('lista_reduzida', $valores['statusreduzido']);
            $this->smarty->assign('lista_status', $valores['periodo']);
            if ($registro['dtInicio'] && $registro['dtFim']) {                
                $colaboradoresos = $model->getOSColaboradores('a.stStatus = 1', $registro['dtInicio'], $registro['dtFim']);   
            }    
        
        } else {
            $this->smarty->assign('lista_reduzida', null);
            $this->smarty->assign('lista_status', null);
        }
        
        $this->smarty->assign('os_listacolabos', $colaboradoresos);
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('idOS', $idOS);
        $this->smarty->assign('lista_colaboradorresponsavel', $lista_colaboradorresponsavel);
        $this->smarty->assign('lista_colaboradorsolicitante', $lista_colaboradorsolicitante);
        $this->smarty->assign('lista_setoros', $lista_setoros);
        $this->smarty->assign('lista_setorsolicitante', $lista_setorsolicitante);
        $this->smarty->assign('lista_tipomanutencao', $lista_tipomanutencao);
        $this->smarty->assign('lista_tipofalha', $lista_tipofalha);
        $this->smarty->assign('lista_osgrupo', $lista_osgrupo);
        $this->smarty->assign('lista_centrocusto', $lista_centrocusto);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('os/form_novo.tpl');
    }
    // Gravar Padrao
    public function gravar_os() {
        
        $model = new osModel();
        $data = $this->trataPost($_POST);
        if ($data['idOS'] == null) {
            $id = $model->setOS($data);            
            
            $datastatus = array(
            'idOSMudancaStatus' => null,
            'dtMudanca' => $data['dtOS'],
            'idOS' => $id,
            'idStatusOS' => $data['idStatusOS'],
            'idUsuario' => $_SESSION["user"]["usuario"],
            'dsObservacao' => 'Digitação da Ordem de Serviço',
            'idOrigemInformacao' => 1
            );
            $model->setNovoStatusOS($datastatus);
            
        } else {
            $model->updOS($data);
        }
        header('Location: /os');        
        
    }
    public function verhoras() {
        
        $dtInicio = substr($_POST['dtInicio'],6,4) . '-' . substr($_POST['dtInicio'],3,2) . '-' . substr($_POST['dtInicio'],0,2);
        $dtFim = substr($_POST['dtFim'],6,4) . '-' . substr($_POST['dtFim'],3,2) . '-' . substr($_POST['dtFim'],0,2);
        
        $valores = $this->calculaDatas($dtInicio, $dtFim);
        
        $this->smarty->assign('lista_reduzida', $valores['statusreduzido']);
        //print_a_die($valores['periodo']);
        $this->smarty->assign('lista_status', $valores['periodo']);
        $html = $this->smarty->fetch("os/osanalitico.html");
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                
    }

    public function calculaDatas ($datainicial, $datafinal) {    
        
        $modelTipoAgenda = new tipoagendaModel();
        $cabec = array();
        $model = new agendahorarioModel();
        $where = "ai.dtAgenda >= '" . $datainicial . "' and ai.dtAgenda <= '" . $datafinal . "'";
        $lerperiodo = $model->getAgendaHorarioOS($where);
        $i=0;
        foreach ($lerperiodo as $value) {
            $ok = $modelTipoAgenda->getTipoAgenda();
            foreach($ok as $valueTipoAgenda) {
                $where = "ai.dtAgenda >= '" . $datainicial . "' and ai.dtAgenda <= '" . $datafinal . "' and ac.idColaborador = " . $value['idColaborador'] . ' and ac.idTipoAgenda = ' . $valueTipoAgenda['idTipoAgenda'];
                $dias = $model->getAgendaHorarioOSSoma($where);
                if ($dias) {
                   $lerperiodo[$i]['tipoagenda'][$dias[0]['idTipoAgenda']]['idTipoAgenda'] = $dias[0]['idTipoAgenda'];
                   $lerperiodo[$i]['tipoagenda'][$dias[0]['idTipoAgenda']]['dsTipoAgenda'] = $dias[0]['dsTipoAgenda'];
                   $lerperiodo[$i]['tipoagenda'][$dias[0]['idTipoAgenda']]['dsCor'] = $dias[0]['dsCor'];
                   $lerperiodo[$i]['tipoagenda'][$dias[0]['idTipoAgenda']]['dsResumida'] = $dias[0]['dsResumida'];
                   $lerperiodo[$i]['tipoagenda'][$dias[0]['idTipoAgenda']]['qtDias'] = $dias[0]['qtosta'];
                   $lerperiodo[$i]['tipoagenda'][$dias[0]['idTipoAgenda']]['qtHoras'] = $dias[0]['totalHoras'];
                } else {
                   $lerperiodo[$i]['tipoagenda'][$valueTipoAgenda['idTipoAgenda']]['idTipoAgenda'] = $valueTipoAgenda['idTipoAgenda'];
                   $lerperiodo[$i]['tipoagenda'][$valueTipoAgenda['idTipoAgenda']]['dsTipoAgenda'] = $valueTipoAgenda['dsTipoAgenda'];
                   $lerperiodo[$i]['tipoagenda'][$valueTipoAgenda['idTipoAgenda']]['dsCor'] = '';
                   $lerperiodo[$i]['tipoagenda'][$valueTipoAgenda['idTipoAgenda']]['dsResumida'] = '';
                   $lerperiodo[$i]['tipoagenda'][$valueTipoAgenda['idTipoAgenda']]['qtDias'] = 0;
                   $lerperiodo[$i]['tipoagenda'][$valueTipoAgenda['idTipoAgenda']]['qtHoras'] = 0;                    
                }
            }
            $i++;
        }
        $cabec['periodo'] = $lerperiodo;
        $ok = $modelTipoAgenda->getTipoAgenda();
        $cabec['statusreduzido'] = $ok;
        return $cabec;
    }
    
    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data = array();
        $data['idOS'] = ($post['idOS'] != '') ? $post['idOS'] : null;
        $data['idColaboradorSolicitante'] = ($post['idColaboradorSolicitante'] != '') ? $post['idColaboradorSolicitante'] : null;
        $data['idColaboradorResponsavel'] = ($post['idColaboradorResponsavel'] != '') ? $post['idColaboradorResponsavel'] : null;
        $data['dsProblema'] = ($post['dsProblema'] != '') ? $post['dsProblema'] : null;
        $data['idSetor'] = ($post['idSetor'] != '') ? $post['idSetor'] : null;
        $data['idCentroCusto'] = ($post['idCentroCusto'] != '') ? $post['idCentroCusto'] : null;
        $data['idOSGrupo'] = ($post['idOSGrupo'] != '') ? $post['idOSGrupo'] : null;
        $data['idSetorSolicitante'] = ($post['idSetorSolicitante'] != '') ? $post['idSetorSolicitante'] : null;
        $data['idTipoManutencao'] = ($post['idTipoManutencao'] != '') ? $post['idTipoManutencao'] : null;
        $data['idTipoFalha'] = ($post['idTipoFalha'] != '') ? $post['idTipoFalha'] : null;
        $data['dtOS'] = ($post['dtOS'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $post["dtOS"]))) : date('Y-m-d h:m:s');
        $data['dtInicio'] = ($post['dtInicio'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $post["dtInicio"]))) : date('Y-m-d h:m:s');
        $data['dtFim'] = ($post['dtFim'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $post["dtFim"]))) : date('Y-m-d h:m:s');
        $data['nrOS'] = ($post['nrOS'] != '') ? $post['nrOS'] : null;
        $data['idStatusOS'] = 1;
        $data['idUsuario'] = $_SESSION['user']['usuario'];
        return $data;
    }

    public function editarColaborador() {
        $dtInicio = substr($_POST['dtInicio'],6,4) . '-' . substr($_POST['dtInicio'],3,2) . '-' . substr($_POST['dtInicio'],0,2);
        $dtFim = substr($_POST['dtFim'],6,4) . '-' . substr($_POST['dtFim'],3,2) . '-' . substr($_POST['dtFim'],0,2);
        $idColaborador = $_POST['idColaborador'];
        $idOS = $_POST['idOS'];
        
        $dados = array(
            'dtInicio' => $dtInicio,
            'dtFim' => $dtFim,
            'idColaborador' => $idColaborador,
            'idOS' => $idOS
        );
        $model = new osModel();
        $model->setOSColaborador($dados);        
        $jasonretorno = array(
            'html' => null
        );
        echo json_encode($jasonretorno);                
    }
    
    public function delOS() {                
        $idOS = $this->getParam('idOS');
        $model = new osModel();
        $where = 'idOS = ' . $idOS;             
        $model->delOS($where);
        
        $jasonretorno = array(
            'html' => null
        );
        echo json_encode($jasonretorno);                
    }    
    
    public function delOSColaborador() {
        $dtInicio = substr($_POST['dtInicio'],6,4) . '-' . substr($_POST['dtInicio'],3,2) . '-' . substr($_POST['dtInicio'],0,2);
        $dtFim = substr($_POST['dtFim'],6,4) . '-' . substr($_POST['dtFim'],3,2) . '-' . substr($_POST['dtFim'],0,2);
        $idColaborador = $_POST['idColaborador'];
        $idOS = $_POST['idOS'];
        $model = new osModel();
        $where = 'idOS = ' . $idOS . ' and idColaborador = ' . $idColaborador;  
        
        $model->delOSColaborador($where);
        $colaboradoresos = $model->getOSColaboradores('a.stStatus = 1', $dtInicio, $dtFim);   
        $this->smarty->assign('os_listacolabos', $colaboradoresos);
        $html = $this->smarty->fetch("os/oscolabanalitico.html");
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                
    }    
}

?>