<?php

class osgrupoModel extends model {

    var $tabPadrao = 'clinOSGrupo';
    var $campo_chave = 'idOSGrupo';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idOSGrupo'] = NULL;
        $dados[0]['dsOSGrupo'] = NULL;
        return $dados;
    }

    public function getOSGrupo($where = null) {
        return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);         
    }

    //Grava o perfil
    public function setOSGrupo($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updOSGrupo($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delOSGrupo($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }

}

?>
