<?php
class Surfer {
  private $mail;
  private $password;
  
  public function __construct($mail,$password) {
    $this->mail = $mail;
    $this->password = $password;
  }
    
  public function getMail(){
    return $this->mail;
  }
  
   public function getPassword(){
    return $this->password;
  }
  
	public function setMail($mail) {                                                                                                  
    $this->mail=$mail;
	}
  
  public function setPassword($password){
    $this->password=$password;
  }
}
?>