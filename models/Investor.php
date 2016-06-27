<?php

include "Surfer.php";

class Investor extends Surfer{
  private $address;
  
  public function __construct($params){
    parent::__construct($params);
    $this->address = $params['address'];
  }
  
  public function getAddress(){
    return $this->address;
  }
  
  public function setAddress($address){
    $this->address=$address;
  }
}
?>