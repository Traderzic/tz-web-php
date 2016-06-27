<?php

include "Surfer.php"

class Artist extends Surfer{
  private $description;
  
  public function __construct($params){
    parent::__construct($params);
    $this->description = $params['description'];
  }
    
  public function getDescription(){
    return $this->description;
  }
 
  public function setDescription($description){
    $this->description=$description;
  }
}
?>