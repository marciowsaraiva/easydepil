<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class manutprevincluir extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new maquinaModel();
        $maquina_lista = $model->getMaquina();

        $this->smarty->assign('maquina_lista', $maquina_lista);
        $this->smarty->display('manutprevincluir/lista.html');
    }

//Funcao de Busca
    public function busca_maquina() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new maquinaModel();
        $sql = "stStatus <> 0 and upper(dsMaquina) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMaquina($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('maquina_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'maquina');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('manutprevincluir/lista.html');
        } else {
            $this->smarty->assign('maquina_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'maquina');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('manutprevincluir/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_manutprevincluir() {

        $idMaquina = $this->getParam('idMaquina');

        $model = new maquinaModel();

        if ($idMaquina > 0) {
            $registro = $model->getMaquina('a.idMaquina=' . $idMaquina);
            $registro = $registro[0]; //Passando Maquina
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $lista_maquina = array('' => 'SELECIONE');
        foreach ($model->getMaquina() as $value) {
            $lista_maquina[$value['idMaquina']] = $value['dsMaquina'];
        }
        $modelMarca = new marcaModel();
        $lista_marca = array('' => 'SELECIONE');
        foreach ($modelMarca->getMarca() as $value) {
            $lista_marca[$value['idMarca']] = $value['dsMarca'];
        }
        $modelModelo = new modeloModel();
        $lista_modelo = array('' => 'SELECIONE');
        foreach ($modelModelo->getModelo() as $value) {
            $lista_modelo[$value['idModelo']] = $value['dsModelo'];
        }
        $modelGCusto = new grupocustoModel();
        $lista_grupocusto = array('' => 'SELECIONE');
        foreach ($modelGCusto->getGrupoCusto() as $value) {
            $lista_grupocusto[$value['idGrupoCusto']] = $value['dsGrupoCusto'];
        }
        $modelSetor = new setorModel();
        $lista_setor = array('' => 'SELECIONE');
        foreach ($modelSetor->getSetor() as $value) {
            $lista_setor[$value['idSetor']] = $value['dsSetor'];
        }
        $modelUnidade = new unidadeModel();
        $lista_unidade = array('' => 'SELECIONE');
        foreach ($modelUnidade->getUnidade() as $value) {
            $lista_unidade[$value['idUnidade']] = $value['dsUnidade'];
        }
        
        $lista_maquinastatus = null;
        if($idMaquina) {
            $lista_maquinastatus = $model->getMaquinaStatus('m.idMaquina = ' . $idMaquina);
            //var_dump($lista_maquinastatus); die;
        }
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_maquina', $lista_maquina);
        $this->smarty->assign('maquina_listastatus', $lista_maquinastatus);
        $this->smarty->assign('lista_marca', $lista_marca);
        $this->smarty->assign('lista_modelo', $lista_modelo);
        $this->smarty->assign('lista_grupocusto', $lista_grupocusto);
        $this->smarty->assign('lista_setor', $lista_setor);
        $this->smarty->assign('lista_unidade', $lista_unidade);
        $this->smarty->assign('title', 'Novo Maquina');
        $this->smarty->display('manutprevincluir/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_maquina() {
        $model = new maquinaModel();

        $data = $this->trataPost($_POST);

        if ($data['idMaquina'] == NULL)
            $model->setmaquina($data);
        else
            $model->updmaquina($data); //update
        
        header('Location: /maquina');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idMaquina'] = ($post['idMaquina'] != '') ? $post['idMaquina'] : null;
        $data['idMaquinaPai'] = ($post['idMaquinaPai'] != '') ? $post['idMaquinaPai'] : null;
        $data['dsMaquina'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['idMarca'] = ($post['idMarca'] != '') ? $post['idMarca'] : null;
        $data['idModelo'] = ($post['idModelo'] != '') ? $post['idModelo'] : null;
        $data['nrSerie'] = ($post['nrSerie'] != '') ? $post['nrSerie'] : null;
        $data['dsCodigoDoFabricante'] = ($post['dsCodigoDoFabricante'] != '') ? $post['dsCodigoDoFabricante'] : null;
        $data['idSetor'] = ($post['idSetor'] != '') ? $post['idSetor'] : null;
        $data['idUnidade'] = ($post['idUnidade'] != '') ? $post['idUnidade'] : null;
        $data['vlUnitario'] = ($post['vlUnitario'] != '') ? $post['vlUnitario'] : null;
        $data['dsCaracteristicas'] = ($post['dsCaracteristicas'] != '') ? $post['dsCaracteristicas'] : null;
        $data['idGrupoCusto'] = ($post['idGrupoCusto'] != '') ? $post['idGrupoCusto'] : null;
        return $data;
    }

    // Remove Padrao
    public function delmaquina() {
                
        $idMaquina = $this->getParam('idMaquina');
        
        $maquina = $idMaquina;
        
        if (!is_null($maquina)) {    
            $model = new maquinaModel();
            $dados['idMaquina'] = $maquina;             
            $model->delMaquina($dados);
        }

        header('Location: /maquina');
    }

    public function relatoriomaquina_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Maquinas');
        $this->smarty->display('manutprevincluir/relatorio_pre.html');
    }

    public function relatoriomaquina() {
        $this->template->run();

        $model = new maquinaModel();
        $maquina_lista = $model->getMaquina();
        //Passa a lista de registros
        $this->smarty->assign('maquina_lista', $maquina_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Maquinas');
        $this->smarty->display('manutprevincluir/relatorio.html');
    }

}

?>