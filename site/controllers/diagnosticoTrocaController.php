<?php

class diagnosticoTroca extends controller {

    public function index_action() {

        $opcoesBusca = array(
            "0" => "NIS",
            "1" => "UC",
            "2" => "ID Troca"
        );
        $projeto_model = new projetoModel();
        if ($_SESSION['user']['tipousuario'] != 1 && $_SESSION['user']['tipousuario'] != 3) {
            $projetos = $projeto_model->getProjetoComboBox("up.idUsuario = {$_SESSION['user']['usuario']} AND p.stStatus <> 0");
            $mostra_combo = false;
            if (count($projetos) > 1) {
                $mostra_combo = true;
            }
        }
        else {
            $mostra_combo = true;
            $projetos = $projeto_model->getProjetoComboBox("p.stStatus <> 0");
        }

        $lista_projetos = array('' => "Selecione");
        foreach ($projetos as $value) {
            $lista_projetos[$value["idProjeto"]] = $value["nome"];
        }

        //Inicializa o Template
        $this->template->run();

        $this->smarty->assign('mostra_combo', $mostra_combo);
        $this->smarty->assign('opcoesBusca', $opcoesBusca);
        $this->smarty->assign('lista_projetos', $lista_projetos);
        $this->smarty->display('diagnosticoTroca/rel_pre.tpl');
    }

    public function imprimeDiagnostico() {
        //seta os models
        $diagnosticoModel = new diagnosticoModel();
        $projetoModel = new projetoModel();
        $ucModel = new unidadeconsumidoraModel();

        //recebe os dados
        $idProjeto = isset($_POST['projeto']) ? $_POST['projeto'] : null;
        $termo = $_POST['termo_busca'];
//        $opcao = $_POST['opcao_busca'] == 0 ? $opcao = "uc.NIS = {$termo}" : $opcao = "uc.UC = {$termo}";
        switch ($_POST['opcao_busca']) {
            case 0:
                $opcao = "uc.NIS = {$termo}";
                $opcao_filtro = "NIS";
                break;
            case 1:
                $opcao = "uc.UC = {$termo}";
                $opcao_filtro = "UC";
                break;
            case 2:
                $opcao = "t.id_troca = {$termo}";
                $opcao_filtro = "ID TROCA";
                break;
        }

        //busca no banco se a UC existir, Busca o nome do cliente
        $nome = $ucModel->getUnidadeConsumidora($opcao);
        if (sizeof($nome) > 0) {
            $diagnostico = $diagnosticoModel->getDiagnosticoUC($idProjeto, $opcao);
            $nome = $nome[0]['nome'];
        }
        else {
            $diagnostico = null;
            $nome = "Cliente não encontrado";
        }
        //Gera Filtros
        $projeto = $projetoModel->getProjetoComboBox("p.idProjeto = {$idProjeto}");
        $filtro = array(
            "cliente" => $nome,
            "por" => $opcao_filtro,
            "termo" => $termo,
            "data" => date("d/m/Y H:i:s"),
            "nome_projeto" => $projeto[0]["nome"]
        );

        $this->smarty->assign('diagnostico', $diagnostico);
        $this->smarty->assign('filtro', $filtro);
        $this->smarty->assign("title", "Diagnóstico");
        $this->smarty->display('diagnosticoTroca/rel.tpl');
    }

    /**
     * Verifica se uma UC existe no banco de dados.
     * Retorna true se existir e false se não existir
     * @param type $numero
     * @return boolean
     */
    public function verificaExisteUC() {
        $ucModel = new unidadeconsumidoraModel();
        $existe = false;
        $existeOnProjeto = false;
        $termo = $_POST['termo_busca'];
        $idProjeto = $_POST['idProjeto'];

        switch ($_POST['opcao_busca']) {
            case 0:
                $termo_where = "uc.NIS = {$termo}";
                break;
            case 1:
                $termo_where = "uc.UC = {$termo}";
                break;
            case 2:
                $termo_where = "tr.id_troca = {$termo}";
                break;
        }

        $opcao = $ucModel->getUnidadeConsumidora($termo_where);

        if (sizeof($opcao) > 0) {
            $proj = $ucModel->getUnidadeConsumidorabyProjeto("pjt.idProjeto = {$idProjeto} and {$termo_where}");
            if (sizeof($proj)) {
                $existeOnProjeto = true;
            }
            $existe = true;
        }

        echo json_encode(array("stStatus" => $existe, "stStatusProjeto" => $existeOnProjeto));
    }

}
