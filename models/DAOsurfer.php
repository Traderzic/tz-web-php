<?php
include "Database.php";
class DAOsurfer {
  protected $db;

  public function __construct() { 
  	$this->db = Database::getInstance();
  }
 
 public function insertSurfer( $mail,$passwrd ){
  $sql = "INSERT into Surfer values(:mail,:passwrd)";
  $stmt = $this->db->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Surfer");
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":passwrd"=>$passwrd));
 }
	
	public function deleteSurfer( $mail ){
		$sql = "DELETE from Surfer where mail=:mail";
		$stmt = $this->db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Surfer");
		return $stmt->execute(array(
		 ":mail"=>$mail));
	}
 
 public function updateFromEmailSurfer( $mail,$passwrd ){                                                                                                  
  $sql = "UPDATE Surfer set passwrd=:passwrd WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  return $stmt->execute(array(
   ":mail"=>$mail,
   ":passwrd"=>$passwrd));
 }

 public function getFromEmailSurfer( $mail ){
  $sql = "SELECT * FROM Surfer WHERE mail = :mail";
  $stmt = $this->db->prepare($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Surfer");
  $stmt->execute(array(":mail" => $mail));
  return $stmt->fetch();
 }
 public function getListSurfer(){
  $sql = "SELECT * FROM Surfer";
  $stmt = $this->db->query($sql);
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Surfer");
  return $stmt->fetchAll();
 }
}
?>