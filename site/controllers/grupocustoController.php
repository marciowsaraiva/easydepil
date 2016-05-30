<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class grupocusto extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new grupocustoModel();
        $grupocusto_lista = $model->getGrupoCusto();

        $this->smarty->assign('grupocusto_lista', $grupocusto_lista);
        $this->smarty->display('grupocusto/lista.html');
    }

//Funcao de Busca
    public function busca_grupocusto() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new grupocustoModel();
        $sql = "stStatus <> 0 and upper(dsGrupoCusto) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getGrupoCusto($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('grupocusto_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'grupocusto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('grupocusto/lista.html');
        } else {
            $this->smarty->assign('grupocusto_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'grupocusto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('grupocusto/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_grupocusto() {

        $idGrupoCusto = $this->getParam('idGrupoCusto');

        $model = new grupocustoModel();

        if ($idGrupoCusto > 0) {

            $registro = $model->getGrupoCusto('idGrupoCusto=' . $idGrupoCusto);
            $registro = $registro[0]; //Passando GrupoCusto
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new grupocustoModel();
        //criar uma lista
        $lista_tipos = $objLista->getGrupoCusto('idGrupoCusto <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idGrupoCusto']] = $value['dsGrupoCusto'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_grupocusto', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Grupo de Custo');
        $this->smarty->display('grupocusto/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_grupocusto() {
        $model = new grupocustoModel();

        $data = $this->trataPost($_POST);

        if ($data['idGrupoCusto'] == NULL)
            $model->setgrupocusto($data);
        else
            $model->updgrupocusto($data); //update
        
        header('Location: /grupocusto');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idGrupoCusto'] = ($post['idGrupoCusto'] != '') ? $post['idGrupoCusto'] : null;
        $data['dsGrupoCusto'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delgrupocusto() {
                
        $idGrupoCusto = $this->getParam('idGrupoCusto');
        
        $grupocusto = $idGrupoCusto;
        
        if (!is_null($grupocusto)) {    
            $model = new grupocustoModel();
            $dados['idGrupoCusto'] = $grupocusto;             
            $model->delGrupoCusto($dados);
        }

        header('Location: /grupocusto');
    }

    public function relatoriogrupocusto_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Grupo de Custos');
        $this->smarty->display('grupocusto/relatorio_pre.html');
    }

    public function relatoriogrupocusto() {
        $this->template->run();

        $model = new grupocustoModel();
        $grupocusto_lista = $model->getGrupoCusto();
        //Passa a lista de registros
        $this->smarty->assign('grupocusto_lista', $grupocusto_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Grupo de Custos');
        $this->smarty->display('grupocusto/relatorio.html');
    }

}

?>