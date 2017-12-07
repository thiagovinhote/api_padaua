<?php

require "config/Conexao.php";
require "interfaces/DAOInterface.php";

class MetodologiaDAO implements DAOInterface {

  private $conexao;

  public function MetodologiaDAO() {
    $conexao = Conexao::getShared();
    $this->conexao = $conexao->getDB();
  }

  public function getAll() {
    $sql = "SELECT * FROM metodologia;";
    $resultado = $this->conexao->query($sql);
    if($resultado->num_rows == 0){
        return [];
    } else {
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
  }

  public function getById($id) {
    $sql = "SELECT * FROM metodologia WHERE id = ". $id;
    $result = $this->conexao->query($sql);
    if($result->num_rows == 0) {
      return null;
    } else {
      return $result->fetch_assoc();
    }
  }

  public function save($object) {
    $sql = "INSERT INTO metodologia (nome, descricao) VALUES ("
            ."'".$object->getNome()."', "
            ."'".$object->getDescricao()."')";
    $resultado = $this->conexao->query($sql);
    if(!$resultado){
      return null;
    } else {
      $id = $this->conexao->insert_id;
      return $this->getById($id);
    }
  }

  public function update($object, $id) {
    $sql = "UPDATE metodologia SET "
            ."nome = '".$object->getNome()."', "
            ."descricao = '".$object->getDescricao()."' WHERE id = $id";

    $resultado = $this->conexao->query($sql);
    if(!$resultado){
        return null;
    } else {
        return $this->getById($id);
    }
  }

  public function delete($id) {
    $sql = "DELETE FROM metodologia WHERE id = ". $id;
    return $this->conexao->query($sql);
  }

  public function model() {
    $data = new stdClass();
    $data->nome = 'Usuario';
    $data->endpoint = 'http://localhost:8080/padawan-ideas-api/metodologia';

    $recursos = new stdClass();
    $recursos = [
      array('action' => 'POST',
        'fields' =>
          [
            array('field' => 'nome', 'type' => 'string','required' => true),
            array('field' => 'descricao', 'type' => 'string','required' => true)
          ]
          ),
      array('action' => 'GET',
        'fields' =>
          [
            array('field' => 'id', 'type' => 'int','required' => false),
          ]
          ),
      array('action' => 'PUT',
        'fields' =>
          [
            array('field' => 'nome', 'type' => 'string','required' => false),
            array('field' => 'descricao', 'type' => 'string','required' => false)
          ]
          )
      ];

    $data->recursos = $recursos;
    return $data;
  }

}
