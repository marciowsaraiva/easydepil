<?php

class usuariosModel extends model {

    var $tabPadrao = 'clinUsuarios';
    var $campo_chave = 'idUsuario';
    var $email = 'email';

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function estrutura_vazia() {
        $dados = null;
        $dados[0]['idUsuario'] = NULL;
        $dados[0]['dsUsuario'] = NULL;
        $dados[0]['email'] = NULL;
        $dados[0]['senha'] = NULL;
        $dados[0]['idTipoUsuario'] = NULL;
        $dados[0]['stStatus'] = NULL;
        $dados[0]['idProjeto'] = NULL;
        return $dados;
    }

    //Recupera o Login
    public function getusuarioByLogin($email = null) {

        if ($email == null) {
            $dados = $this->estrutura_vazia();
            return $dados;
        } else {
            $tables = 'clinUsuarios L';
            $where = 'stStatus <> 0';
            if (!is_null($email))
                $where .= " and email = '$email'";
            return $this->read($tables, array('*'), $where, null, null, null, null);
        }
    }

    //Recupera o Perfil Por Usuario
    public function getPerfilByUsuario($usuario = null) {

        if ($usuario == null) {
            $dados = $this->estrutura_vazia();
            return $dados;
        } else {
            $campos = array('idPerfil');
            $tables = 'clinUsuarioPerfil';
            $where = 'idUsuario = ' . $usuario . ' and stStatus <> 0 ';
            return $this->read($tables, $campos, $where, null, null, null, null);
        }
    }

    //Recupera o Menu Por Perfil de Usuario
    public function getMenuByPerfil($perfil = null) {

        if ($perfil == null) {
            $dados = $this->estrutura_vazia();
            return $dados;
        } else {
            $where_in = '';
            $perfis = '';
            foreach ($perfil as $value) {

                if ($perfis == '')
                    $perfis = $value['idPerfil'];
                else
                    $perfis = $perfis . ',' . $value['idPerfil'];
            }
            if ($perfis != '')
                $where_in = ' idPerfil in (' . $perfis . ')';

            $where = $where_in;
            $campos = array('idMenu');
            $tables = 'clinPerfilMenu';
            return $this->read($tables, $campos, $where, null, null, null, null);
        }
    }

    //Recupera o Usuario
    public function getUsuario($where = null) {
        $campos = array('L.*','ptu.dsTipoUsuario as descricao');
        $orderby = 'L.dsUsuario';
        return $this->read('clinUsuarios L inner join clinTipoUsuario ptu on ptu.idTipoUsuario = L.idTipoUsuario', $campos, $where, null,null,null, $orderby);
    }

    public function getUsuarioInicial($where = null) {
        $campos = array('L.*','p.idProfissional');
        return $this->read('clinUsuarios L 
        left join clinTipoUsuario U on (U.idTipoUsuario=L.idTipoUsuario)
        left join clinProfissional p on (p.idUsuario = L.idUsuario)', $campos, $where, null, null, null, null);
    }

    public function getTrocaSenha($where = null) {
        $campos = array('ts.dsUsuario as Nome,ts.senha as Senha, ts.email as Email, '
            . 'ts.idUsuario as usuario, ts.stStatus as status');
        return $this->read("{$this->tabPadrao} ts", $campos, $where, null, null, null, null);
    }

    //Grava o log
    public function setUsuario($array) {

        $this->startTransaction();

        $id = $this->transaction(
                $this->insert($this->tabPadrao, $array, false)
        );

        $this->commit();

        return $id;
    }

    //Atualiza o Log
    public function updUsuario($array) {
        //Chave    
        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Atualiza o Log
    public function update_usuario($array) {
        //Chave    
        $where = $this->email . " = '" . $array[$this->email]."'";
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    //Remove o Log
    public function delUsuario($array) {
        //Chave

        $where = $this->campo_chave . " = " . $array[$this->campo_chave];
        $array['stStatus'] = 0; //Muda stStatus para zero excluido!   
        $this->startTransaction();
        $this->transaction($this->update($this->tabPadrao, $array, $where));
        $this->commit();
        return true;
    }

    // Deletar os usuarios

    public function del_usuario($idUsuario) {
        //Chave
        $where = "idUsuario = " . $idUsuario;

        $this->startTransaction();
        $this->transaction($this->delete($this->tabPadrao, $where));
        $this->commit();
        return true;
    }

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function TotalDeRegistros() {
        $where = 'stStatus>0';
        $resultado = $this->read($this->tabPadrao, array('count(*) as total'), $where, null, null, null, null);
        return $resultado[0]['total'];
    }

    //Estrutura da Tabela Vazia Utilizada para novos Cadastros
    public function logPadrao($mensagem = '', $tipo_log = 1) {
        $dados = null;
        $dados['idLog'] = NULL;
        if (!Isset($_SESSION['user']['usuario'])) {
            $dados['idUsuario'] = 1;  //caso nao esteja logado define ao admin
            $mensagem = $mensagem . 'sem admin - ';
        } else
            $dados['idUsuario'] = $_SESSION['user']['usuario'];

        $dados['mensagem'] = $mensagem;
        $dados['idLogTipo'] = $tipo_log;
        $dados['stStatus'] = 1;
        $this->setLog($dados);
    }

}

?>
