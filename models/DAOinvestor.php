<?php
include "DAOsurfer.php";
class DAOinvestor extends DAOsurfer{
  protected $db;

  public function __construct() { 
   $this->db = Database::getInstance();
  }
 
 public function insertInvestor($mail,$name,$firstname,$address ){
  $surfer = $this->getFromEmailSurfer($mail);
  if($surfer != FALSE){
    $passwrd = $surfer['passwrd'];
  $sql = "INSERT into Investor values(:mail,:passwrd, :name, :firstname, :address)";
  $stmt = $this->db->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Investor");
  return $stmt->execute(array(
   ":mail" => $mail,
   ":passwrd" => $passwrd,
    ":name" => $name,
    ":firstname" => $firstname,
    ":address" => $address));
  }
   return false;
 }
 
 public function deleteInvestor($mail){
  $sql = "DELETE from Investor where mail=:mail";
  $stmt = $this->db->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Investor");
  return $stmt->execute(array(
   ":mail"=>$mail));
 }
 
 public function updatePasswordFromEmail($mail,$passwrd){                                                                                                  
  $sql = "UPDATE Investor set passwrd=:passwrd WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":passwrd"=>$passwrd));
 }
  
 public function updateNameFromEmail($mail,$name){                                                                                                  
  $sql = "UPDATE Investor set name=:name WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":name"=>$name));
 }
 
 public function updateFirstnameFromEmail($mail,$firstname){                                                                                                  
  $sql = "UPDATE Investor set firstname=:firstname WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":firstname"=>$firstname));
 }
  
 public function updateAddressFromEmail($mail,$address){                                                                                                  
  $sql = "UPDATE Investor set address=:address WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":address"=>$address));
 }

 public function getFromEmail($mail){
  $sql = "SELECT * FROM Investor WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Investor");
  $stmt->execute(array(":mail" => $mail));
  return $stmt->fetch();
 }
 public function getList(){
  $sql = "SELECT * FROM Investor";
  $stmt = $this->db->query($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Investor");
  return $stmt->fetchAll();
 }
}
?>