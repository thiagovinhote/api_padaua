<?php

require "models/beans/BaseModel.php";

class Roteiro extends BaseModel{

  private $id;
  private $intervalo_entregas;
  private $progresso;
  private $template_id;
  private $time_id;

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getIntervaloEntregas() {
    return $this->intervalo_entregas;
  }

  public function setIntervaloEntregas($intervalo_entregas) {
    $this->intervalo_entregas;
  }

  public function getProgresso() {
    return $this->progresso;
  }

  public function setProgresso($progresso) {
    $this->progresso = $progresso;
  }

  public function getTemplateId() {
    return $this->template_id;
  }

  public function setTemplateId($template_id) {
    $this->template_id = $template_id;
  }

  public function getTimeId() {
    return $this->time_id;
  }

  public function setTimeId($time_id) {
    $this->time_id = $time_id;
  }
}
