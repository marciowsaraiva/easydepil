<?php

class logoModel extends model {

    var $tabPadrao = 'projeto_logo';
    var $campo_chave = 'idLogo';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idLogo'] = NULL;
        $dados[0]['idProjeto'] = NULL;
        $dados[0]['arquivo'] = NULL;
        $dados[0]['caminho'] = NULL;
        $dados[0]['stStatus'] = NULL;
        return $dados;
    }

    //Recupera o Log
    public function getLogo($where = null) {
        $select = array('*');
        return $this->read($this->tabPadrao, $select, $where, null, null, null, null);
    }

    //Grava o log
    public function setLogo($array) {

        $this->startTransaction();

        $id = $this->transaction(
                $this->insert($this->tabPadrao, $array, false)
        );

        $this->commit();

        return $id;
    }

    //Atualiza o Log
    public function updLogo($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove o Log
    public function delLogo($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $array2['stStatus'] = 0; //Muda stStatus para zero excluido!   
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array2, $where));
        $this->commit();
        return true;
    }

}

?>
