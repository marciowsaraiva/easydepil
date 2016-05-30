<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class grupo extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new grupoModel();
        $grupo_lista = $model->getGrupo();

        $this->smarty->assign('grupo_lista', $grupo_lista);
        $this->smarty->display('grupo/lista.html');
    }

//Funcao de Busca
    public function busca_grupo() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new grupoModel();
        $sql = "stStatus <> 0 and upper(dsGrupo) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getGrupo($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('grupo_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'grupo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('grupo/lista.html');
        } else {
            $this->smarty->assign('grupo_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'grupo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('grupo/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_grupo() {

        $idGrupo = $this->getParam('idGrupo');

        $model = new grupoModel();

        if ($idGrupo > 0) {

            $registro = $model->getGrupo('idGrupo=' . $idGrupo);
            $registro = $registro[0]; //Passando Grupo
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new grupoModel();
        //criar uma lista
        $lista_tipos = $objLista->getGrupo('idGrupo <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idGrupo']] = $value['dsGrupo'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_grupo', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Grupo');
        $this->smarty->display('grupo/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_grupo() {
        $model = new grupoModel();

        $data = $this->trataPost($_POST);

        if ($data['idGrupo'] == NULL)
            $model->setgrupo($data);
        else
            $model->updgrupo($data); //update
        
        header('Location: /grupo');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idGrupo'] = ($post['idGrupo'] != '') ? $post['idGrupo'] : null;
        $data['dsGrupo'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delgrupo() {
                
        $idGrupo = $this->getParam('idGrupo');
        
        $grupo = $idGrupo;
        
        if (!is_null($grupo)) {    
            $model = new grupoModel();
            $dados['idGrupo'] = $grupo;             
            $model->delGrupo($dados);
        }

        header('Location: /grupo');
    }

    public function relatoriogrupo_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Grupos de Insumos/Produtos');
        $this->smarty->display('grupo/relatorio_pre.html');
    }

    public function relatoriogrupo() {
        $this->template->run();

        $model = new grupoModel();
        $grupo_lista = $model->getGrupo();
        //Passa a lista de registros
        $this->smarty->assign('grupo_lista', $grupo_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Grupos de Insumos/Produtos');
        $this->smarty->display('grupo/relatorio.html');
    }

}

?>