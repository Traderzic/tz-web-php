<?php 

require_once('../models/ProjectDAO.php');
use PHPUnit\Framework\TestCase;

class ProjectDAOTest extends PHPUnit_Framework_TestCase	{
	public function testGetEmptyList()	{
		$object = new ProjectDAO();
		$test = $object::getList();
		$this->assertEquals(0,count($test));
	}
	
	public function testGetEmptyPalmares()	{
		$object = new ProjectDAO();
		$test = $object::getPalmaresList();
		$this->assertEquals(0,count($test));
	}
	
	public function testNoProjectOnGoing()	{
		$object = new ProjectDAO();
		$test = $object::getProjectOnGoingList();
		$this->assertEquals(0,count($test));
	}
	
	public function testCreateProject()	{
		$name = "simon";
		$startDate = 2014;
		$description = "descr";
		$endDate = 2017;
		$rate = 4;
		$status = true;
		
		$object = new ProjectDAO();
		
		$before = count($object::getList());
		$test = $object::create($name,$startDate,$description,$endDate,$rate,$status);
		
		$this->assertGreaterThan($before,$test);
	}
	

}	

?>
