<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipofalha extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipofalhaModel();
        $tipofalha_lista = $model->getTipoFalha();

        $this->smarty->assign('tipofalha_lista', $tipofalha_lista);
        $this->smarty->display('tipofalha/lista.html');
    }

//Funcao de Busca
    public function busca_tipofalha() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipofalhaModel();
        $sql = "stStatus <> 0 and upper(dsTipoFalha) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoFalha($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipofalha_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipofalha');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipofalha/lista.html');
        } else {
            $this->smarty->assign('tipofalha_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipofalha');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipofalha/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipofalha() {

        $idTipoFalha = $this->getParam('idTipoFalha');

        $model = new tipofalhaModel();

        if ($idTipoFalha > 0) {

            $registro = $model->getTipoFalha('idTipoFalha=' . $idTipoFalha);
            $registro = $registro[0]; //Passando TipoFalha
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipofalhaModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoFalha('idTipoFalha <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoFalha']] = $value['dsTipoFalha'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipofalha', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Falha');
        $this->smarty->display('tipofalha/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipofalha() {
        $model = new tipofalhaModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoFalha'] == NULL)
            $model->settipofalha($data);
        else
            $model->updtipofalha($data); //update
        
        header('Location: /tipofalha');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoFalha'] = ($post['idTipoFalha'] != '') ? $post['idTipoFalha'] : null;
        $data['dsTipoFalha'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipofalha() {
                
        $idTipoFalha = $this->getParam('idTipoFalha');
        
        $tipofalha = $idTipoFalha;
        
        if (!is_null($tipofalha)) {    
            $model = new tipofalhaModel();
            $dados['idTipoFalha'] = $tipofalha;             
            $model->delTipoFalha($dados);
        }

        header('Location: /tipofalha');
    }

    public function relatoriotipofalha_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Falha');
        $this->smarty->display('tipofalha/relatorio_pre.html');
    }

    public function relatoriotipofalha() {
        $this->template->run();

        $model = new tipofalhaModel();
        $tipofalha_lista = $model->getTipoFalha();
        //Passa a lista de registros
        $this->smarty->assign('tipofalha_lista', $tipofalha_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Falha');
        $this->smarty->display('tipofalha/relatorio.html');
    }

}

?>