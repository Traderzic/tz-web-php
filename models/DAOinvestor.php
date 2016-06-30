<?php
include_once "DAOsurfer.php";
include_once "Database.php";
include "Investor.php";
class DAOinvestor extends DAOsurfer{
 
  public static function insertInvestor($investor){
    $surfer = DAOsurfer::getSurferFromMail($investor->getMail());
    if($surfer != ""){
      $sql = "INSERT into Investor values(:mail,:address)";
      $db = Database::getInstance();
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_CLASS, "Investor");
      $stmt->execute(array(
      ":mail" => $investor->getMail(),
      ":address" => $investor->getAddress()));
      return $investor->getMail();
    }
    return false;
 }
  
  public static function deleteInvestor($mail){
    $sql = "DELETE from Investor where mail=:mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Investor");
    $stmt->execute(array(":mail"=>$mail));
    if (DAOinvestor::getInvestorFromMail($mail)==null){
			return true;
		}
		else{
			return false;
		}
  }
 
  public static function updateAddressFromMail($mail,$address){                                                                                                  
    $sql = "UPDATE Investor set address=:address WHERE mail = :mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
    ":mail"=>$mail,
    ":address"=>$address));
    if (DAOinvestor::getInvestorFromMail($mail)==null){
			return false;
		}
		else{
			return true;
		}
  }

  public static function getInvestorFromMail($mail){
    $sql = "SELECT * FROM Investor WHERE mail = :mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(":mail" => $mail));
    $res=$stmt->fetch();
	  $investor=new Investor($res);
	  if ($investor->getMail()==null){
			return null;
		}
		else
		{
			return $investor;
		}
  }
  
  public static function getInvestorList(){
    $sql = "SELECT * FROM Investor";
    $db = Database::getInstance();
    $stmt = $db->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
  }
}
?>