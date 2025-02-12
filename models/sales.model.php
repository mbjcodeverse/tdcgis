<?php
require_once "connection.php";
class ModelSales{
    static public function mdlRelationList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM relation ORDER BY relationdesc");
		$stmt -> execute();
		return $stmt -> fetchAll();	
	}

    static public function mdlSalesTransactionList($categorycode, $start_date, $end_date, $classcode, $salestatus){
		if ($categorycode != ''){
			$category_code = " AND (a.categorycode = '$categorycode')";
		}else{
			$category_code = "";
		}

		if ($classcode != ''){
			$class_code = " AND (c.classcode = '$classcode')";
		}else{
			$class_code = "";
		}	

		if ($salestatus != ''){
            $status = " AND (e.salestatus = '$salestatus')";
		}else{
			$status = "";
		}

		if(!empty($end_date)){
			$dates = " AND (e.purdate BETWEEN '$start_date' AND '$end_date')";
		}else{
			$dates = "";
		}					

		$whereClause = "WHERE (e.saleid != '')" . $category_code . $class_code . $status;

		$stmt = (new Connection)->connect()->prepare("SELECT e.purdate,d.lname,d.fname,d.mi,CONCAT(d.fname,' ',d.mi,'. ',d.lname) AS full_name,e.lotid,a.catdescription,c.catnumber,e.beneficiary,e.saleid,c.latitude,c.longitude FROM sales AS e INNER JOIN client AS d ON (e.clientid = d.clientid) INNER JOIN lotinfo AS c ON (e.lotid = c.lotid) INNER JOIN category AS a ON (c.categorycode = a.categorycode) $whereClause ORDER BY full_name");

		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}	    
}