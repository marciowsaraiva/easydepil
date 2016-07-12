<?php

class formapagamentoModel extends model {

    var $tabPadrao = 'clinFormaPagamento';
    var $campo_chave = 'idFormaPagamento';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idFormaPagamento'] = NULL;
        $dados[0]['dsFormaPagamento'] = NULL;
        return $dados;
    }

    public function getFormaPagamento($where = null) {
        return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);         
    }

    //Grava o perfil
    public function setFormaPagamento($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updFormaPagamento($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delFormaPagamento($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }

}

?>
