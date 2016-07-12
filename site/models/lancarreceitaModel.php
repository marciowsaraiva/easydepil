<?php

class lancarreceitaModel extends model {

    var $tabPadrao = 'clinFinanceiro';
    var $campo_chave = 'idFinanceiro';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idFinanceiro'] = '';
        $dados[0]['idAgenda'] = NULL;
        $dados[0]['idReceita'] = NULL;
        $dados[0]['idReceita'] = NULL;
        $dados[0]['dtFinanceiro'] = NULL;
        $dados[0]['vlFinanceiro'] = NULL;
        $dados[0]['idCliente'] = NULL;
        $dados[0]['idCliente'] = NULL;
        $dados[0]['dsObservacao'] = NULL;
        return $dados;
    }
    
    public function getFinanceiroReceita($where = null) {
        $tables = 'clinFinanceiro as a';
        $tables .= ' left join clinReceita as d on d.idReceita = a.idReceita';
        $tables .= ' left join clinCliente as m on m.idCliente = a.idCliente';
        return $this->read($tables, array('a.*', 'd.dsReceita', 'm.dsCliente'), $where, null, null, null, null);
    }
    public function getFinanceiroReceitasHoje($where = null) {
        $tables = 'clinFinanceiro as a';
        $tables .= ' left join clinReceita as d on d.idReceita = a.idReceita';
        $tables .= ' left join clinCliente as m on m.idCliente = a.idCliente';
        return $this->read($tables, array('a.*', 'd.dsReceita', 'm.dsCliente'), $where, null, null, null, null);
    }

    //Grava o perfil
    public function setFinanceiro($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updFinanceiro($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delFinanceiro($where = null) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinFinanceiro', $where, true));
        $this->commit();
        return true;
    }
}
?>
