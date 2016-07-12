<?php

class profissionalModel extends model {

    var $tabPadrao = 'clinProfissional';
    var $campo_chave = 'idProfissional';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idProfissional'] = NULL;
        $dados[0]['dsProfissional'] = NULL;
        return $dados;
    }
    
    public function getProfissional($where = null) {
        $tables = 'clinProfissional a inner join clinAgendaHorarioItensProfissional p'
                . ' on p.idProfissional = a.idProfissional';
       // echo $tables; die;
        return $this->read($tables, array('a.*'), $where, 'a.idProfissional', null, null, null);
    }
    public function getProfissionalGeral($where = null) {
        $tables = 'clinProfissional a';
       // echo $tables; die;
        return $this->read($tables, array('a.*'), $where, null, null, null, null);
    }
    
    public function getProfissionalMO($where = null) {
        $tables = 'clinProfissional as a';
       // echo $tables; die;
        return $this->read($tables, array('a.idProfissional as idProfissionalMO', 'a.dsProfissional'), $where, null, null, null, null);
    }
    //Grava o perfil
    public function setProfissional($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updProfissional($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delProfissional($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
