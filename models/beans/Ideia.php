<?php

require "models/beans/BaseModel.php";

class Ideia extends BaseModel {
    private $id;
    private $nome;
    private $descricao;
    private $data_criacao;
    private $usuario_id;
    
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->$nome = $nome;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDataCriacao(){
        return $this->data_criacao;
    }

    public function setDataCriacao($data_criacao){
        $this->data_criacao = $data_criacao;
    }

    public function getUserId(){
        return $this->usuario_id;
    }

    public function setUserId($usuario_id){
        $this->usuario_id = $usuario_id;
    }    
}

?>