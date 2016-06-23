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
		$this->mail=$mail;
		$this->name=$name;
		$this->startDate=$startDate;
		$this->description=$description;
		$this->endDate=$endDate;
		$this->rate=null;
		$this->stats=$stats;
		$this->classe=$classe;
		$this->support=$support;
		$this->type=$type;
		$this->day=$day;
		$this->location=$location;
		
		$object = new ProjectDAO();
		
		$project = $object = new ProjectClass($this->mail,$this->name,$this->startDate,$this->description,$this->endDate,$this->rate,$this->stats,$this->classe,$this->support,$this->type,$this->day,$this->location);
		
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
