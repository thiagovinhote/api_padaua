<?php

require "config/Conexao.php";
require "interfaces/DAOInterface.php";

class UsuarioDAO implements DAOInterface {

  private $conexao;

  public function UsuarioDAO() {
    $conexao = Conexao::getShared();
    $this->conexao = $conexao->getDB();
  }

  public function getAll() {
    $sql = "SELECT * FROM usuario;";
    $resultado = $this->conexao->query($sql);
    if($resultado->num_rows == 0){
        return [];
    } else {
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }
  }

  public function getById($id) {

  }

  public function save($object) {

  }

  public function update($object) {

  }

  public function delete($id) {

  }

}