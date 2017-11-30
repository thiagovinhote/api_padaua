<?php

class BaseController {

    protected $DAO;
    protected $required;
    private $modelBean;

    public function BaseController($modelBean){
        $this->modelBean = $modelBean;
        require "models/beans/".$modelBean.".php";
        $this->checkAction();
    }

    protected function checkAction() {
      switch($_SERVER["REQUEST_METHOD"]){
          case "GET":
              if(isset($_GET["id"])){
                $this->getById($_GET["id"]);
              } else {
                  $this->getAll();
              }
              break;
          case "POST":
              $this->save();
              break;
          case "PUT":

              break;
          case "DELETE":
              $this->delete();
              break;
          default:
              http_response_code(405);
              echo "Método não implementado";
      }
    }

    protected function getAll() {
      $list = $this->DAO->getAll();
      if(count($list) == 0) {
        http_response_code(404);
      } else {
        http_response_code(200);
      }
      echo json_encode($list);
    }

    protected function getById($id) {
      $object = $this->DAO->getById($id);
      if($object == null) {
        http_response_code(404);
      } else {
        http_response_code(200);
      }
      echo json_encode($object);
    }

    private function checkParams($object) {
      $properties = $object->check($this->required);

      if(count($properties) > 0) {
        http_response_code(400);
        echo "Os campos ". json_encode($properties) ." são obrigatórios";
        return false;
      } else {
        return true;
      }

    }

    protected function save() {
      $json = file_get_contents("php://input");
      $dados = json_decode($json, true);

      $model = new $this->modelBean();
      $model->set($dados);

      if(!$this->checkParams($model)) {
        return;
      }

      $result = $this->DAO->save($model);
      if($result == null){
         http_response_code(500);
      } else {
         http_response_code(201);
      }
      echo json_encode($result);
    }

    protected function delete() {
      $id = $_GET["id"];
      if(!$id){
        http_response_code(404);
        echo "É necessário informar o id";
        return;
      }

      $object = $this->DAO->getById($id);
      if(!$object) {
        http_response_code(404);
        echo 'Objeto com o id '. $id. ' não foi encontrado.';
        return;
      }

      $result = $this->DAO->delete($id);

      if(!$result) {
        http_response_code(404);
        echo "Erro ao tentar deletar";
      } else {
        http_response_code(200);
        echo json_encode($object);
      }


    }


}
