<?php

class BaseModel {
    public function set($data) {
        foreach ($data AS $key => $value) $this->{$key} = $value;
      }
    
      public function setUpdate($data) {
        foreach ($data as $key => $value) {
          if(!is_null($data[$key])) {
             $this->{$key} = $value;
          }
        }
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
}

?>