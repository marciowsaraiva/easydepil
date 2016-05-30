<?php

class autoload extends controller {

  public function projetos() {
    $data = array();
    $term = isset($_POST['term']) ? $_POST['term'] : null;
    if (!empty($term)) {
      $model = new projetoModel();
      $where = "`stStatus` = '1'"
          . " AND UPPER(nome) LIKE UPPER('%{$term}%')";
      if ($rowSet = $model->getprojeto($where, array('idProjeto', 'nome'), 'nome', 25)) {
        foreach ($rowSet as $row) {
          $data[] = array(
            'idProjeto' => $row['idProjeto'],
            'value' => $row['nome']
          );
        }
      }
    }
    echo json_encode($data);
  }

  public function estado() {
    $data = array();
    $term = isset($_POST['term']) ? $_POST['term'] : null;
    if (!empty($term)) {
      $model = new localizacaoModel();
      $where = "`stStatus` = '1'"
          . " AND (UPPER(nome) LIKE UPPER('%{$term}%')"
          . " OR UPPER(uf) LIKE UPPER('%{$term}%'))";
      if ($rowSet = $model->getEstados($where, 'nome', 25)) {
        foreach ($rowSet as $row) {
          $data[] = array(
            'id_estado' => $row['id_estado'],
            'uf' => $row['uf'],
            'ibge' => $row['codigo'],
            'value' => $row['nome']
          );
        }
      }
    }
    echo json_encode($data);
  }

  public function municipio() {
    $data = array();
    $term = isset($_POST['term']) ? $_POST['term'] : null;
    if (!empty($term)) {
      $model = new localizacaoModel();
      $where = "m.`stStatus` = '1'"
          . " AND UPPER(m.nome) LIKE UPPER('%{$term}%')";
      if (isset($_POST["id_estado"])) {
        $where .= " AND m.id_estado = '{$_POST["id_estado"]}'";
      }
      if (isset($_POST["uf"])) {
        $where .= " AND e.uf = '{$_POST["uf"]}'";
      }
      if ($rowSet = $model->findMunicipio($where, 'm.nome', 25)) {
        foreach ($rowSet as $row) {
          $data[] = array(
            'id_municipio' => $row['id_municipio'],
            'uf' => $row['uf'],
            'ibge' => $row['codigo_ibge'],
            'value' => $row['nome']
          );
        }
      }
    }
    echo json_encode($data);
  }

  public function bairro() {
    $data = array();
    $term = isset($_POST['term']) ? $_POST['term'] : null;
    if (!empty($term)) {
      $model = new localizacaoModel();
      $where = "b.`stStatus` = '1'"
          . " AND UPPER(b.nome) LIKE UPPER('%{$term}%')";
      if (isset($_POST["id_municipio"])) {
        $where .= " AND b.id_municipio = '{$_POST["id_municipio"]}'";
      }
      if ($rowSet = $model->findBairro($where, 'b.nome', 25)) {
        foreach ($rowSet as $row) {
          $data[] = array(
            'id_bairro' => $row['id_bairro'],
            'id_municipio' => $row['id_municipio'],
            'value' => $row['nome']
          );
        }
      }
    }
    echo json_encode($data);
  }

}
