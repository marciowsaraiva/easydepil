<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class pontopedido extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new insumoModel();
        $where = 'a.qtEstoque < a.qtMinima';
        $insumo_lista = $model->getInsumoPP($where);

        $this->smarty->assign('pontopedido_lista', $insumo_lista);
        $this->smarty->display('pontopedido/lista.html');
    }

//Funcao de Busca
    public function busca_insumo() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new insumoModel();
        $sql = "stStatus <> 0 and upper(dsInsumo) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getInsumo($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('insumo_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'insumo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('pontopedido/lista.html');
        } else {
            $this->smarty->assign('pontopedido_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'insumo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('pontopedido/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_insumo() {

        $idInsumo = $this->getParam('idInsumo');

        $model = new insumoModel();

        if ($idInsumo > 0) {
            $registro = $model->getInsumo('idInsumo=' . $idInsumo);
            $registro = $registro[0]; //Passando Insumo
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelGrupo = new grupoModel();
        $lista_grupo = array('' => 'SELECIONE');
        foreach ($modelGrupo->getGrupo() as $value) {
            $lista_grupo[$value['idGrupo']] = $value['dsGrupo'];
        }
        $modelUnidade = new unidadeModel();
        $lista_unidade = array('' => 'SELECIONE');
        foreach ($modelUnidade->getUnidade() as $value) {
            $lista_unidade[$value['idUnidade']] = $value['dsUnidade'];
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
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_grupo', $lista_grupo);
        $this->smarty->assign('lista_unidade', $lista_unidade);
        $this->smarty->assign('lista_marca', $lista_marca);
        $this->smarty->assign('lista_modelo', $lista_modelo);
        $this->smarty->assign('title', 'Novo Insumo');
        $this->smarty->display('pontopedido/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_pontopedido() {
        $model = new insumoModel();

        $data = $this->trataPost($_POST);

        if ($data['idInsumo'] == NULL)
            $model->setinsumo($data);
        else
            $model->updinsumo($data); //update
        
        header('Location: /pontopedido');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idInsumo'] = ($post['idInsumo'] != '') ? $post['idInsumo'] : null;
        $data['qtMinima'] = ($post['qtMinima'] != '') ? $post['qtMinima'] : null;
        $data['qtLoteReposicao'] = ($post['qtLoteReposicao'] != '') ? $post['qtLoteReposicao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delinsumo() {
                
        $idInsumo = $this->getParam('idInsumo');
        
        $insumo = $idInsumo;
        
        if (!is_null($insumo)) {    
            $model = new insumoModel();
            $dados['idInsumo'] = $insumo;             
            $model->delInsumo($dados);
        }

        header('Location: /pontopedido');
    }

    public function relatorioinsumo_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Insumos com Estoque abaixo do Ponto de Pedido');
        $this->smarty->display('pontopedido/relatorio_pre.html');
    }

    public function relatorioinsumo() {
        $this->template->run();

        $model = new insumoModel();
        $insumo_lista = $model->getInsumo();
        //Passa a lista de registros
        $this->smarty->assign('pontopedido_lista', $insumo_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Insumos com Estoque abaixo do Ponto de Pedido');
        $this->smarty->display('pontopedido/relatorio.html');
    }

}

?>