<?php
class Conexao {
  private static $shared;
  private $db;
  private function Conexao(){
    $url = getenv('JAWSDB_MARIA_URL');
    $dbparts = parse_url($url);

    $hostname = $dbparts['host'];
    $username = $dbparts['user'];
    $password = $dbparts['pass'];
    $database = ltrim($dbparts['path'],'/');

    $this->db = new mysqli($hostname, $username, $password, $database);
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
