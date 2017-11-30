<?php

require "controllers/BaseController.php";
require "models/dao/MetodologiaDAO.php";

/**
 *
 */
class MetodologiaController extends BaseController {

  public function MetodologiaController() {
    $this->DAO = new MetodologiaDAO();
    $this->required = array("nome", "descricao");
    parent::BaseController("Metodologia");
  }

}
