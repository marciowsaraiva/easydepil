<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipocliente extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipoclienteModel();
        $tipocliente_lista = $model->getTipoCliente();

        $this->smarty->assign('tipocliente_lista', $tipocliente_lista);
        $this->smarty->display('tipocliente/lista.html');
    }

//Funcao de Busca
    public function busca_tipocliente() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipoclienteModel();
        $sql = "stStatus <> 0 and upper(dsTipoCliente) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoCliente($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipocliente_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipocliente');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipocliente/lista.html');
        } else {
            $this->smarty->assign('tipocliente_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipocliente');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipocliente/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipocliente() {

        $idTipoCliente = $this->getParam('idTipoCliente');

        $model = new tipoclienteModel();

        if ($idTipoCliente > 0) {

            $registro = $model->getTipoCliente('idTipoCliente=' . $idTipoCliente);
            $registro = $registro[0]; //Passando TipoCliente
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipoclienteModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoCliente('idTipoCliente <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoCliente']] = $value['dsTipoCliente'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipocliente', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Cliente');
        $this->smarty->display('tipocliente/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipocliente() {
        $model = new tipoclienteModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoCliente'] == NULL)
            $model->settipocliente($data);
        else
            $model->updtipocliente($data); //update
        
        header('Location: /tipocliente');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoCliente'] = ($post['idTipoCliente'] != '') ? $post['idTipoCliente'] : null;
        $data['dsTipoCliente'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipocliente() {
                
        $idTipoCliente = $this->getParam('idTipoCliente');
        
        $tipocliente = $idTipoCliente;
        
        if (!is_null($tipocliente)) {    
            $model = new tipoclienteModel();
            $dados['idTipoCliente'] = $tipocliente;             
            $model->delTipoCliente($dados);
        }

        header('Location: /tipocliente');
    }

    public function relatoriotipocliente_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Cliente');
        $this->smarty->display('tipocliente/relatorio_pre.html');
    }

    public function relatoriotipocliente() {
        $this->template->run();

        $model = new tipoclienteModel();
        $tipocliente_lista = $model->getTipoCliente();
        //Passa a lista de registros
        $this->smarty->assign('tipocliente_lista', $tipocliente_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Cliente');
        $this->smarty->display('tipocliente/relatorio.html');
    }

}

?>