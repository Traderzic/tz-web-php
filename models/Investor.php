<?php
class Investor{
  private $mail;
  private $address;
  
  public function __construct($mail,$address){
    $this->mail = $mail;
    $this->address = $address;
  }
  
  public function getAddress(){
    return $this->pseudo;
  }
  
  public function getMail(){
    return $this->mail;
  }
  
  public function setAddress($address){
    $this->address=$address;
  }
  
  public function setMail($mail){
    $this->mail=$mail;
  }
}
?>