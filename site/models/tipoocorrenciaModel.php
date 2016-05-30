<?php

class tipoocorrenciaModel extends model {

    var $tabPadrao = 'clinTipoOcorrencia';
    var $campo_chave = 'idTipoOcorrencia';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idTipoOcorrencia'] = NULL;
        $dados[0]['dsTipoOcorrencia'] = NULL;
        return $dados;
    }

    public function getTipoOcorrencia($where = null) {
        return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);         
    }

    //Grava o perfil
    public function setTipoOcorrencia($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updTipoOcorrencia($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delTipoOcorrencia($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }

}

?>
