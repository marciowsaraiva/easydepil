<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipofornecedor extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipofornecedorModel();
        $tipofornecedor_lista = $model->getTipoFornecedor();

        $this->smarty->assign('tipofornecedor_lista', $tipofornecedor_lista);
        $this->smarty->display('tipofornecedor/lista.html');
    }

//Funcao de Busca
    public function busca_tipofornecedor() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipofornecedorModel();
        $sql = "stStatus <> 0 and upper(dsTipoFornecedor) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoFornecedor($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipofornecedor_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipofornecedor');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipofornecedor/lista.html');
        } else {
            $this->smarty->assign('tipofornecedor_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipofornecedor');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipofornecedor/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipofornecedor() {

        $idTipoFornecedor = $this->getParam('idTipoFornecedor');

        $model = new tipofornecedorModel();

        if ($idTipoFornecedor > 0) {

            $registro = $model->getTipoFornecedor('idTipoFornecedor=' . $idTipoFornecedor);
            $registro = $registro[0]; //Passando TipoFornecedor
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipofornecedorModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoFornecedor('idTipoFornecedor <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoFornecedor']] = $value['dsTipoFornecedor'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipofornecedor', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Fornecedor');
        $this->smarty->display('tipofornecedor/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipofornecedor() {
        $model = new tipofornecedorModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoFornecedor'] == NULL)
            $model->settipofornecedor($data);
        else
            $model->updtipofornecedor($data); //update
        
        header('Location: /tipofornecedor');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoFornecedor'] = ($post['idTipoFornecedor'] != '') ? $post['idTipoFornecedor'] : null;
        $data['dsTipoFornecedor'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipofornecedor() {
                
        $idTipoFornecedor = $this->getParam('idTipoFornecedor');
        
        $tipofornecedor = $idTipoFornecedor;
        
        if (!is_null($tipofornecedor)) {    
            $model = new tipofornecedorModel();
            $dados['idTipoFornecedor'] = $tipofornecedor;             
            $model->delTipoFornecedor($dados);
        }

        header('Location: /tipofornecedor');
    }

    public function relatoriotipofornecedor_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Fornecedor');
        $this->smarty->display('tipofornecedor/relatorio_pre.html');
    }

    public function relatoriotipofornecedor() {
        $this->template->run();

        $model = new tipofornecedorModel();
        $tipofornecedor_lista = $model->getTipoFornecedor();
        //Passa a lista de registros
        $this->smarty->assign('tipofornecedor_lista', $tipofornecedor_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Fornecedor');
        $this->smarty->display('tipofornecedor/relatorio.html');
    }

}

?>