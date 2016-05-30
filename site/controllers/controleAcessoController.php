<?php

class controleAcesso extends controller {

    public function index_action() {

        $modelAcesso = new controleAcessoModel();

        $registros = $modelAcesso->getPerfil('stStatus <> 0');

        //Paginação
        $pagina = $this->getParam('pagina');
        $paginacaoHelp = new paginacao();
        $regs = $paginacaoHelp->prepara($registros, 20, $pagina); //Envia os registro, qtd de regidtro por página e a página atual
        if (isset($regs['paginacao']) && $regs['paginacao'] != null) {
            $paginacao = $paginacaoHelp->montarPaginacao($regs['paginacao'], 5); //Envia os registros e o range
            $this->smarty->assign('paginacao', $paginacao);
        }

        $this->smarty->assign('regs', $regs['regs']);

        $this->smarty->assign('title', 'CONTROLE DE ACESSO');

        $this->smarty->display('controleAcesso/index.tpl');
    }

    public function perfil() {

        $acao = $this->getParam('acao');

        switch ($acao) {
            case 'editar':

                $idPerfil = $this->getParam('perfil');

                if ($idPerfil == 1) {
                    $_SESSION['erro']['msg'] = 'ACESSO NEGADO. VOCE NAO TEM PERMISSAO PARA EXECUTAR ESSA ACAO.';
                    header('Location: /erro');
                    die;
                }

                $modelAcesso = new controleAcessoModel();

                $registros = $modelAcesso->getPerfil("stStatus <> 0 AND idPerfil = '{$idPerfil}'");

                $registros = isset($registros[0]) ? $registros[0] : NULL;
                //print_a_die($registros);

                $controllers = $modelAcesso->getControllers(null, 'stat <> 0');
                //print_a($controllers);

                $controllers_perfil = $modelAcesso->getControllerPerfil(NULL, "idPerfil = '{$idPerfil}'");
                //print_a($controllers_perfil);

                $this->smarty->assign('reg', $registros);
                $this->smarty->assign('controllers', $controllers);
                $this->smarty->assign('controllers_perfil', $controllers_perfil);

                $this->smarty->assign('title', 'CONTROLE DE ACESSO');

                $this->smarty->display('controleAcesso/perfil_editar.tpl');

                break;

            case 'salvar':

                $idPerfil = !empty($_POST['perfil']) ? $_POST['perfil'] : NULL;

                if (is_null($idPerfil)) {
                    $_SESSION['erro']['msg'] = 'ACESSO NEGADO. VOCE NAO TEM PERMISSAO PARA EXECUTAR ESSA ACAO.';
                    header('Location: /erro');
                    die;
                }

                $modelAcesso = new controleAcessoModel();

                if (isset($_POST['controller']) || is_null($_POST['controller'])) {
                    $modelAcesso->setControllerPerfil($_POST['controller'], $idPerfil);
                }

                header("Location: /controleAcesso");

                break;

            default:
                $_SESSION['erro']['msg'] = 'PAGINA NAO ENCONTRADA.';
                header('Location: /erro');
                break;
        }
    }

}
