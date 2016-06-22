<?php
require_once 'DAOsurfer.php';
require_once 'Surfer.php';
use PHPUnit\Framework\TestCase;

class Surfer_Test extends PHPUnit_Framework_TestCase
{
	
public function test_new_instance(){
	$surfer = new Surfer("test@gmail.com","test");
	$this->assertNotEmpty($surfer);
}
	
 public function test_get_empty()
{
	$dao = new DAOsurfer();
	$test = $dao->getListSurfer();
    $this->assertNotNull($test);
}

public function test_insert(){
	$dao = new DAOsurfer();
	$mail = "test@gmail.com";
	$passwrd = "test";
	$surfer = new Surfer($mail,$passwrd);
	$this->assertTrue($dao->insertSurfer($surfer->getmail(),$surfer->getPassword()));
}
}
?>