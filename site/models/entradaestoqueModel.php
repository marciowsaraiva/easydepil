<?php

class entradaestoqueModel extends model {

    var $tabPadrao = 'clinMovimento';
    var $campo_chave = 'idMovimento';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idMovimento'] = '';
        $dados[0]['dtMovimento'] = NULL;
        $dados[0]['idTipoMovimento'] = NULL;
        $dados[0]['nrNota'] = NULL;
        $dados[0]['nrPedido'] = NULL;
        $dados[0]['idFornecedor'] = NULL;
        $dados[0]['idUsuario'] = NULL;
        $dados[0]['dsObservacao'] = NULL;
        return $dados;
    }
    
    public function getMovimento($where = null) {
        $tables = 'clinMovimento as a';
        $tables .= ' left join clinTipoMovimento as d on d.idTipoMovimento = a.idTipoMovimento';
        $tables .= ' left join clinFornecedor as m on m.idFornecedor = a.idFornecedor';
        return $this->read($tables, array('a.*', 'd.dsTipoMovimento', 'm.dsFornecedor'), $where, null, null, null, null);
    }

    public function getMovimentoItens($where = null) {
        $tables = 'clinMovimentoItens as a';
        $tables .= ' left join clinMovimento as i on i.idMovimento = a.idMovimento';
        $tables .= ' left join clinTipoMovimento as t on t.idTipoMovimento = a.idTipoMovimento';
        $tables .= ' left join clinInsumo as d on d.idInsumo = a.idInsumo';
        $tables .= ' left join clinGrupo as m on m.idGrupo = d.idGrupo';
        $orderby = 'a.idMovimentoItem';
        return $this->read($tables, array('a.*', 'd.dsInsumo', 'm.dsGrupo', '(a.vlMovimento / a.qtMovimento) as vlUnitario'), $where, null, null, null, $orderby);
    }

    public function getTotalMovimentoItens($where = null) {
        $tables = 'clinMovimentoItens as a';
        $tables .= ' left join clinMovimento as i on i.idMovimento = a.idMovimento';
        $tables .= ' left join clinTipoMovimento as t on t.idTipoMovimento = a.idTipoMovimento';
        return $this->read($tables, array('sum(a.vlMovimento) as totalmovimento'), $where, null, null, null, null);
    }

    //Grava o perfil
    public function setMovimento($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    public function setMovimentoItem($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinMovimentoItens', $array, false));
        $this->commit();
        return $id;
    }
    //Atualiza o Log
    public function updMovimento($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }
    //Atualiza o Log
    public function updMovimentoItem($array, $where) {
        //Chave    
        $this->startTransaction();
        $this->transaction($this->update('clinInsumo', $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delMovimentoItem($where = null) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinMovimentoItens', $where, true));
        $this->commit();
        return true;
    }
}
?>
