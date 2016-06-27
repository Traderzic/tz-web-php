<?php
require_once '../models/Database.php';
require_once '../models/DAOsurfer.php';
require_once '../models/DAOartist.php';
require_once '../models/Surfer.php';
require_once '../models/Artist.php';
use PHPUnit\Framework\TestCase;

// We consider you have already tested SurferTest

class ArtistTest extends PHPUnit_Framework_TestCase{
	
	var $db;
	var $params = array(
    "mail" => "vietmoopy",
	"pseudo" => "vietmoopy",
	"name" => "nguyen",
	"firstname" => "alex",
	"passwrd" => "1234",
	"description" => "desc coucou"	
	);
	var $surfer;
	var $artist;
	
	public function setUp(){ // First we create a connection to our database and we empty tables
		$this->db = Database::getInstance();
	}
	
	public function test_insertArtist(){ // We insert a surfer first. Then we insert an artist with the same mail and we test if the return is the same mail that we used to insert 
		$this->surfer = new Surfer($this->params);
		DAOsurfer::insertSurfer($this->surfer);
		$this->artist = new Artist($this->params);
		$resultMail = DAOartist::insertArtist($this->artist);
		$this->assertEquals($this->params['mail'],$resultMail);
	}
		
	 public function test_getArtistFromMail(){ // We test if the result is a Artist object and if its attributes are the same that we used during the insert
		$result = DAOartist::getArtistFromMail($this->params['mail']);
		$this->assertInstanceOf(Artist::class, $result);
		$this->assertEquals($this->params['mail'], $result->getMail());
		$this->assertEquals($this->params['description'], $result->getDescription());
	}

	public function test_deleteArtist(){ // We test when we select the deleted investor if the result is empty when we use getInvestorFromMail
		$result = DAOartist::deleteArtist($artist);
		$this->assertEquals($result, true);
	}
	
	public function test_getArtistList(){ // We insert a fixed number of artist then we test if this number is the same as the number of results
		$sql = "TRUNCATE TABLE Artist";
		$this->db->query($sql);
		$sql = "TRUNCATE TABLE Investor";
		$this->db->query($sql);
		$sql = "TRUNCATE TABLE Surfer";
		$this->db->query($sql);
		for ($i=1; $i<=5; $i++) {
			$this->params['mail']= $i.$this->params['mail'];
			$surferElt = new Surfer($this->params);
			DAOsurfer::insertSurfer($surferElt);
			$artistElt = new Artist($this->params);
			DAOinvestor::insertArtist($artistElt);
		}
		$result = DAOartist::getArtistList();
		$this->assertCount(5,$result);
	}
	
}
?>
