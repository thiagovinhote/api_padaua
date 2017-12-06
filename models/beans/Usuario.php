<?php

require "models/beans/BaseModel.php";

class Usuario extends BaseModel{

  private $id;
  private $nome;
  private $email;
  private $link_linkedin;
  private $celular;
  private $nick;
  private $senha;

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

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getLinkedin() {
    return $this->linkedin;
  }

  public function setLinkedin($linkedin) {
    $this->linkedin = $linkedin;
  }

  public function getCelular() {
    return $this->celular;
  }

  public function setCelular($celular) {
    $this->celular = $celular;
  }

  public function getNick() {
    return $this->nick;
  }

  public function setNick($nick) {
    $this->nick = $nick;
  }

  public function getSenha() {
    return $this->senha;
  }

  public function setSenha($senha) {
    $this->senha = $senha;
  }

}