<?php 

require_once('../models/ProjectClass.php');
require_once('../models/ProjectDAO.php');
use PHPUnit\Framework\TestCase;

class ProjectClassTest extends PHPUnit_Framework_TestCase	{
	
	public $name = "simon";
	public $startDate = '2016-12-12';
	public $description = "descr";
	public $endDate = '2015-12-12';
	public $rate = 4;
	public $status = 'conception';
  public $classe = 'event';
  public $location = 'lieusaint';
  public $day = '2017-12-12';

	
	public function testSetLocation()	{
		$object = new ProjectClass($this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->status);
    	$object::setName($location);
		$new = $object::getName();
		$this->assertNotNull($new);	//Le nom entré ne peut être nul
	}
	
	public function testSetDay()	{
		$object = new ProjectClass($this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->status);
    	$object::setStartDate($day);
		$new = $object::getStartDate();
		$this->assertNotNull($new);
	}
}

?>