<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class servico extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new servicoModel();
        $servico_lista = $model->getServico();

        $this->smarty->assign('servico_lista', $servico_lista);
        $this->smarty->display('servico/lista.html');
    }

//Funcao de Busca
    public function busca_servico() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new servicoModel();
        $sql = "stStatus <> 0 and upper(dsServico) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getServico($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('servico_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'servico');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('servico/lista.html');
        } else {
            $this->smarty->assign('servico_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'servico');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('servico/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_servico() {

        $idServico = $this->getParam('idServico');

        $model = new servicoModel();

        if ($idServico > 0) {
            $registro = $model->getServico('idServico=' . $idServico);
            $registro = $registro[0]; //Passando Servico
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelTipoServico = new tiposervicoModel();
        $lista_tiposervico = array('' => 'SELECIONE');
        foreach ($modelTipoServico->getTipoServico() as $value) {
            $lista_tiposervico[$value['idTipoServico']] = $value['dsTipoServico'];
        }
        
        $modelInsumo = new insumoModel();
        $lista_insumo = array('' => 'SELECIONE');
        foreach ($modelInsumo->getInsumo() as $value) {
            $lista_insumo[$value['idInsumo']] = $value['dsInsumo'];
        }

        $modelMaoObra = new maoobraModel();
        $lista_maoobra = array('' => 'SELECIONE');
        foreach ($modelMaoObra->getMaoObra() as $value) {
            $lista_maoobra[$value['idMaoObra']] = $value['dsMaoObra'];
        }
        
        $modelUnidade = new unidadeModel();
        $lista_unidade = array('' => 'SELECIONE');
        foreach ($modelUnidade->getUnidade() as $value) {
            $lista_unidade[$value['idUnidade']] = $value['dsUnidade'];
        }

        $modelMaquina = new maquinaModel();
        $lista_maquina = array('' => 'SELECIONE');
        foreach ($modelMaquina->getMaquina() as $value) {
            $lista_maquina[$value['idMaquina']] = $value['dsMaquina'];
        }
        $lista_servicoinsumos = null;
        $lista_servicomaoobra = null;
        $lista_servicomaquina = null;
        
        $totalservico = null;
        
        if ($idServico) {
            $where = 'a.idServico = ' . $idServico;
            $lista_servicoinsumos = $model->getServicoInsumos($where);
            $totalinsumos = $model->getServicoInsumosTotal($where);
            $lista_servicomaoobra = $model->getServicoMaoObra($where);
            $totalmaoobra = $model->getServicoMaoObraTotal($where);
            $lista_servicomaquina = $model->getServicoMaquina($where);
            $totalmaquina = $model->getServicoMaquinaTotal($where);
            if($totalinsumos) {
                $totalservico =     $totalinsumos[0]['TotalInsumos'];           
            }
            if($totalmaoobra) {
                $totalservico = $totalservico + $totalmaoobra[0]['TotalMaoObra'];           
            }
            if($totalmaquina) {
                $totalservico = $totalservico + $totalmaquina[0]['TotalMaquina'];           
            }    
            $totalaatualizar = array('vlOrcado' => $totalservico, 'idServico' => $idServico);
            $model->updServico($totalaatualizar);
        }    
                
    //    var_dump($lista_servicomaquina); die;

        if(!$lista_servicomaoobra) {
            $lista_servicomaoobra = null;
        }
        if(!$lista_servicomaquina) {
            $lista_servicomaquina = null;
        }
        
//        var_dump($lista_servicoinsumos); die;
        $this->smarty->assign('lista_servicoinsumos', $lista_servicoinsumos);
        $this->smarty->assign('lista_servicomaoobra', $lista_servicomaoobra);
        $this->smarty->assign('lista_servicomaquina', $lista_servicomaquina);
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('totalservico', $totalservico);
        $this->smarty->assign('lista_tiposervico', $lista_tiposervico);
        $this->smarty->assign('lista_unidade', $lista_unidade);
        $this->smarty->assign('lista_insumo', $lista_insumo);
        $this->smarty->assign('lista_maoobra',$lista_maoobra);
        $this->smarty->assign('lista_maquina',$lista_maquina);
        $this->smarty->assign('title', 'Novo Servico');
        $this->smarty->display('servico/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_servico() {
        $model = new servicoModel();

        $data = $this->trataPost($_POST);
        

        if ($data['idServico'] == null) {
            $id=$model->setservico($data);
        } else {
            $id=$data['idServico'];
            $model->updservico($data); //update
        }    
        
        header('Location: /servico/novo_servico/idServico/' . $id);
//        return;
    }
    public function lerunidade() {
        $idInsumo = $_POST['idInsumo'];
        $dsUnidade = null;
        $vlUnitario = null;
        $modelUnidade = new unidadeModel();
        $where = 'idInsumo = ' . $idInsumo;
        $retorno = $modelUnidade->getInsumoUnidade($where);
        if ($retorno) {
            $dsUnidade = $retorno[0]['dsUnidade'];
            $vlUnitario = $retorno[0]['vlUnitario'];
        }
        $jsondata["dsUnidade"] = $dsUnidade;
        $jsondata["vlUnitario"] = $vlUnitario;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
    public function lerunidademo() {
        $idMaoObra = $_POST['idMaoObra'];
        $dsUnidade = null;
        $vlUnitario = null;
        $modelUnidade = new unidadeModel();
        $where = 'idMaoObra = ' . $idMaoObra;
        $retorno = $modelUnidade->getMaoObraUnidade($where);
        if ($retorno) {
            $dsUnidade = $retorno[0]['dsUnidade'];
            $vlUnitario = $retorno[0]['vlUnitario'];
        }
        $jsondata["dsUnidade"] = $dsUnidade;
        $jsondata["vlUnitario"] = $vlUnitario;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
    public function lerunidademaquina() {
        $idMaquina = $_POST['idMaquina'];
        $dsUnidade = null;
        $vlUnitario = null;
        $modelUnidade = new unidadeModel();
        $where = 'idMaquina = ' . $idMaquina;
        $retorno = $modelUnidade->getMaquinaUnidade($where);
        if ($retorno) {
            $dsUnidade = $retorno[0]['dsUnidade'];
            $vlUnitario = $retorno[0]['vlUnitario'];
        }
        $jsondata["dsUnidade"] = $dsUnidade;
        $jsondata["vlUnitario"] = $vlUnitario;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
    public function gravar_insumo() {
        $data = $this->trataPostInsumo($_POST);
        $model = new servicoModel();
        $id = $model->setServicoInsumo($data);
        $where = 'a.idServico = ' . $_POST['idServico'];
        $lista_servicoinsumos = $model->getServicoInsumos($where);        

        $this->smarty->assign('lista_servicoinsumos', $lista_servicoinsumos);    
        $html = $this->smarty->fetch("servico/servicoinsumo.html");

        // ler o total dos insumos para atualizar o valor orcado do servico
        $total = $model->getServicoTotalInsumos($where);
        $totalInsumos = $total[0]['total'];
        // ler o total de mao de obra para atualizar o valor orcado do servico
        $total = $model->getServicoTotalMaoObra($where);
        $totalMaoObra = $total[0]['total'];
        $total = $model->getServicoTotalMaquina($where);
        $totalMaquina = $total[0]['total'];
        $valorNovo = $totalInsumos + $totalMaoObra + $totalMaquina;
        
        // atualiza o valor do servico
        $dados = array(
            'vlOrcado' => $valorNovo,
            'idServico' => $_POST['idServico']
        );
        $model->updServico($dados);        
        
        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html,
            'total' => $valorNovo
        );
        echo json_encode($jasonretorno);        
    }    

    public function gravar_maoobra() {
        
        $data = $this->trataPostMaoObra($_POST);
        $model = new servicoModel();
        $id = $model->setServicoMaoObra($data)[0];        

        $where = 'a.idServico = ' . $_POST['idServico'];
        $lista_servicomaoobra = $model->getServicoMaoObra($where);        
        $this->smarty->assign('lista_servicomaoobra', $lista_servicomaoobra);    
        $html = $this->smarty->fetch("servico/servicomaoobra.html");

        // ler o total dos insumos para atualizar o valor orcado do servico
        $total = $model->getServicoTotalInsumos($where);
        $totalInsumos = $total[0]['total'];
        // ler o total de mao de obra para atualizar o valor orcado do servico
        $total = $model->getServicoTotalMaoObra($where);
        $totalMaoObra = $total[0]['total'];
        $total = $model->getServicoTotalMaquina($where);
        $totalMaquina = $total[0]['total'];
        $valorNovo = $totalInsumos + $totalMaoObra + $totalMaquina;
        
        // atualiza o valor do servico
        $dados = array(
            'vlOrcado' => $valorNovo,
            'idServico' => $_POST['idServico']
        );
        $model->updServico($dados);        
        
        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html,
            'total' => $valorNovo
        );
        echo json_encode($jasonretorno);
        
    }    
    public function gravar_maquina() {
        $data = $this->trataPostMaquina($_POST);
        $model = new servicoModel();
        $id = $model->setServicoMaquina($data);
        $where = 'a.idServico = ' . $_POST['idServico'];
        $lista_servicomaquinas = $model->getServicoMaquina($where);        

        $this->smarty->assign('lista_servicomaquina', $lista_servicomaquinas);    
        $html = $this->smarty->fetch("servico/servicomaquina.html");
        
        // ler o total dos insumos para atualizar o valor orcado do servico
        $total = $model->getServicoTotalInsumos($where);
        $totalInsumos = $total[0]['total'];
        // ler o total de mao de obra para atualizar o valor orcado do servico
        $total = $model->getServicoTotalMaoObra($where);
        $totalMaoObra = $total[0]['total'];
        $total = $model->getServicoTotalMaquina($where);
        $totalMaquina = $total[0]['total'];
        $valorNovo = $totalInsumos + $totalMaoObra + $totalMaquina;
        
        // atualiza o valor do servico
        $dados = array(
            'vlOrcado' => $valorNovo,
            'idServico' => $_POST['idServico']
        );
        $model->updServico($dados);        

        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html,
            'total' => $valorNovo
        );
        echo json_encode($jasonretorno);        
    }    
    //Trata dados antes de Enviar para o Gravar
    private function trataPostInsumo($post) {
        $data['idServico'] = ($post['idServico'] != '') ? $post['idServico'] : null;
        $data['idInsumo'] = ($post['idInsumo'] != '') ? $post['idInsumo'] : null;
        $data['dsObservacao'] = ($post['dsObservacaoInsumo'] != '') ? $post['dsObservacaoInsumo'] : null;
        $data['qtInsumo'] = ($post['qtInsumo'] != '') ? $post['qtInsumo'] : null;
        $data['vlTotal'] = ($post['vlTotalInsumo'] != '') ? $post['vlTotalInsumo'] : null;
        $data['vlUnitario'] = ($post['vlUnitarioInsumo'] != '') ? $post['vlUnitarioInsumo'] : null;
        return $data;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPostMaoObra($post) {
        $data['idServico'] = ($post['idServico'] != '') ? $post['idServico'] : null;
        $data['idMaoObra'] = ($post['idMaoObra'] != '') ? $post['idMaoObra'] : null;
        $data['dsObservacao'] = ($post['dsObservacaoMaoObra'] != '') ? $post['dsObservacaoMaoObra'] : null;
        $data['qtHoras'] = ($post['qtMaoObra'] != '') ? $post['qtMaoObra'] : null;
        $data['vlTotal'] = ($post['vlTotalMaoObra'] != '') ? $post['vlTotalMaoObra'] : null;
        $data['vlUnitario'] = ($post['vlUnitarioMaoObra'] != '') ? $post['vlUnitarioMaoObra'] : null;
        return $data;
    }
    
    //Trata dados antes de Enviar para o Gravar
    private function trataPostMaquina($post) {
        $data['idServico'] = ($post['idServico'] != '') ? $post['idServico'] : null;
        $data['idMaquina'] = ($post['idMaquina'] != '') ? $post['idMaquina'] : null;
        $data['dsObservacao'] = ($post['dsObservacaoMaquina'] != '') ? $post['dsObservacaoMaquina'] : null;
        $data['qtHoras'] = ($post['qtMaquina'] != '') ? $post['qtMaquina'] : null;
        $data['vlTotal'] = ($post['vlTotalMaquina'] != '') ? $post['vlTotalMaquina'] : null;
        $data['vlUnitario'] = ($post['vlUnitarioMaquina'] != '') ? $post['vlUnitarioMaquina'] : null;
        return $data;
    }
    private function trataPost($post) {
        $data['idServico'] = ($post['idServico'] != '') ? $post['idServico'] : null;
        $data['dsServico'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['dsObservacao'] = ($post['dsObservacao'] != '') ? $post['dsObservacao'] : null;
 //       $data['vlOrcado'] = ($post['vlOrcado'] != '') ? $post['vlOrcado'] : null;
        $data['idTipoServico'] = ($post['idTipoServico'] != '') ? $post['idTipoServico'] : null;
        $data['idUnidade'] = ($post['idUnidade'] != '') ? $post['idUnidade'] : null;
        return $data;
    }
    // Remove Padrao
    public function delservico() {
                
        $idServico = $this->getParam('idServico');        
        $servico = $idServico;        
        if (!is_null($servico)) {    
            $model = new servicoModel();
            $dados['idServico'] = $servico;             
            $model->delServico($dados);
        }
        header('Location: /servico');
    }

    public function delinsumo() {
        $id = $_POST['idServicoInsumos'];
        $model = new servicoModel();
        $where = 'idServicoInsumos = ' . $id;
        $model->delServicoInsumo($where);
        
        $where = 'a.idServico = ' . $_POST['idServico'];
        $lista_servicoinsumos = $model->getServicoInsumos($where);        

        $this->smarty->assign('lista_servicoinsumos', $lista_servicoinsumos);    
        $html = $this->smarty->fetch("servico/servicoinsumo.html");

        // ler o total dos insumos para atualizar o valor orcado do servico
        $total = $model->getServicoTotalInsumos($where);
        $totalInsumos = $total[0]['total'];
        // ler o total de mao de obra para atualizar o valor orcado do servico
        $total = $model->getServicoTotalMaoObra($where);
        $totalMaoObra = $total[0]['total'];
        $total = $model->getServicoTotalMaquina($where);
        $totalMaquina = $total[0]['total'];
        $valorNovo = $totalInsumos + $totalMaoObra + $totalMaquina;
        
        // atualiza o valor do servico
        $dados = array(
            'vlOrcado' => $valorNovo,
            'idServico' => $_POST['idServico']
        );
        $model->updServico($dados);        
        
        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html,
            'total' => $valorNovo
        );
        echo json_encode($jasonretorno);        
    }

    public function delmaoobra() {
        $id = $_POST['idServicoMaoObra'];
        $model = new servicoModel();
        $where = 'idServicoMaoObra = ' . $id;
        $model->delServicoMaoObra($where);
        
        $where = 'a.idServico = ' . $_POST['idServico'];
        $lista_servicomaoobra = $model->getServicoMaoObra($where);        

        $this->smarty->assign('lista_servicomaoobra', $lista_servicomaoobra);    
        $html = $this->smarty->fetch("servico/servicomaoobra.html");

        // ler o total dos insumos para atualizar o valor orcado do servico
        $total = $model->getServicoTotalInsumos($where);
        $totalInsumos = $total[0]['total'];
        // ler o total de mao de obra para atualizar o valor orcado do servico
        $total = $model->getServicoTotalMaoObra($where);
        $totalMaoObra = $total[0]['total'];
        $total = $model->getServicoTotalMaquina($where);
        $totalMaquina = $total[0]['total'];
        $valorNovo = $totalInsumos + $totalMaoObra + $totalMaquina;
        
        // atualiza o valor do servico
        $dados = array(
            'vlOrcado' => $valorNovo,
            'idServico' => $_POST['idServico']
        );
        $model->updServico($dados);        
        
        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html,
            'total' => $valorNovo
        );
        echo json_encode($jasonretorno);        
    }

    public function delmaquina() {
        $id = $_POST['idServicoMaquina'];
        $model = new servicoModel();
        $where = 'idServicoMaquina = ' . $id;
        $model->delServicoMaquina($where);
        
        $where = 'a.idServico = ' . $_POST['idServico'];
        $lista_servicomaquina = $model->getServicoMaquina($where);        

        $this->smarty->assign('lista_servicomaquina', $lista_servicomaquina);    
        $html = $this->smarty->fetch("servico/servicomaquina.html");

        // ler o total dos insumos para atualizar o valor orcado do servico
        $total = $model->getServicoTotalInsumos($where);
        $totalInsumos = $total[0]['total'];
        // ler o total de mao de obra para atualizar o valor orcado do servico
        $total = $model->getServicoTotalMaoObra($where);
        $totalMaoObra = $total[0]['total'];
        $total = $model->getServicoTotalMaquina($where);
        $totalMaquina = $total[0]['total'];
        $valorNovo = $totalInsumos + $totalMaoObra + $totalMaquina;
        
        // atualiza o valor do servico
        $dados = array(
            'vlOrcado' => $valorNovo,
            'idServico' => $_POST['idServico']
        );
        $model->updServico($dados);        
        
        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html,
            'total' => $valorNovo
        );
        echo json_encode($jasonretorno);        
    }

    public function relatorioservico_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Servicos');
        $this->smarty->display('servico/relatorio_pre.html');
    }

    public function relatorioservico() {
        $this->template->run();

        $model = new servicoModel();
        $servico_lista = $model->getServico();
        //Passa a lista de registros
        $this->smarty->assign('servico_lista', $servico_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Servicos');
        $this->smarty->display('servico/relatorio.html');
    }

}

?>