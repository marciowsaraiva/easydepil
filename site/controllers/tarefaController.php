<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tarefa extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tarefaModel();
        $tarefa_lista = $model->getTarefa();

        $this->smarty->assign('tarefa_lista', $tarefa_lista);
        $this->smarty->display('tarefa/lista.html');
    }

//Funcao de Busca
    public function busca_tarefa() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tarefaModel();
        $sql = "stStatus <> 0 and upper(dsTarefa) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTarefa($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tarefa_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tarefa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tarefa/lista.html');
        } else {
            $this->smarty->assign('tarefa_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tarefa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tarefa/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tarefa() {

        $idTarefa = $this->getParam('idTarefa');

        $model = new tarefaModel();

        if ($idTarefa > 0) {

            $registro = $model->getTarefa('idTarefa=' . $idTarefa);
            $registro = $registro[0]; //Passando Tarefa
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tarefaModel();
        //criar uma lista
        $lista_tipos = $objLista->getTarefa('idTarefa <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTarefa']] = $value['dsTarefa'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tarefa', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tarefa');
        $this->smarty->display('tarefa/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tarefa() {
        $model = new tarefaModel();

        $data = $this->trataPost($_POST);

        if ($data['idTarefa'] == NULL)
            $model->settarefa($data);
        else
            $model->updtarefa($data); //update
        
        header('Location: /tarefa');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTarefa'] = ($post['idTarefa'] != '') ? $post['idTarefa'] : null;
        $data['dsTarefa'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltarefa() {
                
        $idTarefa = $this->getParam('idTarefa');
        
        $tarefa = $idTarefa;
        
        if (!is_null($tarefa)) {    
            $model = new tarefaModel();
            $dados['idTarefa'] = $tarefa;             
            $model->delTarefa($dados);
        }

        header('Location: /tarefa');
    }

    public function relatoriotarefa_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tarefas');
        $this->smarty->display('tarefa/relatorio_pre.html');
    }

    public function relatoriotarefa() {
        $this->template->run();

        $model = new tarefaModel();
        $tarefa_lista = $model->getTarefa();
        //Passa a lista de registros
        $this->smarty->assign('tarefa_lista', $tarefa_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tarefas');
        $this->smarty->display('tarefa/relatorio.html');
    }

}

?>