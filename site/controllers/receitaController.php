<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class receita extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new receitaModel();
        $receita_lista = $model->getReceita();

        $this->smarty->assign('receita_lista', $receita_lista);
        $this->smarty->display('receita/lista.html');
    }

//Funcao de Busca
    public function busca_receita() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadsReceita']) ? $_POST['buscadsReceita'] : '';
        //$texto = '';
        $model = new receitaModel();
        $sql = "stStatus <> 0 and upper(dsReceita) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getReceita($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('receita_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'receita');
            $this->smarty->assign('buscadsReceita', $texto);
            $this->smarty->display('receita/lista.html');
        } else {
            $this->smarty->assign('receita_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'receita');
            $this->smarty->assign('buscadsReceita', $texto);
            $this->smarty->display('receita/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_receita() {

        $idReceita = $this->getParam('idReceita');

        $model = new receitaModel();

        if ($idReceita > 0) {
            $registro = $model->getReceita('idReceita=' . $idReceita);
            $registro = $registro[0]; //Passando Receita
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelTipoReceita = new tiporeceitaModel();
        $lista_TipoReceita = array('' => 'SELECIONE');
        foreach ($modelTipoReceita->getTipoReceita() as $value) {
            $lista_TipoReceita[$value['idTipoReceita']] = $value['dsTipoReceita'];
        }
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_tiporeceita', $lista_TipoReceita);
        $this->smarty->assign('title', 'Novo Receita');
        $this->smarty->display('receita/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_receita() {
        $model = new receitaModel();

        $data = $this->trataPost($_POST);

        if ($data['idReceita'] == NULL)
            $model->setreceita($data);
        else
            $model->updreceita($data); //update
        
        header('Location: /receita');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idReceita'] = ($post['idReceita'] != '') ? $post['idReceita'] : null;
        $data['dsReceita'] = ($post['dsReceita'] != '') ? $post['dsReceita'] : null;
        $data['idTipoReceita'] = ($post['idTipoReceita'] != '') ? $post['idTipoReceita'] : null;
        return $data;
    }

    // Remove Padrao
    public function delreceita() {
                
        $idReceita = $this->getParam('idReceita');
        
        $receita = $idReceita;
        
        if (!is_null($receita)) {    
            $model = new receitaModel();
            $dados['idReceita'] = $receita;             
            $model->delReceita($dados);
        }

        header('Location: /receita');
    }

    public function relatorioreceita_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Receitas');
        $this->smarty->display('receita/relatorio_pre.html');
    }

    public function relatorioreceita() {
        $this->template->run();

        $model = new receitaModel();
        $receita_lista = $model->getReceita();
        //Passa a lista de registros
        $this->smarty->assign('receita_lista', $receita_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Receitas');
        $this->smarty->display('receita/relatorio.html');
    }

}

?>