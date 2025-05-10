<?php
require_once "connection.php";
class ModelStockout{
	static public function mdlAddStockout($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $stockout_id = $pdo->prepare("SELECT CONCAT('W', LPAD((count(id)+1),5,'0')) as gen_id FROM stockout");

            $stockout_id->execute();
		    $stockoutid = $stockout_id -> fetchAll(PDO::FETCH_ASSOC);

			$stmt = $pdo->prepare("INSERT INTO stockout(machineid, requestby, reqstatus, reqdate, reqnumber, postedby, remarks, productlist) VALUES (:machineid, :requestby, :reqstatus, :reqdate, :reqnumber, :postedby, :remarks, :productlist)");

			$stmt->bindParam(":machineid", $data["machineid"], PDO::PARAM_STR);
			$stmt->bindParam(":requestby", $data["requestby"], PDO::PARAM_STR);
			$stmt->bindParam(":reqstatus", $data["reqstatus"], PDO::PARAM_STR);
			$stmt->bindParam(":reqdate", $data["reqdate"], PDO::PARAM_STR);
			$stmt->bindParam(":reqnumber", $stockoutid[0]['gen_id'], PDO::PARAM_STR);
			$stmt->bindParam(":postedby", $data["postedby"], PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
            $stmt->bindParam(":productlist", $data["productlist"], PDO::PARAM_STR);	
			$stmt->execute();

			$itemsList = json_decode($data["productlist"]);
			foreach($itemsList as $product){
				$items = $pdo->prepare("INSERT INTO stockoutitems(reqnumber, qty, itemid) VALUES (:reqnumber, :qty, :itemid)");

				$items->bindParam(":reqnumber", $stockoutid[0]['gen_id'], PDO::PARAM_STR);
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

	static public function mdlShowReleasingTransactionList($machineid, $start_date, $end_date, $empid, $reqstatus){
		if ($machineid != ''){
			$machine = " AND (a.machineid = '$machineid')";
		}else{
			$machine = "";
		}

		if ($empid != ''){
			$requestor = " AND (a.requestby = '$empid')";
		}else{
			$requestor = "";
		}	

		if ($reqstatus != ''){
			$status = " AND (a.reqstatus = '$reqstatus')";
		}else{
			$status = "";
		}

		if(!empty($end_date)){
			$dates = " AND (a.reqdate BETWEEN '$start_date' AND '$end_date')";
		}else{
			$dates = "";
		}					

		$whereClause = "WHERE (a.reqnumber != '')" . $machine . $requestor . $status . $dates;

		$stmt = (new Connection)->connect()->prepare("SELECT a.reqdate,CONCAT(b.lname,', ',b.fname) AS request_by,a.reqnumber,c.machinedesc,a.reqstatus FROM stockout AS a INNER JOIN employees AS b ON (a.requestby = b.empid) INNER JOIN machine AS c ON (a.machineid = c.machineid) $whereClause");

		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}	
	
	static public function mdlShowReleasing($reqnumber){
		$stmt = (new Connection)->connect()->prepare("SELECT a.machinedesc,a.machineid,CONCAT(b.lname,', ',b.fname) as request_by,c.requestby,c.reqdate,c.reqnumber,c.reqstatus,c.remarks,c.postedby,c.productlist FROM machine AS a INNER JOIN stockout AS c ON (a.machineid = c.machineid) INNER JOIN employees AS b ON (c.requestby = b.empid) WHERE (c.reqnumber = '$reqnumber')");

		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}

	// GET Purchase Order Items
	static public function mdlShowReleasingItems($reqnumber){
		$stmt = (new Connection)->connect()->prepare("SELECT a.qty,a.itemid,b.pdesc,b.meas1 FROM stockoutitems AS a INNER JOIN items AS b ON (a.itemid = b.itemid) WHERE (a.reqnumber = '$reqnumber')");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}
}