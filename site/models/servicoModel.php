<?php

class servicoModel extends model {

    var $tabPadrao = 'clinServicos';
    var $campo_chave = 'idServico';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idServico'] = NULL;
        $dados[0]['dsServico'] = NULL;
        return $dados;
    }
    
    public function getServico($where = null) {
        $tables = 'clinServicos as a';
        $tables .= ' left join clinTipoServico as d on d.idTipoServico = a.idTipoServico';
        $orderby = 'a.dsServico';
        return $this->read($tables, array('a.*', 'd.dsTipoServico'), $where, null, null, null, $orderby);
    }

    public function getServicoTotalInsumos($where = null) {
        $tables = 'clinServicosInsumos as a';
        return $this->read($tables, array('sum(a.vlTotal) as total'), $where, null, null, null);
    }
    public function getServicoTotalMaoObra($where = null) {
        $tables = 'clinServicosMaoObra as a';
        return $this->read($tables, array('sum(a.vlTotal) as total'), $where, null, null, null);
    }
    public function getServicoTotalMaquina($where = null) {
        $tables = 'clinServicosMaquinas as a';
        return $this->read($tables, array('sum(a.vlTotal) as total'), $where, null, null, null);
    }

    public function getServicoInsumosTotal($where = null) {
        $tables = 'clinServicosInsumos a';
        return $this->read($tables, array('sum(a.vlTotal) as TotalInsumos'), $where, null, null, null);
    }
    public function getServicoMaoObraTotal($where = null) {
        $tables = 'clinServicosMaoObra a';
        return $this->read($tables, array('sum(a.vlTotal) as TotalMaoObra'), $where, null, null, null);
    }
    public function getServicoMaquinaTotal($where = null) {
        $tables = 'clinServicosMaquinas a';
        return $this->read($tables, array('sum(a.vlTotal) as TotalMaquina'), $where, null, null, null);
    }

    public function getServicoInsumos($where = null) {
        $tables = 'clinServicosInsumos as a';
        $tables .= ' left join clinInsumo as i on i.idInsumo = a.idInsumo';
        $tables .= ' left join clinUnidade as u on u.idUnidade = i.idUnidade';
        $orderby = 'i.dsInsumo';
        return $this->read($tables, array('a.*', 'i.dsInsumo', 'u.dsUnidade'), $where, null, null, null, $orderby);
    }
    public function getServicoMaquina($where = null) {
        $tables = 'clinServicosMaquinas as a';
        $tables .= ' inner join clinMaquina as i on i.idMaquina = a.idMaquina';
        $tables .= ' inner join clinUnidade as u on u.idUnidade = i.idUnidade';
        $orderby = 'i.dsMaquina';
        return $this->read($tables, array('a.*', 'i.dsMaquina', 'u.dsUnidade'), $where, null, null, null, $orderby);
    }

    public function getServicoMaoObra($where = null) {
        $tables = 'clinServicosMaoObra as a';
        $tables .= ' left join clinMaoObra as i on i.idMaoObra = a.idMaoObra';
        $tables .= ' left join clinUnidade as u on u.idUnidade = i.idUnidade';
        $orderby = 'i.dsMaoObra';
        return $this->read($tables, array('a.*', 'i.dsMaoObra', 'u.dsUnidade'), $where, null, null, null, $orderby);
    }

    public function getServicoPP($where = null) {
        $tables = 'clinServicos as a';
        $tables .= ' left join clinTipoServico as d on d.idTipoServico = a.idTipoServico';
        $orderby = 'a.dsServico';
        return $this->read($tables, array('a.*', 'd.dsTipoServico'), $where, null, null, null, $orderby);
    }
    //Grava o perfil
    public function setServico($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    public function setServicoInsumo($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinServicosInsumos', $array, false));
        $this->commit();
        return $id;
    }
    
    public function setServicoMaoObra($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinServicosMaoObra', $array, false));
        $this->commit();
        return $id;
    }
    public function setServicoMaquina($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinServicosMaquinas', $array, false));
        $this->commit();
        return $id;
    }
    //Atualiza o Log
    public function updServico($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delServico($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
    public function delServicoInsumo($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinServicosInsumos', $where, true));
        $this->commit();
        return true;
    }
    public function delServicoMaoObra($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinServicosMaoObra', $where, true));
        $this->commit();
        return true;
    }
    public function delServicoMaquina($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinServicosMaquinas', $where, true));
        $this->commit();
        return true;
    }
}
?>
