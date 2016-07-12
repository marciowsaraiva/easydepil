<?php

class controleAcessoModel extends model {

    var $tabController = 'clinController';
    var $tabControllerPerfil = 'clinControllerPerfil';
    var $tabPerfil = 'clinPerfil';
    var $tabUsuarioPerfil = 'clinUsuarioPerfil';

    public function getAcesso($where = NULL, $group_by = NULL, $limit = NULL, $orderby = NULL) {

        $table = "{$this->tabController} as a
            left join {$this->tabControllerPerfil} as b on a.idController=b.idController
            left join {$this->tabPerfil} as c on c.idPerfil=b.idPerfil
            left join {$this->tabUsuarioPerfil} as d on d.idPerfil=c.idPerfil";

        $fields = array('count(*) as acesso');

        $acesso = $this->read($table, $fields, $where, $group_by, $limit, NULL, $orderby);

        return (int) $acesso[0]['acesso'];
    }

    public function getPerfil($where = NULL, $group_by = NULL, $limit = NULL, $orderby = NULL) {
        return $this->read($this->tabPerfil, array('*'), $where, $group_by, $limit, NULL, $orderby);
    }

    public function getControllers($fields = NULL, $where = NULL, $group_by = NULL, $limit = NULL, $orderby = NULL) {
        if (is_null($fields)) {
            $fields = '*';
        }
        return $this->read($this->tabController, array("{$fields}"), $where, $group_by, $limit, NULL, $orderby);
    }

    public function getControllerPerfil($fields = NULL, $where = NULL, $group_by = NULL, $limit = NULL, $orderby = NULL) {
        if (is_null($fields)) {
            $fields = '*';
        }
        return $this->read($this->tabControllerPerfil, array("{$fields}"), $where, $group_by, $limit, NULL, $orderby);
    }

    public function setControllerPerfil($array, $idPerfil) {

        $this->startTransaction();
        $this->transaction($this->delete($this->tabControllerPerfil, "idPerfil = '{$idPerfil}'", FALSE));

        if (!is_null($_POST['controller'])) {

            $arr = array();

            foreach ($array as $value) {
                $arr['idController'] = $value;
                $arr['idPerfil'] = $idPerfil;
                $this->transaction($this->insert($this->tabControllerPerfil, $arr, FALSE));
            }
        }

        $this->commit();
        return true;
    }

}
