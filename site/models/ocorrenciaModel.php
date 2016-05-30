<?php

class ocorrenciaModel extends model {

    var $tabPadrao = 'clinOcorrencias';
    var $campo_chave = 'idOcorrencia';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idOcorrencia'] = NULL;
        $dados[0]['dsOcorrencia'] = NULL;
        return $dados;
    }
    
    public function getOcorrencia($where = null) {
        $tables = 'clinOcorrencias as a';
        $tables .= ' left join clinOS as m on m.idOS = a.idOS';
        $tables .= ' left join clinOrigemInformacao as f on f.idOrigemInformacao = a.idOrigemInformacao';
        $tables .= ' left join clinTipoOcorrencia as g on g.idTipoOcorrencia = a.idTipoOcorrencia';
        $tables .= ' left join clinMotivo as h on h.idMotivo = a.idMotivo';
        $orderby = 'a.dtOcorrencia';
        return $this->read($tables, array('a.*'), $where, null, null, null, $orderby);
    }

    //Grava o perfil
    public function setOcorrencia($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    public function setOcorrenciaInsumo($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinOcorrenciasInsumo', $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updOcorrencia($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delOcorrencia($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
}
?>
