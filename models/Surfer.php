<?php
class Surfer {
	private $mail;
  private $passwrd;
	private $pseudo;
	private $name;
	private $firstname;
  
  public function __construct($mail,$pseudo,$name,$firstname,$passwrd){
    $this->mail = $mail;
    $this->passwrd = $passwrd;
		$this->pseudo = $pseudo;
		$this->name = $name;
		$this->firstname = $firstname;
  }
    
  public function getMail(){
    return $this->mail;
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
  
	public function setMail($mail){                                                                                                  
    $this->mail=$mail;
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