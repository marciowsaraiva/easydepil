<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class maoobra extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new maoobraModel();
        $maoobra_lista = $model->getMaoObra();

        $this->smarty->assign('maoobra_lista', $maoobra_lista);
        $this->smarty->display('maoobra/lista.html');
    }

//Funcao de Busca
    public function busca_maoobra() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new maoobraModel();
        $sql = "stStatus <> 0 and upper(dsMaoObra) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMaoObra($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('maoobra_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'maoobra');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('maoobra/lista.html');
        } else {
            $this->smarty->assign('maoobra_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'maoobra');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('maoobra/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_maoobra() {

        $idMaoObra = $this->getParam('idMaoObra');

        $model = new maoobraModel();

        if ($idMaoObra > 0) {
            $registro = $model->getMaoObra('idMaoObra=' . $idMaoObra);
            $registro = $registro[0]; //Passando MaoObra
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelGrupo = new tipomaoobraModel();
        $lista_grupo = array('' => 'SELECIONE');
        foreach ($modelGrupo->getTipoMaoObra() as $value) {
            $lista_grupo[$value['idTipoMaoObra']] = $value['dsTipoMaoObra'];
        }
        $modelUnidade = new unidadeModel();
        $lista_unidade = array('' => 'SELECIONE');
        foreach ($modelUnidade->getUnidade() as $value) {
            $lista_unidade[$value['idUnidade']] = $value['dsUnidade'];
        }
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_tipomaodeobra', $lista_grupo);
        $this->smarty->assign('lista_unidade', $lista_unidade);
        $this->smarty->assign('title', 'Novo MaoObra');
        $this->smarty->display('maoobra/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_maoobra() {
        $model = new maoobraModel();

        $data = $this->trataPost($_POST);

        if ($data['idMaoObra'] == NULL)
            $model->setmaoobra($data);
        else
            $model->updmaoobra($data); //update
        
        header('Location: /maoobra');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idMaoObra'] = ($post['idMaoObra'] != '') ? $post['idMaoObra'] : null;
        $data['dsMaoObra'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['idUnidade'] = ($post['idUnidade'] != '') ? $post['idUnidade'] : null;
        $data['idTipoMaoObra'] = ($post['idTipoMaoObra'] != '') ? $post['idTipoMaoObra'] : null;
        $data['vlUnitario'] = ($post['vlUnitario'] != '') ? $post['vlUnitario'] : null;
        return $data;
    }

    // Remove Padrao
    public function delmaoobra() {
                
        $idMaoObra = $this->getParam('idMaoObra');
        
        $maoobra = $idMaoObra;
        
        if (!is_null($maoobra)) {    
            $model = new maoobraModel();
            $dados['idMaoObra'] = $maoobra;             
            $model->delMaoObra($dados);
        }

        header('Location: /maoobra');
    }

    public function relatoriomaoobra_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de MaoObras');
        $this->smarty->display('maoobra/relatorio_pre.html');
    }

    public function relatoriomaoobra() {
        $this->template->run();

        $model = new maoobraModel();
        $maoobra_lista = $model->getMaoObra();
        //Passa a lista de registros
        $this->smarty->assign('maoobra_lista', $maoobra_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de MaoObras');
        $this->smarty->display('maoobra/relatorio.html');
    }

}

?>