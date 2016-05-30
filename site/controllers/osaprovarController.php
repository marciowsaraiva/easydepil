<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class osaprovar extends controller {

    public function index_action() {
        //Inicializa o Template
        $this->template->run();
        unset($_SESSION['os']['id']);
        
        $model = new osModel();
        $registro = $model->getOS('a.idStatusOS <> 1');

        $this->smarty->assign('os', $registro);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('osaprovar/lista.html');
        
    }

//Funcao de Busca
    public function busca_osaprovar() {
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
            $this->smarty->display('osaprovar/lista.html');
        } else {
            $this->smarty->assign('os_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'os');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('osaprovar/lista.html');
        }
    }
    //Funcao de Inserir
    public function novo_osaprovar() {
  
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
        $lista_colaboradoraprovado = array('' => 'SELECIONE');
        foreach ($modelColaborador->getColaborador('stFazParteAgenda = 2') as $value) {
            $lista_colaboradoraprovado[$value['idColaborador']] = $value['dsColaborador'];
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
        $tipofalha= new tipofalhaModel();
        $lista_tipofalha= array('' => 'SELECIONE');
        foreach ($tipofalha->getTipoFalha() as $value) {
            $lista_tipofalha[$value['idTipoFalha']] = $value['dsTipoFalha'];
        }
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('idOS', $idOS);
        $this->smarty->assign('lista_colaboradorresponsavel', $lista_colaboradorresponsavel);
        $this->smarty->assign('lista_colaboradoraprovado', $lista_colaboradoraprovado);
        $this->smarty->assign('lista_colaboradorsolicitante', $lista_colaboradorsolicitante);
        $this->smarty->assign('lista_tipomanutencao', $lista_tipomanutencao);
        $this->smarty->assign('lista_setoros', $lista_setoros);
        $this->smarty->assign('lista_setorsolicitante', $lista_setorsolicitante);
        $this->smarty->assign('lista_tipofalha', $lista_tipofalha);
        $this->smarty->assign('title', 'Ordem de Serviço');
        $this->smarty->display('osaprovar/form_novo.tpl');
    }
    // Gravar Padrao
    public function gravar_os() {
        
        $model = new osModel();
        $data = $this->trataPost($_POST);

        if ($data['idColaboradorAprovado']) {

            $modelstatusos = new statusosModel();
            $retorno = $modelstatusos->getStatusOS("dsStatusOS = '" . 'Aprovado' . "'");
            if ($retorno) {
                $idStatusOS = $retorno[0]['idStatusOS'];
            } else {
                // não tem status os, entao criar um e pegar o ID   
                $dadosorigem = array(
                    'dsStatusOS' => 'Aprovado'
                );
                $idStatusOS = $modelstatusos->setStatusOS($dadosorigem)[0];
            }
            $datastatus = array(
                'idOSMudancaStatus' => null,
                'dtMudanca' => $data['dtAprovacao'],
                'idOS' => $data['idOS'],
                'idStatusOS' => $idStatusOS,
                'idUsuario' => $_SESSION["user"]["usuario"],
                'dsObservacao' => 'O.S. Aprovada',
                'idOrigemInformacao' => 1
            );
            $model->setNovoStatusOS($datastatus);

            $retorno = $modelstatusos->getStatusOS("dsStatusOS = '" . 'Em andamento' . "'");
            if ($retorno) {
                $idStatusOS = $retorno[0]['idStatusOS'];
            } else {
                // não tem status os, entao criar um e pegar o ID   
                $dadosorigem = array(
                    'dsStatusOS' => 'Em andamento'
                );
                $idStatusOS = $modelstatusos->setStatusOS($dadosorigem)[0];
            }
            $datastatus = array(
                'idOSMudancaStatus' => null,
                'dtMudanca' => $data['dtAprovacao'],
                'idOS' => $data['idOS'],
                'idStatusOS' => $idStatusOS,
                'idUsuario' => $_SESSION["user"]["usuario"],
                'dsObservacao' => 'Em andamento',
                'idOrigemInformacao' => 1
            );
            $model->setNovoStatusOS($datastatus);
            
            if ($data['idColaboradorAprovado']) {
                $data['stAprovado'] = 'S';
                $data['idStatusOS'] = $idStatusOS;
            }
            $model->updOS($data);
            
        }
        
        header('Location: /osaprovar');        
        
    }
    
    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data = array();
        $data['idOS'] = ($post['idOS'] != '') ? $post['idOS'] : null;
        $data['dtAprovacao'] = ($post['dtAprovacao'] != '') ? date("Y-m-d", strtotime(str_replace("/", "-", $_POST["dtAprovacao"]))) : date('Y-m-d h:m:s');
        $data['idColaboradorAprovado'] = ($post['idColaboradorAprovado'] != '') ? $post['idColaboradorAprovado'] : null;
        return $data;
    }

}

?>