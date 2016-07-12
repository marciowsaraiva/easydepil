<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipodespesa extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipodespesaModel();
        $tipodespesa_lista = $model->getTipoDespesa();

        $this->smarty->assign('tipodespesa_lista', $tipodespesa_lista);
        $this->smarty->display('tipodespesa/lista.html');
    }

//Funcao de Busca
    public function busca_tipodespesa() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipodespesaModel();
        $sql = "stStatus <> 0 and upper(dsTipoDespesa) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoDespesa($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipodespesa_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipodespesa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipodespesa/lista.html');
        } else {
            $this->smarty->assign('tipodespesa_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipodespesa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipodespesa/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipodespesa() {

        $idTipoDespesa = $this->getParam('idTipoDespesa');

        $model = new tipodespesaModel();

        if ($idTipoDespesa > 0) {

            $registro = $model->getTipoDespesa('idTipoDespesa=' . $idTipoDespesa);
            $registro = $registro[0]; //Passando TipoDespesa
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipodespesaModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoDespesa('idTipoDespesa <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoDespesa']] = $value['dsTipoDespesa'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipodespesa', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Despesa');
        $this->smarty->display('tipodespesa/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipodespesa() {
        $model = new tipodespesaModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoDespesa'] == NULL)
            $model->settipodespesa($data);
        else
            $model->updtipodespesa($data); //update
        
        header('Location: /tipodespesa');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoDespesa'] = ($post['idTipoDespesa'] != '') ? $post['idTipoDespesa'] : null;
        $data['dsTipoDespesa'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipodespesa() {
                
        $idTipoDespesa = $this->getParam('idTipoDespesa');
        
        $tipodespesa = $idTipoDespesa;
        
        if (!is_null($tipodespesa)) {    
            $model = new tipodespesaModel();
            $dados['idTipoDespesa'] = $tipodespesa;             
            $model->delTipoDespesa($dados);
        }

        header('Location: /tipodespesa');
    }

    public function relatoriotipodespesa_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Despesa');
        $this->smarty->display('tipodespesa/relatorio_pre.html');
    }

    public function relatoriotipodespesa() {
        $this->template->run();

        $model = new tipodespesaModel();
        $tipodespesa_lista = $model->getTipoDespesa();
        //Passa a lista de registros
        $this->smarty->assign('tipodespesa_lista', $tipodespesa_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Despesa');
        $this->smarty->display('tipodespesa/relatorio.html');
    }

}

?>