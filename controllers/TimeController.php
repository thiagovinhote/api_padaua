<?php
require "models/dao/TimeDAO.php";
require "controllers/BaseController.php";

class TimeController extends BaseController {
    public function TimeController() {
        $this->DAO = new TimeDAO();
        $this->required = array('nome_time', 'data_criacao', 'descricao');
        parent::BaseController("Time");
    }
}
