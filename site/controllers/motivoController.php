<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class motivo extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new motivoModel();
        $motivo_lista = $model->getMotivo();

        $this->smarty->assign('motivo_lista', $motivo_lista);
        $this->smarty->display('motivo/lista.html');
    }


//Funcao de Busca
    public function busca_motivo() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new motivoModel();
        $sql = "upper(dsMotivo) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMotivo($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('motivo_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'motivo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('motivo/lista.html');
        } else {
            $this->smarty->assign('motivo_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'motivo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('motivo/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_motivo() {

        $idMotivo = $this->getParam('idMotivo');

        $model = new motivoModel();

        if ($idMotivo > 0) {

            $registro = $model->getMotivo('idMotivo=' . $idMotivo);
            $registro = $registro[0]; //Passando Motivo
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new motivoModel();
        //criar uma lista
        $lista_tipos = $objLista->getMotivo('idMotivo <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idMotivo']] = $value['dsMotivo'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_motivo', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'novo motivo');
        $this->smarty->display('motivo/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_motivo() {
        $model = new motivoModel();

        $data = $this->trataPost($_POST);

        if ($data['idMotivo'] == NULL)
            $model->setmotivo($data);
        else
            $model->updmotivo($data); //update
        
        header('Location: /motivo');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idMotivo'] = ($post['idMotivo'] != '') ? $post['idMotivo'] : null;
        $data['dsMotivo'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delmotivo() {
                
        $idMotivo = $this->getParam('idMotivo');
        
        $motivo = $idMotivo;
        
        if (!is_null($motivo)) {    
            $model = new motivoModel();
            $dados['idMotivo'] = $motivo;             
            $model->delMotivo($dados);
        }

        header('Location: /motivo');
    }

    public function relatoriomotivo_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio motivo');
        $this->smarty->display('motivo/relatorio_pre.html');
    }

    public function relatoriomotivo() {
        $this->template->run();

        $model = new motivoModel();
        $motivo_lista = $model->getMotivo();
        //Passa a lista de registros
        $this->smarty->assign('motivo_lista', $motivo_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Motivos');
        $this->smarty->display('motivo/relatorio.html');
    }

}

?>