<?php

class agendahorarioModel extends model {

    var $tabPadrao = 'clinAgendaHorario';
    var $campo_chave = 'idAgendaHorario';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idAgendaHorario'] = NULL;
        $dados[0]['dsAgendaHorario'] = NULL;
        $dados[0]['idAno'] = NULL;
        return $dados;
    }
    
    public function getAgendaHorario($where = null) {
        $tables = 'clinAgendaHorario';
        return $this->read($tables, array('clinAgendaHorario.*','mid(idAno,1,4) as soano' ), $where, null, null, null, null);
    }

    public function getAgendaHorarioProfissionales($where = null) {
        $campos = array('c.dsProfissional, ah.idAgendaHorario, ah.idAno, ac.idProfissional, ai.idAgendaHorarioItens, ac.id, c.dsEmail, c.dsCelular, c.dsCargo');
        $tables = ' clinAgendaHorarioItensProfissional ac
            inner join clinAgendaHorarioItens ai on ac.idAgendaHorarioItens = ai.idAgendaHorarioItens
            inner join clinAgendaHorario ah on ah.idAgendaHorario = ai.idAgendaHorario
            inner join clinProfissional c on c.idProfissional = ac.idProfissional';
        $groupby = 'c.dsProfissional';        
        $orderby = 'c.dsProfissional';
        return $this->read($tables, $campos, $where, $groupby, null, null, $orderby);
    }
    public function getAgendaDia($where = null, $orderby = null) {
        $campos = array('a.*','t.dsTratamento','c.dsCliente','sa.dsStatusAgenda','time(a.dtAgenda) as Hora','c.dsCelular','c.dsEmail','sa.dsCor','t.vlTratamento');
        $tables = 'clinAgenda a inner join clinCliente c on a.idCliente = c.idCliente'
                . ' left join clinTratamento t on a.idTratamento = t.idTratamento'
                . ' left join clinStatusAgenda sa on sa.idStatusAgenda = a.idStatusAgenda';
        return $this->read($tables, $campos, $where, null, null, null, $orderby);
    }
    public function getAgendaDiaTotais($where = null) {
        $campos = array('a.idStatusAgenda', 'count(a.idAgenda) as Quantas');
        $tables = 'clinAgenda a';
        return $this->read($tables, $campos, $where, 'idStatusAgenda');
    }

    public function getAgendaProfissionales($where = null) {
        $tables = 'clinProfissional as a';
        $orderby = 'dsProfissional';
        return $this->read($tables, array('a.*'), $where, null, null, null, $orderby);
    }

    public function getAgendaHorarioItensA($where = null) {
        $query = "SELECT ahi.idAgendaHorario, ahi.idAgendaHorarioItens, ahi.dtAgenda
            FROM  clinAgendaHorarioItens ahi 
            where {$where} 
            group by ahi.idAgendaHorarioItens";
        return $this->readLivre($query);
    }
    public function getAgendaHorarioItens($where = null) {
        $query = "SELECT hc.idProfissional, ahi.idAgendaHorario, ahi.idAgendaHorarioItens, ahi.dtAgenda, ta.idTipoAgenda, ta.dsTipoAgenda, ta.dsResumida, ta.dsCor
            FROM clinAgendaHorarioItensProfissional hc 
            inner join clinAgendaHorarioItens ahi  on ahi.idAgendaHorario = hc.idAgendaHorario  and ahi.idAgendaHorarioItens = hc.idAgendaHorarioItens
            inner join clinAgendaHorario ah  on ah.idAgendaHorario = hc.idAgendaHorario
            inner join clinTipoAgenda ta on ta.idTipoAgenda = hc.idTipoAgenda
            where {$where} 
            group by hc.idProfissional, ahi.idAgendaHorarioItens  order by hc.idProfissional, ahi.dtAgenda";
       //     print_a_die($query);
        return $this->readLivre($query);
    }
    public function getAgendaHorarioOS($where = null) {
        $query = "select c.idProfissional, c.dsProfissional from clinAgendaHorarioItensProfissional ac
            inner join clinAgendaHorarioItens ai on ai.idAgendaHorarioItens = ac.idAgendaHorarioItens 
            inner join clinProfissional c on c.idProfissional = ac.idProfissional
            inner join clinTipoAgenda ta on ta.idTipoAgenda = ac.idTipoAgenda
            where {$where} group by c.idProfissional, c.dsProfissional order by ac.idTipoAgenda, c.dsProfissional";        
        return $this->readLivre($query);
    }
    public function getAgendaHorarioOSSoma($where = null) {
        $expression = "Select ta.idTipoAgenda, ta.dsCor, ta.dsResumida, ta.dsTipoAgenda, count(ta.idTipoAgenda) as qtosta, sum(c.qtHorasDia) as totalHoras  
            from clinAgendaHorarioItensProfissional ac
            inner join clinAgendaHorarioItens ai on ai.idAgendaHorarioItens = ac.idAgendaHorarioItens and ai.idAgendaHorario = ac.idAgendaHorario
            inner join clinProfissional c on c.idProfissional = ac.idProfissional
            inner join clinTipoAgenda ta on ta.idTipoAgenda = ac.idTipoAgenda
            where {$where} group by ta.idTipoAgenda order by ac.idTipoAgenda;";   
        return $this->readLivre($expression);
    }
    
    public function getAgendaHorarioOSStatus($where = null) {
        $query = "select ai.idAgendaHorarioItens, c.idProfissional, c.dsProfissional from clinAgendaHorarioItensProfissional ac
            inner join clinAgendaHorarioItens ai on ai.idAgendaHorarioItens = ac.idAgendaHorarioItens 
            inner join clinProfissional c on c.idProfissional = ac.idProfissional
            inner join clinTipoAgenda ta on ta.idTipoAgenda = ac.idTipoAgenda
            where {$where} 
            group by c.idProfissional, c.dsProfissional";        
        return $this->readLivre($query);
    }

    public function getAgendaHorarioItensAnalitico($where = null) {
        $query = "SELECT hc.idProfissional, ahi.idAgendaHorario, ahi.idAgendaHorarioItens, c.dsProfissional, ta.idTipoAgenda, ta.dsTipoAgenda, ta.dsResumida, ta.dsCor, ahi.dtAgenda 
                FROM clinAgendaHorarioItensProfissional hc 
                inner join clinAgendaHorarioItens ahi on ahi.idAgendaHorarioItens = hc.idAgendaHorarioItens 
                inner join clinProfissional c on c.idProfissional = hc.idProfissional  
                inner join clinTipoAgenda ta on ta.idTipoAgenda = hc.idTipoAgenda Where
   
                {$where} group by hc.idProfissional Order By c.dsProfissional";
        return $this->readLivre($query);
    }
    
    public function getProfissionalSemAgenda($idAgendaHorario) {
        $mysql = "Select c.idProfissional, c.dsProfissional from clinProfissional as c
                Where c.idProfissional not in (SELECT hc.idProfissional FROM clinAgendaHorarioItensProfissional hc 
                inner join clinAgendaHorarioItens ahi on ahi.idAgendaHorarioItens = hc.idAgendaHorarioItens
                where ahi.idAgendaHorario = {$idAgendaHorario}
                group by hc.idProfissional) and c.stFazParteAgenda = 1";
    //    var_dump($mysql); die;
        return $this->readLivre($mysql);
    }
    
    //Grava o perfil
    public function setAgendaHorario($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }
    public function setAgenda($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinAgenda', $array, false));
        $this->commit();
        return $id;
    }
    public function setAgendaHorarioItens($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinAgendaHorarioItens', $array, false));
        $this->commit();
        return $id;
    }

    public function setAgendaHorarioProfissional($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinAgendaHorarioItensProfissional', $array, false));
        $this->commit();
        return $id;
    }
    public function setAgendaHorarioItensStatus($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinAgendaHorarioItensStatus', $array, false));
        $this->commit();
        return $id;
    }
    
    public function setAgendaHorarioMaoObra($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinAgendaHorarioMaoObra', $array, false));
        $this->commit();
        return $id;
    }
    public function setAgendaHorarioMaquina($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinAgendaHorarioMaquinas', $array, false));
        $this->commit();
        return $id;
    }
    public function setFinanceiro($array) {
        $this->startTransaction();
        $id = $this->transaction($this->insert('clinFinanceiro', $array, false));
        $this->commit();
        return $id;
    }
    public function updAgenda($array) {
        //Chave    
        $where = "idAgenda = " . $array['idAgenda'];
        $this->startTransaction();
        $this->transaction($this->update('clinAgenda', $array, $where));
        $this->commit();
        return true;
    }
    //Atualiza o Log
    public function updAgendaHorario($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }
    public function updAgendaHorarioProfissional($mysql) {
        //Chave    
        $this->startTransaction();
        $this->transaction($this->updateLivre($mysql));
        $this->commit();
        return true;
    }

    //Remove perfil    
    public function delAgendaHorario($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where, true));
        $this->commit();
        return true;
    }
    public function delAgendaHorarioProfissional($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinAgendaHorarioItensProfissional', $where, true));
        $this->commit();
        return true;
    }
    public function delAgendaHorarioItens($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinAgendaHorarioItens', $where, true));
        $this->commit();
        return true;
    }
    public function delAgendaHorarioStatus($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete('clinAgendaHorarioItensStatus', $where, true));
        $this->commit();
        return true;
    }
}
?>
