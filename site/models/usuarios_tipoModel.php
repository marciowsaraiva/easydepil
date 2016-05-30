<?php

class usuarios_tipoModel extends model {

    var $tabPadrao = 'clinTipoUsuario';
    var $campo_chave = 'idTipoUsuario';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idTipoUsuario'] = NULL;
        $dados[0]['dsTipoUsuario'] = NULL;
        $dados[0]['stStatus'] = NULL;
        return $dados;
    }

    //Recupera o Log
    public function getUsuariosTipo($where = null) {
        return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);
    }

    //Grava o log
    public function setUsuariosTipo($array) {

        $this->startTransaction();

        $id = $this->transaction(
                $this->insert($this->tabPadrao, $array, false)
        );

        $this->commit();

        return $id;
    }

    //Atualiza o Log
    public function updUsuariosTipo($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove o Log
    public function delUsuariosTipo($array) {
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
