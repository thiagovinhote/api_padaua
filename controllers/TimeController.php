<?php
require "models/TimeDAO.php";

class TimeController {
    private $dao;

    public function TimeController(){
        $this->dao = new TimeDAO();
        $this->optionsOperations();
    }

    protected function optionsOperations() {
        switch($_SERVER["REQUEST_METHOD"]){
            case "GET":
                echo "GET";
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
}