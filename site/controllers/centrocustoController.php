<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class centrocusto extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new centrocustoModel();
        $centrocusto_lista = $model->getCentroCusto();

        $this->smarty->assign('centrocusto_lista', $centrocusto_lista);
        $this->smarty->display('centrocusto/lista.html');
    }

//Funcao de Busca
    public function busca_centrocusto() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new centrocustoModel();
        $sql = "stStatus <> 0 and upper(dsCentroCusto) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getCentroCusto($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('centrocusto_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'centrocusto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('centrocusto/lista.html');
        } else {
            $this->smarty->assign('centrocusto_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'centrocusto');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('centrocusto/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_centrocusto() {

        $idCentroCusto = $this->getParam('idCentroCusto');

        $model = new centrocustoModel();

        if ($idCentroCusto > 0) {

            $registro = $model->getCentroCusto('idCentroCusto=' . $idCentroCusto);
            $registro = $registro[0]; //Passando CentroCusto
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new centrocustoModel();
        //criar uma lista
        $lista_tipos = $objLista->getCentroCusto('idCentroCusto <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idCentroCusto']] = $value['dsCentroCusto'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_centrocusto', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Nova CentroCusto');
        $this->smarty->display('centrocusto/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_centrocusto() {
        $model = new centrocustoModel();

        $data = $this->trataPost($_POST);

        if ($data['idCentroCusto'] == NULL)
            $model->setcentrocusto($data);
        else
            $model->updcentrocusto($data); //update
        
        header('Location: /centrocusto');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idCentroCusto'] = ($post['idCentroCusto'] != '') ? $post['idCentroCusto'] : null;
        $data['dsCentroCusto'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delcentrocusto() {
                
        $idCentroCusto = $this->getParam('idCentroCusto');
        
        $centrocusto = $idCentroCusto;
        
        if (!is_null($centrocusto)) {    
            $model = new centrocustoModel();
            $dados['idCentroCusto'] = $centrocusto;             
            $model->delCentroCusto($dados);
        }

        header('Location: /centrocusto');
    }

    public function relatoriocentrocusto_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Centro de Custos');
        $this->smarty->display('centrocusto/relatorio_pre.html');
    }

    public function relatoriocentrocusto() {
        $this->template->run();

        $model = new centrocustoModel();
        $centrocusto_lista = $model->getCentroCusto();
        //Passa a lista de registros
        $this->smarty->assign('centrocusto_lista', $centrocusto_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Centro de Custos');
        $this->smarty->display('centrocusto/relatorio.html');
    }

}

?>