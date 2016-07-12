<?php
class perfil_menuModel extends model {

    var $tabPadrao = 'clinPerfilMenu';
    var $campo_chave = 'idPerfil';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idPerfil'] = NULL;
        $dados[0]['idMenu'] = NULL;
        return $dados;
    }

    //Recupera o clinPerfilMenu
    public function getPerfilMenu($where = null) {
        $orderby = 'MP.descricao, M.ordem';
        $campos = array('PM.*, P.dsPerfil as perfil, M.descricao descfilho, MP.descricao descpai, (case when MP.descricao is null then M.descricao else concat(MP.descricao,"/",M.descricao) end) as menu');
        return $this->read('clinPerfilMenu PM
                left join clinPerfil P on (P.idPerfil = PM.idPerfil and P.stStatus <> 0)
                left join clinMenu M on (M.idMenu = PM.idMenu and M.status = 1)
                left join clinMenu MP on (MP.idMenu = M.parent_menu and MP.status = 1)' , $campos, $where, null, null, null, $orderby);
    }

    //Grava o clinPerfilMenu
    public function setPerfilMenu($array) {

        $this->startTransaction();

        $id = $this->transaction(
                $this->insert($this->tabPadrao, $array, false)
        );

        $this->commit();

        return $id;
    }

    //Atualiza o clinPerfilMenu
    public function updPerfilMenu($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove o clinPerfilMenu
    // @ imput id do perfil e id do menu

    public function delPerfilMenu($where) {
        //Chave
        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where));
        $this->commit();
        return true;
    }

}

?>
