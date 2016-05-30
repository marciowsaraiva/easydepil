<?php

class maquinaModel extends model {

    var $tabPadrao = 'clinMaquina';
    var $campo_chave = 'idMaquina';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idMaquina'] = NULL;
        $dados[0]['dsMaquina'] = NULL;
        return $dados;
    }
    
    public function getMaquina($where = null) {
        $tables = 'clinMaquina as a';
        $tables .= ' left join clinMaquina as d on d.idMaquinaPai = a.idMaquina';
        $tables .= ' left join clinStatusMaquina as s on s.idStatusMaquina = a.idStatusMaquina';
        $tables .= ' left join clinGrupoCusto as g on g.idGrupoCusto = a.idGrupoCusto';
        $tables .= ' left join clinSetor as t on t.idSetor = a.idSetor';
        $tables .= ' left join clinMarca as m on m.idMarca = a.idMarca';
        $tables .= ' left join clinModelo as c on c.idModelo = a.idModelo';
        $orderby = 'a.dsMaquina';
        return $this->read($tables, array('a.*' , 'd.dsMaquina as dsMaquinaPai', 't.dsSetor', 's.dsStatusMaquina', 'g.dsGrupoCusto', 'm.dsMarca', 'c.dsModelo'), $where, null, null, null, $orderby);
    }

    public function getMaquinaStatus($where = null) {
        $tables = 'clinMaquinaMudancaStatus m ';
        $tables .= ' left join clinMaquina a on m.idMaquina = a.idMaquina';
        $tables .= ' left join clinStatusMaquina s on s.idStatusMaquina = m.idStatusMaquina';
        $tables .= ' left join clinUsuarios u on u.idUsuario = m.idUsuario';
        $tables .= ' left join clinOrigemInformacao o on o.idOrigemInformacao = m.idOrigemInformacao';
        $orderby = 'm.idMaquinaMudancaStatus';
        return $this->read($tables, array('m.*' , 'u.dsUsuario', 's.dsStatusMaquina', 'o.dsOrigemInformacao'), $where, null, null, null, $orderby);
    }
    public function getMaquinaPai($where = null) {
        $tables = 'clinMaquina as a';
        $tables .= ' left join clinMaquina as d on d.idMaquinaPai = a.idMaquina';
        $tables .= ' left join clinStatusMaquina as s on s.idStatusMaquina = a.idStatusMaquina';
        $tables .= ' left join clinGrupoCusto as g on g.idGrupoCusto = a.idGrupoCusto';
        $tables .= ' left join clinSetor as t on t.idSetor = a.idSetor';
        $tables .= ' left join clinMarca as m on m.idMarca = a.idMarca';
        $tables .= ' left join clinModelo as c on c.idModelo = a.idModelo';
        $orderby = 'a.dsMaquina';
        return $this->read($tables, array('a.*' , 'd.dsMaquina', 't.dsSetor', 's.dsStatusMaquina', 'g.dsGrupoCusto', 'm.dsMarca', 'c.dsModelo'), $where, null, null, null, $orderby);
    }
    
    //Grava a maquina
    public function setNovoStatusMaquina($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinMaquinaMudancaStatus', $array, false));
        $this->commit();
        return $id;
    }

    //Grava o novo status maquina
    public function setMaquina($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }
    
    //Atualiza o Log
    public function updMaquina($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delMaquina($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
