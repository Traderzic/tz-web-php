<?php
class EventDAO extends ProjectDAO{
  protected $db;
  
  public function __construct(){
    $this->db = Database::getInstance();
  }
  public function insertEvent($location,$dateTime){
    $sql = "Insert into Event (location, dateTime) values(:location, :dateTime)";
    $stmt = $this->db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Event");
    return $stmt->execute(array(
    ":location" => $location,
    ":dateTime" => $dateTime));
  }
  public function deleteEvent($location,$dateTime){
    $sql="Delete from Event where location=:location and dateTime=:dateTime";
     $stmt = $this->db->prepare($sql);
    $stmt->setFetchMode(PDO::FETCH_CLASS, "Event");
    return $stmt->execute(array(
    ":location" => $location,
    ":dateTime" => $dateTime));
  }
  public function updateLocationFromName($name, $location){
    $sql = "UPDATE Event set location=:location WHERE name=:name";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute(array(
     ":name"=>$name,
     ":location"=>$location));
   }
   public function updateDateTimeFromName($name, $dateTime){
    $sql = "UPDATE Event set dateTime=:dateTime WHERE name=:name";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute(array(
     ":name"=>$name,
     ":dateTime"=>$dateTim));
   }
  }
}
?>
