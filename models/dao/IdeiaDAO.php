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

    public function model() {
        $data = new stdClass();
        $data->nome = 'Ideia';
        $data->endpoint = 'http://localhost:8080/padawan-ideas-api/ideia';

        $recursos = new stdClass();
        $recursos = [
          array('action' => 'POST',
            'fields' =>
              [
                array('field' => 'nome', 'type' => 'string','required' => true, 'max_length' => 100),
                array('field' => 'descricao', 'type' => 'string','required' => true, 'max_length' => 200),
                array('field' => 'data_criacao', 'type' => 'date', 'required' => false),
                array('field' => 'usuario_id', 'type' => 'int', 'required' => true),
              ]
              ),
          array('action' => 'GET',
            'fields' =>
              [
                array('field' => 'id', 'type' => 'int', 'required' => false)
              ]
              ),
          array('action' => "PUT",
            'fields' =>
            [
              array('field' => 'nome', 'type' => 'string', 'required' => false, 'max_length' => 100),
              array('field' => 'descricao', 'type' => 'string', 'required' => false, 'max_length' => 200),
              array('field' => 'data_criacao', 'type' => 'date', 'required' => false),
              array('field' => 'usuario_id', 'type' => 'int', 'required' => false)
            ]
          )
          ];

        $data->recursos = $recursos;
        return $data;
    }
}

?>
