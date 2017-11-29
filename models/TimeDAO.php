<?php
require "config/Conexao.php";

class TimeDAO{
    private $conexao;

    public function TimeDAO() {
        $conexao = Conexao::getShared();
        $this->conexao = $conexao->getDb();
    }

    public function listar(){
        $sql = "SELECT * FROM time";
        $result = $this->conexao->query($sql);

        if($result->num_rows == 0){
            return [];
        }
        else{
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
}