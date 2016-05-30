<?php

class insumoModel extends model {

    var $tabPadrao = 'clinInsumo';
    var $campo_chave = 'idInsumo';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idInsumo'] = NULL;
        $dados[0]['dsInsumo'] = NULL;
        return $dados;
    }
    
    public function getInsumo($where = null) {
        $tables = 'clinInsumo as a';
        $tables .= ' left join clinGrupo as d on d.idGrupo = a.idGrupo';
        $tables .= ' left join clinMarca as m on m.idMarca = a.idMarca';
        $tables .= ' left join clinModelo as c on c.idModelo = a.idModelo';
        $orderby = 'a.dsInsumo';
        return $this->read($tables, array('a.*', 'd.dsGrupo', 'm.dsMarca', 'c.dsModelo'), $where, null, null, null, $orderby);
    }

    public function getInsumoPP($where = null) {
        $tables = 'clinInsumo as a';
        $tables .= ' left join clinGrupo as d on d.idGrupo = a.idGrupo';
        $tables .= ' left join clinMarca as m on m.idMarca = a.idMarca';
        $tables .= ' left join clinModelo as c on c.idModelo = a.idModelo';
        $tables .= ' left join clinFornecedor as f on f.idFornecedor = a.idFornecedorUltimaCompra';
        $orderby = 'a.dsInsumo';
        return $this->read($tables, array('a.*', 'd.dsGrupo', 'm.dsMarca', 'c.dsModelo', 'f.dsFornecedor'), $where, null, null, null, $orderby);
    }
    //Grava o perfil
    public function setInsumo($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updInsumo($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delInsumo($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
