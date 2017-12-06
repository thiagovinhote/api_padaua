<?php

require "controllers/BaseController.php";
require "models/dao/IdeiaDAO.php";

class IdeiaController extends BaseController {
    public function IdeiaController() {
        $this->DAO = new IdeiaDAO();
        $this->required = array("nome", "descricao", "data_criacao", "usuario_id");
        parent::BaseController("Ideia");
    }
}

?>