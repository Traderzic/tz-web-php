<?php 
include 'Database.php';

class PartDAO {

	public static function getListPart() {
		$db = Database::getInstance();
    $sql = "SELECT * FROM Part";
		$stmt = $db->query($sql);
		//$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$listPart = array();
		while (($row = $stmt->fetch()) !== false) {
			$part = new PartClass($row['idPart'],$row['mail'],$row['idProject'],$row['price'],$row['date']);
			$listPart[] = $part;
      print_r($part);
      print_r('<br>');
		}
		return $listPart;
		
		//return un tableau de part
		
  }
	
	public static function getPartFromId( $id ) {
		$db = Database::getInstance();
    $sql = "SELECT * FROM Part WHERE idPart= :id";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_OBJ, "Part");
		$stmt->execute(array(':id'=>$id));
		$res = $stmt->fetch();
		//print_r($res);
		$part = new PartClass($res['idPart'],$res['mail'],$res['idProject'],$res['price'],$res['date']);
		return $part;
	}
  
	public static function getPartFromMailInvestor($mail) {
		$db = Database::getInstance();
    $sql = "SELECT * FROM Part WHERE mail= :mail";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(':mail'=>$mail));
		$listPart = array();
		while (($row = $stmt->fetch()) !== false) {
			$part = new PartClass($row['idPart'],$row['mail'],$row['idProject'],$row['price'],$row['date']);
			$listPart[] = $part;
      print_r($part);
      print_r('<br>');
		}
		return $listPart;
	}
	
	public static function createPart($part) {
		$db = Database::getInstance();
		$sql = "INSERT INTO Part (idPart,mail,idProject,price,date) VALUES (:idPart,:mail,:idProject,:price,:date)";
		$stmt = $db->prepare($sql);
		//$stmt->setFetchMode(PDO::FETCH_OBJ, "Part");
		$stmt->execute(array(
			':idPart'=>$part->getIdPart(),
			':mail'=>$part->getMailInvestor(),
			':idProject'=>$part->getIdProject(),
			':price'=>$part->getPrice(),
			':date'=>$part->getDate()
		));
		//doit renvoyer l'id de l'object part
		return $part->getIdPart();
		
	}
	
	public static function updatePart($part) {
		$db = Database::getInstance();
		$sql = "UPDATE Part SET price=:price, mail=:mail, date=:date WHERE idPart =:idPart";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(
			':mail'=>$part->getMailInvestor(),
			':idPart'=>$part->getIdPart(),
			':price'=>$part->getPrice(),
			':date'=>$part->getDate()
		));
		return $part;
		
	}
	
	public static function deletePart($part) {
		$db = Database::getInstance();
		$sql = "DELETE FROM WHERE idPart =:idPart";
		$stmt = $db->prepare($sql);
		$stmt->execute(array(':idPart'=>$part->getIdPart()));
		$count = $stmt->rowCount();
		return $count;
	}
	
}
