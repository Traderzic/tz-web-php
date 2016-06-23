<?php
//nicolas@karageusian.com
require_once 'PartClass.php';
require_once 'PartDAO.php';

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
    $part=new part(1,11,4,120,'2016-06-16');
    $id = PartDAO::createPart($part);
    $this->assertInternalType("int",$id);
  }
  
  public function testUpdatePriceFromIdPart() {
    $count = PartDAO::updatePriceFromIdPart(1,1);
    $this->assertGreaterThanOrEquals(1,$count);
  }
  
  public function testDeletePartFromIdPart() {
    $count = PartDAO::deletePartFromIdPart(1);
    $this->assertGreaterThanOrEquals(1,$count);
  }
  
  public function testDeletePartFromIdProject() {
    $count = PartDAO::deletePartFromIdProject(1);
    $this->assertGreaterThanOrEquals(1,$count);
  }
  
?>