<?php 

require_once('../models/ProjectDAO.php');
use PHPUnit\Framework\TestCase;

class ProjectDAOTest extends PHPUnit_Framework_TestCase	{
	public function testGetEmptyList()	{
		$object = new ProjectDAO();
		$test = $object::getList();
		$this->assertEquals(0,count($test));
	}
}	

?>
