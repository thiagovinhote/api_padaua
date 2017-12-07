<?php
require "config/Conexao.php";
require "interfaces/DAOInterface.php";

class TimeDAO implements DAOInterface {
    private $conexao;

    public function TimeDAO() {
        $conexao = Conexao::getShared();
        $this->conexao = $conexao->getDb();
    }

    public function getAll() {
        $sql = "SELECT * FROM time;";
        $resultado = $this->conexao->query($sql);
        if($resultado->num_rows == 0){
            return [];
        } else {
            return $resultado->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function getById($id){
        $sql = "SELECT * FROM time WHERE id = ". $id;
        $result = $this->conexao->query($sql);
        if($result->num_rows == 0) {
          return null;
        } else {
          return $result->fetch_assoc();
        }
    }

    public function save($object){
        $nome = $object->getNomeTime();
        $data = $object->getDataCriacao();
        $descricao = $object->getDescricao();

        $sql = "INSERT INTO time(nome_time, data_criacao, descricao) VALUES('".$nome."', '".$data."', '".$descricao."');";

        $resultado = $this->conexao->query($sql);
        if(!$resultado){
            return null;
        } else {
            $id = $this->conexao->insert_id;
            return $this->getById($id);
        }
    }

    public function update($object, $id){
        $nome = $object->getNomeTime();
        $data = $object->getDataCriacao();
        $descricao = $object->getDescricao();

        $sql = "UPDATE time SET nome_time = '".$nome."', data_criacao = '".$data."', descricao = '".$descricao."' WHERE id = '".$id."';";
        $resultado = $this->conexao->query($sql);

        if(!$resultado){
            return null;
        } else {
            return $this->getById($id);
        }
    }

    public function delete($id){
        $sql = "DELETE FROM time WHERE id = ". $id;
        return $this->conexao->query($sql);
    }


    public function model() {
      $data = new stdClass();
      $data->nome = 'Time';
      $data->endpoint = 'http://localhost:8080/padawan-ideas-api/time';

      $recursos = new stdClass();
      $recursos = [
        array('action' => 'POST',
          'fields' =>
            [
              array('field' => 'nome_time', 'type' => 'string', 'required' => true, 'max_length' => 100),
              array('field' => 'data_criacao', 'type' => 'date', 'required' => true),
              array('field' => 'descricao', 'type' => 'string', 'required' => true, 'max_length' => 500)
            ]
        ),
        array('action' => 'GET',
          'fields' =>
            [
              array('field' => 'id', 'type' => 'int', 'required' => false),
            ]
        ),
        array('action' => 'PUT',
          'fields' =>
            [
              array('field' => 'nome_time', 'type' => 'string', 'required' => false, 'max_length' => 100),
              array('field' => 'data_criacao', 'type' => 'date', 'required' => false),
              array('field' => 'descricao', 'type' => 'string', 'required' => false, 'max_length' => 500)
            ]
        ),
      ];

      $data->recursos = $recursos;
      return $data;
    }
}
