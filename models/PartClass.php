<?php
 
class PartClass {
  private $idPart;
  private $price;
  private $date;
  private $mail;
  private $idProject;
    
  public function __construct($idPart,$mail,$idProject,$price,$date) {
    $this->idPart = $idPart;
    $this->mail = $mail;
    $this->idProject = $idProject;
    $this->price = $price;
    $this->date = $date;
  }
  public function __toString() {
    return "idPart : ".$this->idPart.
      "<br>mailInvestor : ".$this->mail.
      "<br>idProject : ".$this->idProject.
      "<br>price : ".$this->price.
      "<br>date : ".$this->date."<br>";
      
  }
  
  //Getteurs
  
  public function getIdPart() {
    return $this->idPart;
  }
  public function getMailInvestor() {
    return $this->mail;
  }
  
  public function getIdProject() {
    return $this->idProject;
  }
  
  public function getPrice() {
    return $this->price;  
  }
  
  public function getDate() {
    return $this->date;  
  }
  
  //Setteurs
  public static function setidPart($id) {
    $this->idPart = $id;
  }
  
  public function setMailInvestor($mail) {
    $this->mail = $mail;
  }
  
  public function setIdProject($idProject) {
    $this->idProject = $idProject;
  }
  
  public function setPrice($price) {
    $this->price = $price;
  }
  
  public function setDate($date) {
    $this->date = $date;
  }
  
}

?>