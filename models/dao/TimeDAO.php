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

        $sql = "INSERT INTO time(nome_time, data_criacao, descricao) VALUES('$nome', '$data', '$descricao');";

        $resultado = $this->conexao->query($sql);
        if(!$resultado){
            return null;
        } else {
            $id = $this->conexao->insert_id;
            return $this->getById($id);
        }
    }

    public function update($object){
        //
    }

    public function delete($id){
        $sql = "DELETE FROM time WHERE id = ". $id;
        return $this->conexao->query($sql);
    }
}