<?php
require "models/dao/TimeDAO.php";

class TimeController {
    private $dao;

    public function TimeController(){
        $this->dao = new TimeDAO();
        $this->optionsOperations();
    }

    protected function optionsOperations() {
        switch($_SERVER["REQUEST_METHOD"]){
            case "GET":
                $this->listar();
                break;
            case "POST":
                echo "POST";
                break;
            case "PUT":
                echo "PUT";
                break;
            case "DELETE":
                echo "DELETE";
                break;
            default:
                http_response_code(405);
                echo "Método não implementado";
        }
    }

    protected function listar() {
        $lista = $this->dao->listar();
        if(count($lista) == 0){
            http_response_code(404);
        } else {
            http_response_code(200);
        }
        echo json_encode($lista);
    }
}