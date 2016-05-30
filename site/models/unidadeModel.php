<?php

class unidadeModel extends model {

    var $tabPadrao = 'clinUnidade';
    var $campo_chave = 'idUnidade';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idUnidade'] = NULL;
        $dados[0]['dsUnidade'] = NULL;
        return $dados;
    }

    public function getUnidade($where = null) {
        return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);         
    }

    public function getInsumoUnidade($where = null) {
        $table = 'clinInsumo i left join clinUnidade u on i.idUnidade = u.idUnidade';
        return $this->read($table, array('u.dsUnidade', 'i.qtEstoque', 'i.vlUltimaCompra', 'i.vlUnitario'), $where, null, null, null, null);         
    }
    public function getMaoObraUnidade($where = null) {
        $table = 'clinMaoObra i left join clinUnidade u on i.idUnidade = u.idUnidade';
        return $this->read($table, array('u.dsUnidade', 'i.vlUnitario'), $where, null, null, null, null);         
    }
    public function getMaquinaUnidade($where = null) {
        $table = 'clinMaquina i left join clinUnidade u on i.idUnidade = u.idUnidade';
        return $this->read($table, array('u.dsUnidade', 'i.vlUnitario'), $where, null, null, null, null);         
    }
    //Grava o perfil
    public function setUnidade($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updUnidade($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delUnidade($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }

}

?>
