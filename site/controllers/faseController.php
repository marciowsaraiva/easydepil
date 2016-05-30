<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class fase extends controller {

    public function index_action() {

        //Inicializa o Template
        $this->template->run();

        $model = new faseModel();
        $fase_lista = $model->getFase();

        $this->smarty->assign('fase_lista', $fase_lista);
        $this->smarty->display('fase/lista.html');
    }

//Funcao de Busca
    public function busca_fase() {
        $resultado = null;
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscaprojeto']) ? $_POST['buscaprojeto'] : '';
        $nomedoevento = isset($_POST['buscafase']) ? $_POST['buscafase'] : '';
        $model = new faseModel();
        if ($nomedoevento) {
            if ($texto) {
               $sql = " upper(p.dsProjeto) like upper('%" . $texto . "%') ";                
               $sql = $sql . " and upper(f.dsFase) like upper('%" . $nomedoevento . "%') ";                
            } else {
               $sql = " upper(f.dsFase) like upper('%" . $nomedoevento . "%') ";                
            }
        } else {
               $sql = " upper(p.dsProjeto) like upper('%" . $texto . "%') ";                
        }
        $resultado = $model->getFaseProjeto($sql);

        $this->smarty->assign('buscaprojeto', $texto);
        $this->smarty->assign('buscafase', $nomedoevento);
        $this->smarty->assign('fase_lista', $resultado);
        //Chama o Smarty
        $this->smarty->assign('title', 'fase');
        $this->smarty->assign('buscadescricao', $texto);
        $this->smarty->display('fase/lista.html');
    }
    
    //Funcao de Inserir
    public function novo_fase() {

        $idFase = $this->getParam('idFase');

        $model = new faseModel();

        if ($idFase > 0) {
            $registro = $model->getFase('idFase=' . $idFase);
            $registro = $registro[0]; //Passando Fase
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
        
        $lista_fasestatus = null;
        if($idFase) {
            $lista_fasestatus = $model->getFaseStatus('f.idFase = ' . $idFase);
        }
        $this->smarty->assign('fase_listastatus', $lista_fasestatus);
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('fasesdocumentos', null);
        $this->smarty->assign('lista_colaborador', $lista_colaborador);
        $this->smarty->assign('lista_projeto', $lista_projeto);
        $this->smarty->assign('title', 'Novo Fase');
        $this->smarty->display('fase/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_fase() {
        $model = new faseModel();

        $data = $this->trataPost($_POST);

        if ($data['idFase'] == NULL) {
            $data['idStatusFase'] = 1;
            $model->setfase($data);
        } else {
            $model->updfase($data); //update
        }
        
        header('Location: /fase');        
        return;
    }
    public function mudancadestatus() {
        
        $idFase = $this->getParam('idFase');
        
        $model = new faseModel();

        if ($idFase > 0) {
            $registro = $model->getFase('idFase=' . $idFase);
            $registro = $registro[0]; //Passando Fase
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
        
        $modelStatus = new statusprojetoModel();
        $lista_status = array('' => 'SELECIONE');
        foreach ($modelStatus->getStatusProjeto() as $value) {
            $lista_status[$value['idStatusProjeto']] = $value['dsStatusProjeto'];
        }
        
        $lista_fasestatus = null;
        if($idFase) {
            $lista_fasestatus = $model->getFaseStatus('f.idFase = ' . $idFase);
        }
        $this->smarty->assign('fase_listastatus', $lista_fasestatus);
        $this->smarty->assign('lista_status', $lista_status);        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('fasesdocumentos', null);
        $this->smarty->assign('lista_colaborador', $lista_colaborador);
        $this->smarty->assign('lista_projeto', $lista_projeto);
        $this->smarty->assign('title', 'Novo Fase');
        $this->smarty->display('fase/fasemudanca.tpl');
        
    }

    public function gravar_mudanca() {
        $model = new faseModel();
        $data = $this->trataPostMudanca($_POST);
        $model->updFase($data); //update
      //  print_a_die($data);
        $datastatus = array(
            'idFaseMudancaStatus' => null,
            'dtMudanca' => date('Y-m-d h:m:s'),
            'idFase' => $data['idFase'],
            'idStatusFase' => $data['idStatusFase'],
            'idUsuario' => $_SESSION["user"]["usuario"],
            'dsObservacao' => $_POST['dsObservacao'],
            'idOrigemInformacao' => 1
        );
    //    print_a_die($datastatus);
        $model->setNovoStatusFase($datastatus); //inserir uma nova linha na tabela de mudanças de status da projeto

        header('Location: /fase');        
        return;
    }
    
    //Trata dados antes de Enviar para o Gravar
    private function trataPostMudanca($post) {
        $data['idFase'] = ($post['idFase'] != '') ? $post['idFase'] : null;
        $data['idStatusFase'] = ($post['idStatusFase'] != '') ? $post['idStatusFase'] : null;
        return $data;
    }
    
    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idFase'] = ($post['idFase'] != '') ? $post['idFase'] : null;
        $data['dsFase'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['idProjeto'] = ($post['idProjeto'] != '') ? $post['idProjeto'] : null;
        $data['idColaboradorResponsavel'] = ($post['idColaborador'] != '') ? $post['idColaborador'] : null;
        $data['dtPrevisaoInicio'] = ($post['dtPrevisaoInicio'] != '') ? $post['dtPrevisaoInicio'] : null;
        $data['dtPrevisaoTermino'] = ($post['dtPrevisaoTermino'] != '') ? $post['dtPrevisaoTermino'] : null;
    //    $data['vlOrcado'] = ($post['vlOrcado'] != '') ? $post['vlOrcado'] : null;
        $data['dsTermoAbertura'] = ($post['dsTermoAbertura'] != '') ? $post['dsTermoAbertura'] : null;
        $data['dtAbertura'] = date('Y-m-d H:i:s');
        return $data;
    }

    // Remove Padrao
    public function delfase() {
                
        $idFase = $this->getParam('idFase');
        
        $fase = $idFase;
        
        if (!is_null($fase)) {    
            $model = new faseModel();
            $dados['idFase'] = $fase;             
            $model->delFase($dados);
        }

        header('Location: /fase');
    }

    public function relatoriofase_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Fases');
        $this->smarty->display('fase/relatorio_pre.html');
    }

    public function relatoriofase() {
        $this->template->run();

        $model = new faseModel();
        $fase_lista = $model->getFase();
        //Passa a lista de registros
        $this->smarty->assign('fase_lista', $fase_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Fases');
        $this->smarty->display('fase/relatorio.html');
    }

}

?>