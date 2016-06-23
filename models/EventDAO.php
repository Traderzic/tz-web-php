<?php
class EventDAO extends ProjectDAO{
 public static function create($project,$date,$location){ 
		$sql = "INSERT INTO Project(mail,name,startDate,description,endDate,classe,day,date) values(:mail,:name,:startDate,:description,:endDate,:classe,:day,:date)";
		$db=Database::getInstance(); // Recupere la base de données.
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
	  $stmt->execute(array(
      ":mail"=>$project->getMail(),
      ":name" => $project->getName(),
			":startDate"=>$project->getStartDate(),
			":description"=>$project->getDescription(),
     	":endDate"=>$project->getEndDate(),
      ":classe"=>'event',
      ":date"=>$date,
      ":location"=>$location));
	  	return $db->lastInsertId();
	}
	public static function getEventFromName( $name ){
		$sql = "SELECT * FROM Project WHERE name=:name and classe='event'";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		$stmt->execute(array(":name" => $name));
		return $stmt->fetch();
	}
	public static function getEventList(){
		$sql = "SELECT * FROM Project where class='event'";
		$db=Database::getInstance();
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		return $stmt->fetchAll();
	}
	public static function getEventOnGoingList(){
		$sql = "SELECT * FROM Project where status!='aborted' and status!='achievement' and classe='event'";
		$db=Database::getInstance();
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		return $stmt->fetchAll();
	}
  public static function getEventFromDay( $day ){
		$sql = "SELECT * FROM Project WHERE day=:day and classe='event'";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		$stmt->execute(array(":name" => $name));
		return $stmt->fetch();
	}
  public static function getEventFromLocation( $location ){
		$sql = "SELECT * FROM Project WHERE name=:name and classe='event'";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		$stmt->execute(array(":name" => $name));
		return $stmt->fetch();
	}
}
?>
