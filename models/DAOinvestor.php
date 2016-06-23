<?php
include_once "DAOsurfer.php";
include_once "Database.php";
class DAOinvestor{
 
  public static function insertInvestor($investor){
    $surfer = DAOsurfer::getSurferFromMail($investor->getMail());
    if($surfer != ""){
      $sql = "INSERT into Investor values(:mail,:address)";
      $db = Database::getInstance();
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_CLASS, "Investor");
      $stmt->execute(array(
      ":mail" => $mail,
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
    $count = $stmt->rowCount();
		return $count;
  }
 
  public static function updateAddressFromMail($mail,$address){                                                                                                  
    $sql = "UPDATE Investor set address=:address WHERE mail = :mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
    ":mail"=>$mail,
    ":description"=>$description));
    $count = $stmt->rowCount();
		return $count;
  }

  public static function getInvestorFromMail($mail){
    $sql = "SELECT * FROM Investor WHERE mail = :mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Investor");
    $stmt->execute(array(":mail" => $mail));
    $res=$stmt->fetch();
	  $investor=new Investor($res['mail'],$res['address']);
	  return $investor;
  }
  
  public static function getInvestorList(){
    $sql = "SELECT * FROM Investor";
    $db = Database::getInstance();
    $stmt = $db->query($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Investor");
    return $stmt->fetchAll();
  }
}
?>