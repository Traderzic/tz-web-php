<?php 
  include "projectTaskDAO.php";
  class ProjectTask {
    private $idProject;
    private $attendee;
    private $description;
    private $title;
    private $price;
    private $duration;
    private $status;
    private $percent;
    
    
    public function __construct($idProject,$attendee,$description,$title,$price,$duration,$status,$percent) {
      $this->idProject = $idProject;
      $this->attendee = $attendee;
      $this->description = $description; 
      $this->title = $title;
      $this->price = $price;
      $this->duration = $duration;
      $this->status = $status;
      $this->percent = $percent;
    }
    
    public function __toString(){
      return $this->idProject.' '.$this->attendee.' '.$this->description.' '.$this->title.' '.$this->price.' '.$this->duration.' '.$this->status.' '.$this->percent;
    }
    
    public function getIdProject() {
      return $this->idProject;
    }
    
    public function getAttendee() {
      return $this->attendee;
    }
   
    public function getDescription() {
      return $this->description; 
    }
    
    public function getTitle() {
      return $this->title;
    }
    
    public function getPrice() {
      return $this->price;
    }
    
    public function getDuration() {
      return $this->duration;
    }
    
    public function getStatus() {
      return $this->status;
    }
    
    public function getPercent() {
      return $this->percent;
    }    
    
    public function setIdProject($idProject) {
      $this->idProject = $idProject;  
    }
    
    public function setAttendee($attendee) {
      $this->attendee = $attendee; 
    }
   
    public function setDescription($description) {
      $this->description = $description; 
    }
    
    public function setTitle($title) {
      $this->title = $title;
    }
    
    public function setPrice($price) {
      $this->price = $price;
    }
    
    public function setDuration($duration) {
      $this->duration = $duration;
    }
    
    public function setStatus($status) {
      $this->status = $status;
    }
    
    public function setPercent($percent) {
      $this->percent = $percent;
    } 
  }

$projectTask = new ProjectTask (5,'Mike','Concert et Album POP','Mike project','10000','30j','onGoing', '40%');
echo $projectTask;



?>