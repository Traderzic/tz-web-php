<?php
require_once './models/Database.php';
require_once './models/DAOsurfer.php';
require_once './models/DAOartist.php';
require_once './models/Surfer.php';
require_once './models/Artist.php';
use PHPUnit\Framework\TestCase;

// We consider you have already tested SurferTest

class ArtistTest extends PHPUnit_Framework_TestCase{
	
	var $db;
	var $email = "alex@gmail.com"; // cannot use mail(already a function)
	var $pseudo = "vietmoopy";
	var $name = "nguyen";
	var $firstname = "alex";
	var $password = "1234";
	var $description = "blabla";
	var $surfer;
	var $artist;
	
	public function setUp(){ // First we create a connection to our database and we empty tables
		$this->db = Database::getInstance();
		$sql = "TRUNCATE TABLE Artist";
		$this->db->query($sql);
		$sql = "TRUNCATE TABLE Investor";
		$this->db->query($sql);
		$sql = "TRUNCATE TABLE Surfer";
		$this->db->query($sql);
	}
	
	public function test_insertArtist(){ // We insert a surfer first. Then we insert an artist with the same mail and we test if the return is the same mail that we used to insert 
		$this->surfer = new Surfer($mail, $pseudo, $name, $firstname, $password);
		DAOsurfer::insertSurfer($surfer);
		$this->artist = new Artist($mail, $description);
		$resultMail = DAOartist::insertArtist($this->artist);
		$this->assertEquals($this->email,$resultMail);
	}
		
	 public function test_getArtistFromMail(){ // We test if the result is a Artist object and if its attributes are the same that we used during the insert
		$result = DAOartist::getArtistFromMail($this->email);
		$this->assertInstanceOf(Artist::class, $result);
		$this->assertEquals($this->email, $result->getMail());
		$this->assertEquals($this->description, $result->getDescription());
	}

	public function test_deleteArtist(){ // We test when we select the deleted investor if the result is empty when we use getInvestorFromMail
		$result = DAOartist::deleteArtist($artist);
		$this->assertEquals($result, true);
		$verification = DAOartist::getFromMail($this->email);
		$this->assertNull($verification);
	}
	
	public function test_getArtistList(){ // We insert a fixed number of artist then we test if this number is the same as the number of results
		$sql = "TRUNCATE TABLE Artist";
		$this->db->query($sql);
		$sql = "TRUNCATE TABLE Investor";
		$this->db->query($sql);
		$sql = "TRUNCATE TABLE Surfer";
		$this->db->query($sql);
		for ($i=1; $i<=5; $i++) {
			$mailElt = $i.$this->email;
			$surferElt = new Surfer($mailElt, $pseudo, $name, $firstname, $password);
			DAOsurfer::insertSurfer($surfer);
			$artistElt = new Artist($mailElt, $description);
			DAOartist::insertArtist($artistElt);
		}
		$result = DAOartist::getArtistList();
		$this->assertCount(5,$result);
	}
	
}
?>