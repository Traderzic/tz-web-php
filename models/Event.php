<?php
include "EventDAO.php";
class Event extends ProjectClass{
  private $day;
  private $location;

  public function __construct($mail,$name,$startDate,$description,$endDate,$day,$location){
    $support = null;
    $type = null;
    parent::_construct($mail,$name,$startDate,$description,$endDate,'conception','event',$support,$type,$day,$location);
  }

  public function getLocation(){
    return $this->location;
  }
  public function getDay(){
    return $this->day;
  }
  public function setLocation($location){
    return $this->location = $location;
  }
  public function setDay(){
    return $this->day = $day;
  }
}
?>
