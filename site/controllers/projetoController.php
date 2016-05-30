<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class projeto extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new projetoModel();
        $projeto_lista = $model->getProjeto();

        $this->smarty->assign('projeto_lista', $projeto_lista);
        $this->smarty->display('projeto/lista.html');
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
            $this->smarty->assign('projeto_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'projeto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('projeto/lista.html');
        } else {
            $this->smarty->assign('projeto_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'projeto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('projeto/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_projeto() {

        $idProjeto = $this->getParam('idProjeto');

        $model = new projetoModel();

        if ($idProjeto > 0) {
            $registro = $model->getProjeto('idProjeto=' . $idProjeto);
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

        $lista_projetostatus = null;
        if($idProjeto) {
            $lista_projetostatus = $model->getProjetoStatus('a.idProjeto = ' . $idProjeto);
        }
        $this->smarty->assign('projeto_listastatus', $lista_projetostatus);
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('projetosdocumentos', null);
        $this->smarty->assign('lista_colaborador', $lista_colaborador);
        $this->smarty->assign('lista_empresa', $lista_empresa);
        $this->smarty->assign('title', 'Novo Projeto');
        $this->smarty->display('projeto/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_projeto() {
        $model = new projetoModel();

        $data = $this->trataPost($_POST);

        if ($data['idProjeto'] == NULL) {
            $data['idStatusProjeto'] = 1;
            $model->setprojeto($data);
        } else {
            $model->updprojeto($data); //update
        }
        
        header('Location: /projeto');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        
        $data['idProjeto'] = ($post['idProjeto'] != '') ? $post['idProjeto'] : null;
        $data['dsProjeto'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['idEmpresa'] = ($post['idEmpresa'] != '') ? $post['idEmpresa'] : null;
        $data['idColaborador'] = ($post['idColaborador'] != '') ? $post['idColaborador'] : null;
        $data['dtPrevisaoInicio'] = ($post['dtPrevisaoInicio'] != '') ? $post['dtPrevisaoInicio'] : null;
        $data['dtPrevisaoTermino'] = ($post['dtPrevisaoTermino'] != '') ? $post['dtPrevisaoTermino'] : null;
//        $data['vlOrcado'] = ($post['vlOrcado'] != '') ? $post['vlOrcado'] : null;
        $data['dsTermoAbertura'] = ($post['dsTermoAbertura'] != '') ? $post['dsTermoAbertura'] : null;
        $data['dtAbertura'] = date('Y-m-d H:i:s');
        return $data;
    }

    // Remove Padrao
    public function delprojeto() {
                
        $idProjeto = $this->getParam('idProjeto');
        
        $projeto = $idProjeto;
        
        if (!is_null($projeto)) {    
            $model = new projetoModel();
            $dados['idProjeto'] = $projeto;             
            $model->delProjeto($dados);
        }

        header('Location: /projeto');
    }

    public function relatorioprojeto_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Projetos');
        $this->smarty->display('projeto/relatorio_pre.html');
    }

    public function relatorioprojeto() {
        $this->template->run();

        $model = new projetoModel();
        $projeto_lista = $model->getProjeto();
        //Passa a lista de registros
        $this->smarty->assign('projeto_lista', $projeto_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Projetos');
        $this->smarty->display('projeto/relatorio.html');
    }

}

?>