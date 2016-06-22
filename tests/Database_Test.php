<?php
class Database_Test extends PHPUnit_Extensions_Database_TestCase
{
    public function getConnection()
    {
        $pdo = new PDO("mysql:host=dwarves.iut-fbleau.fr;dbname=nguyen;charset=utf8",
      "nguyen",
      "nguyenphpmyadmin");
        return $this->createDefaultDBConnection($pdo, ':memory:');
    }
?>