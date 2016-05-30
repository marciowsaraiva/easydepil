<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class osmaquinaparada extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        unset($_SESSION['os']['id']);
        
        $model = new osModel();
        $registro = $model->getOS('a.idStatusOS = 3 or a.idStatusOS = 8');

        $this->smarty->assign('os', $registro);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('osmaquinaparada/lista.html');
        
    }

//Funcao de Busca
    public function busca_osmaquinaparada() {
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
            $this->smarty->display('osmaquinaparada/lista.html');
        } else {
            $this->smarty->assign('os_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'os');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('osmaquinaparada/lista.html');
        }
    }
    //Funcao de Inserir
    public function novo_osmaquinaparada() {
  
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
        foreach ($modelColaborador->getColaborador('stFazParteAgenda <> 0') as $value) {
            $lista_colaboradorsolicitante[$value['idColaborador']] = $value['dsColaborador'];
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

        $modelMaquina = new maquinaModel();
        $lista_maquina = array('' => 'SELECIONE');
        foreach ($modelMaquina->getMaquina() as $value) {
            $lista_maquina[$value['idMaquina']] = $value['dsMaquina'];
        }
        $this->smarty->assign('lista_maquina', $lista_maquina);
        
        $modelmaquinaparada = new maquinaparadaModel();
        $lista_maquinaparada = array('' => 'SELECIONE');
        foreach ($modelmaquinaparada->getMaquinaParada() as $value) {
            $lista_maquinaparada[$value['idMaquinaParada']] = $value['dsMaquinaParada'];
        }
        $this->smarty->assign('lista_maquinaparada', $lista_maquinaparada);

        $lista_tarefas = array('' => 'SELECIONE');
        foreach ($model->getOSTarefas('ost.idOS = ' . $idOS) as $value) {
            $lista_tarefas[$value['idOSTarefa']] = $value['dsOSTarefa'];
        }
        $this->smarty->assign('lista_tarefas', $lista_tarefas);
        
        $os_listamaquinaparada = $model->getOSMaquinaParada('ost.idOS=' . $idOS);        
        $this->smarty->assign('os_listamaquinaparada', $os_listamaquinaparada);    

        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('idOS', $idOS);
        $this->smarty->assign('lista_setoros', $lista_setoros);
        $this->smarty->assign('lista_setorsolicitante', $lista_setorsolicitante);
        $this->smarty->assign('lista_colaboradorsolicitante', $lista_colaboradorsolicitante);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('osmaquinaparada/form_novo.tpl');
    }
    // Gravar Padrao
    public function gravar_osmaquinaparada() {
        
        $model = new osModel();
        $data = $this->trataPost($_POST);
        $model->setOSMaquinaParada($data);  
        
        $os_listamaquinaparada = $model->getOSMaquinaParada('ost.idOS=' . $_POST['idOS']);        
        $this->smarty->assign('os_listamaquinaparada', $os_listamaquinaparada);    
        $html = $this->smarty->fetch("osmaquinaparada/osmaquinaparada.html");
        
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                
    }

    public function delOSMaquinaParada() {
        $idOSMaquinaParada = $_POST['idOSMaquinaParada'];
        $model = new osModel();
        $where = 'idOSMaquinaParada = ' . $idOSMaquinaParada;
        $model->delOSMaquinaParada($where);

        $os_listamaquinaparada = $model->getOSMaquinaParada('ost.idOS=' . $_POST['idOS']);        
        $this->smarty->assign('os_listamaquinaparada', $os_listamaquinaparada);    
        $html = $this->smarty->fetch("osmaquinaparada/osmaquinaparada.html");
        
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                
    }
    private function trataPost($post) {
        $data = array();
        $data['idOS'] = ($post['idOS'] != '') ? $post['idOS'] : null;
        $data['idMaquinaParada'] = ($post['idMaquinaParada'] != '') ? $post['idMaquinaParada'] : null;
        $data['idMaquina'] = ($post['idMaquina'] != '') ? $post['idMaquina'] : null;
        $data['idOSTarefa'] = ($post['idOSTarefa'] != '') ? $post['idOSTarefa'] : null;
        $data['dtDigitado'] = date("Y-m-d H:i:s");
        $data['dtInicio'] = ($post['dtInicio'] != '') ? date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $post["dtInicio"]))) : date('Y-m-d h:i:s');
        $data['dtFim'] = ($post['dtFim'] != '') ? date("Y-m-d H:i:s", strtotime(str_replace("/", "-", $post["dtFim"]))) : date('Y-m-d h:i:s');
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
        $data['dtDigitado'] = date("Y-m-d H:i:s");
        $data['idUsuarioDigitado'] = $_SESSION['user']['usuario'];
        return $data;
    }    
}

?>