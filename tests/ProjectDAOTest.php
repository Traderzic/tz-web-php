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
		$rate = null;
		$status = "conception";
		
		$object = new ProjectDAO();
		
		$project = new Project($name,$startDate,$description,$endDate,$rate,$status);
		
		$before = count($object::getList());
		$test = $object::create($project);
		
		$after = count($object::getList());
		
		$this->assertEquals($before+1,$after);
		
		$newProject = $object::getFromId($test);
		$this->assertEquals($project,$newProject);
		$this->assertEquals($project->getStats(),$newProject->getStats());
		$this->assertEquals($project->getDescription(),$newProject->getDescription());
		$this->assertEquals($project->getName(),$newProject->getName());
		
		
	}
	

}	

?>
