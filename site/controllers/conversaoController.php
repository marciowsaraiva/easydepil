<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class conversao extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new conversaoModel();
        $conversao_lista = $model->getConversao();

        $this->smarty->assign('conversao_lista', $conversao_lista);
        $this->smarty->display('conversao/lista.html');
    }

//Funcao de Busca
    public function busca_conversao() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new conversaoModel();
        $sql = "stStatus <> 0 and upper(dsConversao) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getConversao($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('conversao_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'conversao');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('conversao/lista.html');
        } else {
            $this->smarty->assign('conversao_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'conversao');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('conversao/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_conversao() {

        $idConversao = $this->getParam('idConversao');

        $model = new conversaoModel();

        if ($idConversao > 0) {
            $registro = $model->getConversao('idConversao=' . $idConversao);
            $registro = $registro[0]; //Passando Conversao
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelUnidade = new unidadeModel();
        $lista_unidadeorigem = array('' => 'SELECIONE');
        $lista_unidadedestino = array('' => 'SELECIONE');
        foreach ($modelUnidade->getUnidade() as $value) {
            $lista_unidadeorigem[$value['idUnidade']] = $value['dsUnidade'];
        }
        foreach ($modelUnidade->getUnidade() as $value) {
            $lista_unidadedestino[$value['idUnidade']] = $value['dsUnidade'];
        }
        
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_unidadeorigem', $lista_unidadeorigem);
        $this->smarty->assign('lista_unidadedestino', $lista_unidadedestino);
        $this->smarty->assign('title', 'Nova Conversao');
        $this->smarty->display('conversao/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_conversao() {
        $model = new conversaoModel();

        $data = $this->trataPost($_POST);

        if ($data['idConversao'] == NULL)
            $model->setconversao($data);
        else
            $model->updconversao($data); //update
        
        header('Location: /conversao');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idConversao'] = ($post['idConversao'] != '') ? $post['idConversao'] : null;
        $data['dsConversao'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['idUnidadeOrigem'] = ($post['idUnidadeOrigem'] != '') ? $post['idUnidadeOrigem'] : null;
        $data['idUnidadeDestino'] = ($post['idUnidadeDestino'] != '') ? $post['idUnidadeDestino'] : null;
        $data['sinal'] = ($post['sinal'] != '') ? $post['sinal'] : null;
        $data['valordaconversao'] = ($post['valordaconversao'] != '') ? $post['valordaconversao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delconversao() {
                
        $idConversao = $this->getParam('idConversao');
        
        $conversao = $idConversao;
        
        if (!is_null($conversao)) {    
            $model = new conversaoModel();
            $dados['idConversao'] = $conversao;             
            $model->delConversao($dados);
        }

        header('Location: /conversao');
    }

    public function relatorioconversao_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Fator de Conversao');
        $this->smarty->display('conversao/relatorio_pre.html');
    }

    public function relatorioconversao() {
        $this->template->run();

        $model = new conversaoModel();
        $conversao_lista = $model->getConversao();
        //Passa a lista de registros
        $this->smarty->assign('conversao_lista', $conversao_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Fator de Conversao');
        $this->smarty->display('conversao/relatorio.html');
    }

}

?>