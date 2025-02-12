<?php
require_once "connection.php";
class ModelLot{
    static public function mdlCategoryList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM category ORDER BY catdescription");
		$stmt -> execute();
		return $stmt -> fetchAll();	
	}

    static public function mdlClassificationList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM classification ORDER BY classname");
		$stmt -> execute();
		return $stmt -> fetchAll();	
	}    
}