<?php

require "models/dao/RoteiroDAO.php";
require "controllers/BaseController.php";

/**
 *
 */
class RoteiroController extends BaseController {

  public function RoteiroController() {
    $this->DAO = new RoteiroDAO();
    parent::BaseController();
  }

}
