<?php

class receitaModel extends model {

    var $tabPadrao = 'clinReceita';
    var $campo_chave = 'idReceita';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idReceita'] = NULL;
        $dados[0]['dsReceita'] = NULL;
        return $dados;
    }
    
    public function getReceita($where = null) {
        $tables = 'clinReceita as a';
        $tables .= ' left join clinTipoReceita as d on d.idTipoReceita = a.idTipoReceita';
        $orderby = 'a.dsReceita';
        return $this->read($tables, array('a.*', 'd.dsTipoReceita'), $where, null, null, null, $orderby);
    }

    public function getReceitaPP($where = null) {
        $tables = 'clinReceita as a';
        $tables .= ' left join clinTipoReceita as d on d.idTipoReceita = a.idTipoReceita';
        $orderby = 'a.dsReceita';
        return $this->read($tables, array('a.*', 'd.dsTipoReceita'), $where, null, null, null, $orderby);
    }
    //Grava o perfil
    public function setReceita($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updReceita($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delReceita($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
