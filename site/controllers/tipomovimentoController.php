<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipomovimento extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipomovimentoModel();
        $tipomovimento_lista = $model->getTipoMovimento();

        $this->smarty->assign('tipomovimento_lista', $tipomovimento_lista);
        $this->smarty->display('tipomovimento/lista.html');
    }

//Funcao de Busca
    public function busca_tipomovimento() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipomovimentoModel();
        $sql = "stStatus <> 0 and upper(dsTipoMovimento) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoMovimento($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipomovimento_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipomovimento');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipomovimento/lista.html');
        } else {
            $this->smarty->assign('tipomovimento_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipomovimento');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipomovimento/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipomovimento() {

        $idTipoMovimento = $this->getParam('idTipoMovimento');

        $model = new tipomovimentoModel();

        if ($idTipoMovimento > 0) {

            $registro = $model->getTipoMovimento('idTipoMovimento=' . $idTipoMovimento);
            $registro = $registro[0]; //Passando TipoMovimento
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipomovimentoModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoMovimento('idTipoMovimento <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoMovimento']] = $value['dsTipoMovimento'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipomovimento', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Movimento');
        $this->smarty->display('tipomovimento/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipomovimento() {
        $model = new tipomovimentoModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoMovimento'] == NULL)
            $model->settipomovimento($data);
        else
            $model->updtipomovimento($data); //update
        
        header('Location: /tipomovimento');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoMovimento'] = ($post['idTipoMovimento'] != '') ? $post['idTipoMovimento'] : null;
        $data['dsTipoMovimento'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['stDC'] = ($post['stDC'] != '') ? $post['stDC'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipomovimento() {
                
        $idTipoMovimento = $this->getParam('idTipoMovimento');
        
        $tipomovimento = $idTipoMovimento;
        
        if (!is_null($tipomovimento)) {    
            $model = new tipomovimentoModel();
            $dados['idTipoMovimento'] = $tipomovimento;             
            $model->delTipoMovimento($dados);
        }

        header('Location: /tipomovimento');
    }

    public function relatoriotipomovimento_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Movimento');
        $this->smarty->display('tipomovimento/relatorio_pre.html');
    }

    public function relatoriotipomovimento() {
        $this->template->run();

        $model = new tipomovimentoModel();
        $tipomovimento_lista = $model->getTipoMovimento();
        //Passa a lista de registros
        $this->smarty->assign('tipomovimento_lista', $tipomovimento_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Movimento');
        $this->smarty->display('tipomovimento/relatorio.html');
    }

}

?>