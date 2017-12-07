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
        $sql = "SELECT * FROM ideia WHERE id = ". $id;
        $result = $this->conexao->query($sql);
        if($result->num_rows == 0) {
            return null;
        }else{
            return $result->fetch_assoc();
        }
    }
    
    public function save($object){
        $sql = "INSERT INTO ideia (nome, descricao, data_criacao, usuario_id) 
        VALUES ('".$object->getNome()."', '".$object->getDescricao()."', '".$object->getDataCriacao()."', '".$object->getUserId()."' )
        ";
    
        $resultado = $this->conexao->query($sql);
        if(!$resultado){
            return null;
        } else {
            $id = $this->conexao->insert_id;
            return $this->getById($id);
        }
    }

    public function update($object, $id){
        $sql = "UPDATE ideia SET nome = '".$object->getNome()."', descricao = '".$object->getDescricao()."', data_criacao = '".$object->getDataCriacao()."', usuario_id = '".$object->getUserId()."' WHERE id = $id";
        
        $result = $this->conexao->query($sql);
        if(!$result){
            return null;
        }else{
            return $this->getById($id);
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM ideia WHERE id = ". $id;
        return $this->conexao->
        query($sql);
    }
}

?>