<?php

require "models/beans/BaseModel.php";

class Usuario extends BaseModel{

  protected $id;
  protected $nome;
  protected $email;
  protected $link_linkedin;
  protected $celular;
  protected $nick;
  protected $senha;

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
    return $this->link_linkedin;
  }

  public function setLinkedin($linkedin) {
    $this->link_linkedin = $link_linkedin;
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