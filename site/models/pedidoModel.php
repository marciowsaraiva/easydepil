<?php

class pedidoModel extends model {

    var $tabPadrao = 'clinPedido';
    var $campo_chave = 'idPedido';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idPedido'] = '';
        $dados[0]['dtPedido'] = NULL;
        $dados[0]['nrPedido'] = NULL;
        $dados[0]['idFornecedor'] = NULL;
        $dados[0]['idUsuario'] = NULL;
        $dados[0]['dsObservacao'] = NULL;
        return $dados;
    }
    
    public function getPedido($where = null) {
        $tables = 'clinPedido as a';
        $tables .= ' left join clinFornecedor as m on m.idFornecedor = a.idFornecedor';
        $tables .= ' left join clinUsuarios as u on u.idUsuario = a.idUsuarioBaixa';
        $tables .= ' left join clinPedidoItens as i on i.idPedido = a.idPedido';
        $tables .= ' left join clinOrigemInformacao as o on o.idOrigemInformacao = a.idOrigemInformacao';
        $group_by = 'a.idPedido';
        return $this->read($tables, array('a.*', 'm.dsFornecedor', 'o.dsOrigemInformacao', 'u.dsUsuario', 'sum(i.vlPedido) as vlTotalPedido'), $where, $group_by, null, null, null);
    }

    public function getFinanceiro($where = null) {
        $tables = 'clinFinanceiro';
        return $this->read($tables, array('*'), $where, null, null, null, null);
    }
    public function getFinanceiroParcelas($where = null) {
        $tables = 'clinFinanceiroParcelas';
        return $this->read($tables, array('*'), $where, null, null, null, null);
    }
    public function getFinanceiroParcelasEmAberto($where = null) {
        $tables = 'clinucao.clinFinanceiroParcelas parc 
            inner join clinucao.clinFinanceiro fin on fin.idFinanceiro = parc.idFinanceiro
            inner join clinucao.clinPedido ped on ped.idPedido = fin.idPedido
            inner join clinucao.clinFornecedor forn on ped.idFornecedor = forn.idFornecedor';
        $campos = array('ped.nrPedido, ped.idPedido, parc.nrParcela, parc.idFinanceiroParcela, parc.vlParcela, parc.dtVencimento, ped.dsObservacao, forn.dsFornecedor');
        $orderby = 'parc.dtVencimento';
        return $this->read($tables, $campos, $where,null ,null,null, $orderby, null, null);
    }
    public function getFinanceiroParcelasEmAbertoMes($where = null) {
        $tables = 'clinucao.clinFinanceiroParcelas parc 
            inner join clinucao.clinFinanceiro fin on fin.idFinanceiro = parc.idFinanceiro
            inner join clinucao.clinPedido ped on ped.idPedido = fin.idPedido
            inner join clinucao.clinFornecedor forn on ped.idFornecedor = forn.idFornecedor';
        $campos = array("sum(parc.vlParcela) as total, date_format(parc.dtVencimento,'%M %Y') as datavencimento");
        $orderby = 'parc.dtVencimento';
        $groupby = 'year(parc.dtVencimento), month(parc.dtVencimento)';
        return $this->read($tables, $campos, $where,$groupby ,null,null, $orderby, null, null);
    }
    public function getPedidoItens($where = null) {
        $tables = 'clinPedidoItens as a';
        $tables .= ' left join clinPedido as i on i.idPedido = a.idPedido';
        $tables .= ' left join clinInsumo as d on d.idInsumo = a.idInsumo';
        $tables .= ' left join clinGrupo as m on m.idGrupo = d.idGrupo';
        $orderby = 'a.idPedidoItem';
        return $this->read($tables, array('a.*', 'd.dsInsumo', 'm.dsGrupo', '(a.vlPedido / a.qtPedido) as vlUnitario'), $where, null, null, null, $orderby);
    }

    public function getUltimoPedido($where = null) {
        return $this->read('clinPedido', array('max(nrPedido) as ultimo'), null, null, null, null, null);
    }

    public function getTotalPedidoItens($where = null) {
        $tables = 'clinPedidoItens as a';
        $tables .= ' left join clinPedido as i on i.idPedido = a.idPedido';
        return $this->read($tables, array('sum(a.vlPedido) as totalpedido'), $where, null, null, null, null);
    }

    //Grava o perfil
    public function setPedido($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    public function setPedidoFinanceiro($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinFinanceiro', $array, false));
        $this->commit();
        return $id;
    }

    public function setPedidoFinanceiroItem($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinFinanceiroParcelas', $array, false));
        $this->commit();
        return $id;
    }

    public function setPedidoItem($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinPedidoItens', $array, false));
        $this->commit();
        return $id;
    }
    //Atualiza o Log
    public function updPedido($array,$where) {
        //Chave    
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }
    //Atualiza o Log
    public function updPedidoItem($array, $where) {
        //Chave    
        $this->startTransaction();
        $this->transaction($this->update('clinInsumo', $array, $where));
        $this->commit();
        return true;
    }

    public function updFinanceiroItem($array, $where) {
        $this->startTransaction();
        $this->transaction($this->update('clinFinanceiroParcelas', $array, $where));
        $this->commit();
        return true;
    }
    //Remove perfil    
    public function delPedidoItem($where = null) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinPedidoItens', $where, true));
        $this->commit();
        return true;
    }
    public function delFinanceiroItem($where = null) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinFinanceiroParcelas', $where, true));
        $this->commit();
        return true;
    }
    public function delPedido($where = null) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinPedido', $where, true));
        $this->commit();
        return true;
    }
}
?>
