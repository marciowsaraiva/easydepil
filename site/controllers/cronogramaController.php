<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class cronograma extends controller {

    public function index_action() {

        //Inicializa o Template
        $this->template->run();

        $model = new cronogramaModel();
        if($_SESSION['user']['tipousuario'] == 1 || $_SESSION['user']['tipousuario'] == 3){
            $sql = "C.stStatus <> 0"; //somente os nao excluidos
        }else{
            $sql = "C.stStatus <> 0 and C.idProjeto=" . $_SESSION['user']['projeto']['idProjeto']; //somente os nao excluidos
        }
        
        $cronograma_lista = $model->getCronograma($sql);
        
//        var_dump($cronograma_lista); die;
        //Passa a lista de registros
        $this->smarty->assign('cronograma_lista', $cronograma_lista);
        //Chama o Smarty
        $this->smarty->assign('title', 'Cronograma');
        $this->smarty->display('cronograma/cronograma_lista.html');
    }

//Funcao de Busca
    public function busca_cronograma() {

        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscacronograma']) ? $_POST['buscacronograma'] : '';
        //$texto = '';
        $model = new cronogramaModel();
        $sql = "C.stStatus <> 0 and upper(C.descricao) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getcronograma($sql);
//        var_dump($resultado);
//        die;

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('cronograma_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'Cronograma');
            $this->smarty->assign('buscamensagem', $texto);
            $this->smarty->display('cronograma/cronograma_lista_geral.html');
        } else {
            $this->smarty->assign('cronograma_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'Cronograma');
            $this->smarty->assign('buscamensagem', $texto);
            $this->smarty->display('cronograma/cronograma_lista_geral.html');
        }
    }

    //Funcao de Inserir
    public function novo_cronograma() {

        //Lista cronogramas
        $model = new cronogramaModel();
        $sql = "C.stStatus <> 0 and upper(C.descricao) like upper('%%')"; //somente os nao excluidos
        $resultado = $model->getcronograma($sql);
//        var_dump($resultado);
//        die;
        $this->smarty->assign('cronograma_lista', $resultado);



//lista de projetos
        $objproj = new projetoModel();
        $projetos = $objproj->getprojeto();
//        var_dump($projetos);
//        die;
        $this->smarty->assign('projetos', $projetos);


        $id_cronograma = $this->getParam('id_cronograma');

        $model = new cronogramaModel();

        if ($id_cronograma > 0) {
            $registro = $model->getCronograma('id_cronograma=' . $id_cronograma);
            $registro = $registro[0];
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
        }
//        var_dump($registro);
//        die;

        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('title', 'Novo Cronograma');
        $this->smarty->display('cronograma/cronograma_form_novo.tpl');
    }

    // Gravar Padrao
    public function gravar_cronograma() {
        $model = new cronogramaModel();

        $data = $this->trataPost($_POST);

        if ($data['id_cronograma'] == NULL)
            $model->setcronograma($data);
        else
            $model->updcronograma($data); //update

        header('Location: /cronograma/cronograma_fox');
        return;
    }

    //Trata dados antes de Enviar para o Gravar
    private function trataPost($post) {
        $data['id_cronograma'] = ($post['id_cronograma'] != '') ? $post['id_cronograma'] : null;
        $data['data_upload'] = ($post['data_upload'] != '') ? $post['data_upload'] : date("Y-m-d H:i:s");
        $data['descricao'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['id_cronograma_stStatus'] = ($post['id_cronograma_stStatus'] != '') ? $post['id_cronograma_stStatus'] : null;
        $data['idUsuario'] = ($post['idUsuario'] != '') ? $post['idUsuario'] : null;
        $data['idProjeto'] = ($post['idProjeto'] != '') ? $post['idProjeto'] : null;
        $data['nome_arquivo'] = ($post['nome_arquivo'] != '') ? $post['nome_arquivo'] : null;
        $data['caminho_arquivo'] = ($post['caminho_arquivo'] != '') ? $post['caminho_arquivo'] : null;

        return $data;
    }

    // Remove Padrao
    public function delcronograma() {
        $id_cronograma = $this->getParam('id_cronograma');
        if (!is_null($id_cronograma)) {
            $model = new cronogramaModel();
            $dados['id_cronograma'] = $id_cronograma;
            
            $sql = "C.stStatus > 0 and C.id_cronograma = ".$id_cronograma; //somente os nao excluidos
            $resultado = $model->getcronograma($sql);
            foreach ($resultado as $value){
                unlink($value['caminho_arquivo']);
            }        
            
            $retorno = $model->delcronograma($dados);
        }

        header('Location: /cronograma/cronograma_fox');
    }

    public function cronograma_fox() {

        $texto = isset($_POST['buscacronograma']) ? $_POST['buscacronograma'] : '';
        //$texto = '';
        $model = new cronogramaModel();
        $sql = "C.stStatus > 0 and upper(C.descricao) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getcronograma($sql);


        $objproj = new projetoModel();
        $projetos = $objproj->getprojeto();


//        var_dump($resultado);
//        die;
        $this->smarty->assign('title', 'Lista Cronograma');
        $this->smarty->assign('cronograma_lista', $resultado);
        $this->smarty->display('cronograma/cronograma_lista_geral.html');
    }

    //Sobe Cronograma no servidor

    public function sobe_cronograma() {

        $utils = new util();

        $id_cronograma = $this->getParam('id_cronograma');
        // $id_cronograma = $_POST['id_cronograma'];

        $ano = date('Y');
        $mes = date('m');
        $idProjeto = $_SESSION['user']['projeto']['idProjeto'];

      //  $caminho = /*PATH_ROOT .*/ STORAGE_ROOT . $ano . '/' . $mes . '/' . $utils->str_pad_left($idProjeto, "0", 3) . '/cronogramas/'; //Mudar AQUI@@@@@@@
        $caminho = PATH_ROOT.STORAGE_ROOT . $ano . '/' . $mes . '/' . $utils->str_pad_left($idProjeto, "0", 3) . '/cronogramas/'; //Mudar AQUI@@@@@@@
        $caminhoBanco = STORAGE_ROOT . $ano . '/' . $mes . '/' . $utils->str_pad_left($idProjeto, "0", 3)  . '/cronogramas/';
        $caminhoBancoCrono = '';
        $descricao = $_POST['observacao'];
        $projeto = $_POST['selecionaprojeto'];




        if (is_dir($caminho)) {


            $log = new logModel();
            $cron = new cronogramaModel();
            $data_upload = date('Y-m-d H:i:s');
//            $uploaddir = PATH_ROOT . STORAGE_ROOT . 'cronogramas/';
            $uploaddir = $caminho;
            $uploadfile_original = $uploaddir . $_FILES['arquivo']['name'];
            $uploadfile_novo_arquivo = 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
            $uploadfile_novo = $uploaddir . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
            $caminhoBancoCrono = $caminhoBanco . $uploadfile_novo_arquivo;

            if ($id_cronograma == 0) {
                //grava no banco
                $dados['id_cronograma'] = $id_cronograma;
                $dados['idProjeto'] = $idProjeto;
                $dados['data_upload'] = $data_upload;
                $dados['descricao'] = $descricao;
                $dados['stStatus'] = 1;
                $dados['idUsuario'] = 1;
                $dados['idProjeto'] = $projeto;
                $dados['nome_arquivo'] = 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                $dados['caminho_arquivo'] = $caminhoBanco . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                $id_cronograma = $cron->setCronograma($dados);
                if (move_uploaded_file(
                                $_FILES['arquivo']['tmp_name'], $uploaddir . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'])) {
                    // Verifica se o arquivo existe antes de renomear
                    if (file_exists($uploadfile_original)) {
                        rename($uploadfile_original, $uploadfile_novo);
                    }
                    //grava no banco
                    $dados['id_cronograma'] = $id_cronograma;
                    $dados['idProjeto'] = $idProjeto;
                    $dados['data_upload'] = $data_upload;
                    $dados['descricao'] = $descricao;
                    $dados['stStatus'] = 1;
                    $dados['idUsuario'] = 1;
                    $dados['idProjeto'] = $projeto;
                    $dados['nome_arquivo'] = 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                    $dados['caminho_arquivo'] = $caminhoBanco . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                    $cron->updCronograma($dados);
                    // var_dump($dados);die;
                    //Volta para a pagina
                    header('Location: /cronograma/cronograma_fox');
                } else {
                    $msg = "Possivel ataque de upload! Aqui esta alguma informação";
                    $log->logPadrao($msg,1);
                    print_r($_FILES);
                }
            } else
            if (move_uploaded_file(
                            $_FILES['arquivo']['tmp_name'], $uploaddir . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'])) {
                // Verifica se o arquivo existe antes de renomear
                if (file_exists($uploadfile_original)) {
                    rename($uploadfile_original, $uploadfile_novo);
                }
                //grava no banco
                $dados['id_cronograma'] = $id_cronograma;
                $dados['idProjeto'] = $idProjeto;
                $dados['data_upload'] = $data_upload;
                $dados['descricao'] = $descricao;
                $dados['stStatus'] = 1;
                $dados['idUsuario'] = 1;
                $dados['idProjeto'] = $projeto;
                $dados['nome_arquivo'] = 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                $dados['caminho_arquivo'] = $caminhoBanco . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                $cron->updCronograma($dados);
                // var_dump($dados);die;
                //Volta para a pagina
                header('Location: /cronograma/cronograma_fox');
            } else {
                $msg = "Possivel ataque de upload! Aqui esta alguma informação";
                $log->logPadrao($msg,1);
                print_r($_FILES);
            }
        } else {

            mkdir($caminho, 0777, true);


            $log = new logModel();
            $cron = new cronogramaModel();
            $data_upload = date('Y-m-d H:i:s');
//            $uploaddir = PATH_ROOT . STORAGE_ROOT . 'cronogramas/';
            $uploaddir = $caminho;
            $uploadfile_original = $uploaddir . $_FILES['arquivo']['name'];
            $uploadfile_novo_arquivo = 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
            $uploadfile_novo = $uploaddir . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
            $caminhoBancoCrono = $caminhoBanco . $uploadfile_novo_arquivo;

            if ($id_cronograma == 0) {



                //grava no banco
                $dados['id_cronograma'] = $id_cronograma;
                $dados['idProjeto'] = $idProjeto;
                $dados['data_upload'] = $data_upload;
                $dados['descricao'] = $descricao;
                $dados['stStatus'] = 1;
                $dados['idUsuario'] = 1;
                $dados['idProjeto'] = $projeto;
                $dados['nome_arquivo'] = 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                $dados['caminho_arquivo'] = $caminhoBanco . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                $idProjeto = $cron->setCronograma($dados);

                if (move_uploaded_file(
                                $_FILES['arquivo']['tmp_name'], $uploaddir . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'])) {
                    // Verifica se o arquivo existe antes de renomear
                    if (file_exists($uploadfile_original)) {
                        rename($uploadfile_original, $uploadfile_novo);
                    }
                    //grava no banco
                    $dados['id_cronograma'] = $id_cronograma;
                    $dados['idProjeto'] = $idProjeto;
                    $dados['data_upload'] = $data_upload;
                    $dados['descricao'] = $descricao;
                    $dados['stStatus'] = 1;
                    $dados['idUsuario'] = 1;
                    $dados['idProjeto'] = $projeto;
                    $dados['nome_arquivo'] = 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                    $dados['caminho_arquivo'] = $caminhoBanco . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                    $idProjeto = $cron->updCronograma($dados);                //Volta para a pagina
                    header('Location: /cronograma/cronograma_fox');
                } else {
                    $msg = "Possivel ataque de upload! Aqui esta alguma informação";
                    $log->logPadrao($msg,1);
                    print_r($_FILES);
                }
            } else
            if (move_uploaded_file(
                            $_FILES['arquivo']['tmp_name'], $uploaddir . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'])) {
                // Verifica se o arquivo existe antes de renomear
                if (file_exists($uploadfile_original)) {
                    rename($uploadfile_original, $uploadfile_novo);
                }
                //grava no banco
                $dados['id_cronograma'] = $id_cronograma;
                $dados['idProjeto'] = $idProjeto;
                $dados['data_upload'] = $data_upload;
                $dados['descricao'] = $descricao;
                $dados['stStatus'] = 1;
                $dados['idUsuario'] = 1;
                $dados['idProjeto'] = $projeto;
                $dados['nome_arquivo'] = 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                $dados['caminho_arquivo'] = $caminhoBanco . 'crono_' . $id_cronograma . '-' . $_FILES['arquivo']['name'];
                $cron->updCronograma($dados);
                // var_dump($dados);die;
                //Volta para a pagina
                header('Location: /cronograma/cronograma_fox');
            } else {
                $msg = "Possivel ataque de upload! Aqui esta alguma informação";
                $log->logPadrao($msg,1);
                print_r($_FILES);
            }
        }
    }

    //Deleta Cronograma
    public function cronograma_exclui_item() {


        $idLogo = $this->getParam('idLogo');
        $id_cronograma = $this->getParam('idProjeto');
        if (!is_null($idLogo)) {
            //remove o registro
            $logo = new projeto_logoModel;
            $temp = $logo->getprojeto_logo('idLogo=' . $idLogo);
            //var_dump($temp);
            $dados['idProjeto'] = $id_cronograma;
            $dados['idLogo'] = $idLogo;
            $retorno = $logo->delprojeto_logo($dados);
            //remove o arquivo Fisicamente
            $arquivo = STORAGE_ROOT . $temp[0]['arquivo'];
            //echo $arquivo;
            if (file_exists($arquivo)) {
                unlink($arquivo);
                //echo 'arquivo apagado';die;
            }
        }

        header('Location: /projeto/novo_projeto/idProjeto/' . $id_cronograma . '/aba/configuracao');
    }

}

?>