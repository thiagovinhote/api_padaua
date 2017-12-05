<?php

require "models/dao/RoteiroDAO.php";
require "controllers/BaseController.php";

/**
 *
 */
class RoteiroController extends BaseController {

  public function RoteiroController() {
    $this->DAO = new RoteiroDAO();
    $this->required = array('intervalo_entregas', 'progresso', 'template_id', 'time_id');
    parent::BaseController("Roteiro");
  }

}
