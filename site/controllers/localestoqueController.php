<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class localestoque extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new localestoqueModel();
        $localestoque_lista = $model->getLocalEstoque();

        $this->smarty->assign('localestoque_lista', $localestoque_lista);
        $this->smarty->display('localestoque/lista.html');
    }

//Funcao de Busca
    public function busca_localestoque() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new localestoqueModel();
        $sql = "stStatus <> 0 and upper(dsLocalEstoque) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getLocalEstoque($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('localestoque_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'localestoque');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('localestoque/lista.html');
        } else {
            $this->smarty->assign('localestoque_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'localestoque');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('localestoque/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_localestoque() {

        $idLocalEstoque = $this->getParam('idLocalEstoque');

        $model = new localestoqueModel();

        if ($idLocalEstoque > 0) {

            $registro = $model->getLocalEstoque('idLocalEstoque=' . $idLocalEstoque);
            $registro = $registro[0]; //Passando LocalEstoque
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new localestoqueModel();
        //criar uma lista
        $lista_tipos = $objLista->getLocalEstoque('idLocalEstoque <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idLocalEstoque']] = $value['dsLocalEstoque'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_localestoque', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Local de Estoque');
        $this->smarty->display('localestoque/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_localestoque() {
        $model = new localestoqueModel();

        $data = $this->trataPost($_POST);

        if ($data['idLocalEstoque'] == NULL)
            $model->setlocalestoque($data);
        else
            $model->updlocalestoque($data); //update
        
        header('Location: /localestoque');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idLocalEstoque'] = ($post['idLocalEstoque'] != '') ? $post['idLocalEstoque'] : null;
        $data['dsLocalEstoque'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function dellocalestoque() {
                
        $idLocalEstoque = $this->getParam('idLocalEstoque');
        
        $localestoque = $idLocalEstoque;
        
        if (!is_null($localestoque)) {    
            $model = new localestoqueModel();
            $dados['idLocalEstoque'] = $localestoque;             
            $model->delLocalEstoque($dados);
        }

        header('Location: /localestoque');
    }

    public function relatoriolocalestoque_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Local Estoque');
        $this->smarty->display('localestoque/relatorio_pre.html');
    }

    public function relatoriolocalestoque() {
        $this->template->run();

        $model = new localestoqueModel();
        $localestoque_lista = $model->getLocalEstoque();
        //Passa a lista de registros
        $this->smarty->assign('localestoque_lista', $localestoque_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Local de Estoques');
        $this->smarty->display('localestoque/relatorio.html');
    }

}

?>