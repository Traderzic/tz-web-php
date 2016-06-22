<?php
include "DAOsurfer.php";
class DAOartist extends DAOsurfer{
  protected $db;

  public function __construct() { 
   $this->db = Database::getInstance();
  }
 
 public function insertArtist($mail,$name,$firstname,$pseudo ){
  $surfer = $this->getFromEmailSurfer($mail);
  if($surfer != FALSE){
    $passwrd = $surfer['passwrd'];
  $sql = "INSERT into Artist values(:mail,:passwrd, :name, :firstname, :pseudo)";
  $stmt = $this->db->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
  return $stmt->execute(array(
   ":mail" => $mail,
   ":passwrd" => $passwrd,
    ":name" => $name,
    ":firstname" => $firstname,
    ":pseudo" => $pseudo));
  }
   return false;
 }
 
 public function deleteArtist($mail){
  $sql = "DELETE from Artist where mail=:mail";
  $stmt = $this->db->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
  return $stmt->execute(array(
   ":mail"=>$mail));
 }
 
 public function updatePasswordFromEmail($mail,$passwrd){                                                                                                  
  $sql = "UPDATE Artist set passwrd=:passwrd WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":passwrd"=>$passwrd));
 }
  
 public function updateNameFromEmail($mail,$name){                                                                                                  
  $sql = "UPDATE Artist set name=:name WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":name"=>$name));
 }
 
 public function updateFirstnameFromEmail($mail,$firstname){                                                                                                  
  $sql = "UPDATE Artist set firstname=:firstname WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":firstname"=>$firstname));
 }
  
 public function updatePseudoFromEmail($mail,$pseudo){                                                                                                  
  $sql = "UPDATE Artist set pseudo=:pseudo WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":pseudo"=>$pseudo));
 }

 public function getFromEmail($mail){
  $sql = "SELECT * FROM Artist WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
  $stmt->execute(array(":mail" => $mail));
  return $stmt->fetch();
 }
 public function getList(){
  $sql = "SELECT * FROM Artist";
  $stmt = $this->db->query($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
  return $stmt->fetchAll();
 }
}
?>