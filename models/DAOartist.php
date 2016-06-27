<?php
include_once "DAOsurfer.php";
include_once "Database.php";
include "Artist.php";
class DAOartist extends DAOsurfer{

  public static function insertArtist($artist){
    $surfer = DAOsurfer::getSurferFromMail($artist->getMail());
    if($surfer != ""){
      $sql = "INSERT into Artist values(:mail,:description)";
      $db = Database::getInstance();
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
      $stmt->execute(array(
      ":mail" => $artist->getMail(),
      ":description" => $artist->getDescription()));
      return $artist->getMail();
    }
    return false;
 }
  
  public static function deleteArtist($mail){
    $sql = "DELETE from Artist where mail=:mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
    $stmt->execute(array(":mail"=>$mail));
    if (DAOartist::getArtistFromMail($mail)==null){
			return true;
		}
		else{
			return false;
		}
  }
 
  public static function updateDescriptionFromMail($mail,$description){                                                                                                  
    $sql = "UPDATE Artist set description=:description WHERE mail = :mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
    ":mail"=>$mail,
    ":description"=>$description));
    if (DAOartist::getArtistFromMail($mail)==null){
			return false;
		}
		else{
			return true;
		}
  }

  public static function getArtistFromMail($mail){
    $sql = "SELECT * FROM Artist WHERE mail = :mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute(array(":mail" => $mail));
    $res=$stmt->fetch();
	  $artist=new Artist($res);
		if ($artist->getMail()==null){
			return null;
		}
		else
		{
			return $artist;
		}
  }
  
  public static function getArtistList(){
    $sql = "SELECT * FROM Artist";
    $db = Database::getInstance();
    $stmt = $db->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
  }
}
?>