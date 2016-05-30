<?php

class maoobraModel extends model {

    var $tabPadrao = 'clinMaoObra';
    var $campo_chave = 'idMaoObra';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idMaoObra'] = NULL;
        $dados[0]['dsMaoObra'] = NULL;
        return $dados;
    }
    
    public function getMaoObra($where = null) {
        $tables = 'clinMaoObra as a';
        $tables .= ' left join clinTipoMaoObra as d on d.idTipoMaoObra = a.idTipoMaoObra';
        $tables .= ' left join clinUnidade as u on u.idUnidade = a.idUnidade';
        $orderby = 'a.dsMaoObra';
        return $this->read($tables, array('a.*', 'd.dsTipoMaoObra', 'u.dsUnidade'), $where, null, null, null, $orderby);
    }

    public function getMaoObraPP($where = null) {
        $tables = 'clinMaoObra as a';
        $tables .= ' left join clinTipoMaoObra as d on d.idTipoMaoObra = a.idTipoMaoObra';
        $tables .= ' left join clinUnidade as u on u.idUnidade = a.idUnidade';
        $orderby = 'a.dsMaoObra';
        return $this->read($tables, array('a.*', 'd.dsTipoMaoObra', 'u.dsUnidade'), $where, null, null, null, $orderby);
    }
    //Grava o perfil
    public function setMaoObra($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updMaoObra($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delMaoObra($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
