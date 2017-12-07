<?php

interface DAOInterface {

  public function getAll();
  public function getById($id);
  public function save($object);
  public function update($object, $id);
  public function delete($id);

}
