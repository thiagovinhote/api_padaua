<?php

class Conexao {

  private static $shared;
  private $db;

  private function Conexao(){
    $this->db = new mysqli("localhost", "root", "", "dbpadaua");
    $this->db->set_charset('utf8');
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