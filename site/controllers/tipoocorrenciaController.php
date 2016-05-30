<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipoocorrencia extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipoocorrenciaModel();
        $tipoocorrencia_lista = $model->getTipoOcorrencia();

        $this->smarty->assign('tipoocorrencia_lista', $tipoocorrencia_lista);
        $this->smarty->display('tipoocorrencia/lista.html');
    }

//Funcao de Busca
    public function busca_tipoocorrencia() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipoocorrenciaModel();
        $sql = "stStatus <> 0 and upper(dsTipoOcorrencia) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoOcorrencia($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipoocorrencia_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipoocorrencia');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipoocorrencia/lista.html');
        } else {
            $this->smarty->assign('tipoocorrencia_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipoocorrencia');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipoocorrencia/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipoocorrencia() {

        $idTipoOcorrencia = $this->getParam('idTipoOcorrencia');

        $model = new tipoocorrenciaModel();

        if ($idTipoOcorrencia > 0) {

            $registro = $model->getTipoOcorrencia('idTipoOcorrencia=' . $idTipoOcorrencia);
            $registro = $registro[0]; //Passando TipoOcorrencia
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipoocorrenciaModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoOcorrencia('idTipoOcorrencia <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoOcorrencia']] = $value['dsTipoOcorrencia'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipoocorrencia', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Ocorrencia');
        $this->smarty->display('tipoocorrencia/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipoocorrencia() {
        $model = new tipoocorrenciaModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoOcorrencia'] == NULL)
            $model->settipoocorrencia($data);
        else
            $model->updtipoocorrencia($data); //update
        
        header('Location: /tipoocorrencia');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoOcorrencia'] = ($post['idTipoOcorrencia'] != '') ? $post['idTipoOcorrencia'] : null;
        $data['dsTipoOcorrencia'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipoocorrencia() {
                
        $idTipoOcorrencia = $this->getParam('idTipoOcorrencia');
        
        $tipoocorrencia = $idTipoOcorrencia;
        
        if (!is_null($tipoocorrencia)) {    
            $model = new tipoocorrenciaModel();
            $dados['idTipoOcorrencia'] = $tipoocorrencia;             
            $model->delTipoOcorrencia($dados);
        }

        header('Location: /tipoocorrencia');
    }

    public function relatoriotipoocorrencia_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Ocorrencia');
        $this->smarty->display('tipoocorrencia/relatorio_pre.html');
    }

    public function relatoriotipoocorrencia() {
        $this->template->run();

        $model = new tipoocorrenciaModel();
        $tipoocorrencia_lista = $model->getTipoOcorrencia();
        //Passa a lista de registros
        $this->smarty->assign('tipoocorrencia_lista', $tipoocorrencia_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Ocorrencia');
        $this->smarty->display('tipoocorrencia/relatorio.html');
    }

}

?>