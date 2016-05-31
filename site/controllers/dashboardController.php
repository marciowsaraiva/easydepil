<?php

class dashboard extends controller {
    private $anoInicio = 2015;

    public function index_action() {
        $lista_profissional = array('' => 'SELECIONE');
        $modelProfissional = new profissionalModel();
        foreach ($modelProfissional->getProfissional() as $value) {
            $lista_profissional[$value['idProfissional']] = $value['dsProfissional'];
        }
        $lista_cliente = array('' => 'SELECIONE');
        $modelCliente = new clienteModel();
        foreach ($modelCliente->getCliente() as $value) {
            $lista_cliente[$value['idCliente']] = $value['dsCliente'];
        }
        $lista_tratamento = array('' => 'SELECIONE');
        $modelTratamento = new tratamentoModel();
        foreach ($modelTratamento->getTratamento() as $value) {
            $lista_tratamento[$value['idTratamento']] = $value['dsTratamento'];
        }
        $this->smarty->assign('lista_agendageral', null);
        $this->smarty->assign('lista_profissional', $lista_profissional);
        $this->smarty->assign('lista_cliente', $lista_cliente);
        $this->smarty->assign('lista_tratamento', $lista_tratamento);
        $this->smarty->assign('profissional_padrao', $_SESSION['Profissional']['id']);
        $this->smarty->assign("id_idTipoUsuario", $_SESSION["user"]["tipousuario"]);
        $this->smarty->assign("idPerfil", $_SESSION["user"]["perfil"][0]["idPerfil"]);
        $this->smarty->assign("title", "Dashboard");

        $dataconsultageral = date('Y-m-d');
        $where = "a.idProfissional = " . $_SESSION['Profissional']['id'] . " and a.dtAgenda >= '" . $dataconsultageral . " 00:00:00'";
        $modelAgenda = new agendahorarioModel();
        $agendageral = $modelAgenda->getAgendaDiaTotais($where);
        $totalparaconfirmar = null;
        $totalconfirmado = null;
        $totaldesmarcado = null;
        $totalagendado = 0;
        if ($agendageral) {
            foreach($agendageral as $value) {
                if ($value['idStatusAgenda'] == 2) {
                   $totalconfirmado = $value['Quantas'];
                } 
                if ($value['idStatusAgenda'] == 1) {
                   $totalparaconfirmar = $value['Quantas'];
                } 
                if ($value['idStatusAgenda'] > 1 and $value['idStatusAgenda'] < 6) {
                   $totaldesmarcado = $value['Quantas'];
                } 
                $totalagendado = $totalagendado + $value['Quantas'];
            }
        }
        $this->smarty->assign('totalconfirmado',$totalconfirmado);
        $this->smarty->assign('totalparaconfirmar',$totalparaconfirmar);
        $this->smarty->assign('totaldesmarcado',$totaldesmarcado);
        $this->smarty->assign('totalagendado',$totalagendado);
        
        $this->profissionalpadrao($_SESSION['Profissional']['id']);
        $datadia = date("Y-m-d"); 
        $_SESSION['datadia']=$datadia;

        $this->agendadia($_SESSION['Profissional']['id'], $datadia);
        $this->smarty->display("dashboard/dashboard.tpl");
        
    }
    public function agendageral() {
        $tipo = $_POST['tipo'];        
        $modelAgenda = new agendahorarioModel();        
        switch ($tipo) {            
            case '2' :
                $where = 'a.idStatusAgenda = 2';
                break;
            case '3' :
                $where = 'a.idStatusAgenda = 1';
                break;
            case '4' :
                $where = '(a.idStatusAgenda > 1 and a.idStatusAgenda < 6) ';
                break;
            default :
                $where = 'a.idStatusAgenda > 0';
                break;
        }
        $dataconsultageral = date('Y-m-d');
        $where = $where . " and a.idProfissional = " . $_SESSION['Profissional']['id'] . " and a.dtAgenda >= '" . $dataconsultageral . " 00:00:00'";
        $orderby = "a.dtAgenda";
        $agenda = $modelAgenda->getAgendaDia($where, $orderby);
        $this->smarty->assign('lista_agendageral', $agenda);
        
        $html = $this->smarty->fetch('dashboard/agendageral.tpl');
        
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                         
        
        
    }
    public function gravarhorario(){
        $idCliente = $_POST['idCliente'];
        $idTratamento = $_POST['idTratamento'];
        $hora = $_POST['hrAgenda'];
        $descricao = $_POST['descricao'];
        //echo 'hora: ' . $_SESSION['datadia'] . ' ' . $hora . ':00'; die;
        $model = new agendahorarioModel();
        $data = array(
            'idProfissional' => $_SESSION['Profissional']['id'],
            'idCliente' => $idCliente,
            'idTratamento' => $idTratamento,
            'dsAgenda' => $descricao,
            'dtAgenda' => $_SESSION['datadia'] . ' ' . $hora . ':00',
            'idStatusAgenda' => 1
        );
        $model->setAgenda($data);
        $this->agendadia($_SESSION['Profissional']['id'], $_SESSION['datadia']);
        $html = $this->smarty->fetch('dashboard/agendadia.tpl');
        
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                         
    }
    
    public function agendaprofissional() {        
        
        if ($_POST['idProfissional']) {
            $idProfissional = $_POST['idProfissional'];
            $_SESSION['Profissional']['id'] = $idProfissional;
        } else {
            $idProfissional = $_SESSION['Profissional']['id'];
        }
        
        $jasonretorno = array(
            'ok' => 'ok',
        );
        echo json_encode($jasonretorno);                
        
    }

    public function veratendimento() {
        
        $idAgenda = $_POST['idAgenda'];
        $idCliente = $_POST['idCliente'];
        $nomeCliente = $_POST['nomeCliente'];
        $nomeTratamento = $_POST['nomeTratamento'];
        
        $lista_formapagamento= array('' => 'SELECIONE');
        $modelFormaPagamento = new formapagamentoModel();
        foreach ($modelFormaPagamento->getFormaPagamento() as $value) {
            $lista_formapagamento[$value['idFormaPagamento']] = $value['dsFormaPagamento'];
        }
        
        $this->smarty->assign('nomeCliente', $nomeCliente);
        $this->smarty->assign('nomeTratamento', $nomeTratamento);
        $this->smarty->assign('idCliente', $idCliente);
        $this->smarty->assign('idAgenda', $idAgenda);

        $this->smarty->assign('lista_formapagamento', $lista_formapagamento);
        $this->smarty->display("dashboard/atendimento_thumbnail.tpl");
    }
    
    public function mudarstatus() {
        $idAgenda = $_POST['idAgenda'];
        $status = $_POST['status'];

        $modeAgenda = new agendahorarioModel();

        switch ($status) {
            case  'confirmar' :
                $novostatus = '2';
                break;
            case  'desmarcar' :
                $novostatus = '3';
                break;
            case  'remarcar' :
                $novostatus = '4';
                break;
            default :
                $novostatus = '5';
                break;
        }

        $data = array(
          'idStatusAgenda' => $novostatus,
          'idAgenda' => $idAgenda
        );
            
        $modeAgenda->updAgenda($data);
        $this->agendadia($_SESSION['Profissional']['id'], $_SESSION['datadia']);
        $html = $this->smarty->fetch('dashboard/agendadia.tpl');
        
    //    $_SESSION['datadia'] = $data;
        
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                         
    }
    
    public function gravaratendimento() {
        $idAgenda = $_POST['idAgenda'];
        $idFormaPagamento = $_POST['idFormaPagamento'];
        $idCliente = $_POST['idCliente'];
        $valorpago = $_POST['valorpago'];

        $modeAgenda = new agendahorarioModel();
        $novostatus = '6';

        $data = array(
          'idStatusAgenda' => $novostatus,
          'idAgenda' => $idAgenda,
        );            
        $modeAgenda->updAgenda($data);

        $data = array(
          'idAgenda' => $idAgenda,
          'idCliente' => $idCliente,
          'idProfissional' => $_SESSION['Profissional']['id'],
          'vlFinanceiro' => $valorpago,
          'dtFinanceiro' => $_SESSION['datadia'],
          'idFormaPagamento' => $idFormaPagamento
        );
        
        $modeAgenda->setFinanceiro($data);

        $this->agendadia($_SESSION['Profissional']['id'], $_SESSION['datadia']);
        $html = $this->smarty->fetch('dashboard/agendadia.tpl');
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                         
    }
    
    public function leragendadodia() {
        $dia = $_POST['dia'];
        $mes = substr($_POST['dataescolhida'],3,2);
        $ano = substr($_POST['dataescolhida'],6,4);
        $data = $ano . '-' . $mes . '-' . $dia;
        $this->agendadia($_SESSION['Profissional']['id'], $data);
        $html = $this->smarty->fetch('dashboard/agendadia.tpl');
        
        $_SESSION['datadia'] = $data;
        
        $jasonretorno = array(
            'html' => $html
        );
        echo json_encode($jasonretorno);                         
    }
    
    public function lertratamento () {
        $idTratamento = $_POST['idTratamento'];
        $modelTratamento = new tratamentoModel();
        $where = 'a.idTratamento = ' . $idTratamento;
        $dadostratamento = $modelTratamento->getTratamento($where);
        
        $jasonretorno = array(
            'duracao' => $dadostratamento[0]['dsTempo'],
            'valor' => $dadostratamento[0]['vlTratamento']
        );
        echo json_encode($jasonretorno);                         
    }
    
    public function agendadia($profissional, $data) {
        $agenda = null;
        $modelAgenda = new agendahorarioModel();        
        $where = "a.idProfissional = " . $profissional . " and a.dtAgenda >= '" . $data . " 00:00:00' and a.dtAgenda <= '" . $data . " 24:59:00'";
        $orderby = "a.dtAgenda";
        $agenda = $modelAgenda->getAgendaDia($where, $orderby);
        $dtNormal = date('d/m/Y', strtotime($data));
        $nomedodia = $this->diasemanagrande(substr($dtNormal,6,4) . '-' . substr($dtNormal,3,2) . '-' . substr($dtNormal,0,2));
        $this->smarty->assign('diaextenso', $dtNormal);
        $this->smarty->assign('nomedodia', $nomedodia);
        $this->smarty->assign('lista_agendadia', $agenda);        
    }

    public function profissionalpadrao($idProfissional) {
        $dtParaIniciar = date("Y-m-d");
        $idAno = substr($dtParaIniciar, 0,4) . '-01-01 00:00:00';
        $model = new agendahorarioModel();
        if ($idProfissional) {
            $registro = $model->getAgendaHorarioProfissionales("c.idProfissional=" . $idProfissional . " and ah.idAno = '" . $idAno . "'");
        //    print_a_die($registro);
            if ($registro) {
               $idAgendaHorario = $registro[0]['idAgendaHorario'];
            } else {
              $idAgendaHorario = null;
              $registro = null;                
            }
        } else {
            $idAgendaHorario = null;
            $registro = null;
        }
        $this->smarty->assign('lista_agendaprofissional', $registro);
        $datainicial = date('Y-m' . '-01');
        $valores = $this->calculaDatas($idAgendaHorario, $datainicial, $idProfissional);
        $this->smarty->assign('mesextenso', $valores['mesextenso']);
        $cores = $valores['periodo'][0];
        $this->smarty->assign('cores', $cores);
        $this->smarty->assign('valores', $valores);
        $this->smarty->assign('ano', substr($registro[0]['idAno'],0,4));
        $this->smarty->assign('idAgendaHorario', $registro[0]['idAgendaHorario']);
        $this->smarty->assign('datainicio', $valores['datainicio']);
        $this->smarty->assign('datafinal', $valores['datafinal']);
    }
    
    public function calculaDatas ($idAgendaHorario, $datainicial, $idProfissional) {    
        
        $cabec = array();
        $mes = substr($datainicial,5,2);
        $ano = substr($datainicial,0,4);

        $cabec['mesextenso'] = $this->mesextenso(intval($mes)) . ' de ' . $ano;
        
        if ($mes=='01' || $mes=='03' || $mes=='05' || $mes=='07' || $mes=='08' || $mes=='10' || $mes=='12') {
            $ultimodia = 31;
        } else {
        if ($mes=='04' || $mes=='06' || $mes=='09' || $mes=='11') {
            $ultimodia = 30;
        } else {
            $resto = $ano%4;
            if (!$resto==0) {
                $ultimodia = 28; // nao esquecer de ver o anobisexto            
            } else {
                $ultimodia = 29; // nao esquecer de ver o anobisexto            
            }
        }}
        $datafinal = substr($datainicial,0,8) . $ultimodia;
        if ($idAgendaHorario) {
            $model = new agendahorarioModel();
            $where = "ahi.idAgendaHorario = " . $idAgendaHorario . " and ahi.dtAgenda >= '" . $datainicial . "' and ahi.dtAgenda <= '" . $datafinal  . "' and c.idProfissional = " . $idProfissional;
            $lerperiodo = $model->getAgendaHorarioItensAnalitico($where);
            $i=0;
            foreach ($lerperiodo as $value) {
                $where = "ahi.idAgendaHorario = " . $idAgendaHorario . " and ahi.dtAgenda >= '" . $datainicial . "' and ahi.dtAgenda <= '" . $datafinal . "' and hc.idProfissional = " . $idProfissional;
                $dias = $model->getAgendaHorarioItens($where);
                $x=0;
                foreach ($dias as $value1) {
                    $lerperiodo[$i]['dias']['dia'.$x]['idProfissional'] = $value1['idProfissional'];
                    $lerperiodo[$i]['dias']['dia'.$x]['idAgendaHorario'] = $value1['idAgendaHorario'];
                    $lerperiodo[$i]['dias']['dia'.$x]['idAgendaHorarioItens'] = $value1['idAgendaHorarioItens'];
                    $lerperiodo[$i]['dias']['dia'.$x]['dtAgenda'] = $value1['dtAgenda'];
                    $lerperiodo[$i]['dias']['dia'.$x]['idTipoAgenda'] = $value1['idTipoAgenda'];
                    $lerperiodo[$i]['dias']['dia'.$x]['dsTipoAgenda'] = $value1['dsTipoAgenda'];
                    $lerperiodo[$i]['dias']['dia'.$x]['dsResumida'] = $value1['dsResumida'];
                    $lerperiodo[$i]['dias']['dia'.$x]['dsCor'] = $value1['dsCor'];
                    
                    $x++;
                }
            $i++;
            }
            $cabec['periodo'] = $lerperiodo;
        }
        $y = 1;
        while ($y<=$ultimodia) {
            
            $datamontada = $ano . '-' . $mes . '-' . $y;
            $semana = $this->diasemana($datamontada);
            
            $cabec['dia'.$y] = $y . '-' . $semana;
            $y++;
        }
        $cabec['datainicio'] = $datainicial;
        $cabec['datafinal'] = $datafinal;
        return $cabec;
    }
    
    public function voltar() {
        $idAgendaHorario = $_POST['idAgendaHorario'];
        $dtInicial = $_POST['dtInicio'];
        $dtInicial = date('d/m/y', strtotime($dtInicial));
        
        $dtParaIniciar = date('Y-m-d', strtotime('-1 months', strtotime($dtInicial))) . ' 00:00:00';

        // vamos calcular uma nova data, neste caso, um mes antes

        $model = new agendahorarioModel();
        if ($idAgendaHorario) {
            $registro = $model->getAgendaHorarioProfissionales("ah.idAgendaHorario=" . $idAgendaHorario);
            if ($registro) {
               $idAgendaHorario = $registro[0]['idAgendaHorario'];
            }
        } else {
             $idAgendaHorario = null;
            $registro = null;
        }
        
        $options = array("" => "SELECIONE");
        $lista_ano = range($this->anoInicio, Date("Y") + 3);
        $this->smarty->assign('lista_ano', $options += array_combine($lista_ano, $lista_ano));
        $this->smarty->assign('lista_agendaprofissional', $registro);

        if ($dtParaIniciar) {
            $datainicial = $dtParaIniciar;
        } else {
            $datainicial = date('Y-m' . '-01');
        }    
        $valores = $this->calculaDatas($idAgendaHorario, $datainicial, $_SESSION['Profissional']['id']);
        $this->smarty->assign('mesextenso', $valores['mesextenso']);
        $cores = $valores['periodo'][0];
        $this->smarty->assign('cores', $cores);
        $this->smarty->assign('valores', $valores);
        $this->smarty->assign('idAgendaHorario', $registro[0]['idAgendaHorario']);
        $this->smarty->assign('datainicio', $valores['datainicio']);
        $this->smarty->assign('datafinal', $valores['datafinal']);
        
        $html = $this->smarty->fetch('dashboard/agendaanalitica.tpl');
        $html2 = $this->smarty->fetch('dashboard/agendahorarioprofissional.tpl');
        $html3 = $this->smarty->fetch('dashboard/periodos.tpl');
        
        $jasonretorno = array(
            'html' => $html,
            'html2' => $html2,
            'html3' => $html3
        );
        echo json_encode($jasonretorno);                
    }

    public function avancar() {
        
        $idAgendaHorario = $_POST['idAgendaHorario'];
        $dtInicial = $_POST['dtInicio'];
        
        // vamos calcular uma nova data, neste caso, um mes antes
        $dtInicial = date('d/m/y', strtotime($dtInicial));
        $dtParaIniciar = date('Y-m-d', strtotime('+1 months', strtotime($dtInicial))) . ' 00:00:00';
        $model = new agendahorarioModel();
        if ($idAgendaHorario) {
            $registro = $model->getAgendaHorarioProfissionales("ah.idAgendaHorario=" . $idAgendaHorario);
            if ($registro) {
               $idAgendaHorario = $registro[0]['idAgendaHorario'];
            }
        } else {
             $idAgendaHorario = null;
            $registro = null;
        }
        
        $options = array("" => "SELECIONE");
        $lista_ano = range($this->anoInicio, Date("Y") + 3);
        $this->smarty->assign('lista_ano', $options += array_combine($lista_ano, $lista_ano));

        $datainicial = $dtParaIniciar;
        
        $valores = $this->calculaDatas($idAgendaHorario, $datainicial, $_SESSION['Profissional']['id']);
        $this->smarty->assign('mesextenso', $valores['mesextenso']);
        $cores = $valores['periodo'][0];
        $this->smarty->assign('cores', $cores);
        $this->smarty->assign('valores', $valores);
        $this->smarty->assign('ano', substr($registro[0]['idAno'],0,4));
        $this->smarty->assign('idAgendaHorario', $registro[0]['idAgendaHorario']);
        $this->smarty->assign('datainicio', $valores['datainicio']);
        $this->smarty->assign('datafinal', $valores['datafinal']);
        
         $html = $this->smarty->fetch('dashboard/agendaanalitica.tpl');
        $html2 = $this->smarty->fetch('dashboard/agendahorarioprofissional.tpl');
        $html3 = $this->smarty->fetch('dashboard/periodos.tpl');
        
        $jasonretorno = array(
            'html' => $html,
            'html2' => $html2,
            'html3' => $html3
        );
        echo json_encode($jasonretorno);                
    }    
    public function diasemana($data) {
            $ano =  substr($data, 0, 4);
            $mes =  substr($data, 5, 2);
            $dia =  substr($data, 8, 2);

            $diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

            switch($diasemana) {
                    case"0": $diasemana = "Dom"; break;
                    case"1": $diasemana = "Seg"; break;
                    case"2": $diasemana = "Ter"; break;
                    case"3": $diasemana = "Qua"; break;
                    case"4": $diasemana = "Qui"; break;
                    case"5": $diasemana = "Sex"; break;
                    case"6": $diasemana = "Sab"; break;
            }

            return $diasemana;
    }
    public function diasemanagrande($data) {
            $ano =  substr($data, 0, 4);
            $mes =  substr($data, 5, 2);
            $dia =  substr($data, 8, 2);

            $diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );

            switch($diasemana) {
                    case"0": $diasemana = " - Domingo"; break;
                    case"1": $diasemana = " - Segunda feira"; break;
                    case"2": $diasemana = " - Terca feira"; break;
                    case"3": $diasemana = " - Quarta feira"; break;
                    case"4": $diasemana = " - Quinta feira"; break;
                    case"5": $diasemana = " - Sexta feira"; break;
                    case"6": $diasemana = " - Sabado"; break;
            }

            return $diasemana;
    }
    public function mesextenso($mes) {
        switch ($mes) {
           case 01 : 
               $mext = 'Janeiro'; break;
           case 02 : 
               $mext = 'Fevereiro'; break;
           case 03 : 
               $mext = 'Março'; break;
           case 04 : 
               $mext = 'Abril'; break;
           case 05 : 
               $mext = 'Maio'; break;
           case 06 : 
               $mext = 'Junho'; break;
           case 07 : 
               $mext = 'Julho'; break;
           case 08 : 
               $mext = 'Agosto'; break;
           case 09 : 
               $mext = 'Setembro'; break;
           case 10 :
               $mext = 'Outubro'; break;
           case 11 : 
               $mext = 'Novembro'; break;
           case 12 : 
               $mext = 'Dezembro'; break;
           default :
               $mext = ''; break;
               
        }
        return $mext;
    }    
}
