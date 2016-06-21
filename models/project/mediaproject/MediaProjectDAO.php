<?php

class MediaProjectDAO extends ProjectDAO{
  
  public static function create($projet,$support,$type){
    $sql = "INSERT INTO MediaProject(name,startDate,description,endDate,rate,status,support,type) values(:name,:startDate,:description,:endDate,:rate,:status,:support,:type)";
		$db=Database::getInstance(); // Recupere la base de données.
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Project");
	  $stmt->execute(array(":name" => $project->getName(),
			":startDate"=>$project->getStartDate(),
			":description"=>$project->getDescription(),
     	":endDate"=>$project->getEndDate(),
			":rate"=>$project->getRate(),
			":status"=>$project->getStatus(),
      ":support"=>$support,
      ":type"=>$type));
	  	return $db->lastInsertId();
  }
  
  public static function getMediaFromId( $id ){
		$sql = "SELECT * FROM MediaProject WHERE id=:id";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "MediaProject");
		$stmt->execute(array(":id" => $id));
		return $stmt->fetch();
	}
	public static function getMediaFromName( $name ){
		$sql = "SELECT * FROM MediaProject WHERE name=:name";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "MediaProject");
		$stmt->execute(array(":name" => $name));
		return $stmt->fetch();
	}
  public static function getMediaFromType( $type ){
		$sql = "SELECT * FROM MediaProject WHERE type=:type";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "MediaProject");
		$stmt->execute(array(":type" => $type));
		return $stmt->fetch();
	}
  public static function getMediaFromSupport( $support ){
		$sql = "SELECT * FROM MediaProject WHERE support=:support";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "MediaProject");
		$stmt->execute(array(":support" => $support));
		return $stmt->fetch();
	}
	public static function getMediaList(){
		$sql = "SELECT * FROM MediaProject";
		$db=Database::getInstance();
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "MediaProject");
		return $stmt->fetchAll();
	}
	public static function getMediaPalmaresList(){
		$sql = "SELECT * FROM MediaProject ORDER BY rate DESC LIMIT 5";
		$db=Database::getInstance();
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "MediaProject");
		return $stmt->fetchAll();
	}
	public static function getMediaProjectOnGoingList(){
		$sql = "SELECT * FROM MediaProject where status=false";
		$db=Database::getInstance();
		$stmt = $db->query($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "MediaProject");
		return $stmt->fetchAll();
	}
	public static function changeMediaStatus($id,$newStatus){                                                                                         
		$sql = "UPDATE MediaProject SET status=:status WHERE id=:id";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "MediaProject");
	  $stmt->execute(array(":status" =>$newStatus,
							":id" =>$id));
	}
	public static function deleteMediaFromId($id){
		$sql = "DELETE FROM MediaProject WHERE id=:id";
		$db=Database::getInstance();
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "MediaProject");
		$stmt->execute(array(":id" => $id));
	}
}
  
}

?>