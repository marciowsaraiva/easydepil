<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class padrao extends controller {

    public function index_action() {
        $this->template->fetchJS('/files/js/padrao/padrao.js');
        $this->template->run();

        $model = new padraoModel();
        $sql = "stStatus <> 0"; //somente os nao excluidos
        $padrao_lista_array = $model->getPadrao();
        //var_dump($padrao_lista_array);die;
        foreach ($padrao_lista_array as $value) {
            $padrao_lista[$value['id_padrao']] = $value['descricao'];
        }


        $this->smarty->assign('padrao_lista', $padrao_lista_array);

        $this->smarty->display('padrao/padrao_lista.html');
    }

//Funcao de Busca
    public function busca_padrao() {
        $texto = $_REQUEST['texto'];
        $idEmpresa = $_REQUEST['idEmpresa'];

        $model = new padraoesModel();
        $sql = "upper(co.nome) like upper('%" . $texto . "%') and emp.idEmpresa=" . $idEmpresa . '  and col_sta_id <> 4';
        $resultado = $model->getColaboradores($sql);
        if (sizeof($resultado) > 0) {
            $this->smarty->assign('padrao_lista', $resultado);
            $tabela_html = $this->smarty->fetch('padrao/grid_padrao.tpl');
            echo $tabela_html;
        } else {
            echo '<tr><td colspan="3">A Busca não retornou resultados.</td><tr>';
        }
    }

    //Funcao de Inserir
    public function novo_padrao() {

        $idColaborador = $this->getParam('idColaborador');
        $idColaborador = ($idColaborador == true) ? $idColaborador : NULL;
        $model = new padraoModel();
        $registro = $model->getPadrao(NULL, NULL, $idColaborador);


        $this->smarty->assign('lista_padrao', $lista_padrao);

        $this->smarty->assign('registro', $registro[0]);

        $this->smarty->display('padrao/form_novo_padrao.tpl');
    }

    // Gravar Padrao
    public function gravar_padrao() {
        $model = new padraoesModel();
        $data = $this->trataPost($_POST);
        if ($data['id_padrao'] == NULL)
            $model->setColaborador($data);
        else
            $model->updColaborador($data);
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['id_padrao'] = ($post['id_padrao'] != '') ? $post['id_padrao'] : null;
        $data['descricao'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delPadrao() {
        $id_padrao = $this->getParam('id_padrao');
        if (!is_null($id_padrao)) {
            $model = new padraoModel();
            $dados['id_padrao'] = $id_padrao;
            $retorno = $model->delPadrao($dados);
            echo $retorno;
        }
    }

}

?>