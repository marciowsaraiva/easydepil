<?php

class perfilModel extends model {

    var $tabPadrao = 'clinPerfil';
    var $campo_chave = 'idPerfil';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idPerfil'] = NULL;
        $dados[0]['dsPerfil'] = NULL;
        $dados[0]['stStatus'] = NULL;
        return $dados;
    }

    public function getPerfil($where = null) {
        return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);         
    }

    //Grava o perfil
    public function setPerfil($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updPerfil($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delPerfil($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $array['stStatus'] = 0; //Muda stStatus para zero excluido!   
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

}

?>
