<?php
include "ProjectDAO.php";
class abstract ProjectClass /*extends Model*/ {
	
	private $mail,$name,$startDate,$description,$endDate,$rate,$stats,$classe,$support,$type,$day,$location;
	
	private var $differentStats = array('conception','investment','realisation','achievement','aborted');

	function __construct ($mail,$name,$startDate,$description,$endDate,$stats,$classe,$support,$type,$day,$location){
		$this->mail=$mail;
		$this->name=$name;
		$this->startDate=$startDate;
		$this->description=$description;
		$this->endDate=$endDate;
		$this->rate=null;
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
	public function getRate(){
		return $this->rate;
	}
	public function setRate($new){
		$this->rate=$new;
	}
	public function getStats(){
		return $this->stats;
	}
	public function setStats($new){
		if(in_array($new,$this->differentStats)){
			$this->stats=$new;
		}
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
?>