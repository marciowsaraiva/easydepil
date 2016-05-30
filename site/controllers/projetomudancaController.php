<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class projetomudanca extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new projetoModel();
        $projetomudanca_lista = $model->getProjeto();

        $this->smarty->assign('projetomudanca_lista', $projetomudanca_lista);
        $this->smarty->display('projetomudanca/lista.html');
    }

//Funcao de Busca
    public function busca_projeto() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new projetoModel();
        $sql = "stStatus <> 0 and upper(dsProjeto) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getProjeto($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('projetomudanca_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'projeto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('projetomudanca/lista.html');
        } else {
            $this->smarty->assign('projetomudanca_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'projeto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('projetomudanca/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_projetomudanca() {

        $idProjeto = $this->getParam('idProjeto');

        $model = new projetoModel();

        if ($idProjeto > 0) {
            $registro = $model->getProjeto('a.idProjeto=' . $idProjeto);
            $registro = $registro[0]; //Passando Projeto
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelEmpresa = new empresaModel();
        $lista_empresa = array('' => 'SELECIONE');
        foreach ($modelEmpresa->getEmpresa("stStatus <> 0") as $value) {
            $lista_empresa[$value['idEmpresa']] = $value['dsEmpresa'];
        }
        $modelColaborador = new colaboradorModel();
        $lista_colaborador = array('' => 'SELECIONE');
        foreach ($modelColaborador->getColaborador() as $value) {
            $lista_colaborador[$value['idColaborador']] = $value['dsColaborador'];
        }
        
        $modelStatus = new statusprojetoModel();
        $lista_status = array('' => 'SELECIONE');
        foreach ($modelStatus->getStatusProjeto() as $value) {
            $lista_status[$value['idStatusProjeto']] = $value['dsStatusProjeto'];
        }

        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_colaborador', $lista_colaborador);
        $this->smarty->assign('lista_empresa', $lista_empresa);
        $this->smarty->assign('lista_status', $lista_status);
        $this->smarty->assign('title', 'Mudança de Status Projeto');
        $this->smarty->display('projetomudanca/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_projeto() {
        $model = new projetoModel();
        $data = $this->trataPost($_POST);
        $model->updprojeto($data); //update
      //  print_a_die($data);
        $datastatus = array(
            'idProjetoMudancaStatus' => null,
            'dtMudanca' => date('Y-m-d h:m:s'),
            'idProjeto' => $data['idProjeto'],
            'idStatusProjeto' => $data['idStatusProjeto'],
            'idUsuario' => $_SESSION["user"]["usuario"],
            'dsObservacao' => $_POST['dsObservacao'],
            'idOrigemInformacao' => 1
        );
    //    print_a_die($datastatus);
        $model->setNovoStatusProjeto($datastatus); //inserir uma nova linha na tabela de mudanças de status da projeto
        
        header('Location: /projeto');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idProjeto'] = ($post['idProjeto'] != '') ? $post['idProjeto'] : null;
        $data['idStatusProjeto'] = ($post['idStatusProjeto'] != '') ? $post['idStatusProjeto'] : null;
        return $data;
    }

    public function relatorioprojeto_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Projetos');
        $this->smarty->display('projetomudanca/relatorio_pre.html');
    }

    public function relatorioprojeto() {
        $this->template->run();

        $model = new projetoModel();
        $projetomudanca_lista = $model->getProjeto();
        //Passa a lista de registros
        $this->smarty->assign('projetomudanca_lista', $projetomudanca_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Projetos');
        $this->smarty->display('projetomudanca/relatorio.html');
    }

}

?>