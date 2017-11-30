<?php

class BaseController {

    protected $DAO;

    public function BaseController(){
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
