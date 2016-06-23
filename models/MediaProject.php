<?php

include "MediaProjectDAO.php";

class MediaProject extends ProjectClass{
  
  private var $support;
  private var $type;
  
  private var $differentTypes = array('video','son');
  private var $differentSupports = array('numeric','cd','dvd');
  
  public function __construct($name,$startDate,$description,$endDate,$support,$type,$mail){
    parent::_construct($mail,$name,$startDate,$description,$endDate,$stats,$classe,$support,$type);
  }
  
//Support methods  
  public function setSupport($support){
    if(in_array($support,$this->differentSupports)){
      $this->support = $support;
    }
  }
  
  public function getSupport(){
    return this->support;
  }
  
//Type methods  
  public function setType($type){
    if(in_array($type,$this->differentTypes)){
      $this->type = $type;
    }
  }
  
  public function getType(){
    return this->type;
  }
  
  
}

?>