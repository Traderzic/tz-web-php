<?php
include_once "Database.php";
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
		$count = $stmt->rowCount();
		return $count;
	}
 
 	public static function updatePasswordFromMail($mail,$passwrd){                                                                                                  
		$sql = "UPDATE Surfer set passwrd=:passwrd WHERE mail = :mail";
		$db = Database::getInstance();
 		$stmt = $db->prepare($sql);
  	$stmt->execute(array(
  	":mail"=>$mail,
 		":passwrd"=>$passwrd));
		$count = $stmt->rowCount();
		return $count;
 }
	
	public static function updatePseudoFromMail($mail,$pseudo){                                                                                                  
  	$sql = "UPDATE Surfer set pseudo=:pseudo WHERE mail = :mail";
		$db = Database::getInstance();
  	$stmt = $db->prepare($sql);
  	$stmt->execute(array(
  	":mail"=>$mail,
  	":pseudo"=>$pseudo));
		$count = $stmt->rowCount();
		return $count;
 	}

	public static function updateNameFromMail($mail,$name){                                                                                                  
  	$sql = "UPDATE Surfer set name=:name WHERE mail = :mail";
		$db = Database::getInstance();
  	$stmt = $db->prepare($sql);
  	$stmt->execute(array(
  	":mail"=>$mail,
  	":name"=>$name));
		$count = $stmt->rowCount();
		return $count;
 	}
	
	public static function updateFirstnameFromMail($mail,$firstname){                                                                                                  
  	$sql = "UPDATE Surfer set firstname=:firstname WHERE mail = :mail";
		$db = Database::getInstance();
  	$stmt = $db->prepare($sql);
  	$stmt->execute(array(
  	":mail"=>$mail,
  	":firstname"=>$firstname));
		$count = $stmt->rowCount();
		return $count;
 	}

	public static function getSurferFromMail($mail){
  	$sql = "SELECT * FROM Surfer WHERE mail = :mail";
		$db = Database::getInstance();
  	$stmt = $db->prepare($sql);
  	$stmt->setFetchMode(PDO::FETCH_CLASS, "Surfer");
  	$stmt->execute(array(":mail" => $mail));
  	$res=$stmt->fetch();
		$surfer=new Surfer($res['mail'],$res['pseudo'],$res['name'],$res['firstname'],$res['passwrd']);
		return $surfer;
 	}
	
 	public static function getSurferList(){
  	$sql = "SELECT * FROM Surfer";
		$db = Database::getInstance();
  	$stmt = $db->query($sql);
  	$stmt->setFetchMode(PDO::FETCH_CLASS, "Surfer");
  	return $stmt->fetchAll();
 	}
}
?>