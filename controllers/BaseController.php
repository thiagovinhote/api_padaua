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
              $this->update();
              break;
          case "DELETE":
              $this->delete();
              break;
          case "OPTIONS":
              $this->options();  
              break;
          case "PATCH":
              $this->update();
              break;              

          default:
              http_response_code(405);
              echo json_encode("Método nao Implementado.");
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
      $id = (int)$id;
      if(empty($id)){
        http_response_code(404);
        echo json_encode("É necessário informar um id válido.");
        return;
      }
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
        echo json_encode("Os campos ". json_encode($properties) ." são obrigatórios.");
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

    protected function update() {
      $json = file_get_contents("php://input");
      $dados = json_decode($json, true);

      $id = $_GET["id"];
      $id = (int)$id;
      if(empty($id)){
        http_response_code(404);
        echo json_encode("É necessário informar um id válido.");
        return;
      }

      $model = new $this->modelBean();
      $object = $this->DAO->getById($id);
      $model->set($object);

      $model->setUpdate($dados);

      $result = $this->DAO->update($model, $id);

      if($result == null){
         http_response_code(500);
      } else {
         http_response_code(201);
      }
      echo json_encode($result);
    }

    protected function options(){
      $data = $this->DAO->model();
      echo json_encode($data);
    }

    protected function delete() {
      $id = $_GET["id"];
      $id = (int)$id;
      if(empty($id)){
        http_response_code(404);
        echo json_encode("É necessário informar um id válido.");
        return;
      }

      $object = $this->DAO->getById($id);
      if(!$object) {
        http_response_code(404);
        echo json_encode('Objeto com o id '. $id. ' não foi encontrado.');
        return;
      }

      $result = $this->DAO->delete($id);

      if(!$result) {
        http_response_code(404);
        echo json_encode("Erro ao tentar deletar.");
      } else {
        http_response_code(200);
        echo json_encode($object);
      }
    }
}
