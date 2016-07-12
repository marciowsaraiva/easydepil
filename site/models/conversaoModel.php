<?php

class conversaoModel extends model {

    var $tabPadrao = 'clinConversao';
    var $campo_chave = 'idConversao';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idConversao'] = NULL;
        $dados[0]['dsConversao'] = NULL;
        return $dados;
    }
    
    public function getConversao($where = null) {
        $tables = 'clinConversao as a';
        $tables .= ' left join clinUnidade as o on o.idUnidade = a.idUnidadeOrigem';
        $tables .= ' left join clinUnidade as d on d.idUnidade = a.idUnidadeDestino';
        $orderby = 'a.dsConversao';
        return $this->read($tables, array('a.*', 'o.dsUnidade as dsUnidadeOrigem', 'd.dsUnidade  as dsUnidadeDestino'), $where, null, null, null, $orderby);
    }

    public function getConversaoPP($where = null) {
        $tables = 'clinConversao as a';
        $tables .= ' left join clinUnidade as o on o.idUnidade = a.idUnidadeOrigem';
        $tables .= ' left join clinUnidade as d on d.idUnidade = a.idUnidadeDestino';
        $orderby = 'a.dsConversao';
        return $this->read($tables, array('a.*', 'o.dsUnidade as dsUnidadeOrigem', 'd.dsUnidade  as dsUnidadeDestino'), $where, null, null, null, $orderby);
    }
    //Grava o perfil
    public function setConversao($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updConversao($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delConversao($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
