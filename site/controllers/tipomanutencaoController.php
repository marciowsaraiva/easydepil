<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipomanutencao extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipomanutencaoModel();
        $tipomanutencao_lista = $model->getTipoManutencao();

        $this->smarty->assign('tipomanutencao_lista', $tipomanutencao_lista);
        $this->smarty->display('tipomanutencao/lista.html');
    }

//Funcao de Busca
    public function busca_tipomanutencao() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipomanutencaoModel();
        $sql = "stStatus <> 0 and upper(dsTipoManutencao) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoManutencao($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipomanutencao_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipomanutencao');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipomanutencao/lista.html');
        } else {
            $this->smarty->assign('tipomanutencao_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipomanutencao');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipomanutencao/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipomanutencao() {

        $idTipoManutencao = $this->getParam('idTipoManutencao');

        $model = new tipomanutencaoModel();

        if ($idTipoManutencao > 0) {

            $registro = $model->getTipoManutencao('idTipoManutencao=' . $idTipoManutencao);
            $registro = $registro[0]; //Passando TipoManutencao
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipomanutencaoModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoManutencao('idTipoManutencao <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoManutencao']] = $value['dsTipoManutencao'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipomanutencao', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Manutencao');
        $this->smarty->display('tipomanutencao/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipomanutencao() {
        $model = new tipomanutencaoModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoManutencao'] == NULL)
            $model->settipomanutencao($data);
        else
            $model->updtipomanutencao($data); //update
        
        header('Location: /tipomanutencao');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoManutencao'] = ($post['idTipoManutencao'] != '') ? $post['idTipoManutencao'] : null;
        $data['dsTipoManutencao'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipomanutencao() {
                
        $idTipoManutencao = $this->getParam('idTipoManutencao');
        
        $tipomanutencao = $idTipoManutencao;
        
        if (!is_null($tipomanutencao)) {    
            $model = new tipomanutencaoModel();
            $dados['idTipoManutencao'] = $tipomanutencao;             
            $model->delTipoManutencao($dados);
        }

        header('Location: /tipomanutencao');
    }

    public function relatoriotipomanutencao_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Manutencao');
        $this->smarty->display('tipomanutencao/relatorio_pre.html');
    }

    public function relatoriotipomanutencao() {
        $this->template->run();

        $model = new tipomanutencaoModel();
        $tipomanutencao_lista = $model->getTipoManutencao();
        //Passa a lista de registros
        $this->smarty->assign('tipomanutencao_lista', $tipomanutencao_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Manutencao');
        $this->smarty->display('tipomanutencao/relatorio.html');
    }

}

?>