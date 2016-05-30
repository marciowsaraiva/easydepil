<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class servicoprojeto extends controller {

    public function index_action() {

        $id = $this->getParam('idProjetoServico');
        
        $this->template->run();

        $model = new servicoprojetoModel();
        $servicoprojeto_lista = $model->getServicoProjeto();

        if ($id) {
            $where = 'idProjetoServico = ' . $id;
            $lista_servicosprojeto = $model->getServicoProjetoServico($where);
            $this->smarty->assign('lista_servicosprojeto', $lista_servicosprojeto);
        }
        $this->smarty->assign('servicoprojeto_lista', $servicoprojeto_lista);
        $this->smarty->display('servicoprojeto/lista.html');
    }

//Funcao de Busca
    public function busca_servicoprojeto() {
        $resultado = null;
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscaprojeto']) ? $_POST['buscaprojeto'] : '';
        $nomedoevento = isset($_POST['buscaservicoprojeto']) ? $_POST['buscaservicoprojeto'] : '';
        $model = new servicoprojetoModel();
        if ($nomedoevento) {
            if ($texto) {
               $sql = " upper(p.dsProjeto) like upper('%" . $texto . "%') ";                
               $sql = $sql . " and upper(f.dsProjetoServico) like upper('%" . $nomedoevento . "%') ";                
            } else {
               $sql = " upper(f.dsProjetoServico) like upper('%" . $nomedoevento . "%') ";                
            }
        } else {
               $sql = " upper(p.dsProjeto) like upper('%" . $texto . "%') ";                
        }
        $resultado = $model->getProjetoServicoProjeto($sql);

        $this->smarty->assign('buscaprojeto', $texto);
        $this->smarty->assign('buscaservicoprojeto', $nomedoevento);
        $this->smarty->assign('servicoprojeto_lista', $resultado);
        //Chama o Smarty
        $this->smarty->assign('title', 'servicoprojeto');
        $this->smarty->assign('buscadescricao', $texto);
        $this->smarty->display('servicoprojeto/lista.html');
    }

    //Funcao de Inserir
    public function novo_servicoprojeto() {

        $idProjetoServico = $this->getParam('idProjetoServico');
        $model = new servicoprojetoModel();
        $lista_servicosprojeto = null;
        $lista_fase = array('' => 'SELECIONE');
        
        if ($idProjetoServico) {
            $registro = $model->getServicoProjeto('idProjetoServico=' . $idProjetoServico);
            $registro = $registro[0]; //Passando ProjetoServico

            $where = 'ps.idProjetoServico = ' . $idProjetoServico;
            $lista_servicosprojeto = $model->getServicoProjetoServicos($where);
            $modelFase = new faseModel();
            $where = 'p.idProjeto = ' . $registro['idProjeto'];
            foreach ($modelFase->getFase($where) as $value) {
                $lista_fase[$value['idFase']] = $value['dsFase'];
            }
//            var_dump($lista_fase); die;
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelColaborador = new colaboradorModel();
        $lista_colaborador = array('' => 'SELECIONE');
        foreach ($modelColaborador->getColaborador() as $value) {
            $lista_colaborador[$value['idColaborador']] = $value['dsColaborador'];
        }
        
        $modelProjeto = new projetoModel();
        $lista_projeto = array('' => 'SELECIONE');
        foreach ($modelProjeto->getProjeto() as $value) {
            $lista_projeto[$value['idProjeto']] = $value['dsProjeto'];
        }

        $modelServico = new servicoModel();
        $lista_servicos = array('' => 'SELECIONE');
        foreach ($modelServico->getServico() as $value) {
            $lista_servicos[$value['idServico']] = $value['dsServico'];
        }

        $lista_servicostatus = null;
        if($idProjetoServico) {
            $lista_servicostatus = $model->getServicoStatus('f.idProjetoServico = ' . $idProjetoServico);
        }        
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('servicosdocumentos', null);
        $this->smarty->assign('lista_colaborador', $lista_colaborador);
        $this->smarty->assign('lista_projeto', $lista_projeto);
        $this->smarty->assign('lista_servicosprojeto', $lista_servicosprojeto);
        $this->smarty->assign('lista_servicos', $lista_servicos);
        $this->smarty->assign('servico_listastatus', $lista_servicostatus);        
        $this->smarty->assign('lista_fase', $lista_fase);
        $this->smarty->assign('title', 'Novo ProjetoServico');
        $this->smarty->display('servicoprojeto/form_novo.tpl');
    }
    public function mudancastatus() {
        
        $idProjetoServico = $this->getParam('idProjetoServico');
        $model = new servicoprojetoModel();
        $lista_servicosprojeto = null;
        $lista_fase = array('' => 'SELECIONE');
        
        if ($idProjetoServico) {
            $registro = $model->getServicoProjeto('idProjetoServico=' . $idProjetoServico);
            $registro = $registro[0]; //Passando ProjetoServico

            $where = 'ps.idProjetoServico = ' . $idProjetoServico;
            $lista_servicosprojeto = $model->getServicoProjetoServicos($where);
            $modelFase = new faseModel();
            $where = 'p.idProjeto = ' . $registro['idProjeto'];
            foreach ($modelFase->getFase($where) as $value) {
                $lista_fase[$value['idFase']] = $value['dsFase'];
            }
//            var_dump($lista_fase); die;
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelColaborador = new colaboradorModel();
        $lista_colaborador = array('' => 'SELECIONE');
        foreach ($modelColaborador->getColaborador() as $value) {
            $lista_colaborador[$value['idColaborador']] = $value['dsColaborador'];
        }
        
        $modelProjeto = new projetoModel();
        $lista_projeto = array('' => 'SELECIONE');
        foreach ($modelProjeto->getProjeto() as $value) {
            $lista_projeto[$value['idProjeto']] = $value['dsProjeto'];
        }

        $modelServico = new servicoModel();
        $lista_servicos = array('' => 'SELECIONE');
        foreach ($modelServico->getServico() as $value) {
            $lista_servicos[$value['idServico']] = $value['dsServico'];
        }
        
        $modelStatus = new statusprojetoModel();
        $lista_status = array('' => 'SELECIONE');
        foreach ($modelStatus->getStatusProjeto() as $value) {
            $lista_status[$value['idStatusProjeto']] = $value['dsStatusProjeto'];
        }
        
        $lista_servicostatus = null;
        if($idProjetoServico) {
            $lista_servicostatus = $model->getServicoStatus('f.idProjetoServico = ' . $idProjetoServico);
        }        
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('servicosdocumentos', null);
        $this->smarty->assign('lista_colaborador', $lista_colaborador);
        $this->smarty->assign('lista_projeto', $lista_projeto);
        $this->smarty->assign('lista_servicosprojeto', $lista_servicosprojeto);
        $this->smarty->assign('lista_fase', $lista_fase);
        $this->smarty->assign('lista_status', $lista_status);        
        $this->smarty->assign('title', 'Mudança de Status do Serviço');
        $this->smarty->assign('titulo', 'Mudança de Status do Serviço');
        $this->smarty->display('servicoprojeto/servicomudanca.tpl');
        
    }

    public function gravar_mudanca() {
        $model = new servicoprojetoModel();
        $data = $this->trataPostMudanca($_POST);
        $model->updServicoProjeto($data); //update
      //  print_a_die($data);
        $datastatus = array(
            'idServicoMudancaStatus' => null,
            'dtMudanca' => date('Y-m-d h:m:s'),
            'idProjetoServico' => $data['idProjetoServico'],
            'idStatusServico' => $data['idStatusServico'],
            'idUsuario' => $_SESSION["user"]["usuario"],
            'dsObservacao' => $_POST['dsObservacao'],
            'idOrigemInformacao' => 1
        );
    //    print_a_die($datastatus);
        $model->setNovoStatusServicoProjeto($datastatus); //inserir uma nova linha na tabela de mudanças de status da projeto

        header('Location: /servicoprojeto');        
        return;
    }
    
    //Trata dados antes de Enviar para o Gravar
    private function trataPostMudanca($post) {
        $data['idProjetoServico'] = ($post['idProjetoServico'] != '') ? $post['idProjetoServico'] : null;
        $data['idStatusServico'] = ($post['idStatusServico'] != '') ? $post['idStatusServico'] : null;
        return $data;
    }
    
    // Gravar Padrao
    public function gravar_servicoprojeto() {
        $model = new servicoprojetoModel();

        $data = $this->trataPost($_POST);        

        if ($data['idProjetoServico'] == '') {
            $data['idStatusServico'] = 1;
            $model->setServicoProjeto($data);
        } else {
            $model->updServicoProjeto($data); //update
        }
        
        header('Location: /servicoprojeto');        
        return;
    }
    
    public function gravarservico() {
        $model = new servicoprojetoModel();

        // gravar o servico deste servico
        $data = $this->trataPostServico($_POST);
        $id = $model->setServicoProjetoServico($data);
        
        // pegar a lista dos servico deste servico
        $where = 'ps.idProjetoServico = ' . $data['idProjetoServico'];
        $lista_servicosprojeto = $model->getServicoProjetoServicos($where);
        
        // pegar o total dos servico deste servico
        $retorno = $model->getServicoProjetoServicosTotal($where);
        $total = $retorno[0]['total'];
        
        // atualizar o valor orcado do servico com total dos servicos deste servico
        $dadost = array('vlOrcado' => $total, 'idProjetoServico' => $data['idProjetoServico']);
        $model->updServicoProjeto($dadost);

        // pegar a fase e o projeto deste servico para atualizar o orcamento da fase
        $where = 'ps.idProjetoServico = ' . $data['idProjetoServico'];
        $retornof = $model->getServicoProjetoFase($where);
        $fase = $retornof[0]['idFase'];
        $projeto = $retornof[0]['idProjeto'];
        $vlOrcadoFase = $retornof[0]['vlOrcadoFase'];
        $vlOrcadoProjeto = $retornof[0]['vlOrcadoProjeto'];        
        
        // atualizar o valor orcado da fase
        $dadosf = array('vlOrcado' => $vlOrcadoFase + $total, 'idFase' => $fase);
        $model->updServicoProjetoFase($dadosf);
        
        // atualizar o valor orcado do projeto
        $dadosp = array('vlOrcado' => $vlOrcadoProjeto + $total, 'idProjeto' => $projeto);
        $model->updServicoProjetoProjeto($dadosp);
        
        // preparar o html para atualizar a tela
        $this->smarty->assign('lista_servicosprojeto', $lista_servicosprojeto);    
        $html = $this->smarty->fetch("servicoprojeto/listaservicos.html");
        
        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html,
            'total' => $total
        );
        echo json_encode($jasonretorno);
    }

    public function delservico() {
        $model = new servicoprojetoModel();

        $id = $_POST['id'];
        $idProjetoServico = $_POST['idProjetoServico'];        
        
        // excluir o servico deste servico
        $where = 'idProjetoServicosServico = ' . $id;
        $model->delServicoProjetoServicos($where);

        // pegar a lista dos servico deste servico
        $where = 'ps.idProjetoServico = ' . $idProjetoServico;
        $lista_servicosprojeto = $model->getServicoProjetoServicos($where);
        
        // pegar o total dos servico deste servico
        $retorno = $model->getServicoProjetoServicosTotal($where);
        $total = $retorno[0]['total'];

        // atualizar o valor orcado do servico com total dos servicos deste servico
        $dados = array('vlOrcado' => $total, 'idProjetoServico' => $idProjetoServico);
        $model->updServicoProjeto($dados);

        // pegar a fase e o projeto deste servico para atualizar o orcamento da fase
        $where = 'ps.idProjetoServico = ' . $idProjetoServico;
        $retornof = $model->getServicoProjetoFase($where);
        $fase = $retornof[0]['idFase'];
        $projeto = $retornof[0]['idProjeto'];
        $vlOrcadoFase = $retornof[0]['vlOrcadoFase'];
        $vlOrcadoProjeto = $retornof[0]['vlOrcadoProjeto'];        
        
        // atualizar o valor orcado da fase
        $dadosf = array('vlOrcado' => $vlOrcadoFase - $total, 'idFase' => $fase);
        $model->updServicoProjetoFase($dadosf);
        
        // atualizar o valor orcado do projeto
        $dadosp = array('vlOrcado' => $vlOrcadoProjeto - $total, 'idProjeto' => $projeto);
        $model->updServicoProjetoProjeto($dadosp);
        
        // preparar o html para atualizar a tela
        $this->smarty->assign('lista_servicosprojeto', $lista_servicosprojeto);    
        $html = $this->smarty->fetch("servicoprojeto/listaservicos.html");
        
        // criar o array de retorno
        $jasonretorno = array(
            'html' => $html,
            'total' => $total
        );
        echo json_encode($jasonretorno);
    }

    public function delservicogeral() {
        $model = new servicoprojetoModel();

        $idProjetoServico = $this->getParam('idProjetoServico');
        $where = 'ps.idProjetoServico = ' . $idProjetoServico;
        
        // pegar o total dos servico deste servico
        $retorno = $model->getServicoProjetoServicosTotal($where);
        $total = $retorno[0]['total'];

        // atualizar o valor orcado do servico com total dos servicos deste servico
        $dados = array('vlOrcado' => $total, 'idProjetoServico' => $idProjetoServico);
        $model->updServicoProjeto($dados);

        // pegar a fase e o projeto deste servico para atualizar o orcamento da fase
        $retornof = $model->getServicoProjetoFase($where);
        $fase = $retornof[0]['idFase'];
        $projeto = $retornof[0]['idProjeto'];
        $vlOrcadoFase = $retornof[0]['vlOrcadoFase'];
        $vlOrcadoProjeto = $retornof[0]['vlOrcadoProjeto'];        
        
        // atualizar o valor orcado da fase
        $dadosf = array('vlOrcado' => $vlOrcadoFase - $total, 'idFase' => $fase);
        $model->updServicoProjetoFase($dadosf);
        
        // atualizar o valor orcado do projeto
        $dadosp = array('vlOrcado' => $vlOrcadoProjeto - $total, 'idProjeto' => $projeto);
        $model->updServicoProjetoProjeto($dadosp);

        // excluir os servicos deste servico
        $where = 'idProjetoServico = ' . $idProjetoServico;
        $model->delServicoProjetoServicos($where);
        // excluir o servico
        $model->delServicoProjeto($where);

        header('Location: /servicoprojeto');        
        return;
        
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idProjetoServico'] = isset($post['idProjetoServico']) ? $post['idProjetoServico'] : null;
        $data['dsServicoProjeto'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['idProjeto'] = ($post['idProjeto'] != '') ? $post['idProjeto'] : null;
        $data['idFase'] = ($post['idFase'] != '') ? $post['idFase'] : null;
        $data['idColaboradorResponsavel'] = ($post['idColaborador'] != '') ? $post['idColaborador'] : null;
        $data['dtPrevisaoInicio'] = ($post['dtPrevisaoInicio'] != '') ? $post['dtPrevisaoInicio'] : null;
        $data['dtPrevisaoTermino'] = ($post['dtPrevisaoTermino'] != '') ? $post['dtPrevisaoTermino'] : null;
        $data['dsTermoAbertura'] = ($post['dsTermoAbertura'] != '') ? $post['dsTermoAbertura'] : null;
        $data['dtAbertura'] = date('Y-m-d H:i:s');
        return $data;
    }

    private function trataPostServico($post) {
        $data['idProjetoServico'] = ($post['idProjetoServico'] != '') ? $post['idProjetoServico'] : null;
        $data['dsObservacao'] = ($post['dsObservacaoServico'] != '') ? $post['dsObservacaoServico'] : null;
        $data['vlTotal'] = ($post['vlTotalServico'] != '') ? $post['vlTotalServico'] : null;
        $data['idServico'] = ($post['idServico'] != '') ? $post['idServico'] : null;
        $data['qtServico'] = ($post['qtServico'] != '') ? $post['qtServico'] : null;
        return $data;
    }

    // Remove Padrao
    public function delservicoprojeto() {
                
        $idProjetoServico = $this->getParam('idProjetoServico');
        
        $servicoprojeto = $idProjetoServico;
        
        if (!is_null($servicoprojeto)) {    
            $model = new servicoprojetoModel();
            $dados['idProjetoServico'] = $servicoprojeto;             
            $model->delProjetoServico($dados);
        }

        header('Location: /servicoprojeto');
    }
    public function lerservico() {
        $idServico = $_POST['idServico'];
        $vlUnitario = null;
        $modelUnidade = new servicoModel();
        $where = 'idServico = ' . $idServico;
        $retorno = $modelUnidade->getServico($where);
        if ($retorno) {
            $vlUnitario = $retorno[0]['vlOrcado'];
        }
        $jsondata["vlUnitario"] = $vlUnitario;
        $jsondata["ok"] = true;
        echo json_encode($jsondata);
    }
    
    public function lerfasedoprojeto() {
        $idProjeto = $_POST['idProjeto'];
        $modelFase = new faseModel();
        $where = 'p.idProjeto = ' . $idProjeto;
        $lista_fase = array('' => 'SELECIONE');
        foreach ($modelFase->getFase($where) as $value) {
            $lista_fase[$value['idFase']] = $value['dsFase'];
        }

        $this->smarty->assign('lista_fase', $lista_fase);    
        $html = $this->smarty->fetch("servicoprojeto/fases.html");
        echo json_encode($html);
    }

    public function relatorioservicoprojeto_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de ProjetoServicos');
        $this->smarty->display('servicoprojeto/relatorio_pre.html');
    }

    public function relatorioservicoprojeto() {
        $this->template->run();

        $model = new servicoprojetoModel();
        $servicoprojeto_lista = $model->getProjetoServico();
        //Passa a lista de registros
        $this->smarty->assign('servicoprojeto_lista', $servicoprojeto_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de ProjetoServicos');
        $this->smarty->display('servicoprojeto/relatorio.html');
    }

}

?>