<?php

class despesaModel extends model {

    var $tabPadrao = 'clinDespesa';
    var $campo_chave = 'idDespesa';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idDespesa'] = NULL;
        $dados[0]['dsDespesa'] = NULL;
        return $dados;
    }
    
    public function getDespesa($where = null) {
        $tables = 'clinDespesa as a';
        $tables .= ' left join clinTipoDespesa as d on d.idTipoDespesa = a.idTipoDespesa';
        $orderby = 'a.dsDespesa';
        return $this->read($tables, array('a.*', 'd.dsTipoDespesa'), $where, null, null, null, $orderby);
    }

    public function getDespesaPP($where = null) {
        $tables = 'clinDespesa as a';
        $tables .= ' left join clinTipoDespesa as d on d.idTipoDespesa = a.idTipoDespesa';
        $orderby = 'a.dsDespesa';
        return $this->read($tables, array('a.*', 'd.dsTipoDespesa'), $where, null, null, null, $orderby);
    }
    //Grava o perfil
    public function setDespesa($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updDespesa($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delDespesa($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
