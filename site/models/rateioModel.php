<?php

class rateioModel extends model {

    var $tabPadrao = 'clinRateio';
    var $campo_chave = 'idRateio';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idRateio'] = NULL;
        $dados[0]['dsRateio'] = NULL;
        return $dados;
    }
    
    public function getRateio($where = null) {
        $tables = 'clinRateio as a';
        $tables .= ' left join clinCentroCusto as m on m.idCentroCusto = a.idCentroCusto';
        $tables .= ' left join clinOrigemInformacao as f on f.idOrigemInformacao = a.idOrigemInformacao';
        $orderby = 'a.dtRateio';
        return $this->read($tables, array('a.*'), $where, null, null, null, $orderby);
    }

    //Grava o perfil
    public function setRateio($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updRateio($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delRateio($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
