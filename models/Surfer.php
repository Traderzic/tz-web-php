<?php

class Surfer {
	private $email;
  private $passwrd;
	private $pseudo;
	private $name;
	private $firstname;
  
  public function __construct($params){
    $this->email = $params['mail'];
    $this->passwrd = $params['passwrd'];
		$this->pseudo = $params['pseudo'];
		$this->name = $params['name'];
		$this->firstname = $params['firstname'];
  }
    
  public function getMail(){
    return $this->email;
  }
  
  public function getPassword(){
    return $this->passwrd;
  }
	
	public function getPseudo(){
    return $this->pseudo;
  }
  
  public function getName(){
    return $this->name;
  }
	
	public function getFirstname(){
    return $this->firstname;
  }
  
	public function setMail($email){                                                                                                  
    $this->email=$email;
	}
  
  public function setPassword($passwrd){
    $this->passwrd=$passwrd;
  }
	
	public function setPseudo($pseudo){                                                                                                  
    $this->pseudo=$pseudo;
	}
  
  public function setName($name){
    $this->name=$name;
  }
	
	public function setFirstname($firstname){                                                                                                  
    $this->firstname=$firstname;
	} 
}
?>