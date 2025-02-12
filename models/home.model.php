<?php
require_once 'connection.php';
class ModelHome{
	static public function mdlLotAllList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM lotinfo ORDER BY id");
		$stmt -> execute();
		return $stmt -> fetchAll();
	}

	static public function mdlLotCategoryList($categorycode){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM lotinfo WHERE categorycode = '$categorycode' ORDER BY id");
		$stmt -> execute();
		return $stmt -> fetchAll();
	}

	// static public function mdlShowFilteredMachineList($classcode, $buildingcode, $machstatus){
	// 	if ($classcode != ''){
	// 		$class = " AND (classcode = '$classcode')";
	// 	}else{
	// 		$class = "";
	// 	}

	// 	if ($buildingcode != ''){
	// 		$building = " AND (buildingcode = '$buildingcode')";
	// 	}else{
	// 		$building = "";
	// 	}

	// 	if ($machstatus != ''){
	// 		$status = " AND (machstatus = '$machstatus')";
	// 	}else{
	// 		$status = "";
	// 	}								

	// 	$whereClause = "WHERE (classcode != '')" . $class . $building . $status;

	// 	$stmt = (new Connection)->connect()->prepare("SELECT * FROM machine $whereClause ORDER BY machinedesc");

	// 	$stmt -> execute();
	// 	return $stmt -> fetchAll();
	// 	$stmt -> close();
	// 	$stmt = null;
	// }

	// static public function mdlUpdateDashboardCounter(){
	// 	$stmt = (new Connection)->connect()->prepare("
	// 		SELECT 'Purchases' AS transaction, COUNT(ponumber) AS counter FROM purchaseorder WHERE (postatus = 'Pending') OR (postatus = 'Partial')
 //            UNION ALL
 //            SELECT 'Payables' AS transaction, COUNT(checkdesc) AS counter FROM payable WHERE (checkdesc = 'Post-dated')
 //            UNION ALL
	// 		SELECT 'Void Request' AS transaction, COUNT(invno) FROM sales WHERE (status = '[ Void - Pending ]')
 //            ");

	// 	$stmt -> execute();
	// 	return $stmt -> fetchAll();
	// 	$stmt -> close();
	// 	$stmt = null;	
	// }

	// static public function mdlUpdateDashboardNarrative(){
	// 	$stmt = (new Connection)->connect()->prepare("
	// 		SELECT a.bname,'Counter' as transaction, SUM(ifnull(b.netamount,0.00)) as amount FROM branch as a LEFT JOIN sales as b ON (a.classcode = b.classcode) WHERE (b.status = 'Sold') AND (b.sdate = CURDATE()) AND (b.salemode = 'Cash') GROUP BY a.bname
	// 		UNION ALL
	// 		SELECT a.bname,'Credit' as transaction, SUM(ifnull(b.netamount,0.00)) as amount FROM branch as a LEFT JOIN sales as b ON (a.classcode = b.classcode) WHERE (b.status = 'Sold') AND (b.sdate = CURDATE()) AND (b.salemode = 'Credit') GROUP BY a.bname
	// 		UNION ALL
	// 		SELECT a.bname,'Collection' as transaction, SUM(ifnull(c.amount,0.00)) as amount FROM branch as a LEFT JOIN receivable as c ON (a.classcode = c.classcode) WHERE (c.paystatus = 'Paid') AND (paydate = CURDATE()) GROUP BY a.bname ORDER BY bname, transaction
 //            ");

	// 	$stmt -> execute();
	// 	return $stmt -> fetchAll();
	// 	$stmt -> close();
	// 	$stmt = null;	
	// }		
}