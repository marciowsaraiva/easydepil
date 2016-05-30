<?php

/*
 * Gerado pelo Framework Tools 1.0
 * Classe: Controller
 *
 */

class agendahorario extends controller {
    private $anoInicio = 2015;

    public function index_action() {
//die("chegou");
        //Inicializa o Template
        $this->template->run();

        $model = new agendahorarioModel();
        $agendahorario_lista = $model->getAgendaHorario();

        $this->smarty->assign('agendahorario_lista', $agendahorario_lista);
        $this->smarty->display('agendahorario/lista.html');
    }

//Funcao de Busca
    public function busca_agendahorario() {
        //se nao existir o indice estou como padrao '';
        $texto = isset($_POST['buscadescricao']) ? $_POST['buscadescricao'] : '';
        //$texto = '';
        $model = new agendahorarioModel();
        $sql = "stStatus <> 0 and upper(dsAgendaHorario) like upper('%" . $texto . "%')"; //somente os nao excluidos
        $resultado = $model->getAgendaHorario($sql);

        if (sizeof($resultado) > 0) {
            $this->smarty->assign('agendahorario_lista', $resultado);
            //Chama o Smarty
            $this->smarty->assign('title', 'agendahorario');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('agendahorario/lista.html');
        } else {
            $this->smarty->assign('agendahorario_lista', null);
            //Chama o Smarty
            $this->smarty->assign('title', 'agendahorario');
            $this->smarty->assign('buscadescricao', $texto);
            $this->smarty->display('agendahorario/lista.html');
        }
    }

    //Funcao de Inserir
    public function novo_agendahorario() {
        
        $idAgendaHorario = $this->getParam('idAgendaHorario');
        $dtParaIniciar = $this->getParam('dtInicio');
     //   var_dump($idAgendaHorario); die;
        $model = new agendahorarioModel();

        if ($idAgendaHorario) {
            $registro = $model->getAgendaHorario('idAgendaHorario=' . $idAgendaHorario);
            $registro = $registro[0]; //Passando AgendaHorario
            $lista_profissional = array('' => 'SELECIONE');
            foreach ($model->getProfissionalSemAgenda($idAgendaHorario) as $value) {
                $lista_profissional[$value['idProfissional']] = $value['dsProfissional'];
            }
        } else {
            //Novo Registro
            $registro = $model->estrutura_vazia();
            $registro = $registro[0];
            $lista_profissional = array('' => 'SELECIONE');
            $modelProfissional = new profissionalModel();
            foreach ($modelProfissional->getProfissionalGeral() as $value) {
                $lista_profissional[$value['idProfissional']] = $value['dsProfissional'];
            }
        }
        
        $modelStatusAgenda = new tipoagendaModel();
        $lerstatus = $modelStatusAgenda->getTipoAgenda();
        $this->smarty->assign('lista_status', $lerstatus);
        $lista_tipoagenda = array('' => 'SELECIONE');
        foreach ($lerstatus as $value) {
            $lista_tipoagenda[$value['idTipoAgenda']] = $value['dsTipoAgenda'];
        }
        $this->smarty->assign('lista_statusagendas', $lista_tipoagenda);
        
        $options = array("" => "SELECIONE");
        $lista_ano = range($this->anoInicio, Date("Y") + 3);
        $this->smarty->assign('lista_ano', $options += array_combine($lista_ano, $lista_ano));

        $lista_agendahorarioprofissional = null;        
        if ($idAgendaHorario) {
            $where = 'ah.idAgendaHorario = ' . $idAgendaHorario;
            $lista_agendahorarioprofissional = $model->getAgendaHorarioProfissionales($where);
        }    
        
        $this->smarty->assign('lista_agendaprofissional', $lista_agendahorarioprofissional);

        if ($dtParaIniciar) {
            $datainicial = $dtParaIniciar;
        } else {
            $datainicial = date('Y-m' . '-01');
        }    
        
        $valores = $this->calculaDatas($idAgendaHorario, $datainicial);
        $this->smarty->assign('valores', $valores);
        if ($idAgendaHorario) {
            $this->smarty->assign('lista_diaria', $valores['periodo']);
        } else {
            $this->smarty->assign('lista_diaria', null);
        }

        $this->smarty->assign('registro', $registro);
        $this->smarty->assign('ano', substr($registro['idAno'],0,4));
        
        $this->smarty->assign('lista_profissional', $lista_profissional);
        $this->smarty->assign('title', 'Novo AgendaHorario');
        $this->smarty->display('agendahorario/form_novo.tpl');
    }

    public function calculaDatas ($idAgendaHorario, $datainicial) {    
        
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
            $where = "ahi.idAgendaHorario = " . $idAgendaHorario . " and ahi.dtAgenda >= '" . $datainicial . "' and ahi.dtAgenda <= '" . $datafinal . "'";
            $lerperiodo = $model->getAgendaHorarioItensAnalitico($where);
          //  var_dump($lerperiodo); die;
            $i=0;
            foreach ($lerperiodo as $value) {
                $where = "ahi.idAgendaHorario = " . $idAgendaHorario . " and ahi.dtAgenda >= '" . $datainicial . "' and ahi.dtAgenda <= '" . $datafinal . "' and hc.idProfissional = " . $value['idProfissional'];
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
        $idAgendaHorario = $this->getParam('idAgendaHorario');
        $dtInicial = $this->getParam('dtInicio');
        
        // vamos calcular uma nova data, neste caso, um mes antes

        $dtParaIniciar = date('Y-m-d', strtotime('-1 months', strtotime($dtInicial))) . ' 00:00:00';
        
        header('Location: /agendahorario/novo_agendahorario/idAgendaHorario/' . $idAgendaHorario. '/dtInicio/' . $dtParaIniciar);
    }

    public function avancar() {
        $idAgendaHorario = $this->getParam('idAgendaHorario');
        $dtInicial = $this->getParam('dtInicio');
        
        // vamos calcular uma nova data, neste caso, um mes antes
        
        $dtParaIniciar = date('Y-m-d', strtotime('+1 months', strtotime($dtInicial))) . ' 00:00:00';
        
        header('Location: /agendahorario/novo_agendahorario/idAgendaHorario/' . $idAgendaHorario. '/dtInicio/' . $dtParaIniciar);
    }

    // Gravar Padrao
    public function gravar_agendahorario() {
        $model = new agendahorarioModel();

        $data = $this->trataPost($_POST);        
        if ($data['idAgendaHorario'] == null) {

            $arrayProfissionales = $model->getAgendaProfissionales('stFazParteAgenda = 1');
            
            $id=$model->setAgendaHorario($data);
            
            $dataNova = $data['idAno'];
            $ano = substr($dataNova,0,4);
            $valor = true;
            $y = 1;
            while ($valor) {
                
                $dadosItemAgenda = array(
                    'idAgendaHorario' => $id,
                    'dtAgenda' => $dataNova
                );
                $idItem=$model->setAgendaHorarioItens($dadosItemAgenda);
                $diadasemana = $this->diasemana($dataNova);
                if ($diadasemana == 'Sab') {
                    $diatrabalho = 2;
                } else {
                if ($diadasemana == 'Dom') {
                    $diatrabalho = 3;
                } else {
                    $diatrabalho = 1;
                }}
                foreach($arrayProfissionales as $value) {
                    
                    $dadosItemProfissional = array(
                        'idAgendaHorarioItens' => $idItem,
                        'idTipoAgenda' => $diatrabalho,
                        'idAgendaHorario' => $id,
                        'idProfissional' => $value['idProfissional']
                    );
                    $model->setAgendaHorarioProfissional($dadosItemProfissional);                    
                }
                
                $dataNova = date('Y-m-d', strtotime('+1 days', strtotime($dataNova))) . ' 00:00:00';
                
            //    var_dump($dataNova); die;
                $ano1 = substr($dataNova,0,4);
                if ($ano1 <> $ano) {
                    $valor = false;
                }
                
                if ($y>365) {
                    $valor = false;
                }
                $y++;
            }
        } else {
            $id=$data['idAgendaHorario'];
            $model->updAgendaHorario($data); //update
        }    
        
        header('Location: /agendahorario/novo_agendahorario/idAgendaHorario/' . $id);
//        return;
    }
    public function gravaProfissional() {
        $idAgendaHorario = $_POST['idAgendaHorario'];
        $idProfissional = $_POST['idProfissional'];
        
//        print_a_die($_POST);
        
        $model = new agendahorarioModel();

        $registros = $model->getAgendaHorarioItensA('ahi.idAgendaHorario = ' . $idAgendaHorario);
        foreach ($registros as $value) {     

            $diadasemana = $this->diasemana($value['dtAgenda']);
            if ($diadasemana == 'Sab') {
                $diatrabalho = 2;
            } else {
            if ($diadasemana == 'Dom') {
                $diatrabalho = 3;
            } else {
                $diatrabalho = 1;
            }}

            $dadosItemProfissional = array(
                'idAgendaHorarioItens' => $value['idAgendaHorarioItens'],
                'idProfissional' => $idProfissional,
                'idAgendaHorario' => $idAgendaHorario,
                'idTipoAgenda' => $diatrabalho
            );
            $model->setAgendaHorarioProfissional($dadosItemProfissional);
        }
        
        $lista_agendahorarioprofissional = null;        
        if ($idAgendaHorario) {
            $where = 'ah.idAgendaHorario = ' . $idAgendaHorario;
            $lista_agendahorarioprofissional = $model->getAgendaHorarioProfissionales($where);
        }    

        $lista_profissional = array('' => 'SELECIONE');
        foreach ($model->getProfissionalSemAgenda($idAgendaHorario) as $value) {
            $lista_profissional[$value['idProfissional']] = $value['dsProfissional'];
        }
        $this->smarty->assign('lista_profissional', $lista_profissional);
        $this->smarty->assign('lista_agendaprofissionales', $lista_agendahorarioprofissional);
        $html = $this->smarty->fetch("agendahorario/agendahorarioprofissional.html");

        // criar o array de retorno
        $jasonretorno = array('html' => $html);
        
        echo json_encode($jasonretorno);                
    }    

    private function trataPost($post) {
        $data['idAgendaHorario'] = ($post['idAgendaHorario'] != '') ? $post['idAgendaHorario'] : null;
        $data['dsAgendaHorario'] = ($post['descricao'] != '') ? $post['descricao'] : null;
        $data['idAno'] = ($post['idAno'] != '') ? $post['idAno'] . '-01-01 00:00:00' : date('Y-m-d h-i-s');
        return $data;
    }
    // Remove Padrao
    public function delagendahorario() {
                
        $idAgendaHorario = $this->getParam('idAgendaHorario');        
        $agendahorario = $idAgendaHorario;        
        if (!is_null($agendahorario)) {    
            $model = new agendahorarioModel();
            $dados['idAgendaHorario'] = $agendahorario;             
            $model->delAgendaHorario($dados);
        }
        header('Location: /agendahorario');
    }
    
    public function editarProfissional() {
        $idAgendaHorario = $_POST['idAgendaHorario'];
        $idProfissional = $_POST['idProfissional'];
        $idTipoAgenda = $_POST['idTipoAgenda'];
        $dtInicio = substr($_POST['dtInicio'],6,4) . '-' . substr($_POST['dtInicio'],3,2) . '-' . substr($_POST['dtInicio'],0,2);
        $dtFim = substr($_POST['dtFim'],6,4) . '-' . substr($_POST['dtFim'],3,2) . '-' . substr($_POST['dtFim'],0,2);

        $mysql = "update clinAgendaHorarioItens ai
        inner join clinAgendaHorarioItensProfissional ac on
        ai.idAgendaHorarioItens = ac.idAgendaHorarioItens and ai.idAgendaHorario = ac.idAgendaHorario
        set ac.idTipoAgenda = {$idTipoAgenda} 
        where ac.idProfissional = {$idProfissional} and ai.idAgendaHorario = {$idAgendaHorario} and ai.dtAgenda >= '{$dtInicio}' and ai.dtAgenda <= '{$dtFim}'";
        $model = new agendahorarioModel();
        $model->updAgendaHorarioProfissional($mysql);
        $jasonretorno = array('html' => '');        
        echo json_encode($jasonretorno);                        
    }
    
    public function delprofissional() {
        
        $idAgendaHorario = $_POST['idAgendaHorario'];
        $idProfissional = $_POST['idProfissional'];
        $model = new agendahorarioModel();
        
        $where = 'idProfissional = ' . $idProfissional;
        $model->delAgendaHorarioStatus($where);
        
        $where = 'idProfissional = ' . $idProfissional;
        $model->delAgendaHorarioProfissional($where);

        $lista_profissional = array('' => 'SELECIONE');
        foreach ($model->getProfissionalSemAgenda($idAgendaHorario) as $value) {
            $lista_profissional[$value['idProfissional']] = $value['dsProfissional'];
        }
        $this->smarty->assign('lista_profissional', $lista_profissional);
        
        $lista_agendahorarioprofissional = null;        
        if ($idAgendaHorario) {
            $where = 'ah.idAgendaHorario = ' . $idAgendaHorario;
            $lista_agendahorarioprofissional = $model->getAgendaHorarioProfissionales($where);
        }    
                
        $this->smarty->assign('lista_agendaprofissionales', $lista_agendahorarioprofissional);
        $html = $this->smarty->fetch("agendahorario/agendahorarioprofissional.html");
        
        // criar o array de retorno
        $jasonretorno = array('html' => $html);
        echo json_encode($jasonretorno);        
    }
    public function diasemana($data) {
       // var_dump($data); die;
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
?>