<?php
class Artist{
  private $mail;
  private $description;
  
  public function __construct($mail,$description){
    $this->mail = $mail;
    $this->description = $description;
  }
    
  public function getDescription(){
    return $this->description;
  }
  
  public function getMail(){
    return $this->mail;
  }
 
  public function setDescription($description){
    $this->description=$description;
  }
  
  public function setMail($mail){
    $this->mail=$mail;
  }
}
?>