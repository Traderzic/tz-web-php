<?php

class MediaProjectDAO extends ProjectDAO{
  
  public static function create($projet,$support,$type){
    $sql = "INSERT INTO Project(name,status,startDate,description,endDate,classe,support,type,mail) values(:name,:status,:startDate,:description,:endDate,'mediaProject',:support,:type,:mail)";
		$db=Database::getInstance(); // Recupere la base de données.
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
	  $stmt->execute(array(
			":name" => $project->getName(),						 
			":startDate"=>$project->getStartDate(),
			":description"=>$project->getDescription(),
     	":endDate"=>$project->getEndDate(),
			":classe"=>$project->$classe,									 
      ":support"=>$support,
			":mail"=>$mail,
			":status"=>'conception',
      ":type"=>$type));
	  	return $db->lastInsertId();
  }
  
	public static function getMediaFromName( $name ){
		$sql = "SELECT * FROM Project WHERE name=:name and classe = 'mediaProject'";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		$stmt->execute(array(":name" => $name));
		return $stmt->fetch();
	}
  public static function getMediaFromType( $type ){
		$sql = "SELECT * FROM Project WHERE type=:type and classe = 'mediaProject'";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		$stmt->execute(array(":type" => $type));
		return $stmt->fetch();
	}
  public static function getMediaFromSupport( $support ){
		$sql = "SELECT * FROM Project WHERE support=:support and classe = 'mediaProject'";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		$stmt->execute(array(":support" => $support));
		return $stmt->fetch();
	}
	public static function getMediaList(){
		$sql = "SELECT * FROM Project";
		$db=Database::getInstance();
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		return $stmt->fetchAll();
	}
	public static function getMediaProjectOnGoingList(){
		$sql = "SELECT * FROM Project where status=false and classe = 'mediaProject'";
		$db=Database::getInstance();
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
		return $stmt->fetchAll();
	}
}
  
}

?>