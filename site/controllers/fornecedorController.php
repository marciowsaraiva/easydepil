<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class fornecedor extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new fornecedorModel();
        $fornecedor_lista = $model->getFornecedor();

        $this->smarty->assign('fornecedor_lista', $fornecedor_lista);
        $this->smarty->display('fornecedor/lista.html');
    }

//Funcao de Busca
    public function busca_fornecedor() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new fornecedorModel();
        $sql = "stStatus <> 0 and upper(dsFornecedor) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getFornecedor($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('fornecedor_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'fornecedor');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('fornecedor/lista.html');
        } else {
            $this->smarty->assign('fornecedor_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'fornecedor');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('fornecedor/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_fornecedor() {

        $idFornecedor = $this->getParam('idFornecedor');

        $model = new fornecedorModel();

        if ($idFornecedor > 0) {
            $registro = $model->getFornecedor('idFornecedor=' . $idFornecedor);
            $registro = $registro[0]; //Passando Fornecedor
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelTipoF = new tipofornecedorModel();
        $lista_tipo = array('' => 'SELECIONE');
        foreach ($modelTipoF->getTipoFornecedor() as $value) {
            $lista_tipo[$value['idTipoFornecedor']] = $value['dsTipoFornecedor'];
        }
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_tipo', $lista_tipo);
        $this->smarty->assign('title', 'Novo Fornecedor');
        $this->smarty->display('fornecedor/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_fornecedor() {
        $model = new fornecedorModel();

        $data = $this->trataPost($_POST);

        if ($data['idFornecedor'] == NULL)
            $model->setfornecedor($data);
        else
            $model->updfornecedor($data); //update
        
        header('Location: /fornecedor');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idFornecedor'] = ($post['idFornecedor'] != '') ? $post['idFornecedor'] : null;
        $data['dsFornecedor'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['dsContato'] = ($post['dsContato'] != '') ? $post['dsContato'] : null;
        $data['dsFone'] = ($post['dsFone'] != '') ? $post['dsFone'] : null;
        $data['dsEmail'] = ($post['dsEmail'] != '') ? $post['dsEmail'] : null;
        $data['dsCelular'] = ($post['dsCelular'] != '') ? $post['dsCelular'] : null;
        $data['dsSite'] = ($post['dsSite'] != '') ? $post['dsSite'] : null;
        $data['dsEndereco'] = ($post['dsEndereco'] != '') ? $post['dsEndereco'] : null;
        $data['dsCidade'] = ($post['dsCidade'] != '') ? $post['dsCidade'] : null;
        $data['cdCEP'] = ($post['cdCEP'] != '') ? $post['cdCEP'] : null;
        $data['cdUF'] = ($post['cdUF'] != '') ? $post['cdUF'] : null;
        $data['cdCNPJ'] = ($post['cdCNPJ'] != '') ? $post['cdCNPJ'] : null;
        $data['idTipoFornecedor'] = ($post['idTipoFornecedor'] != '') ? $post['idTipoFornecedor'] : null;
        return $data;
    }

    // Remove Padrao
    public function delfornecedor() {
                
        $idFornecedor = $this->getParam('idFornecedor');
        
        $fornecedor = $idFornecedor;
        
        if (!is_null($fornecedor)) {    
            $model = new fornecedorModel();
            $dados['idFornecedor'] = $fornecedor;             
            $model->delFornecedor($dados);
        }

        header('Location: /fornecedor');
    }

    public function relatoriofornecedor_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Fornecedores');
        $this->smarty->display('fornecedor/relatorio_pre.html');
    }

    public function relatoriofornecedor() {
        $this->template->run();

        $model = new fornecedorModel();
        $fornecedor_lista = $model->getFornecedor();
        //Passa a lista de registros
        $this->smarty->assign('fornecedor_lista', $fornecedor_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Fornecedores');
        $this->smarty->display('fornecedor/relatorio.html');
    }

}

?>