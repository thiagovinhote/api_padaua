<?php

class Metodologia {

  private $id;
  private $nome;
  private $descricao;

  public function set($data) {
    foreach ($data AS $key => $value) $this->{$key} = $value;
  }

  public function check($required) {
    $properties = array();
    foreach($required as $field) {
        // printf("[%s]:\t", $field);
        // var_dump(property_exists($this, $field));

        if(is_null($this->{$field})) {
          array_push($properties, $field);
        }
    }
    return $properties;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getDescricao() {
    return $this->descricao;
  }

  public function setDescricao($descricao) {
    $this->descricao = $descricao;
  }

}
