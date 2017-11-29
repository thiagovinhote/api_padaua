<?php

class Conexao {

  private static $shared;
  private $db;

  private function Conexao(){
    $this->db = new mysqli("localhost", "root", "", "dbpadaua");
  }

  public static function getShared() {
    if (self::$shared == null) {
      self::$shared = new Conexao();
    }
    return self::$shared;
  }

  public function getDB() {
    return $this->db;
  }

}