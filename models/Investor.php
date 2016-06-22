<?php
class Investor extends Surfer{
  private $name;
  private $firstname;
  private $address;
  
  public function __construct($name,$firstname,$address) {
    parent::__construct();
    $this->name = $name;
    $this->firstname = $firstname;
    $this->address = $address;
  }
    
  public function getName(){
    return $this->name;
  }
  
  public function getFirstName(){
    return $this->firstname;
  }
   
  public function getAddress(){
    return $this->pseudo;
  }
  
  public function setName($name) {                                                                                                  
    $this->name=$name;
  }
  
  public function setFirstName($firstname){
    $this->firstname=$firstname;
  }
  
  public function setAddress($address){
    $this->address=$address;
  }
}
?>