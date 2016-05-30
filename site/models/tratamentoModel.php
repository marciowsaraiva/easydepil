<?php

class tratamentoModel extends model {

    var $tabPadrao = 'clinTratamento';
    var $campo_chave = 'idTratamento';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idTratamento'] = NULL;
        $dados[0]['dsTratamento'] = NULL;
        return $dados;
    }
    
    public function getTratamento($where = null) {
        $tables = 'clinTratamento as a';
        $tables .= ' left join clinTipoTratamento as d on d.idTipoTratamento = a.idTipoTratamento';
        $orderby = 'a.dsTratamento';
        return $this->read($tables, array('a.*', 'd.dsTipoTratamento'), $where, null, null, null, $orderby);
    }

    public function getTratamentoPP($where = null) {
        $tables = 'clinTratamento as a';
        $tables .= ' left join clinTipoTratamento as d on d.idTipoTratamento = a.idTipoTratamento';
        $orderby = 'a.dsTratamento';
        return $this->read($tables, array('a.*', 'd.dsTipoTratamento'), $where, null, null, null, $orderby);
    }
    //Grava o perfil
    public function setTratamento($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updTratamento($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delTratamento($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
