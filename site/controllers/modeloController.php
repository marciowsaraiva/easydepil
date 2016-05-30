<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class modelo extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new modeloModel();
        $modelo_lista = $model->getModelo();

        $this->smarty->assign('modelo_lista', $modelo_lista);
        $this->smarty->display('modelo/lista.html');
    }

//Funcao de Busca
    public function busca_modelo() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new modeloModel();
        $sql = "stStatus <> 0 and upper(dsModelo) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getModelo($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('modelo_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'modelo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('modelo/lista.html');
        } else {
            $this->smarty->assign('modelo_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'modelo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('modelo/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_modelo() {

        $idModelo = $this->getParam('idModelo');

        $model = new modeloModel();

        if ($idModelo > 0) {

            $registro = $model->getModelo('idModelo=' . $idModelo);
            $registro = $registro[0]; //Passando Modelo
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new modeloModel();
        //criar uma lista
        $lista_tipos = $objLista->getModelo('idModelo <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idModelo']] = $value['dsModelo'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_modelo', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Modelo');
        $this->smarty->display('modelo/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_modelo() {
        $model = new modeloModel();

        $data = $this->trataPost($_POST);

        if ($data['idModelo'] == NULL)
            $model->setmodelo($data);
        else
            $model->updmodelo($data); //update
        
        header('Location: /modelo');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idModelo'] = ($post['idModelo'] != '') ? $post['idModelo'] : null;
        $data['dsModelo'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delmodelo() {
                
        $idModelo = $this->getParam('idModelo');
        
        $modelo = $idModelo;
        
        if (!is_null($modelo)) {    
            $model = new modeloModel();
            $dados['idModelo'] = $modelo;             
            $model->delModelo($dados);
        }

        header('Location: /modelo');
    }

    public function relatoriomodelo_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Modelos');
        $this->smarty->display('modelo/relatorio_pre.html');
    }

    public function relatoriomodelo() {
        $this->template->run();

        $model = new modeloModel();
        $modelo_lista = $model->getModelo();
        //Passa a lista de registros
        $this->smarty->assign('modelo_lista', $modelo_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Modelos');
        $this->smarty->display('modelo/relatorio.html');
    }

}

?>