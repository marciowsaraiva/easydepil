<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class cliente extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new clienteModel();
        $cliente_lista = $model->getCliente();

        $this->smarty->assign('cliente_lista', $cliente_lista);
        $this->smarty->display('cliente/lista.html');
    }

//Funcao de Busca
    public function busca_cliente() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new clienteModel();
        $sql = "stStatus <> 0 and upper(dsCliente) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getCliente($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('cliente_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'cliente');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('cliente/lista.html');
        } else {
            $this->smarty->assign('cliente_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'cliente');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('cliente/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_cliente() {

        $idCliente = $this->getParam('idCliente');

        $model = new clienteModel();

        if ($idCliente > 0) {
            $registro = $model->getCliente('idCliente=' . $idCliente);
            $registro = $registro[0]; //Passando Cliente
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelTipoF = new tipoclienteModel();
        $lista_tipo = array('' => 'SELECIONE');
        foreach ($modelTipoF->getTipoCliente() as $value) {
            $lista_tipo[$value['idTipoCliente']] = $value['dsTipoCliente'];
        }
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_tipo', $lista_tipo);
        $this->smarty->assign('title', 'Novo Cliente');
        $this->smarty->display('cliente/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_cliente() {
        $model = new clienteModel();

        $data = $this->trataPost($_POST);

        if ($data['idCliente'] == NULL) {
            $data['idStatusCliente'] = 1;
            $model->setcliente($data); 
        } else {
            $model->updcliente($data); //update
        }
        
        header('Location: /cliente');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idCliente'] = ($post['idCliente'] != '') ? $post['idCliente'] : null;
        $data['dsCliente'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['dsContato'] = ($post['dsContato'] != '') ? $post['dsContato'] : null;
        $data['dsFone'] = ($post['dsFone'] != '') ? $post['dsFone'] : null;
        $data['dsEmail'] = ($post['dsEmail'] != '') ? $post['dsEmail'] : null;
        $data['dsCelular'] = ($post['dsCelular'] != '') ? $post['dsCelular'] : null;
        $data['dsFoneContato'] = ($post['dsFoneContato'] != '') ? $post['dsFoneContato'] : null;
        $data['dsBairro'] = ($post['dsBairro'] != '') ? $post['dsBairro'] : null;
        $data['dsEndereco'] = ($post['dsEndereco'] != '') ? $post['dsEndereco'] : null;
        $data['dsCidade'] = ($post['dsCidade'] != '') ? $post['dsCidade'] : null;
        $data['cdCEP'] = ($post['cdCEP'] != '') ? $post['cdCEP'] : null;
        $data['cdUF'] = ($post['cdUF'] != '') ? $post['cdUF'] : null;
        $data['cdCNPJ'] = ($post['cdCNPJ'] != '') ? $post['cdCNPJ'] : null;
        $data['nrRG'] = ($post['nrRG'] != '') ? $post['nrRG'] : null;
        $data['dtNascimento'] = ($post['dtNascimento'] != '') ? $post['dtNascimento'] : null;
        $data['nrProntuario'] = ($post['nrProntuario'] != '') ? $post['nrProntuario'] : null;
        $data['idTipoCliente'] = ($post['idTipoCliente'] != '') ? $post['idTipoCliente'] : null;
        return $data;
    }

    // Remove Padrao
    public function delcliente() {
                
        $idCliente = $this->getParam('idCliente');
        
        $cliente = $idCliente;
        
        if (!is_null($cliente)) {    
            $model = new clienteModel();
            $dados['idCliente'] = $cliente;             
            $model->delCliente($dados);
        }

        header('Location: /cliente');
    }

    public function relatoriocliente_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Clientes');
        $this->smarty->display('cliente/relatorio_pre.html');
    }

    public function relatoriocliente() {
        $this->template->run();

        $model = new clienteModel();
        $cliente_lista = $model->getCliente();
        //Passa a lista de registros
        $this->smarty->assign('cliente_lista', $cliente_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Clientes');
        $this->smarty->display('cliente/relatorio.html');
    }

}

?>