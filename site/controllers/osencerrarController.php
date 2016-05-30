<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class osencerrar extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        unset($_SESSION['os']['id']);
        
        $model = new osModel();
        $registro = $model->getOS('a.idStatusOS <> 7');

        $this->smarty->assign('os', $registro);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('osencerrar/lista.html');
        
    }

//Funcao de Busca
    public function busca_osencerrar() {
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
            $this->smarty->display('osencerrar/lista.html');
        } else {
            $this->smarty->assign('os_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'os');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('osencerrar/lista.html');
        }
    }
    //Funcao de Inserir
    public function novo_osencerrar() {
  
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

        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('idOS', $idOS);
        $this->smarty->assign('lista_setoros', $lista_setoros);
        $this->smarty->assign('lista_setorsolicitante', $lista_setorsolicitante);
        $this->smarty->assign('lista_colaboradorsolicitante', $lista_colaboradorsolicitante);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('osencerrar/form_novo.tpl');
    }
    // Gravar Padrao
    public function gravar_osencerrar() {
        
        $model = new osModel();
        $data = $this->trataPost($_POST);
        
        $model->updOS($data);  
        
        $datastatus = array(
            'idOSMudancaStatus' => null,
            'dtMudanca' => $data['dtEncerrado'],
            'idOS' => $data['idOS'],
            'idStatusOS' => 7,
            'idUsuario' => $_SESSION["user"]["usuario"],
            'dsObservacao' => 'Finalizada',
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
        $data['stStatus'] = 2;
        $data['idStatusOS'] = 7;
        $data['idUsuarioEncerramento'] = $_SESSION['user']['usuario'];
        return $data;
    }    
}

?>