<?php
require_once "connection.php";
class ModelReturn{
	static public function mdlAddReturn($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $return_id = $pdo->prepare("SELECT CONCAT('R', LPAD((count(id)+1),5,'0')) as gen_id FROM returned");

            $return_id->execute();
		    $returnid = $return_id -> fetchAll(PDO::FETCH_ASSOC);

			// $stmt = $pdo->prepare("INSERT INTO returned(returnby, retstatus, retdate, retnumber, postedby, remarks, productlist) VALUES (:returnby, :retstatus, :retdate, :retnumber, :postedby, :remarks, :productlist)");
			$stmt = $pdo->prepare("INSERT INTO returned(returnby, retstatus, retdate, retnumber, remarks, postedby, productlist) VALUES (:returnby, :retstatus, :retdate, :retnumber, :remarks, :postedby, :productlist)");
			$stmt->bindParam(":returnby", $data["returnby"], PDO::PARAM_STR);
			$stmt->bindParam(":retstatus", $data["retstatus"], PDO::PARAM_STR);
			$stmt->bindParam(":retdate", $data["retdate"], PDO::PARAM_STR);
			$stmt->bindParam(":retnumber", $returnid[0]['gen_id'], PDO::PARAM_STR);
			$stmt->bindParam(":postedby", $data["postedby"], PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
            $stmt->bindParam(":productlist", $data["productlist"], PDO::PARAM_STR);	
			$stmt->execute();

			$itemsList = json_decode($data["productlist"]);
			foreach($itemsList as $product){
				$items = $pdo->prepare("INSERT INTO returnitems(retnumber, qty, itemid) VALUES (:retnumber, :qty, :itemid)");

				$items->bindParam(":retnumber", $returnid[0]['gen_id'], PDO::PARAM_STR);
				$items->bindParam(":qty", $product->qty, PDO::PARAM_STR);
				$items->bindParam(":itemid", $product->itemid, PDO::PARAM_STR);
				$items->execute();
			}

		    $pdo->commit();
		    return "ok";
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}	
		$pdo = null;	
		$stmt = null;
	}

	static public function mdlShowReturnTransactionList($start_date, $end_date, $empid, $retstatus){
		if ($empid != ''){
			$return_by = " AND (a.returnby = '$empid')";
		}else{
			$return_by = "";
		}	

		if ($retstatus != ''){
			$status = " AND (a.retstatus = '$retstatus')";
		}else{
			$status = "";
		}

		if(!empty($end_date)){
			$dates = " AND (a.retdate BETWEEN '$start_date' AND '$end_date')";
		}else{
			$dates = "";
		}					

		$whereClause = "WHERE (a.retnumber != '')" . $return_by . $status . $dates;

		$stmt = (new Connection)->connect()->prepare("SELECT a.retdate,CONCAT(b.lname,', ',b.fname) AS return_by,a.retnumber,a.retstatus FROM returned AS a INNER JOIN employees AS b ON (a.returnby = b.empid) $whereClause");

		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}	
	
	static public function mdlShowReturn($retnumber){
		$stmt = (new Connection)->connect()->prepare("SELECT CONCAT(b.lname,', ',b.fname) as return_by,c.returnby,c.retdate,c.retstatus,c.retnumber,c.remarks,c.postedby,c.productlist FROM returned AS c INNER JOIN employees AS b ON (c.returnby = b.empid) WHERE (c.retnumber = '$retnumber')");

		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}

	// GET Purchase Order Items
	static public function mdlShowReturnItems($retnumber){
		$stmt = (new Connection)->connect()->prepare("SELECT a.qty,a.itemid,b.pdesc,b.meas1 FROM returnitems AS a INNER JOIN items AS b ON (a.itemid = b.itemid) WHERE (a.retnumber = '$retnumber')");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}