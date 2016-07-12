<?php

class usuario_perfilModel extends model {

    var $tabPadrao = 'clinUsuarioPerfil';
    var $campo_chave = 'idUsuarioPerfil';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idUsuarioPerfil'] = NULL;
        $dados[0]['idUsuario'] = NULL;
        $dados[0]['idPerfil'] = NULL;
        $dados[0]['stStatus'] = NULL;
        return $dados;
    }

    //Recupera o Perfis Usuario
    public function getUsuarioPerfil($where = null) {
        //return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);
        $campos = array('UP.*', 'P.dsPerfil');
        return $this->read('clinUsuarioPerfil UP
        left join clinPerfil P on (P.idPerfil = UP.idPerfil)', $campos, $where, null, null, null, null);
        //left join usuario U on (U.idUsuario= UP.idUsuario)',$campos , $where, null, null, null, null);
    }

    //Grava o Perfis Usuario
    public function setUsuarioPerfil($array) {

        $this->startTransaction();

        $id = $this->transaction(
                $this->insert($this->tabPadrao, $array, false)
        );

        $this->commit();

        return $id;
    }

    //Atualiza o Log
    public function updUsuarioPerfil($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove o Log
    public function delUsuarioPerfil($array) {
        $where = "idUsuario = '{$array['idUsuario']}' AND idPerfil = '{$array['idPerfil']}'";
        return $this->delete($this->tabPadrao, $where);
    }

    
       //Remove o Log
    public function del_perfis_usuario($idUsuario) {
        $where = "idUsuario = ".$idUsuario;
        return $this->delete($this->tabPadrao, $where);
    }
    
    
    public function getControleAcesso($where = NULL, $group_by = NULL, $limit = NULL, $orderby = NULL) {

        $table = "clinUsuarios as a 
            left join clinUsuarioPerfil as b on a.idUsuario=b.idUsuario
            left join clinPerfilMenu as c on b.idPerfil=c.idPerfil
            left join clinMenu as d on c.idMenu=d.idMenu";

        $fields = array('d.idMenu, d.url');
        $where = 'status = 1';
        return $this->read($table, $fields, $where, $group_by, $limit, $orderby);
    }

}
