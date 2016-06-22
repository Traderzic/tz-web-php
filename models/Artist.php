<?php
class Artist extends Surfer{
  private $name;
  private $firstname;
  private $pseudo;
  
  public function __construct($name,$firstname,$pseudo) {
    parent::__construct();
    $this->name = $name;
    $this->firstname = $firstname;
    $this->pseudo = $pseudo;
  }
    
  public function getName(){
    return $this->name;
  }
  
  public function getFirstName(){
    return $this->firstname;
  }
  
  public function getPseudo(){
    return $this->pseudo;
  }
  
  public function setName($name) {                                                                                                  
    $this->name=$name;
  }
  
  public function setFirstName($firstname){
    $this->firstname=$firstname;
  }
  
  public function setPseudo($pseudo){
    $this->pseudo=$pseudo;
  }
}
?>