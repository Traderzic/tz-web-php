<?php 

require_once('../models/ProjectClass.php');
require_once('../models/ProjectDAO.php');
use PHPUnit\Framework\TestCase;

class ProjectClassTest extends PHPUnit_Framework_TestCase	{
	
	public $name = "simon";
	public $startDate = 2016;
	public $description = "descr";
	public $endDate = 2015;
	public $rate = 4;
	public $status = true;

	
	public function testSetName()	{
		$object = new ProjectClass($this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->status);
		$n = "simon";	
    	$object::setName($n);
		$new = $object::getName();
		$this->assertNotNull($new);	//Le nom entré ne peut être nul
	}
	
	public function testSetStartDate()	{
		$object = new ProjectClass($this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->status);
		$n = 2016;
    	$object::setStartDate($n);
		$new = $object::getStartDate();
		$this->assertNotNull($new);
		
	}
	
	public function testSetDescription()	{
		$object = new ProjectClass($this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->status);
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
		$object = new ProjectClass($this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->status);
		$n = 4;	
    	$object::setRate($n);
		$new = $object::getRate();
		$this->assertNotNull($new);
		$this->assertTrue(is_int($new));
	}
	
	public function testSetStatus()	{
		$object = new ProjectClass($this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->status);     
		$n = true;	
    	$object::setStatus($n);
		$new = $object::getStatus();
		$this->assertNotNull($new);
		$this->assertTrue(is_bool($new));
		
	}
		
}

?>