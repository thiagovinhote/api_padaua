<?php

class Conexao {

  private static $shared;
  private $db;

  private function Conexao(){
    $this->db = new mysqli("localhost:8080", "root", "", "dbpadaua");
  }

  private static function getShared() {
    if (self::$shared == null) {
      self::$shared = new Conexao();
    }
    return self::$shared;
  }

  public function getDB() {
    return $this->db;
  }

}