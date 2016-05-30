<?php

class faseModel extends model {

    var $tabPadrao = 'clinProjetoFases';
    var $campo_chave = 'idFase';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idProjetoFase'] = NULL;
        $dados[0]['idProjeto'] = NULL;
        $dados[0]['idFase'] = NULL;
        $dados[0]['dsFase'] = NULL;
        $dados[0]['dtInicioPrevista'] = NULL;
        $dados[0]['dtFimPrevista'] = NULL;
        $dados[0]['vlOrcado'] = NULL;
        $dados[0]['idStatusFase'] = NULL;
        $dados[0]['idColaboradorResponsavel'] = NULL;
        $dados[0]['dsTermoAbertura'] = NULL;
        $dados[0]['dsTermoEncerramento'] = NULL;
        return $dados;
    }
    public function getFaseComboBox($where = null){
        $fields = array("p.idFase","p.dsFase");
        $table = "clinProjetoFases p inner join clinFaseUsuario up on p.idFase = up.idFase";
        return $this->read($table, $fields, $where, null, null, null, "p.dsFase");
    }
    //fase por usuario
    public function getFaseUsuario($where = NULL, $orderby = "p.dsFase") {
        $tables = "clinProjetoFases f
            inner join clinProjeto p on p.idProjeto = f.idProjeto
            inner join clinProjetoUsuario up on p.idProjeto = up.idProjeto";
        return $this->read($tables, array("p.*"), $where, NULL, NULL, NULL, $orderby);
    }
    public function getFaseStatus($where = null) {
        $tables = 'clinFaseMudancaStatus f ';
        $tables .= ' left join clinStatusProjeto s on s.idStatusProjeto = f.idStatusFase';
        $tables .= ' left join clinUsuarios u on u.idUsuario = f.idUsuario';
        $tables .= ' left join clinOrigemInformacao o on o.idOrigemInformacao = f.idOrigemInformacao';
        $orderby = 'f.idFaseMudancaStatus';
        return $this->read($tables, array('f.*' , 'u.dsUsuario', 's.dsStatusProjeto', 'o.dsOrigemInformacao'), $where, null, null, null, $orderby);
    }
    
    public function getFase($where = null) {
        $tables = 'clinProjeto as p';
        $tables .= ' inner join clinProjetoFases as a on a.idProjeto = p.idProjeto';
        $tables .= ' left join clinColaborador as b on b.idColaborador = a.idColaboradorResponsavel';
        $tables .= ' left join clinStatusProjeto as s on s.idStatusProjeto = a.idStatusFase';
       // echo $tables; die;
        return $this->read($tables, array('a.*', 'b.dsColaborador', 'p.dsProjeto', 's.dsStatusProjeto','p.idProjeto as cprojeto'), $where, null, null, null, null);
    }

    public function getFaseProjeto($where = null) {
        $tables = 'clinProjeto as p';
        $tables .= ' inner join clinProjetoFases as f on f.idProjeto = p.idProjeto';
        $tables .= ' left join clinColaborador as c on c.idColaborador = f.idColaboradorResponsavel';
        $tables .= ' left join clinStatusProjeto as s on s.idStatusProjeto = f.idStatusFase';
       // echo $tables; die;
        return $this->read($tables, array('f.*', 'c.dsColaborador', 'p.dsProjeto', 's.dsStatusProjeto','p.idProjeto as cprojeto'), $where, null, null, null, null);
    }
    //Grava o perfil
    public function setFase($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }
    public function setNovoStatusFase($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinFaseMudancaStatus', $array, false));
        $this->commit();
        return $id;
    }
    
    //Atualiza o Log
    public function updFase($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delFase($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
