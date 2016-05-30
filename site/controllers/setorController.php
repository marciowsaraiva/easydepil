<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class setor extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new setorModel();
        $setor_lista = $model->getSetor();

        $this->smarty->assign('setor_lista', $setor_lista);
        $this->smarty->display('setor/lista.html');
    }

//Funcao de Busca
    public function busca_setor() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new setorModel();
        $sql = "stStatus <> 0 and upper(dsSetor) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getSetor($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('setor_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'setor');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('setor/lista.html');
        } else {
            $this->smarty->assign('setor_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'setor');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('setor/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_setor() {

        $idSetor = $this->getParam('idSetor');

        $model = new setorModel();

        if ($idSetor > 0) {

            $registro = $model->getSetor('idSetor=' . $idSetor);
            $registro = $registro[0]; //Passando Setor
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new setorModel();
        //criar uma lista
        $lista_tipos = $objLista->getSetor('idSetor <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idSetor']] = $value['dsSetor'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_setor', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Nova Setor');
        $this->smarty->display('setor/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_setor() {
        $model = new setorModel();

        $data = $this->trataPost($_POST);

        if ($data['idSetor'] == NULL)
            $model->setsetor($data);
        else
            $model->updsetor($data); //update
        
        header('Location: /setor');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idSetor'] = ($post['idSetor'] != '') ? $post['idSetor'] : null;
        $data['dsSetor'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delsetor() {
                
        $idSetor = $this->getParam('idSetor');
        
        $setor = $idSetor;
        
        if (!is_null($setor)) {    
            $model = new setorModel();
            $dados['idSetor'] = $setor;             
            $model->delSetor($dados);
        }

        header('Location: /setor');
    }

    public function relatoriosetor_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Setores');
        $this->smarty->display('setor/relatorio_pre.html');
    }

    public function relatoriosetor() {
        $this->template->run();

        $model = new setorModel();
        $setor_lista = $model->getSetor();
        //Passa a lista de registros
        $this->smarty->assign('setor_lista', $setor_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Setores');
        $this->smarty->display('setor/relatorio.html');
    }

}

?>