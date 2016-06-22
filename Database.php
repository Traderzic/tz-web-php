<?php
class Database {

  static protected $_instance = null;
	protected $_db;

	public static function getInstance() {
		if( is_null(self::$_instance) )
		  self::$_instance = new Database();
		  return self::$_instance;
	}
  
	public function query($sql) {
		return $this->_db->query($sql);
	}
	
  public function prepare($sql) {
		return $this->_db->prepare($sql);
  }
  
  public function lastInsertId(){
    return $this->_db->lastInsertId();
  }
  
  protected function __construct() {
		$this->_db = new PDO(
		  "mysql:host=dwarves.iut-fbleau.fr;dbname=nguyen;charset=utf8",
		  "nguyen",
			"nguyenphpmyadmin"
		);
	}
}
?>