<?php

require "models/dao/UsuarioDAO.php";
require "controllers/BaseController.php";

class UsuarioController extends BaseController {

  public function UsuarioController() {
    $this->DAO = new UsuarioDAO();
    $this->required = array('nome', 'email', 'link_linkedin','celular','nick','senha');
    parent::BaseController("Usuario");
  }

}
