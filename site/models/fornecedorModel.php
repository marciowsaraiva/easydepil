<?php

class fornecedorModel extends model {

    var $tabPadrao = 'clinFornecedor';
    var $campo_chave = 'idFornecedor';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idFornecedor'] = NULL;
        $dados[0]['dsFornecedor'] = NULL;
        return $dados;
    }
    
    public function getFornecedor($where = null) {
        $tables = 'clinFornecedor as a';
        $tables .= ' left join clinTipoFornecedor as d on d.idTipoFornecedor = a.idTipoFornecedor';
        $orderby = 'a.dsFornecedor';
        return $this->read($tables, array('a.*', 'd.dsTipoFornecedor'), $where, null, null, null, $orderby);
    }

    //Grava o perfil
    public function setFornecedor($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updFornecedor($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delFornecedor($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
