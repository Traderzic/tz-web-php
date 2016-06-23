<?php
include_once "DAOsurfer.php";
include_once "Database.php";
class DAOartist{

  public static function insertArtist($artist){
    $surfer = DAOsurfer::getSurferFromMail($artist->getMail());
    if($surfer != ""){
      $sql = "INSERT into Artist values(:mail,:description)";
      $db = Database::getInstance();
      $stmt = $db->prepare($sql);
      $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
      $stmt->execute(array(
      ":mail" => $mail,
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
    $count = $stmt->rowCount();
		return $count;
  }
 
  public static function updateDescriptionFromMail($mail,$description){                                                                                                  
    $sql = "UPDATE Artist set description=:description WHERE mail = :mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->execute(array(
    ":mail"=>$mail,
    ":description"=>$description));
    $count = $stmt->rowCount();
		return $count;
  }

  public static function getArtistFromMail($mail){
    $sql = "SELECT * FROM Artist WHERE mail = :mail";
    $db = Database::getInstance();
    $stmt = $db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
    $stmt->execute(array(":mail" => $mail));
    $res=$stmt->fetch();
	  $artist=new Artist($res['mail'],$res['description']);
	  return $artist;
  }
  
  public static function getArtistList(){
    $sql = "SELECT * FROM Artist";
    $db = Database::getInstance();
    $stmt = $db->query($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Artist");
    return $stmt->fetchAll();
  }
}
?>