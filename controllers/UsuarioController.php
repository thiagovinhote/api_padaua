<?php

require "models/dao/UsuarioDAO.php";

class UsuarioController {

  private $DAO;

  public function UsuarioController() {
    $this->DAO = new UsuarioDAO();
    $this->checkAction();
  }

  protected function checkAction() {
    switch($_SERVER["REQUEST_METHOD"]){
        case "GET":
            if(isset($_GET["id"])){

            } else {
                $this->getAll();
            }
            break;
        case "POST":

            break;
        case "PUT":

            break;
        case "DELETE":

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

}