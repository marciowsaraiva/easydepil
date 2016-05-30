<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class marca extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new marcaModel();
        $marca_lista = $model->getMarca();

        $this->smarty->assign('marca_lista', $marca_lista);
        $this->smarty->display('marca/lista.html');
    }

//Funcao de Busca
    public function busca_marca() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new marcaModel();
        $sql = "stStatus <> 0 and upper(dsMarca) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMarca($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('marca_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'marca');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('marca/lista.html');
        } else {
            $this->smarty->assign('marca_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'marca');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('marca/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_marca() {

        $idMarca = $this->getParam('idMarca');

        $model = new marcaModel();

        if ($idMarca > 0) {

            $registro = $model->getMarca('idMarca=' . $idMarca);
            $registro = $registro[0]; //Passando Marca
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new marcaModel();
        //criar uma lista
        $lista_tipos = $objLista->getMarca('idMarca <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idMarca']] = $value['dsMarca'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_marca', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Nova Marca');
        $this->smarty->display('marca/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_marca() {
        $model = new marcaModel();

        $data = $this->trataPost($_POST);

        if ($data['idMarca'] == NULL)
            $model->setmarca($data);
        else
            $model->updmarca($data); //update
        
        header('Location: /marca');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idMarca'] = ($post['idMarca'] != '') ? $post['idMarca'] : null;
        $data['dsMarca'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delmarca() {
                
        $idMarca = $this->getParam('idMarca');
        
        $marca = $idMarca;
        
        if (!is_null($marca)) {    
            $model = new marcaModel();
            $dados['idMarca'] = $marca;             
            $model->delMarca($dados);
        }

        header('Location: /marca');
    }

    public function relatoriomarca_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Marcas');
        $this->smarty->display('marca/relatorio_pre.html');
    }

    public function relatoriomarca() {
        $this->template->run();

        $model = new marcaModel();
        $marca_lista = $model->getMarca();
        //Passa a lista de registros
        $this->smarty->assign('marca_lista', $marca_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Marcas');
        $this->smarty->display('marca/relatorio.html');
    }

}

?>