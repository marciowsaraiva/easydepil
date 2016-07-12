<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tiporeceita extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tiporeceitaModel();
        $tiporeceita_lista = $model->getTipoReceita();

        $this->smarty->assign('tiporeceita_lista', $tiporeceita_lista);
        $this->smarty->display('tiporeceita/lista.html');
    }

//Funcao de Busca
    public function busca_tiporeceita() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tiporeceitaModel();
        $sql = "stStatus <> 0 and upper(dsTipoReceita) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoReceita($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tiporeceita_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tiporeceita');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tiporeceita/lista.html');
        } else {
            $this->smarty->assign('tiporeceita_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tiporeceita');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tiporeceita/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tiporeceita() {

        $idTipoReceita = $this->getParam('idTipoReceita');

        $model = new tiporeceitaModel();

        if ($idTipoReceita > 0) {

            $registro = $model->getTipoReceita('idTipoReceita=' . $idTipoReceita);
            $registro = $registro[0]; //Passando TipoReceita
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tiporeceitaModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoReceita('idTipoReceita <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoReceita']] = $value['dsTipoReceita'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tiporeceita', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Receita');
        $this->smarty->display('tiporeceita/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tiporeceita() {
        $model = new tiporeceitaModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoReceita'] == NULL)
            $model->settiporeceita($data);
        else
            $model->updtiporeceita($data); //update
        
        header('Location: /tiporeceita');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoReceita'] = ($post['idTipoReceita'] != '') ? $post['idTipoReceita'] : null;
        $data['dsTipoReceita'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltiporeceita() {
                
        $idTipoReceita = $this->getParam('idTipoReceita');
        
        $tiporeceita = $idTipoReceita;
        
        if (!is_null($tiporeceita)) {    
            $model = new tiporeceitaModel();
            $dados['idTipoReceita'] = $tiporeceita;             
            $model->delTipoReceita($dados);
        }

        header('Location: /tiporeceita');
    }

    public function relatoriotiporeceita_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Receita');
        $this->smarty->display('tiporeceita/relatorio_pre.html');
    }

    public function relatoriotiporeceita() {
        $this->template->run();

        $model = new tiporeceitaModel();
        $tiporeceita_lista = $model->getTipoReceita();
        //Passa a lista de registros
        $this->smarty->assign('tiporeceita_lista', $tiporeceita_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Receita');
        $this->smarty->display('tiporeceita/relatorio.html');
    }

}

?>