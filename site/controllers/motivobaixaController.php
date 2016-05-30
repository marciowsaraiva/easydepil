<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class motivobaixa extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new motivobaixaModel();
        $motivobaixa_lista = $model->getMotivoBaixa();

        $this->smarty->assign('motivobaixa_lista', $motivobaixa_lista);
        $this->smarty->display('motivobaixa/lista.html');
    }


//Funcao de Busca
    public function busca_motivobaixa() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new motivobaixaModel();
        $sql = "upper(dsMotivoBaixa) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMotivoBaixa($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('motivobaixa_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'motivobaixa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('motivobaixa/lista.html');
        } else {
            $this->smarty->assign('motivobaixa_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'motivobaixa');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('motivobaixa/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_motivobaixa() {

        $idMotivoBaixa = $this->getParam('idMotivoBaixa');

        $model = new motivobaixaModel();

        if ($idMotivoBaixa > 0) {

            $registro = $model->getMotivoBaixa('idMotivoBaixa=' . $idMotivoBaixa);
            $registro = $registro[0]; //Passando MotivoBaixa
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new motivobaixaModel();
        //criar uma lista
        $lista_tipos = $objLista->getMotivoBaixa('idMotivoBaixa <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idMotivoBaixa']] = $value['dsMotivoBaixa'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_motivobaixa', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'novo motivo baixa');
        $this->smarty->display('motivobaixa/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_motivobaixa() {
        $model = new motivobaixaModel();

        $data = $this->trataPost($_POST);

        if ($data['idMotivoBaixa'] == NULL)
            $model->setmotivobaixa($data);
        else
            $model->updmotivobaixa($data); //update
        
        header('Location: /motivobaixa');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idMotivoBaixa'] = ($post['idMotivoBaixa'] != '') ? $post['idMotivoBaixa'] : null;
        $data['dsMotivoBaixa'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delmotivobaixa() {
                
        $idMotivoBaixa = $this->getParam('idMotivoBaixa');
        
        $motivobaixa = $idMotivoBaixa;
        
        if (!is_null($motivobaixa)) {    
            $model = new motivobaixaModel();
            $dados['idMotivoBaixa'] = $motivobaixa;             
            $model->delMotivoBaixa($dados);
        }

        header('Location: /motivobaixa');
    }

    public function relatoriomotivobaixa_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio Motivo de Baixa');
        $this->smarty->display('motivobaixa/relatorio_pre.html');
    }

    public function relatoriomotivobaixa() {
        $this->template->run();

        $model = new motivobaixaModel();
        $motivobaixa_lista = $model->getMotivoBaixa();
        //Passa a lista de registros
        $this->smarty->assign('motivobaixa_lista', $motivobaixa_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Motivo de Baixa');
        $this->smarty->display('motivobaixa/relatorio.html');
    }

}

?>