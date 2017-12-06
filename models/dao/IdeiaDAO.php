<?php
    require "config/Conexao.php";
    require "interfaces/DAOInterface.php";

class IdeiaDAO implements DAOInterface {
    private $conexao;

    public function IdeiaDAO() {
        $conexao = Conexao::getShared();
        $this->conexao = $conexao->getDB();
      }

    public function getAll(){
        $sql = "SELECT * FROM ideia";
        $result = $this->conexao->query($sql);

        if($result->num_rows == 0){
            return [];
        } else {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    public function getById($id){

    }
    public function save($object){

    }
    public function update($object){

    }

    public function delete($id){
        
    }

}






?>