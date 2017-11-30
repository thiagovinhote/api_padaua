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

  public function update($object) {

  }

  public function delete($id) {
    $sql = "DELETE FROM metodologia WHERE id = ". $id;
    return $this->conexao->query($sql);
  }

}
