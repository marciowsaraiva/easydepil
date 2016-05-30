<?php

/**
 * This class control the flush of consults returns with VAZIO* of project EDP Bandeirantes
 * @name EdpEmptyValue
 * @author Helio de Paula Nogueira <helio.nogueira@industriafox.com>
 * @version 201511080800
 */
abstract class EdpEmptyValue {

  const PERFIL_EDP_BANDEIRANTES = '45';
  const idTipoUsuario_PARCEIRO = '2';

  private static $auth = false;

  public final static function filterSQLEmpty(Array $fileds) {
    $query = null;
    if (self::checkAccess()) {
      $sql = array();
      foreach ($fileds as $field) {
        $sql[] = "UPPER({$field}) NOT LIKE 'VAZIO%'";
      }
      $query = ' AND (' . implode(' AND ', $sql) . ')';
    }
    return $query;
  }

  public final static function filterSQLNewRegister(Array $fileds) {
    $query = null;
    if (self::checkAccess()) {
      $sql = array();
      foreach ($fileds as $field) {
        $sql[] = "UPPER({$field}) NOT LIKE 'CADASTRO%NOVO%'";
      }
      $query = ' AND (' . implode(' AND ', $sql) . ')';
    }
    return $query;
  }

  private final static function checkAccess() {
    if (!self::$auth) {
      if (isset($_SESSION['user']['perfil']) && is_array($_SESSION['user']['perfil'])) {
        foreach ($_SESSION['user']['perfil'] as $perfil) {
          if (in_array(self::PERFIL_EDP_BANDEIRANTES, $perfil)) {
            if (isset($_SESSION['user']['tipousuario']))
              if (self::idTipoUsuario_PARCEIRO == $_SESSION['user']['tipousuario']) {
                self::$auth = true;
                break;
              }
          }
        }
      }
    }
    return self::$auth;
  }

}
