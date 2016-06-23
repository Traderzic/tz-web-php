<?php
include "Database.php";
class projectTaskDAO {
	public $db;
	
	public static function createPT($projectTask){ 
		$db = Database::getInstance();
		$createPT = "INSERT INTO ProjectTask (idProject, attendee,description,title,price,duration,status,percent) VALUES (:idProject, :attendee, :description, :title, :price, :duration, :status, :percent)";
		$stmt = $db->prepare($createPT);
		$stmt->setFetchMode(PDO::FETCH_CLASS,"ProjectTask");
		$stmt->execute(array (":idProject" => $projectTask->getIdProject(),
													":attendee" => $projectTask->getAttendee(),
													":description" => $projectTask->getDescription(),
													":title" => $projectTask->getTitle(),
													":price" => $projectTask->getPrice(),
													":duration" => $projectTask->getDuration(),
													":status" => $projectTask->getStatus(),
													":percent" => $projectTask->getPercent()));
		return $db->lastInsertId();
	}
	
	// Trouver 
	
	public static function getFromProject($idProject,$idTask){
		$db = Database::getInstance();
		$sql = "SELECT * FROM ProjectTask WHERE idProject=:idProject";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
		$stmt->execute(array(":idProject" => $idProject));
		return $stmt->fetchAll();
	}

	public static function getFromTitle($title){
		$db = Database::getInstance();
		$sql = "SELECT * FROM ProjectTask WHERE title=:title";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
		$stmt->execute(array(":title" => $title));
		return $stmt->fetchAll();
	}
	
	public static function getFromAttendee($attendee){
		$db = Database::getInstance();
		$sql = "SELECT * FROM ProjectTask WHERE attendee=:attendee";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
		$stmt->execute(array(":attendee" => $attendee));
		return $stmt->fetchAll();
	}
	
	// Modifier
	
	public static function updateDescription($idTask,$projectTask, $description){
		$db = Database::getInstance();
		$sql = "UPDATE ProjectTask SET description=:description WHERE idProject=:id and idTask=:idTask";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
	  $stmt->execute(array(":description" =>$description,
													":id" => $projectTask->getIdProject(),
													":idTask"=>$idTask));
		}
	
	public static function updateTitle($idTask,$projectTask, $title){
		$db = Database::getInstance();
		$sql = "UPDATE ProjectTask SET title=:title WHERE idProject=:id and idTask=:idTask";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
		$stmt->execute(array(":title" =>$title,
													":id" => $projectTask->getIdProject(),
									 			  ":idTask"=>$idTask));
	}
	
	public static function updatePrice($idTask,$projectTask, $price){
		$db = Database::getInstance();
		$sql = "UPDATE ProjectTask SET price=:price WHERE idProject=:id and idTask=:idTask";
		$stmt = $db->prepare($sql);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
	  $stmt->execute(array(":price" =>$price,
													":id" => $projectTask->getIdProject(),
							            ":idTask"=>$idTask));		
		}
	
	public static function updateDuration($idTask,$projectTask, $duration){
			$db = Database::getInstance();
			$sql = "UPDATE ProjectTask SET duration=:duration WHERE idProject=:id and idTask=:idTask";
			$stmt = $db->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
			$stmt->execute(array(":price" =>$price,
														":id" => $projectTask->getIdProject(),
									          ":idTask"=>$idTask));
		}
	
		public static function updateStatus($idTask,$projectTask, $status){
			$db = Database::getInstance();
			$sql = "UPDATE ProjectTask SET status=:status WHERE idProject=:id and idTask=:idTask";
			$stmt = $db->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
			$stmt->execute(array(":status" =>$status,
														":id" => $projectTask->getIdProject(),
													  ":idTask"=>$idTask));
		}
	
		public static function updatePercent($idTask,$projectTask, $percent){
			$db = Database::getInstance();
			$sql = "UPDATE ProjectTask SET percent=:percent WHERE idProject=:id and idTask=:idTask";
			$stmt = $db->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
			$stmt->execute(array(":percent" =>$percent,
														":id" => $projectTask->getIdProject(),
										         ":idTask"=>$idTask));
		}
	
		// Supprimer 
	
		public static function deleteFromProject($idTask,$projectTask){
			$db = Database::getInstance();
			$sql = "DELETE FROM ProjectTask WHERE idProject=:id and idTask=:idTask";
			$stmt = $db->prepare($sql);
			$stmt->setFetchMode(PDO::FETCH_CLASS, "ProjectTask");
			$stmt->execute(array(":id" => $projectTask->getIdProject(),
													 ":idTask"=>$idTask));
		}
	
	
}
