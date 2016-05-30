<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class maquinamudanca extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new maquinaModel();
        $maquinamudanca_lista = $model->getMaquina();

        $this->smarty->assign('maquinamudanca_lista', $maquinamudanca_lista);
        $this->smarty->display('maquinamudanca/lista.html');
    }

//Funcao de Busca
    public function busca_maquina() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new maquinaModel();
        $sql = "stStatus <> 0 and upper(dsMaquina) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMaquina($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('maquinamudanca_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'maquina');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('maquinamudanca/lista.html');
        } else {
            $this->smarty->assign('maquinamudanca_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'maquina');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('maquinamudanca/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_maquinamudanca() {

        $idMaquina = $this->getParam('idMaquina');

        $model = new maquinaModel();

        if ($idMaquina > 0) {
            $registro = $model->getMaquina('a.idMaquina=' . $idMaquina);
            $registro = $registro[0]; //Passando Maquina
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $lista_maquina = array('' => 'SELECIONE');
        foreach ($model->getMaquina() as $value) {
            $lista_maquina[$value['idMaquina']] = $value['dsMaquina'];
        }
        $modelMarca = new marcaModel();
        $lista_marca = array('' => 'SELECIONE');
        foreach ($modelMarca->getMarca() as $value) {
            $lista_marca[$value['idMarca']] = $value['dsMarca'];
        }
        $modelModelo = new modeloModel();
        $lista_modelo = array('' => 'SELECIONE');
        foreach ($modelModelo->getModelo() as $value) {
            $lista_modelo[$value['idModelo']] = $value['dsModelo'];
        }
        $modelGCusto = new grupocustoModel();
        $lista_grupocusto = array('' => 'SELECIONE');
        foreach ($modelGCusto->getGrupoCusto() as $value) {
            $lista_grupocusto[$value['idGrupoCusto']] = $value['dsGrupoCusto'];
        }
        $modelSetor = new setorModel();
        $lista_setor = array('' => 'SELECIONE');
        foreach ($modelSetor->getSetor() as $value) {
            $lista_setor[$value['idSetor']] = $value['dsSetor'];
        }
        
        $modelStatus = new statusmaquinaModel();
        $lista_status = array('' => 'SELECIONE');
        foreach ($modelStatus->getStatusMaquina() as $value) {
            $lista_status[$value['idStatusMaquina']] = $value['dsStatusMaquina'];
        }
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_maquina', $lista_maquina);
        $this->smarty->assign('lista_marca', $lista_marca);
        $this->smarty->assign('lista_modelo', $lista_modelo);
        $this->smarty->assign('lista_grupocusto', $lista_grupocusto);
        $this->smarty->assign('lista_setor', $lista_setor);
        $this->smarty->assign('lista_status', $lista_status);
        $this->smarty->assign('title', 'Mudança de Status Maquina');
        $this->smarty->display('maquinamudanca/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_maquina() {
        $model = new maquinaModel();
        $data = $this->trataPost($_POST);
        $model->updmaquina($data); //update
      //  print_a_die($data);
        $datastatus = array(
            'idMaquinaMudancaStatus' => null,
            'dtMudanca' => date('Y-m-d h:m:s'),
            'idMaquina' => $data['idMaquina'],
            'idStatusMaquina' => $data['idStatusMaquina'],
            'idUsuario' => $_SESSION["user"]["usuario"],
            'dsObservacao' => $_POST['dsObservacao'],
            'idOrigemInformacao' => 1
        );
    //    print_a_die($datastatus);
        $model->setNovoStatusMaquina($datastatus); //inserir uma nova linha na tabela de mudanças de status da maquina
        
        header('Location: /maquinamudanca');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idMaquina'] = ($post['idMaquina'] != '') ? $post['idMaquina'] : null;
        $data['idStatusMaquina'] = ($post['idStatusMaquina'] != '') ? $post['idStatusMaquina'] : null;
        return $data;
    }

    public function relatoriomaquina_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Maquinas');
        $this->smarty->display('maquinamudanca/relatorio_pre.html');
    }

    public function relatoriomaquina() {
        $this->template->run();

        $model = new maquinaModel();
        $maquinamudanca_lista = $model->getMaquina();
        //Passa a lista de registros
        $this->smarty->assign('maquinamudanca_lista', $maquinamudanca_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Maquinas');
        $this->smarty->display('maquinamudanca/relatorio.html');
    }

}

?>