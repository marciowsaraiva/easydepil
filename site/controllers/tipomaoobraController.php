<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class tipomaoobra extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new tipomaoobraModel();
        $tipomaoobra_lista = $model->getTipoMaoObra();

        $this->smarty->assign('tipomaoobra_lista', $tipomaoobra_lista);
        $this->smarty->display('tipomaoobra/lista.html');
    }

//Funcao de Busca
    public function busca_tipomaoobra() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new tipomaoobraModel();
        $sql = "stStatus <> 0 and upper(dsTipoMaoObra) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getTipoMaoObra($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('tipomaoobra_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipomaoobra');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipomaoobra/lista.html');
        } else {
            $this->smarty->assign('tipomaoobra_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'tipomaoobra');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('tipomaoobra/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_tipomaoobra() {

        $idTipoMaoObra = $this->getParam('idTipoMaoObra');

        $model = new tipomaoobraModel();

        if ($idTipoMaoObra > 0) {

            $registro = $model->getTipoMaoObra('idTipoMaoObra=' . $idTipoMaoObra);
            $registro = $registro[0]; //Passando TipoMaoObra
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new tipomaoobraModel();
        //criar uma lista
        $lista_tipos = $objLista->getTipoMaoObra('idTipoMaoObra <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idTipoMaoObra']] = $value['dsTipoMaoObra'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_tipomaoobra', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Tipo de Mão de Obra');
        $this->smarty->display('tipomaoobra/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_tipomaoobra() {
        $model = new tipomaoobraModel();

        $data = $this->trataPost($_POST);

        if ($data['idTipoMaoObra'] == NULL)
            $model->settipomaoobra($data);
        else
            $model->updtipomaoobra($data); //update
        
        header('Location: /tipomaoobra');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idTipoMaoObra'] = ($post['idTipoMaoObra'] != '') ? $post['idTipoMaoObra'] : null;
        $data['dsTipoMaoObra'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function deltipomaoobra() {
                
        $idTipoMaoObra = $this->getParam('idTipoMaoObra');
        
        $tipomaoobra = $idTipoMaoObra;
        
        if (!is_null($tipomaoobra)) {    
            $model = new tipomaoobraModel();
            $dados['idTipoMaoObra'] = $tipomaoobra;             
            $model->delTipoMaoObra($dados);
        }

        header('Location: /tipomaoobra');
    }

    public function relatoriotipomaoobra_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Tipo de Mão de Obra');
        $this->smarty->display('tipomaoobra/relatorio_pre.html');
    }

    public function relatoriotipomaoobra() {
        $this->template->run();

        $model = new tipomaoobraModel();
        $tipomaoobra_lista = $model->getTipoMaoObra();
        //Passa a lista de registros
        $this->smarty->assign('tipomaoobra_lista', $tipomaoobra_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Tipo de Mão de Obra');
        $this->smarty->display('tipomaoobra/relatorio.html');
    }

}

?>