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

    static public function mdlAvailableLotList(){
		$stmt = (new Connection)->connect()->prepare("SELECT b.lotid,a.catdescription,b.latitude,b.longitude FROM category AS a INNER JOIN lotinfo AS b ON (a.categorycode = b.categorycode) WHERE (b.lotstatus = 'Available') ORDER BY b.lotid;");
		$stmt -> execute();
		return $stmt -> fetchAll();	
	}  	
}