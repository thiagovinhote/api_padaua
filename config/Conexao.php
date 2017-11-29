<?php

class Conexao {

  private static $shared;
  private $db;

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