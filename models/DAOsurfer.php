<?php
include_once "Database.php";
include "Surfer.php";
class DAOsurfer{

	public static function insertSurfer($surfer){
  	$sql = "INSERT into Surfer values(:mail,:pseudo,:name,:firstname,:passwrd)";
		$db = Database::getInstance();
  	$stmt = $db->prepare($sql);
  	$stmt->setFetchMode(PDO::FETCH_CLASS, "Surfer");
  	$stmt->execute(array(
  	":mail"=>$surfer->getMail(),
		":pseudo"=>$surfer->getPseudo(),
		":name"=>$surfer->getName(),
		":firstname"=>$surfer->getFirstname(),
		":passwrd"=>$surfer->getPassword()));
		return $surfer->getMail();
 }
	
	public static function deleteSurfer($mail){
		$sql = "DELETE from Surfer where mail=:mail";
		$db = Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Surfer");
		$stmt->execute(array(":mail"=>$mail));
		if (DAOsurfer::getSurferFromMail($mail)==null){
			return false;
		}
		else{
			return true;
		}
	}
 
 	public static function updatePasswordFromMail($mail,$passwrd){                                                                                                  
		$sql = "UPDATE Surfer set passwrd=:passwrd WHERE mail = :mail";
		$db = Database::getInstance();
 		$stmt = $db->prepare($sql);
  	$stmt->execute(array(
  	":mail"=>$mail,
 		":passwrd"=>$passwrd));
		if (DAOsurfer::getSurferFromMail($mail)==null){
			return false;
		}
		else{
			return true;
		}
 }
	
	public static function updatePseudoFromMail($mail,$pseudo){                                                                                                  
  	$sql = "UPDATE Surfer set pseudo=:pseudo WHERE mail = :mail";
		$db = Database::getInstance();
  	$stmt = $db->prepare($sql);
  	$stmt->execute(array(
  	":mail"=>$mail,
  	":pseudo"=>$pseudo));
		if (DAOsurfer::getSurferFromMail($mail)==null){
			return false;
		}
		else{
			return true;
		}
 	}

	public static function updateNameFromMail($mail,$name){                                                                                                  
  	$sql = "UPDATE Surfer set name=:name WHERE mail = :mail";
		$db = Database::getInstance();
  	$stmt = $db->prepare($sql);
  	$stmt->execute(array(
  	":mail"=>$mail,
  	":name"=>$name));
		if (DAOsurfer::getSurferFromMail($mail)==null){
			return false;
		}
		else{
			return true;
		}
 	}
	
	public static function updateFirstnameFromMail($mail,$firstname){                                                                                                  
  	$sql = "UPDATE Surfer set firstname=:firstname WHERE mail = :mail";
		$db = Database::getInstance();
  	$stmt = $db->prepare($sql);
  	$stmt->execute(array(
  	":mail"=>$mail,
  	":firstname"=>$firstname));
		if (DAOsurfer::getSurferFromMail($mail)==null){
			return true;
		}
		else{
			return false;
		}
 	}

	public static function getSurferFromMail($mail){
  	$sql = "SELECT * FROM Surfer WHERE mail = :mail";
		$db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(":mail" => $mail));
    $res=$stmt->fetch();	
		$surfer=new Surfer($res);
		if ($surfer->getMail()==null){
			return null;
		}
		else
		{
			return $surfer;
		}
 	}
	
 	public static function getSurferList(){
  	$sql = "SELECT * FROM Surfer";
		$db = Database::getInstance();
  	$stmt = $db->query($sql);
  	$stmt->setFetchMode(PDO::FETCH_ASSOC);
  	return $stmt->fetchAll();
 	}
}
?>