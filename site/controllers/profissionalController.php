<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class profissional extends controller {

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new profissionalModel();
        $profissional_lista = $model->getProfissional();

        $this->smarty->assign('profissional_lista', $profissional_lista);
        $this->smarty->display('profissional/lista.html');
    }

//Funcao de Busca
    public function busca_profissional() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new profissionalModel();
        $sql = "stStatus <> 0 and upper(dsProfissional) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getProfissional($sql);
        if (sizeof($resultado) > 0) {
            $this->smarty->assign('profissional_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'profissional');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('profissional/lista.html');
        } else {
            $this->smarty->assign('profissional_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'profissional');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('profissional/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_profissional() {

        $idProfissional = $this->getParam('idProfissional');

        $model = new profissionalModel();

        if ($idProfissional > 0) {
            $registro = $model->getProfissional('a.idProfissional=' . $idProfissional);
            $registro = $registro[0]; //Passando Profissional
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
        $modelUsuario = new usuariosModel();
        $lista_usuarios = array('' => 'SELECIONE');
        foreach ($modelUsuario->getUsuario() as $value) {
            $lista_usuarios[$value['idUsuario']] = $value['dsUsuario'];
        }        
        
        $lista_fazparte = array('' => 'SELECIONE', '1' => 'SIM', '2' => 'NÃO');
        
        $this->smarty->assign('lista_usuarios', $lista_usuarios);
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('lista_fazparte', $lista_fazparte);
        $this->smarty->assign('title', 'Novo Profissional');
        $this->smarty->display('profissional/form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_profissional() {
        $model = new profissionalModel();

        $data = $this->trataPost($_POST);

        if ($data['idProfissional'] == NULL)
            $model->setprofissional($data);
        else
            $model->updprofissional($data); //update
        
        header('Location: /profissional');        
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idProfissional'] = ($post['idProfissional'] != '') ? $post['idProfissional'] : null;
        $data['dsProfissional'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['stFazParteAgenda'] = ($post['stFazParteAgenda'] != '') ? $post['stFazParteAgenda'] : null;
        $data['dsEmail'] = ($post['dsEmail'] != '') ? $post['dsEmail'] : null;
        $data['dsCargo'] = ($post['dsCargo'] != '') ? $post['dsCargo'] : null;
        $data['dsCelular'] = ($post['dsCelular'] != '') ? $post['dsCelular'] : null;
        $data['qtHorasDia'] = ($post['qtHorasDia'] != '') ? $post['qtHorasDia'] : null;
        $data['idUsuario'] = ($post['idUsuario'] != '') ? $post['idUsuario'] : null;
        return $data;
    }

    // Remove Padrao
    public function delprofissional() {
                
        $idProfissional = $this->getParam('idProfissional');
        
        $profissional = $idProfissional;
        
        if (!is_null($profissional)) {    
            $model = new profissionalModel();
            $dados['idProfissional'] = $profissional;             
            $model->delProfissional($dados);
        }

        header('Location: /profissional');
    }

    public function relatorioprofissional_pre() {
        $this->template->run();

        $this->smarty->assign('title', 'Pre Relatorio de Profissionales');
        $this->smarty->display('profissional/relatorio_pre.html');
    }

    public function relatorioprofissional() {
        $this->template->run();

        $model = new profissionalModel();
        $profissional_lista = $model->getProfissional();
        //Passa a lista de registros
        $this->smarty->assign('profissional_lista', $profissional_lista);
        $this->smarty->assign('titulo_relatorio');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio de Profissionais');
        $this->smarty->display('profissional/relatorio.html');
    }

}

?>