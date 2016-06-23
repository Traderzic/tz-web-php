<?php
include "EventDAO.php";
public class Event extends Project{
  private $location;
  private $dateTime;

  public function __construct($location, $dateTime){
    $this->location = $location;
    $this->dateTime = $dateTime;
  }

  public function getLocation(){
    return $this->location;
  }
  public function getDateTime(){
    return $this->dateTime;
  }
  public function setLocation($location){
    return $this->location = $location;
  }
  public function setdateTime(){
    return $this->dateTime = $dateTime;
  }
}
?>
