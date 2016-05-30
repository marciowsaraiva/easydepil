<?php

class clienteModel extends model {

    var $tabPadrao = 'clinCliente';
    var $campo_chave = 'idCliente';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idCliente'] = NULL;
        $dados[0]['dsCliente'] = NULL;
        return $dados;
    }
    
    public function getCliente($where = null) {
        $tables = 'clinCliente as a';
        $tables .= ' left join clinTipoCliente as d on d.idTipoCliente = a.idTipoCliente';
        $orderby = 'a.dsCliente';
        return $this->read($tables, array('a.*', 'd.dsTipoCliente'), $where, null, null, null, $orderby);
    }

    //Grava o perfil
    public function setCliente($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updCliente($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delCliente($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
