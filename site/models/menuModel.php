<?php

class menuModel extends model {

    var $tabPadrao = 'clinMenu';
    var $campo_chave = 'idMenu';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idMenu'] = NULL;
        $dados[0]['url'] = NULL;
        $dados[0]['descricao'] = NULL;
        $dados[0]['parent_menu'] = NULL;
        $dados[0]['tipo'] = NULL;
        $dados[0]['target'] = NULL;
        $dados[0]['status'] = NULL;
        $dados[0]['ordem'] = NULL;
        return $dados;
    }

    //Recupera o menu
    public function getMenu($where = null) {
        $orderby = 'MP.descricao, M.ordem';
        $campos = array('M.idMenu, M.url, M.descricao, MP.descricao as descricao_pai, M.parent_menu, M.tipo, M.target, M.status, M.ordem');
        return $this->read('clinMenu M
                left join clinMenu MP on MP.idMenu = M.parent_menu and MP.status <> 0',$campos, $where, null, null, null, $orderby);
    }

    //Recupera o menu
    public function getMenuByUsuario($menu = null) {

        if ($menu == null) {
            $dados = $this->estrutura_vazia();
            return $dados;
        } else {
            $where_in = '';
            $menus = '';
            foreach ($menu as $value) {

                if (($menus == '') || ($menus == '0')){
                    if (isset($value['idMenu']))
                    $menus = $value['idMenu'];
                }else{
                    $menus = $menus . ',' . $value['idMenu'];
                }
            }
            if ($menus != '') {
                $where_in = ' idMenu in (' . $menus . ')';
            }    
            $where = $where_in.' and status = 1 order by ordem, descricao, parent_menu';
            $campos = array('*');
            $tables = 'clinMenu';
            return $this->read($tables, $campos, $where, null, null, null, null);
        }
    }

    //Grava o menu
    public function setMenu($array) {

        $this->startTransaction();

        $id = $this->transaction(
                $this->insert($this->tabPadrao, $array, false)
        );

        $this->commit();

        return $id;
    }

    //Atualiza o menu
    public function updMenu($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove o menu
    public function delMenu($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $array['status'] = 0; //Muda stStatus para zero excluido!   
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

}

?>
