<?php
require_once '../models/Database.php';
require_once '../models/DAOsurfer.php';
require_once '../models/Surfer.php';
use PHPUnit\Framework\TestCase;

class SurferTest extends PHPUnit_Framework_TestCase{
	
	var $db;
	var $params = array(
    "mail" => "vietmoopy",
	"pseudo" => "vietmoopy",
	"name" => "nguyen",
	"firstname" => "alex",
	"passwrd" => "1234");
	var $surfer;
	
	public function setUp(){ // First we create a connection to our database and we empty table
		$this->db = Database::getInstance();
	}
	
	public function test_insertSurfer(){ // We insert a surfer and we test if the return is the same mail that we used to insert 
		$this->surfer = new Surfer($this->params);
		$resultMail = DAOsurfer::insertSurfer($this->surfer);
		$this->assertEquals($this->params['mail'],$resultMail);
	}
		
	 public function test_getSurferFromMail(){ // We test if the result is a Surfer object and if its attributes are the same that we used during the insert
		$result = DAOsurfer::getSurferFromMail($this->params['mail']);
		$this->assertEquals($this->params['mail'], $result->getMail());
		$this->assertEquals($this->params['pseudo'], $result->getPseudo());
		$this->assertEquals($this->params['name'], $result->getName());
		$this->assertEquals($this->params['firstname'], $result->getFirstname());
		$this->assertEquals($this->params['passwrd'], $result->getPassword());
	}

	public function test_deleteSurfer(){ // We test if the deletion returns the deleted surfer and if it has the same attribute and then we check if the result is empty when use getSurferFromMail
		$result = DAOsurfer::deleteSurfer($this->params['mail']);
		$this->assertEquals(true, $result);
	}
	
	public function test_getSurferList(){ // We insert a fixed number of surfer then we test if this number is the same as the number of results
		$sql = "TRUNCATE TABLE Surfer";
		$this->db->query($sql);
		for ($i=1; $i<=5; $i++) {
			$this->params['mail']= $i.$this->params['mail'];
			$surferElt = new Surfer($this->params);
			DAOsurfer::insertSurfer($surferElt);
		}
		$result = DAOsurfer::getSurferList();
		$this->assertCount(5,$result);
	}
	
	
}
?>
