<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class osgrupo extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new osgrupoModel();
        $osgrupo_lista = $model->getOSGrupo();

        $this->smarty->assign('osgrupo_lista', $osgrupo_lista);
        $this->smarty->display('osgrupo/lista.html');
    }

//Funcao de Busca
    public function busca_osgrupo() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new osgrupoModel();
        $sql = "stStatus <> 0 and upper(dsOSGrupo) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getOSGrupo($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('osgrupo_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'osgrupo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('osgrupo/lista.html');
        } else {
            $this->smarty->assign('osgrupo_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'osgrupo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('osgrupo/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_osgrupo() {

        $idOSGrupo = $this->getParam('idOSGrupo');

        $model = new osgrupoModel();

        if ($idOSGrupo > 0) {

            $registro = $model->getOSGrupo('idOSGrupo=' . $idOSGrupo);
            $registro = $registro[0]; //Passando OSGrupo
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new osgrupoModel();
        //criar uma lista
        $lista_tipos = $objLista->getOSGrupo('idOSGrupo <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idOSGrupo']] = $value['dsOSGrupo'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_osgrupo', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo OSGrupo');
        $this->smarty->display('osgrupo/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_osgrupo() {
        $model = new osgrupoModel();

        $data = $this->trataPost($_POST);

        if ($data['idOSGrupo'] == NULL)
            $model->setosgrupo($data);
        else
            $model->updosgrupo($data); //update
        
        header('Location: /osgrupo');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idOSGrupo'] = ($post['idOSGrupo'] != '') ? $post['idOSGrupo'] : null;
        $data['dsOSGrupo'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delosgrupo() {
                
        $idOSGrupo = $this->getParam('idOSGrupo');
        
        $osgrupo = $idOSGrupo;
        
        if (!is_null($osgrupo)) {    
            $model = new osgrupoModel();
            $dados['idOSGrupo'] = $osgrupo;             
            $model->delOSGrupo($dados);
        }

        header('Location: /osgrupo');
    }

    public function relatorioosgrupo_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de OSGrupos de Insumos/Produtos');
        $this->smarty->display('osgrupo/relatorio_pre.html');
    }

    public function relatorioosgrupo() {
        $this->template->run();

        $model = new osgrupoModel();
        $osgrupo_lista = $model->getOSGrupo();
        //Passa a lista de registros
        $this->smarty->assign('osgrupo_lista', $osgrupo_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de OSGrupos de Insumos/Produtos');
        $this->smarty->display('osgrupo/relatorio.html');
    }

}

?>