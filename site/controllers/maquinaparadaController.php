<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class maquinaparada extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new maquinaparadaModel();
        $maquinaparada_lista = $model->getMaquinaParada();

        $this->smarty->assign('maquinaparada_lista', $maquinaparada_lista);
        $this->smarty->display('maquinaparada/lista.html');
    }


//Funcao de Busca
    public function busca_maquinaparada() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new maquinaparadaModel();
        $sql = "upper(dsMaquinaParada) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getMaquinaParada($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('maquinaparada_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'maquinaparada');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('maquinaparada/lista.html');
        } else {
            $this->smarty->assign('maquinaparada_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'maquinaparada');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('maquinaparada/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_maquinaparada() {

        $idMaquinaParada = $this->getParam('idMaquinaParada');

        $model = new maquinaparadaModel();

        if ($idMaquinaParada > 0) {

            $registro = $model->getMaquinaParada('idMaquinaParada=' . $idMaquinaParada);
            $registro = $registro[0]; //Passando MaquinaParada
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        
        //Obter lista a de tipos fk
        $objLista = new maquinaparadaModel();
        //criar uma lista
        $lista_tipos = $objLista->getMaquinaParada('idMaquinaParada <> 0');
        foreach ($lista_tipos as $value) {
            $lista_tipos_log[$value['idMaquinaParada']] = $value['dsMaquinaParada'];
        }
        //Passar a lista de Tipo
        $this->smarty->assign('lista_maquinaparada', $lista_tipos);
        //var_dump($lista_tipos_log);die;
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'novo motivo baixa');
        $this->smarty->display('maquinaparada/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_maquinaparada() {
        $model = new maquinaparadaModel();

        $data = $this->trataPost($_POST);

        if ($data['idMaquinaParada'] == NULL)
            $model->setmaquinaparada($data);
        else
            $model->updmaquinaparada($data); //update
        
        header('Location: /maquinaparada');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idMaquinaParada'] = ($post['idMaquinaParada'] != '') ? $post['idMaquinaParada'] : null;
        $data['dsMaquinaParada'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        return $data;
    }

    // Remove Padrao
    public function delmaquinaparada() {
                
        $idMaquinaParada = $this->getParam('idMaquinaParada');
        
        $maquinaparada = $idMaquinaParada;
        
        if (!is_null($maquinaparada)) {    
            $model = new maquinaparadaModel();
            $dados['idMaquinaParada'] = $maquinaparada;             
            $model->delMaquinaParada($dados);
        }

        header('Location: /maquinaparada');
    }

    public function relatoriomaquinaparada_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio Motivo de Baixa');
        $this->smarty->display('maquinaparada/relatorio_pre.html');
    }

    public function relatoriomaquinaparada() {
        $this->template->run();

        $model = new maquinaparadaModel();
        $maquinaparada_lista = $model->getMaquinaParada();
        //Passa a lista de registros
        $this->smarty->assign('maquinaparada_lista', $maquinaparada_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Motivo de Baixa');
        $this->smarty->display('maquinaparada/relatorio.html');
    }

}

?>