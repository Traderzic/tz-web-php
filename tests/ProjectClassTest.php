<?php 

require_once('../models/ProjectClass.php');
require_once('../models/ProjectDAO.php');
use PHPUnit\Framework\TestCase;

class ProjectClassTest extends PHPUnit_Framework_TestCase	{
	public $mail = "adr@test.com"
	public $name = "simon";
	public $startDate = 2016;
	public $description = "descr";
	public $endDate = 2015;
	public $rate = null;
	public $stats = "conception";
	public $classe = "event";
	public $support = null;
	public $type = null;
	public $day = 2015-05-11;
	public $location = "Paris";

	
	public function testSetName()	{
		$object = new ProjectClass($this->mail,$this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->stats,$this->classe,$this->support,$this->type,$this->day,$this->location);
		$n = "simon";	
    		$object::setName($n);
		$new = $object::getName();
		$this->assertNotNull($new);	//Le nom entré ne peut être nul
	}
	
	public function testSetStartDate()	{
		$object = new ProjectClass($this->mail,$this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->stats,$this->classe,$this->support,$this->type,$this->day,$this->location);
		$n = 2016;
    	$object::setStartDate($n);
		$new = $object::getStartDate();
		$this->assertNotNull($new);
		
	}
	
	public function testSetDescription()	{
		$object = new ProjectClass($this->mail,$this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->stats,$this->classe,$this->support,$this->type,$this->day,$this->location);
		$n = "salut";	
    	$object::setDescription($n);
		$new = $object::getDescription();
		$this->assertNotNull($new);
		
	}
	
	/*public function testSetEndDate()	{
		$object = new ProjectClass($this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->status);
		$e = 2010;	
    	$object::setEndDate($e);
		$end = $object::getEndDate();
		$begin = $object::getStartDate();
		$this->assertNotNull($end);
		$this->assertGreaterThan($begin, $end);
		
	}*/
	
	public function testSetRate()	{
		$object = new ProjectClass($this->mail,$this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->stats,$this->classe,$this->support,$this->type,$this->day,$this->location);
		$n = 4;	
    	$object::setRate($n);
		$new = $object::getRate();
		$this->assertNotNull($new);
		$this->assertTrue(is_int($new));
	}
	
	public function testSetStatus()	{
		$object = new ProjectClass($this->mail,$this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->stats,$this->classe,$this->support,$this->type,$this->day,$this->location);
		$n = true;	
    		$object::setStats($n);
		$new = $object::getStats();
		$this->assertNotNull($new);
		$this->assertTrue(is_bool($new));
		
	}
		
}

?>
