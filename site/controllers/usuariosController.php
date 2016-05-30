<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class usuarios extends controller {

    public function index_action() {

        //Inicializa o Template
        $this->template->run();

        $model = new usuariosModel();
        $sql = "L.stStatus = 1"; //somente os nao excluidos
        $usuarios_lista = $model->getUsuario($sql);
        
        //Passa a lista de registros
        $this->smarty->assign('usuarios_lista', $usuarios_lista);
        //Chama o Smarty
        $this->smarty->display('usuarios/usuarios_lista.html');
    }

    public function ajax_retorno_lista() {

        $model = new usuariosModel();
        $sql = "L.stStatus <> 0"; //somente os nao excluidos
        $usuarios_lista = $model->getUsuario($sql);
//        $x = 0;
//        foreach ($usuarios_lista as $reg) {
//            $usuarios_lista[$x]['descricao'] = '';
//            $x++;
//        }
        //Passa a lista de registros
        $this->smarty->assign('usuarios_lista', $usuarios_lista);
        //Chama o Smarty
        $this->smarty->display('usuarios/ajax_retorno_lista.html');
    }

    public function ajax_contador() {

        //$resposta = array('stStatus' =>0,'contador '=>null);

        $model = new usuariosModel();

        $sql = "L.stStatus <> 0"; //somente os nao excluidos

        $usuarios_lista = $model->getUsuario($sql);

        $contador = $model->countRows();
        //Passa a lista de registros

        $resposta = array('stStatus' => 1, 'contador ' => $contador);

        echo json_encode($resposta);
    }

    public function ajax_processa() {
        sleep(3);
        $mensagem = $_REQUEST['msg'];
        $ret = 1;

        if ($mensagem == 'EXIT')
            $ret = 0;

        $resposta = array('ret' => $ret, 'mensagem' => $mensagem);

        echo json_encode($resposta);
    }

    //Funcao de Busca
    public function busca_usuario() {

        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscamensagem']) ? $_POST['buscamensagem'] : '';
        //$texto = '';
        $model = new usuariosModel();
        $sql = "L.stStatus <> 0 and upper(L.nome) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getUsuario($sql);

        //var_dump($resultado);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('usuarios_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'Usuario');
            $this->smarty->assign('buscamensagem', $texto);
            $this->smarty->display('usuarios/usuarios_lista.html');
        } else {
            $this->smarty->assign('usuarios_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'Usuario');
            $this->smarty->assign('buscamensagem', $texto);
            $this->smarty->display('usuarios/usuarios_lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_usuario() {

        $idUsuario = $this->getParam('idUsuario');

        $model = new usuariosModel();

        if ($idUsuario > 0) {

            $registro = $model->getUsuario('idUsuario=' . $idUsuario);
            $registro = $registro[0];

            //Abrir o dataset dos Projetos do Usuario
            $objUsuarioProjeto = new usuario_projetoModel();
            $lista_de_up = $objUsuarioProjeto->getclinProjetoUsuario('UP.idUsuario = ' . $idUsuario);
            if (isset($lista_de_up)) {
                $this->smarty->assign('lista_de_up', $lista_de_up);
            } else {
                $this->smarty->assign('lista_de_up', null);
            }

            $excluidos = '';
            $where_in = '';
            foreach ($lista_de_up as $value) {
                if ($excluidos == '') {
                    $excluidos = $value['idProjeto'];
                } else {
                    $excluidos = $excluidos . ',' . $value['idProjeto'];
                }
            }
            if ($excluidos != '') {
                $where_in = 'and idProjeto not in (' . $excluidos . ')';
            }
            $this->smarty->assign('lista_clinProjetoUsuarios', $lista_de_up);

            //Abrir o dataset Projetos para Popular a listas                     
            $lista_Projetos = null;
            $objProjetos = new projetoModel;

            if ($where_in <> '') {
                $lista_Projeto = $objProjetos->getprojeto('stStatus > 0 ' . $where_in);
            } else {
                $lista_Projeto = $objProjetos->getprojeto('stStatus > 0 ');
            }

            foreach ($lista_Projeto as $value) {
                $lista_Projetos[$value['idProjeto']] = $value['nome'];
            }
            $this->smarty->assign('lista_Projetos', $lista_Projetos);
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }


        //Obter lista a de Perfis do Usuario fk
        $objPerfil_Usuario = new usuario_perfilModel;
        if ($idUsuario > 0) {
            $lista_Perfil_Usuario = $objPerfil_Usuario->getUsuarioPerfil('UP.idUsuario=' . $idUsuario . ' and UP.stStatus <> 0');
        } else {
            $lista_Perfil_Usuario = $objPerfil_Usuario->getUsuarioPerfil('UP.idUsuario= 0 and UP.stStatus <> 0');
        }

        $excluidos = '';
        $where_in = '';
        foreach ($lista_Perfil_Usuario as $value) {

            if ($excluidos == '')
                $excluidos = $value['idPerfil'];
            else
                $excluidos = $excluidos . ',' . $value['idPerfil'];
        }
        if ($excluidos != '')
            $where_in = 'and idPerfil not in (' . $excluidos . ')';

        $this->smarty->assign('lista_Perfil_Usuario', $lista_Perfil_Usuario);

        //Abrir o dataset Menus para Popular a listas                     
        $lista_Perfis = null;
        $objPerfil = new perfilModel;

        if ($where_in <> '') {
            $lista_Perfil = $objPerfil->getPerfil('stStatus > 0 ' . $where_in);
        } else {
            $lista_Perfil = $objPerfil->getPerfil('stStatus > 0 ');
        }

        foreach ($lista_Perfil as $value) {
            $lista_Perfis[$value['idPerfil']] = $value['descricao'];
        }
        $this->smarty->assign('lista_Perfis', $lista_Perfis);

        //Obter lista a de tipos fk
        $objTipo = new usuarios_tipoModel();
        //criar uma lista
        $lista_tipo = $objTipo->getUsuariosTipo();
        if ($lista_tipo) {
            foreach ($lista_tipo as $value) {
                $lista_tipos[$value['idTipoUsuario']] = $value['dsTipoUsuario'];
            }
        }
        $this->smarty->assign('lista_tipos', $lista_tipos);

        //Passar a lista de Tipo
        //$this->smarty->assign('lista_usuario_perfil', $lista_Perfil_Usuario);
        //$this->smarty->assign('lista_perfis', $lista_Perfis);  
        //$this->smarty->assign('lista_tipos', $lista_tipos);
        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Usuario');
        $this->smarty->display('usuarios/usuarios_form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_usuario() {
//        var_dump($_POST);die;
        
        $model = new usuariosModel();

        $data = $this->trataPost($_POST);

        if ($data['idUsuario'] == NULL)
            $model->setUsuario($data);
        else
            $model->updUsuario($data); //update

        header('Location: /usuarios');
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['idUsuario'] = ($post['idUsuario'] != '') ? $post['idUsuario'] : null;
        $data['nome'] = ($post['nome'] != '') ? $post['nome'] : null;
        $data['email'] = ($post['email'] != '') ? $post['email'] : null;
        $data['senha'] = ($post['senha'] != '') ? $post['senha'] : null;
        $data['idTipoUsuario'] = ($post['idTipoUsuario'] != '') ? $post['idTipoUsuario'] : null;
        $data['id_parceiro'] = ($post['id_parceiro'] != '') ? $post['id_parceiro'] : null;
        $data['telefone1'] = ($post['telefone1'] != '') ? $post['telefone1'] : null;
        $data['telefone2'] = ($post['telefone2'] != '') ? $post['telefone2'] : null;
        $data['stStatus'] = ($post['stStatus'] != '') ? $post['stStatus'] : 1;
        $data['idProjeto'] = ($post['idProjeto'] != '') ? $post['idProjeto'] : null;
        $data['id_motorista'] = ($post['id_motorista'] != '') ? $post['id_motorista'] : null;
        return $data;
    }

    // Remove Padrao
    public function del_usuario() {
        $idUsuario = $this->getParam('idUsuario');
        $usuario = $idUsuario;

        // Removendo Perfis
        $objPerfil_Usuario = new usuario_perfilModel;
        $lista_Perfil_Usuario = $objPerfil_Usuario->getUsuario_perfil('UP.idUsuario=' . $idUsuario);
        foreach ($lista_Perfil_Usuario as $value) {
            if (isset($value['idUsuario'])) {
                $dadosPerfil['idUsuario_perfil'] = $value['idUsuario_perfil'];
                $dadosPerfil['idPerfil'] = $value['idPerfil'];
                $dadosPerfil['idUsuario'] = $value['idUsuario'];
                $dadosPerfil['stStatus'] = $value['stStatus'];
                $objmodel = new usuario_perfilModel();
                $objmodel->delUsuario_perfil($dadosPerfil);
            }
        }

        // Removendo Projetos
        $objProjeto_Usuario = new clinProjetoUsuarioModel;
        $lista_Projeto_Usuario = $objProjeto_Usuario->getclinProjetoUsuario('UP.idUsuario=' . $idUsuario);
        foreach ($lista_Projeto_Usuario as $value) {
            if (isset($value['idUsuario'])) {
                $dadosProjeto['idProjeto'] = $value['idProjeto'];
                $dadosProjeto['idUsuario'] = $value['idUsuario'];
                $objProjeto = new clinProjetoUsuarioModel();
                $objProjeto->delclinProjetoUsuario($dadosProjeto);
            }
        }

        // Removendo Usuario
        if (!is_null($usuario)) {
            $model = new usuariosModel();
            $dados['idUsuario'] = $usuario;
            $retorno = $model->delUsuario($dados);
        }

        header('Location: /usuarios');
    }

    //Funcao de Inserir Perfis
    public function novo_usuario_perfil() {

        //inserir o Perfis do Usuario
        $idPerfil = $_POST['idPerfil_usuario'];
        $idUsuario = $_POST['idUsuario_perfil'];

        $dados['idPerfil'] = $idPerfil;
        $dados['idUsuario'] = $idUsuario;
        $objmodel = new usuario_perfilModel();
        $objmodel->setUsuario_perfil($dados);

        header('Location: /usuarios/novo_usuario/idUsuario/' . $idUsuario);
    }

    //Funcao de Inserir Projetos
    public function novo_clinProjetoUsuario() {

        //inserir o Projetos do Usuario
        $idProjeto = $_POST['idProjeto'];
        $idUsuario = $_POST['idUsuario'];

        $dados['idProjeto'] = $idProjeto;
        $dados['idUsuario'] = $idUsuario;
        $objmodel = new clinProjetoUsuarioModel();
        $objmodel->setclinProjetoUsuario($dados);

        header('Location: /usuarios/novo_usuario/idUsuario/' . $idUsuario);
    }

    public function usuario_navegacao() {
        //Caso exista pega a pagina atual se nao deixa o padrao 1
        $pagina = ($this->getParam('pagina') == '') ? 1 : $this->getParam('pagina');

        //Navegacao   
        $navigation_log = new paginadorPHP();
        $navigation_log->limite = 5; //Quantos registros irão aparecer na lista de cada vez
        $navigation_log->url = '/log/log_navegacao'; //url dos links       

        $navigation_log->setPaginaAtual($pagina); //Passa a página atual
        //Busca os dados do banco
        $model = new usuariosModel();
        $sql = "L.stStatus <> 0"; //somente os nao excluidos
        //Lembre-se de preparar seu model para receber a clausula LIMIT!        
        $usuario_lista = $model->getusuario($sql, 'L.idUsuario', $pagina . ',' . $navigation_log->limite);
        //Informe quantos registros existem na tabela
        $navigation_log->TotalDeRegistros = $model->TotalDeRegistros();
        $navigation_log->gerar(); //prepara variaveis
        //chama o View

        $this->template->run();
        $this->smarty->assign('results', $usuario_lista);
        $this->smarty->assign('title', 'Usuarios');
        $this->smarty->display('usuarios/usuario_navegacao.tpl');
    }

    // Funcao de Remover Perfis
    public function del_usuario_perfil() {

        $dados = array();
        $dados['idPerfil'] = $this->getParam('idPerfil');
        $dados['idUsuario'] = $this->getParam('idUsuario');

        $objmodel = new usuario_perfilModel();

        $objmodel->delUsuario_perfil($dados);

        //Volta para a tela de Edição
        header('Location: /usuarios/novo_usuario/idUsuario/' . $dados['idUsuario']);
    }

    // Funcao de Remover Perfis
    public function del_clinProjetoUsuario() {

        //inserir o menu item
        $idProjeto = $this->getParam('idProjeto');
        $idUsuario = $this->getParam('idUsuario');
        $dados['idProjeto'] = $idProjeto;
        $dados['idUsuario'] = $idUsuario;
        $objmodel = new clinProjetoUsuarioModel();
        $objmodel->delclinProjetoUsuario($dados);
        //Volta para a tela de Edição
        header('Location: /usuarios/novo_usuario/idUsuario/' . $idUsuario);
    }
    
       // Funcao de Remover Perfis
    public function del_usuario_perfil_email() {

        $dados = array();
        $dados['idPerfil'] = $this->getParam('idPerfil');
        $dados['idUsuario'] = $this->getParam('idUsuario');

        $objmodel = new usuario_perfilModel();

        $objmodel->delUsuario_perfil($dados);

    }

    // Funcao de Remover Perfis
    public function del_clinProjetoUsuario_email() {

        //inserir o menu item
        $idProjeto = $this->getParam('idProjeto');
        $idUsuario = $this->getParam('idUsuario');
        $dados['idProjeto'] = $idProjeto;
        $dados['idUsuario'] = $idUsuario;
        $objmodel = new clinProjetoUsuarioModel();
        $objmodel->delclinProjetoUsuario($dados);

    }
    
    
    

    public function relatorio001_pre() {
        //gerar o relatorio
        //Inicializa o Template
        $this->template->run();

        //Chama o Smarty
        $this->smarty->assign('title', 'Pr&eacute; Relat&oacute;rio 001');
        $this->smarty->display('usuarios/relatorio001_pre.html');
    }

    public function relatorio001() {


        //gerar o relatorio
        //Inicializa o Template

        $this->template->run();

        $model = new usuariosModel();
        $sql = "L.stStatus <> 0"; //somente os nao excluidos
        $usuarios_lista = $model->getUsuario($sql);
        //Passa a lista de registros
        $this->smarty->assign('usuarios_lista', $usuarios_lista);

        $this->smarty->assign('titulo_relatorio', 'Lista Completa');
        //Chama o Smarty
        $this->smarty->assign('title', 'Relatorio 001 do Usu&aacute;rios');
        $this->smarty->display('usuarios/relatorio001.html');
    }

    //Exclui e retorna um texto
    public function zeraUsuarios() {
        //sleep(5);//Simular demora para fins didaticos
        $usuario_o = new usuariosModel;
        $usuario_o->delete('usuarios', 'idUsuario>0');
        //Insere uma linha no log avisando que foi zerado
        $usuario_o->logPadrao('Arquivo de Usuario excluido. ', 8);
    }

}

?>