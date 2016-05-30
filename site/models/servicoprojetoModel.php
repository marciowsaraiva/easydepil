<?php

class servicoprojetoModel extends model {

    var $tabPadrao = 'clinProjetoServicos';
    var $campo_chave = 'idProjetoServico';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idProjetoServico'] = NULL;
        $dados[0]['idProjeto'] = NULL;
        $dados[0]['idServico'] = NULL;
        $dados[0]['idFase'] = NULL;
        $dados[0]['dsServicoProjeto'] = NULL;
        $dados[0]['dtInicioPrevista'] = NULL;
        $dados[0]['dtFimPrevista'] = NULL;
        $dados[0]['vlOrcado'] = NULL;
        $dados[0]['idStatusServicoProjeto'] = NULL;
        $dados[0]['idColaboradorResponsavel'] = NULL;
        $dados[0]['dsTermoAbertura'] = NULL;
        $dados[0]['dsTermoEncerramento'] = NULL;
        return $dados;
    }
    public function getServicoProjetoComboBox($where = null){
        $fields = array("p.idServicoProjeto","p.dsServicoProjeto");
        $table = "clinProjetoServicoProjetos p inner join clinServicoProjetoUsuario up on p.idServicoProjeto = up.idServicoProjeto";
        return $this->read($table, $fields, $where, null, null, null, "p.dsServicoProjeto");
    }
    //servicoprojeto por usuario
    public function getServicoProjetoUsuario($where = NULL, $orderby = "p.dsServicoProjeto") {
        $tables = "clinProjetoServicoProjetos f
            inner join clinProjeto p on p.idProjeto = f.idProjeto
            inner join clinProjetoUsuario up on p.idProjeto = up.idProjeto";
        return $this->read($tables, array("p.*"), $where, NULL, NULL, NULL, $orderby);
    }
    public function getServicoStatus($where = null) {
        $tables = 'clinServicoMudancaStatus f ';
        $tables .= ' left join clinStatusProjeto s on s.idStatusProjeto = f.idStatusServico';
        $tables .= ' left join clinUsuarios u on u.idUsuario = f.idUsuario';
        $tables .= ' left join clinOrigemInformacao o on o.idOrigemInformacao = f.idOrigemInformacao';
        $orderby = 'f.idServicoMudancaStatus';
        return $this->read($tables, array('f.*' , 'u.dsUsuario', 's.dsStatusProjeto', 'o.dsOrigemInformacao'), $where, null, null, null, $orderby);
    }
    
    public function getServicoProjeto($where = null) {
        $tables = 'clinProjetoServicos as ps';
        $tables .= ' left join clinProjetoFases as pf on pf.idFase = ps.idFase';
        $tables .= ' left join clinProjeto as p on p.idProjeto = ps.idProjeto';
        $tables .= ' left join clinColaborador as c on c.idColaborador = ps.idColaboradorResponsavel';
        $tables .= ' left join clinStatusProjeto as s on s.idStatusProjeto = ps.idStatusServico';
       // echo $tables; die;
        return $this->read($tables, array('ps.*', 'c.dsColaborador', 'p.dsProjeto as nomeprojeto', 's.dsStatusProjeto','p.idProjeto as cprojeto','pf.dsFase as nomefase'), $where, null, null, null, null);
    }
    public function getServicoProjetoServicos($where = null) {
        $tables = 'clinProjetoServicosServico as ps';
        $tables .= ' inner join clinServicos as s on s.idServico = ps.idServico';
        return $this->read($tables, array('ps.*', 's.dsServico'), $where, null, null, null, null);
    }

    public function getServicoProjetoFase($where = null) {
        $tables = 'clinProjetoServicos as ps '
                . ' inner join clinProjetoFases pf on ps.idFase = pf.idFase and ps.idProjeto = pf.idProjeto '
                . ' inner join clinProjeto p on ps.idProjeto = p.idProjeto';
        return $this->read($tables, array('ps.idFase', 'ps.idProjeto', 'p.vlOrcado as vlOrcadoProjeto', 'pf.vlOrcado as vlOrcadoFase'), $where, null, null, null, null);
    }

    public function getServicoProjetoServicosTotal($where = null) {
        $tables = 'clinProjetoServicosServico as ps';
        return $this->read($tables, array('sum(ps.vlTotal) as total'), $where, null, null, null, null);
    }

    public function getServicoProjetoProjeto($where = null) {
        $tables = 'clinProjeto as p';
        $tables .= ' inner join clinProjetoServicoProjetos as f on f.idProjeto = p.idProjeto';
        $tables .= ' left join clinColaborador as c on c.idColaborador = f.idColaboradorResponsavel';
        $tables .= ' left join clinStatusProjeto as s on s.idStatusProjeto = f.idStatusServicoProjeto';
       // echo $tables; die;
        return $this->read($tables, array('f.*', 'c.dsColaborador', 'p.dsProjeto', 's.dsStatusProjeto','p.idProjeto as cprojeto'), $where, null, null, null, null);
    }
    //Grava o perfil
    public function setServicoProjeto($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }
    public function setServicoProjetoServico($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinProjetoServicosServico', $array, false));
        $this->commit();
        return $id;
    }
    public function setNovoStatusServicoProjeto($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinServicoMudancaStatus', $array, false));
        $this->commit();
        return $id;
    }

    public function updServicoProjeto($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }
    public function updServicoProjetoFase($array) {
        //Chave    
        $where = 'idFase = ' . $array['idFase'];
        $this->startTransaction();
        $this->transaction($this->update('clinProjetoFases', $array, $where));
        $this->commit();
        return true;
    }

    public function updServicoProjetoProjeto($array) {
        //Chave    
        $where = 'idProjeto = ' . $array['idProjeto'];
        $this->startTransaction();
        $this->transaction($this->update('clinProjeto', $array, $where));
        $this->commit();
        return true;
    }
    //Remove perfil    
    public function delServicoProjeto($where) {
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
    public function delServicoProjetoServicos($where) {
        $this->startTransaction();
        $this->transaction($this->delete('clinProjetoServicosServico', $where, true));
        $this->commit();
        return true;
    }
}
?>
