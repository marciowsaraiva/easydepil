<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class ostarefa extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        unset($_SESSION['os']['id']);
        
        $model = new osModel();
        $registro = $model->getOS('a.idStatusOS = 3 or a.idStatusOS = 8');

        $this->smarty->assign('os', $registro);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('ostarefa/lista.html');
        
    }

//Funcao de Busca
    public function busca_ostarefa() {
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
            $this->smarty->display('ostarefa/lista.html');
        } else {
            $this->smarty->assign('os_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'os');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('ostarefa/lista.html');
        }
    }
    //Funcao de Inserir
    public function novo_ostarefa() {
  
        if (!isset($_SESSION['os']['id'])) {
           $idOS = $this->getParam('idOS');
        } else {
          if ($_SESSION['os']['id'] == 0) {
             $idOS = null;
          } else {
            $idOS = $_SESSION['os']['id'];            
          }
        }
        
        $idOSTarefa = $this->getParam('idOSTarefa');
        
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

        $lista_maoobra = array('' => 'SELECIONE');
        foreach ($modelColaborador->getColaboradorMO('stFazParteAgenda = 1') as $value) {
            $lista_maoobra[$value['idColaboradorMO']] = $value['dsMaoObra'] . '-' . $value['dsColaborador'];
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

        $modelInsumo = new insumoModel();
        $lista_insumo = array('' => 'SELECIONE');
        foreach ($modelInsumo->getInsumo() as $value) {
            $lista_insumo[$value['idInsumo']] = $value['dsInsumo'];
        }
        
        $modelUnidade = new unidadeModel();
        $lista_unidade = array('' => 'SELECIONE');
        foreach ($modelUnidade->getUnidade() as $value) {
            $lista_unidade[$value['idUnidade']] = $value['dsUnidade'];
        }

        $modelTarefa = new tarefaModel();
        $lista_tarefa = array('' => 'SELECIONE');
        foreach ($modelTarefa->getTarefa() as $value) {
            $lista_tarefa[$value['idTarefa']] = $value['dsTarefa'];
        }
        
        $modelMaquina = new maquinaModel();
        $lista_maquina = array('' => 'SELECIONE');
        foreach ($modelMaquina->getMaquina() as $value) {
            $lista_maquina[$value['idMaquina']] = $value['dsMaquina'];
        }
        $modelmaquinaparada = new maquinaparadaModel();
        $lista_maquinaparada = array('' => 'SELECIONE');
        foreach ($modelmaquinaparada->getMaquinaParada() as $value) {
            $lista_maquinaparada[$value['idMaquinaParada']] = $value['dsMaquinaParada'];
        }
        $this->smarty->assign('lista_maquinaparada', $lista_maquinaparada);

        $os_listamaquinaparada = null;
        if ($idOSTarefa) {
            $os_listamaquinaparada = $model->getOSMaquinaParada('ost.idOS=' . $idOS . ' and ost.idOSTarefa = ' . $idOSTarefa);        
        }
        $this->smarty->assign('os_listamaquinaparada', $os_listamaquinaparada);    
        
        $lista_ostarefamaoobra = null;
        $lista_ostarefamaquina = null;
        $lista_ostarefainsumos = null;
        if ($idOSTarefa) {
            $where = 'a.idOS = ' . $idOS . ' and idOSTarefa = ' . $idOSTarefa;
            $lista_ostarefainsumos = $model->getServicoInsumos($where);
            $lista_ostarefamaoobra = $model->getServicoMaoObra($where);
            $lista_ostarefamaquina = $model->getServicoMaquina($where);
        }    
                
        $this->smarty->assign('lista_ostarefainsumo', $lista_ostarefainsumos);
        $this->smarty->assign('lista_ostarefamaoobra', $lista_ostarefamaoobra);
        $this->smarty->assign('lista_ostarefamaquina', $lista_ostarefamaquina);
        $this->smarty->assign('lista_unidade', $lista_unidade);
        $this->smarty->assign('lista_insumo', $lista_insumo);
        $this->smarty->assign('lista_maoobra',$lista_maoobra);
        $this->smarty->assign('lista_maquina',$lista_maquina);
        $reg_tarefas = null;
        $this->smarty->assign('registrotarefa', $reg_tarefas);
        if ($idOS) {        
            $listatarefas = $model->getOSTarefas('ost.idOS = ' . $idOS);        
            $this->smarty->assign('listatarefasdatarefa', $listatarefas);    
        }
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('idOS', $idOS);
        $this->smarty->assign('lista_colaboradorsolicitante', $lista_colaboradorsolicitante);
        $this->smarty->assign('lista_setoros', $lista_setoros);
        $this->smarty->assign('lista_tarefa', $lista_tarefa);
        $this->smarty->assign('lista_setorsolicitante', $lista_setorsolicitante);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('ostarefa/form_novo.tpl');
    }
    // Gravar Padrao
    public function gravar_ostarefa() {
        
        $model = new osModel();
        $data = $this->trataPost($_POST);
        
        $where = 'a.idOS = ' . $_POST['idOS'];
        $retorno = $model->getOS($where);
        if ($retorno[0]['idStatusOS'] <> 3) {
            $data['idStatusOS'] = 3;
            $datastatus = array(
                'idOSMudancaStatus' => null,
                'dtMudanca' => date('Y-m-d h:m:s'),
                'idOS' => $_POST['idOS'],
                'idStatusOS' => 3,
                'idUsuario' => $_SESSION["user"]["usuario"],
                'dsObservacao' => 'Em andamento',
                'idOrigemInformacao' => 1
            );
            $model->setNovoStatusOS($datastatus);
        }
        $model->updOS($data);

        $data['dtInicio'] = ($_POST['dtInicioTarefa'] != '') ? date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $_POST["dtInicioTarefa"]))) : date('Y-m-d h:i:s');
        $data['dtFim'] = ($_POST['dtFimTarefa'] != '') ? date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $_POST["dtFimTarefa"]))) : date('Y-m-d h:i:s');
        $data['dtDigitado'] = date("Y-m-d H:i:s");
        $data['idUsuarioDigitado'] = $_SESSION['user']['usuario'];
        
        $idOSTarefa = $model->setOSTarefa($data);  
        
        $listatarefas = $model->getOSTarefas('ost.idOS=' . $_POST['idOS']);        
        $this->smarty->assign('listatarefasdatarefa', $listatarefas);    
        $html = $this->smarty->fetch("ostarefa/ostarefaTarefas.html");
        
        $jasonretorno = array(
            'idOSTarefa' => $idOSTarefa,
            'html' => $html
        );
        echo json_encode($jasonretorno);                

    }
    public function delOSTarefa() {
        $idOSTarefa = $_POST['idOSTarefa'];
        $model = new osModel();
        $where = 'idOSTarefa = ' . $idOSTarefa;
        $model->delOSMaquinaParada($where);
        $model->delOSTarefaInsumo($where);
        $model->delOSTarefaMaoObra($where);
        $model->delOSTarefaMaquina($where);
        $model->delOSTarefa($where);
        
        $jasonretorno = array(
            'html' => ''
        );
        echo json_encode($jasonretorno);                
    }
    public function delOSTarefaInsumo() {
        $idOSTarefa = $_POST['idOSTarefa'];
        $idOSTarefaInsumo = $_POST['idOSTarefaInsumo'];
        $model = new osModel();
        $where = 'idOSTarefaInsumo = ' . $idOSTarefaInsumo;
        $model->delOSTarefaInsumo($where);

        $where = 'a.idOSTarefa = ' . $idOSTarefa;
        $lista_ostarefainsumo = $model->getOSTarefaInsumo($where);        

        $this->smarty->assign('lista_ostarefainsumo', $lista_ostarefainsumo);    
        $htmlInsumo = $this->smarty->fetch("ostarefa/ostarefainsumo.html");
        
        $jasonretorno = array(
            'htmlInsumo' => $htmlInsumo
        );
        echo json_encode($jasonretorno);                
    }
    public function delOSTarefaMaoObra() {
        $idOSTarefa = $_POST['idOSTarefa'];
        $idOSTarefaMaoObra = $_POST['idOSTarefaMaoObra'];
        $model = new osModel();
        $where = 'idOSTarefaMaoObra = ' . $idOSTarefaMaoObra;
        $model->delOSTarefaMaoObra($where);
        
        $where = 'a.idOSTarefa = ' . $idOSTarefa;
        $lista_ostarefamaoobra = $model->getOSTarefaMaoObra($where);        

        $this->smarty->assign('lista_ostarefamaoobra', $lista_ostarefamaoobra);    
        $htmlMaoObra = $this->smarty->fetch("ostarefa/ostarefamaoobra.html");
        
        $jasonretorno = array(
            'htmlMaoObra' => $htmlMaoObra
        );
        echo json_encode($jasonretorno);                
    }

    public function delOSTarefaMaquina() {
        $idOSTarefa = $_POST['idOSTarefa'];
        $idOSTarefaMaquina = $_POST['idOSTarefaMaquina'];
        $model = new osModel();
        $where = 'idOSTarefaMaquina = ' . $idOSTarefaMaquina;
        $model->delOSTarefaMaquina($where);
        
        $where = 'a.idOSTarefa = ' . $idOSTarefa;
        $lista_ostarefamaquina = $model->getOSTarefaMaquina($where);        
        $this->smarty->assign('lista_ostarefamaquina', $lista_ostarefamaquina);    
        $htmlMaquina = $this->smarty->fetch("ostarefa/ostarefamaquina.html");
        
        $jasonretorno = array(
            'htmlMaquina' => $htmlMaquina
        );
        echo json_encode($jasonretorno);                
    }
    private function trataPost($post) {
        $data = array();
        $data['idOS'] = ($post['idOS'] != '') ? $post['idOS'] : null;
        $data['idTarefa'] = ($post['idTarefa'] != '') ? $post['idTarefa'] : null;
        $data['dsObservacaoTarefa'] = ($post['dsObservacaoTarefa'] != '') ? $post['dsObservacaoTarefa'] : null;
        return $data;
    }    
    public function gravar_insumo() {        
        $data = $this->trataPostInsumo($_POST);
        $idOS = $_POST['idOS'];
        $idOSTarefa = $_POST['idOSTarefa'];
        $model = new osModel();
        $model->setOSTarefaInsumo($data);
        $where = 'a.idOSTarefa = ' . $idOSTarefa;
        $lista_ostarefainsumo = $model->getOSTarefaInsumo($where);        

        $this->smarty->assign('lista_ostarefainsumo', $lista_ostarefainsumo);    
        $html = $this->smarty->fetch("ostarefa/ostarefainsumo.html");
        
        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);        
    }    
    public function edita_ostarefa() {
        
    //    var_dump($_POST); die;
        $idOSTarefa = $_POST['idOSTarefa'];
        $model = new osModel();
        
        $where = 'a.idOSTarefa = ' . $idOSTarefa;
        $lista_ostarefainsumo = $model->getOSTarefaInsumo($where);        

        $this->smarty->assign('lista_ostarefainsumo', $lista_ostarefainsumo);    
        $htmlInsumo = $this->smarty->fetch("ostarefa/ostarefainsumo.html");
        
        $lista_ostarefamaoobra = $model->getOSTarefaMaoObra($where);        
        $this->smarty->assign('lista_ostarefamaoobra', $lista_ostarefamaoobra);    
        $htmlMaoObra = $this->smarty->fetch("ostarefa/ostarefamaoobra.html");

        $lista_ostarefamaquina = $model->getOSTarefaMaquina($where);        
        $this->smarty->assign('lista_ostarefamaquina', $lista_ostarefamaquina);    
        $htmlMaquina = $this->smarty->fetch("ostarefa/ostarefamaquina.html");

        $os_listamaquinaparada = null;
        if ($idOSTarefa) {
            $os_listamaquinaparada = $model->getOSMaquinaParada('ost.idOS=' . $_POST['idOS'] . ' and ost.idOSTarefa = ' . $idOSTarefa);        
        }
        $this->smarty->assign('os_listamaquinaparada', $os_listamaquinaparada);    
        $htmlMaquinaParada = $this->smarty->fetch("osmaquinaparada/osmaquinaparada.html");
        
        // criar o array de retorno
        $jasonretorno = array(
            'htmlInsumo' => $htmlInsumo,
            'htmlMaoObra' => $htmlMaoObra,
            'htmlMaquina' => $htmlMaquina,
            'htmlMaquinaParada' => $htmlMaquinaParada
        );
        echo json_encode($jasonretorno);        
    }

    public function gravar_maoobra() {
        $idOS = $_POST['idOS'];
        $idOSTarefa = $_POST['idOSTarefa'];
        $data = $this->trataPostMaoObra($_POST);
        $model = new osModel();
        $model->setOSTarefaMaoObra($data);
        $where = 'a.idOSTarefa = ' . $idOSTarefa;
        $lista_ostarefamaoobra = $model->getOSTarefaMaoObra($where);        
        $this->smarty->assign('lista_ostarefamaoobra', $lista_ostarefamaoobra);    
        $html = $this->smarty->fetch("ostarefa/ostarefamaoobra.html");

        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);
    }    
    public function gravar_maquina() {
        $data = $this->trataPostMaquina($_POST);
        $idOS = $_POST['idOS'];
        $idOSTarefa = $_POST['idOSTarefa'];
        $model = new osModel();
        $model->setOSTarefaMaquina($data);
        $where = 'a.idOSTarefa = ' . $idOSTarefa;
        $lista_ostarefamaquina = $model->getOSTarefaMaquina($where);        
        $this->smarty->assign('lista_ostarefamaquina', $lista_ostarefamaquina);    
        $html = $this->smarty->fetch("ostarefa/ostarefamaquina.html");

        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);
    }    
    //Trata dados antes de Enviar para o Gravar
    private function trataPostInsumo($post) {
        $data['idOSTarefa'] = ($post['idOSTarefa'] != '') ? $post['idOSTarefa'] : null;
        $data['idInsumo'] = ($post['idInsumo'] != '') ? $post['idInsumo'] : null;
        $data['dsObservacao'] = ($post['dsObservacaoInsumo'] != '') ? $post['dsObservacaoInsumo'] : null;
        $data['qtInsumo'] = ($post['qtInsumo'] != '') ? $post['qtInsumo'] : null;
        return $data;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPostMaoObra($post) {
        $data['idOSTarefa'] = ($post['idOSTarefa'] != '') ? $post['idOSTarefa'] : null;
        $data['idMaoObra'] = ($post['idMaoObra'] != '') ? $post['idMaoObra'] : null;
        $data['dsObservacao'] = ($post['dsObservacaoMaoObra'] != '') ? $post['dsObservacaoMaoObra'] : null;
        $data['dtInicio'] = ($_POST['dtInicio'] != '') ? date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $_POST["dtInicio"]))) : date('Y-m-d h:i:s');
        $data['dtFim'] = ($_POST['dtFim'] != '') ? date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $_POST["dtFim"]))) : date('Y-m-d h:i:s');
        return $data;
    }
    
    //Trata dados antes de Enviar para o Gravar
    private function trataPostMaquina($post) {
        $data['idOSTarefa'] = ($post['idOSTarefa'] != '') ? $post['idOSTarefa'] : null;
        $data['idMaquina'] = ($post['idMaquina'] != '') ? $post['idMaquina'] : null;
        $data['dsObservacao'] = ($post['dsObservacaoMaquina'] != '') ? $post['dsObservacaoMaquina'] : null;
        $data['qtHoras'] = ($post['qtMaquina'] != '') ? $post['qtMaquina'] : null;
        return $data;
    }    
}

?>