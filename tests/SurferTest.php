<?php
require_once './models/Database.php';
require_once './models/DAOsurfer.php';
require_once './models/Surfer.php';
use PHPUnit\Framework\TestCase;

class SurferTest extends PHPUnit_Framework_TestCase{
	
	var $database;
	var $email = "alex@gmail.com"; // cannot use mail(already a function)
	var $pseudo = "vietmoopy";
	var $name = "nguyen";
	var $firstname = "alex";
	var $password = "1234";
	var $surfer;
	
	public function setUp(){ // First we create a connection to our database and we empty table
		$this->database = Database::getInstance();
		$sql = "TRUNCATE TABLE Surfer";
		$this->database->query($sql);
	}
	
	public function test_insertSurfer(){ // We insert a surfer and we test if the return is the same mail that we used to insert 
		$this->surfer = new Surfer($this->email, $this->pseudo, $this->name, $this->firstname, $this->password);
		$resultMail = DAOsurfer::insertSurfer($this->surfer);
		$this->assertEquals($this->email,$resultMail);
	}
		
	 public function test_getSurferFromMail(){ // We test if the result is a Surfer object and if its attributes are the same that we used during the insert
		$result = DAOsurfer::getSurferFromMail($this->email);
		$this->assertInstanceOf(Surfer::class, $result);
		$this->assertEquals($this->email, $result->getMail());
		$this->assertEquals($this->pseudo, $result->getPseudo());
		$this->assertEquals($this->name, $result->getName());
		$this->assertEquals($this->firstname, $result->getFirstname());
		$this->assertEquals($this->password, $result->getPassword());
	}

	public function test_deleteSurfer(){ // We test if the deletion returns the deleted surfer and if it has the same attribute and then we check if the result is empty when use getSurferFromMail
		$result = DAOsurfer::deleteSurfer($this->email);
		$this->assertEquals($result, true);
		$verification = DAOsurfer::getFromMail($this->email);
		$this->assertNull($verification);
	}
	
	public function test_getSurferList(){ // We insert a fixed number of surfer then we test if this number is the same as the number of results
		for ($i=1; $i<=5; $i++) {
			$mailElt = $i.$this->email;
			$surferElt = new Surfer($mailElt, $this->pseudo, $this->name, $this->firstname, $this->password);
			DAOsurfer::insertSurfer($surferElt);
		}
		$result = DAOsurfer::getSurferList();
		$this->assertCount(5,$result);
	}
	
	
}
?>
