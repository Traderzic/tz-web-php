<?php
//nicolas@karageusian.com
require_once '../models/PartClass.php';
require_once '../models/PartDAO.php';

use PHPUnit\Framework\TestCase;

class TestPart extends PHPUnit_Framework_TestCase {
  
  public function testNewPart() {
    $part=new PartClass(1,11,4,120,'2016-06-16');
    $this->assertNotEmpty($part);
  }
  
  public function testGetEmptyList() {
    $tab = array();
    if($this->assertNotEmpty(PartDAO::getListPart())) {
      return $tab;
    } 
  //Doit return un tableau vide si oui
  }
  
  public function testCreatePart() {
    $part=new PartClass(1,"zozo@hotmail.fr",4,120,'2016-06-16');
    $id = PartDAO::createPart($part);
    $this->assertInternalType("int",$id);
  }
  
  public function testUpdatePart() {
    $part = new PartClass(1,"zozo@hotmail.fr",4,110,'2016-06-16');
    $newPart = PartDAO::updatePart($part);
    
    $this->assertEquals($part->getIdPart(),$newPart->getIdPart());
    $this->assertEquals($part->getMailInvestor(),$newPart->getMailInvestor());
    $this->assertEquals($part->getIdProject(),$newPart->getIdProject());
    $this->assertEquals($part->getPrice(),$newPart->getPrice());
    $this->assertEquals($part->getDate(),$newPart->getDate());
  }
  
  public function testDeletePart() {
    $part = new PartClass(1,"zozo@hotmail.fr",4,110,'2016-06-16');
    $count = PartDAO::deletePart($part);
    $this->assertEquals(1,$count);
  }
  
  
?>