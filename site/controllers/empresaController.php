<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class empresa extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new empresaModel();
        $empresa_lista = $model->getEmpresa();

        $this->smarty->assign('empresa_lista', $empresa_lista);
        $this->smarty->display('empresa/lista.html');
    }

//Funcao de Busca
    public function busca_empresa() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new empresaModel();
        $sql = "stStatus <> 0 and upper(dsEmpresa) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getEmpresa($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('empresa_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'empresa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('empresa/lista.html');
        } else {
            $this->smarty->assign('empresa_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'empresa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('empresa/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_empresa() {

        $idEmpresa = $this->getParam('idEmpresa');

        $model = new empresaModel();

        if ($idEmpresa > 0) {

            $registro = $model->getEmpresa('idEmpresa=' . $idEmpresa);
            $registro = $registro[0]; //Passando Empresa
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new empresaModel();
        //criar uma lista
        $lista_tipos = $objLista->getEmpresa('idEmpresa <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idEmpresa']] = $value['dsEmpresa'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_empresa', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Nova Empresa');
        $this->smarty->display('empresa/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_empresa() {
        $model = new empresaModel();

        $data = $this->trataPost($_POST);

        if ($data['idEmpresa'] == NULL)
            $model->setempresa($data);
        else
            $model->updempresa($data); //update
        
        header('Location: /empresa');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idEmpresa'] = ($post['idEmpresa'] != '') ? $post['idEmpresa'] : null;
        $data['dsEmpresa'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delempresa() {
                
        $idEmpresa = $this->getParam('idEmpresa');
        
        $empresa = $idEmpresa;
        
        if (!is_null($empresa)) {    
            $model = new empresaModel();
            $dados['idEmpresa'] = $empresa;             
            $model->delEmpresa($dados);
        }

        header('Location: /empresa');
    }

    public function relatorioempresa_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Empresas');
        $this->smarty->display('empresa/relatorio_pre.html');
    }

    public function relatorioempresa() {
        $this->template->run();

        $model = new empresaModel();
        $empresa_lista = $model->getEmpresa();
        //Passa a lista de registros
        $this->smarty->assign('empresa_lista', $empresa_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Empresas');
        $this->smarty->display('empresa/relatorio.html');
    }

}

?>