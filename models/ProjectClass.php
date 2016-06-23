<?php
include "ProjectDAO.php";
<<<<<<< HEAD
 class ProjectClass /*extends Model*/ {
	
	protected $name,$startDate,$description,$endDate,$rate,$Status,$classe;

	function __construct ($name,$startDate,$description,$endDate,$rate,$stats,$classe){
=======
class abstract ProjectClass /*extends Model*/ {
	
	private $mail,$name,$startDate,$description,$endDate,$stats,$classe,$support,$type,$day,$location;

	function __construct ($mail,$name,$startDate,$description,$endDate,$stats,$classe,$support,$type,$day,$location){
		$this->mail=$mail;
>>>>>>> 3df5893aa061f86303ad1e2910e56f886152aa5a
		$this->name=$name;
		$this->startDate=$startDate;
		$this->description=$description;
		$this->endDate=$endDate;
<<<<<<< HEAD
		$this->rate=$rate;
		$this->stats=$stats;
		$this->classe=$classe;
	}
	public function __toString(){
		print "<table>";
		print "<tr><td>Name</td><td>".$this->name."</td></tr>";
		print "<tr><td>starDate</td><td>".$this->startDate."</td></tr>";
		print "<tr><td>description</td><td>".$this->description."</td></tr>";
		print "<tr><td>endDate</td><td>".$this->endDate."</td></tr>";
		print "<tr><td>rate</td><td>".$this->rate."</td></tr>";
		print "<tr><td>status</td><td>".$this->stats."</td></tr>";
		print "<tr><td>classe</td><td>".$this->classe."</td></tr>";
		return "</table>";;
  }
=======
		$this->stats=$stats;
		$this->classe=$classe;
		$this->support=$support;
		$this->type=$type;
		$this->day=$day;
		$this->location=$location;
	}
	public function getMail(){
		return $this->mail;
	}
	public function setMail($new){
		$this->mail=$new;
	}
>>>>>>> 3df5893aa061f86303ad1e2910e56f886152aa5a
	public function getName(){
		return $this->name;
	}
	public function setName($new){
		$this->name=$new;
	}
	public function getStartDate(){
		return $this->startDate;
	}
	public function setStartDate($new){
		$this->startDate=$new;
	}
	public function getDescription(){
		return $this->description;
	}
		public function setDescription($new){
		$this->description=$new;
	}
	public function getEndDate(){
		return $this->rate;
	}
	public function setEndDate($new){
		$this->endDate=$new;
	}
<<<<<<< HEAD
	public function getRate(){
		return $this->rate;
	}
	public function setRate($new){
		$this->rate=$new;
	}
	public function getStats(){
		return $this->stats;
=======
	public function getStatus(){
		return $this->status;
>>>>>>> 3df5893aa061f86303ad1e2910e56f886152aa5a
	}
	public function setStats($new){
		$this->stats=$new;
	}
	 public function getClasse(){
		return $this->classe;
	}
	public function setClasse($new){
		$this->classe=$new;
	}
	public function getSupport(){
		return $this->support;
	}
	public function setSupport($new){
		$this->support=$new;
	}
	public function getType(){
		return $this->type;
	}
	public function setType($new){
		$this->type=$new;
	}
	public function getDay(){
		return $this->day;
	}
	public function setDay($new){
		$this->day=$new;
	}
	public function getLocation(){
		return $this->location;
	}
	public function setLocation($new){
		$this->location=$new;
	}
}

$projet=new ProjectClass("Lui","1990-01-01","il","1990-01-01",5,true,"media");
/*
echo $projet->getName();
echo $projet->getRate();
echo ProjectDAO::Create($projet);
$list=ProjectDAO::getList();
foreach($list as $test):
	echo "<br>".$test['name'];
endforeach;
ProjectDAO::changeStatus(30,true); */ 
echo $projet; 
?>