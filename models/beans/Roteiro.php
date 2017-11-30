<?php

class Roteiro {

  private $id;
  private $intervalo_entregas;
  private $progresso;
  private $template_id;
  private $time_id;

  public function set($data) {
    foreach ($data AS $key => $value) $this->{$key} = $value;
  }

  public function check($required) {
    $properties = array();
    foreach($required as $field) {
        // printf("[%s]:\t", $field);
        // var_dump(property_exists($this, $field));

        if(is_null($this->{$field})) {
          array_push($properties, $field);
        }
    }
    return $properties;
  }

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
