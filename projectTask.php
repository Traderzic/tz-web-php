<?php 

  class ProjectTaskDAO {
    private $attendee;
    private $description;
    private $title;
    private $price;
    private $duration;
    private $status;
    private $percent;
    
    public function __construct($attendee,$description,$title,$price,$duration,$status,$percent) {
      $this->attendee = $attendee;
      $this->description = $description; 
      $this->title = $title;
      $this->price = $price;
      $this->duration = $duration;
      $this->status = $status;
      $this->percent = $percent;
    }
    
    /*public function __toString(){
     
    }*/
    
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
    
    public function getPercent($percent) {
      $this->percent = $percent;
    }
    
    
    
    
  }

?>