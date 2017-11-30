<?php

require "models/dao/UsuarioDAO.php";
require "controllers/BaseController.php";

class UsuarioController extends BaseController {

  public function UsuarioController() {
    $this->DAO = new UsuarioDAO();
    parent::BaseController("Usuario");
  }

}
