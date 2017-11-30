<?php

require "config/Conexao.php";
require "interfaces/DAOInterface.php";

class RoteiroDAO implements DAOInterface {

  private $conexao;

  public function RoteiroDAO() {
    $conexao = Conexao::getShared();
    $this->conexao = $conexao->getDB();
  }

  public function getAll() {
    $sql = "SELECT * FROM roteiro;";
    $resultado = $this->conexao->query($sql);
    if($resultado->num_rows == 0){
        return [];
    } else {
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
  }

  public function getById($id) {
    $sql = "SELECT * FROM roteiro WHERE id = ". $id;
    $result = $this->conexao->query($sql);
    if($result->num_rows == 0) {
      return null;
    } else {
      return $result->fetch_assoc();
    }
  }

  public function save($object) {

  }

  public function update($object) {

  }

  public function delete($id) {
    $sql = "DELETE FROM roteiro WHERE id = ". $id;
    var_dump($sql);
    return $this->conexao->query($sql);
  }

}
