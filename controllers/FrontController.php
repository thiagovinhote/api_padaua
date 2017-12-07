<?php

class FrontController {

  public function FrontController() {
    $recurso = $this->extrairParametros();
    $controller = ucfirst($recurso) . "Controller";
    $arquivo = "controllers/$controller.php";
    
    if(!file_exists($arquivo)){
        http_response_code(404);
        echo "Recurso não encontrado";
    } else {
        require $arquivo;
        new $controller();
    }
}

private function extrairParametros() {
    $recurso = null;
    $id = 0;
    if(!isset($_GET["param"])){
        // http_response_code(404);
        // echo "Recurso não encontrado";
        http_response_code(200);
        echo json_encode(
            ['localhost:8080/padawan-ideas-api/ideia', 
            'localhost:8080/padawan-ideas-api/metodologia', 
            'localhost:8080/padawan-ideas-api/roteiro',
            'localhost:8080/padawan-ideas-api/time',
            'localhost:8080/padawan-ideas-api/usuario']
        );
        exit;
    } else {
        $url = $_GET["param"];
        $partes = explode("/", $url);
        if(isset($partes[1])){
            $_GET["id"] = $partes[1];
        }
        $recurso = strtolower(trim($partes[0]));
        return $recurso;
    }
  }

}