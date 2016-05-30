<?php

class log_tipoModel extends model {

    var $tabPadrao = 'log_tipo';
    var $campo_chave = 'idLogTipo';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idLogTipo'] = NULL;
        $dados[0]['descricao'] = NULL;
        $dados[0]['stStatus'] = NULL;
        return $dados;
    }

    //Recupera o Tipo de Log
    public function getLog_tipo($where = null) {
        return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);
    }

    //Grava o Tipo de Log
    public function setLog_tipo($array) {

        $this->startTransaction();

        $id = $this->transaction(
                $this->insert($this->tabPadrao, $array, false)
        );

        $this->commit();

        return $id;
    }

    //Atualiza o Tipo de Log
    public function updLog_tipo($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove o Padrao
    public function delLog_tipo($array) {
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
