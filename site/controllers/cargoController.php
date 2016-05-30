<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class cargo extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new cargoModel();
        $cargo_lista = $model->getCargo();

        $this->smarty->assign('cargo_lista', $cargo_lista);
        $this->smarty->display('cargo/lista.html');
    }

//Funcao de Busca
    public function busca_Cargo() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new cargoModel();
        $sql = "stStatus <> 0 and upper(dsCargo) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getCargo($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('cargo_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'cargo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('cargo/lista.html');
        } else {
            $this->smarty->assign('cargo_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'cargo');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('cargo/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_Cargo() {

        $idCargo = $this->getParam('idCargo');

        $model = new cargoModel();

        if ($idCargo > 0) {

            $registro = $model->getCargo('idCargo=' . $idCargo);
            $registro = $registro[0]; //Passando Cargo
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new cargoModel();
        //criar uma lista
        $lista_tipos = $objLista->getCargo('idCargo <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idCargo']] = $value['dsCargo'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_cargo', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Cargo');
        $this->smarty->display('cargo/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_Cargo() {
        $model = new cargoModel();

        $data = $this->trataPost($_POST);

        if ($data['idCargo'] == NULL)
            $model->setCargo($data);
        else
            $model->updCargo($data); //update
        
        header('Location: /cargo');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idCargo'] = ($post['idCargo'] != '') ? $post['idCargo'] : null;
        $data['dsCargo'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delCargo() {
                
        $idCargo = $this->getParam('idCargo');
        
        $Cargo = $idCargo;
        
        if (!is_null($Cargo)) {    
            $model = new cargoModel();
            $dados['idCargo'] = $Cargo;             
            $model->delCargo($dados);
        }

        header('Location: /cargo');
    }

    public function relatorioCargo_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Cargos');
        $this->smarty->display('cargo/relatorio_pre.html');
    }

    public function relatorioCargo() {
        $this->template->run();

        $model = new cargoModel();
        $cargo_lista = $model->getCargo();
        //Passa a lista de registros
        $this->smarty->assign('cargo_lista', $cargo_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Cargos');
        $this->smarty->display('cargo/relatorio.html');
    }

}

?>