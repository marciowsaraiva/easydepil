<?php

class logModelMySQL extends model {

    var $tabPadrao = 'clinLog';
    var $campo_chave = 'idLog';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idLog'] = NULL;
        $dados[0]['idUsuario'] = NULL;
        $dados[0]['mensagem'] = NULL;
        $dados[0]['idLogTipo'] = NULL;
        $dados[0]['stStatus'] = NULL;
        return $dados;
    }

    //Recupera o Log
    public function getLogOLD($where = null) {

        return $this->read($this->tabPadrao, array('*'), $where, null, null, null, null);
    }

    //Recupera o Logll
    public function getLog($where = null, $orderby = null, $limit = null) {
        //$campos = array('*');
        $campos = array('L.*', 'T.descricao', 'U.nome');
        return $this->read('log L
        left join clinLogTipo T on (T.idLogTipo=L.idLogTipo)
        left join clinUsuarios U on (U.idUsuario=L.idUsuario)', $campos, $where, null, $limit, null, $orderby);
    }

    //Grava o log
    public function setLog($array) {
        if(!isset($array["data"])){
            $array["data"] = Date("Y-m-d H:i:s");
        }
        $this->startTransaction();
        $id = $this->transaction($this->insert($this->tabPadrao, $array, false));
        $this->commit();
        return $id;
    }

    //Atualiza o Log
    public function updLog($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove o Log
    public function delLog($array) {
        //Chave
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $array['stStatus'] = 0; //Muda stStatus para zero excluido!   
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function logPadrao($mensagem = '', $tipo_log = 1) {
        $dados = null;
        $dados['idLog'] = NULL;
        $datetime = date('Y-m-d');
        $datetime .= ' ' . date('H:i:s');
        if (!Isset($_SESSION['user']['usuario'])) {
            $dados['idUsuario'] = 1;  //caso nao esteja logado define ao admin
            $mensagem = $mensagem . 'sem admin - ';
        } else {
            $dados['idUsuario'] = $_SESSION['user']['usuario'];
        }
        $dados['mensagem'] = $mensagem;
        $dados['idLogTipo'] = $tipo_log;
        $dados['stStatus'] = 1;
        $dados['data'] = $datetime ? $datetime : $datetime;
        $this->setLog($dados);
    }

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function TotalDeRegistros() {
        $where = 'stStatus>0';
        $resultado = $this->read($this->tabPadrao, array('count(*) as total'), $where, null, null, null, null);
        return $resultado[0]['total'];
    }

}