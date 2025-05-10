<?php
require_once "connection.php";
class ModelSales{
	static public function mdlAddSale($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $sale_id = $pdo->prepare("SELECT saleid FROM sales ORDER BY id DESC LIMIT 1");

            $sale_id->execute();
		    $saleid = $sale_id -> fetchAll(PDO::FETCH_ASSOC);

		    $sale_number = $saleid[0]['saleid'];
		    $sequence_code = strval(intval(substr($sale_number,-7)) + 1);
		    $salecode = 'S' . str_repeat("0",7 - strlen($sequence_code)) . $sequence_code;

			$stmt = $pdo->prepare("INSERT INTO sales(saleid, salestatus, scode, salecode, lotid, clientid, purdate, certnum, certdate, beneficiary, relation, councilor, remarks) VALUES (:saleid, :salestatus, :scode, :salecode, :lotid, :clientid, :purdate, :certnum, :certdate, :beneficiary, :relation, :councilor, :remarks)");	

			$stmt->bindParam(":saleid", $salecode, PDO::PARAM_STR);
			$stmt->bindParam(":salestatus", $data["salestatus"], PDO::PARAM_STR);
			$stmt->bindParam(":scode", $data["scode"], PDO::PARAM_STR);	
			$stmt->bindParam(":salecode", $data["salecode"], PDO::PARAM_STR);
			$stmt->bindParam(":lotid", $data["lotid"], PDO::PARAM_STR);
			$stmt->bindParam(":clientid", $data["clientid"], PDO::PARAM_STR);
			$stmt->bindParam(":purdate", $data["purdate"], PDO::PARAM_STR);
			$stmt->bindParam(":certnum", $data["certnum"], PDO::PARAM_STR);	
			$stmt->bindParam(":certdate", $data["certdate"], PDO::PARAM_STR);
            $stmt->bindParam(":beneficiary", $data["beneficiary"], PDO::PARAM_STR);
			$stmt->bindParam(":relation", $data["relation"], PDO::PARAM_STR);
			$stmt->bindParam(":councilor", $data["councilor"], PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
			$stmt->execute();	
			
			$lot_status = "Sold";
			$stmt_sold = $pdo->prepare("UPDATE lotinfo SET lotstatus = :lotstatus WHERE lotid = :lotid");
			$stmt_sold->bindParam(":lotid", $data["lotid"], PDO::PARAM_STR);
			$stmt_sold->bindParam(":lotstatus", $lot_status, PDO::PARAM_STR);
			$stmt_sold->execute();

		    $pdo->commit();
		    return $salecode;
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}
	}

	static public function mdlAddSaleHistory($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

		    $salecode = $data["saleid"];

			$stmt = $pdo->prepare("INSERT INTO saleshistory(saleid, salestatus, scode, salecode, lotid, clientid, purdate, certnum, certdate, beneficiary, relation, councilor, remarks) VALUES (:saleid, :salestatus, :scode, :salecode, :lotid, :clientid, :purdate, :certnum, :certdate, :beneficiary, :relation, :councilor, :remarks)");	

			$stmt->bindParam(":saleid", $data["saleid"], PDO::PARAM_STR);
			$stmt->bindParam(":salestatus", $data["salestatus"], PDO::PARAM_STR);
			$stmt->bindParam(":scode", $data["scode"], PDO::PARAM_STR);	
			$stmt->bindParam(":salecode", $data["salecode"], PDO::PARAM_STR);
			$stmt->bindParam(":lotid", $data["lotid"], PDO::PARAM_STR);
			$stmt->bindParam(":clientid", $data["clientid"], PDO::PARAM_STR);
			$stmt->bindParam(":purdate", $data["purdate"], PDO::PARAM_STR);
			$stmt->bindParam(":certnum", $data["certnum"], PDO::PARAM_STR);	
			$stmt->bindParam(":certdate", $data["certdate"], PDO::PARAM_STR);
            $stmt->bindParam(":beneficiary", $data["beneficiary"], PDO::PARAM_STR);
			$stmt->bindParam(":relation", $data["relation"], PDO::PARAM_STR);
			$stmt->bindParam(":councilor", $data["councilor"], PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
			$stmt->execute();		

		    $pdo->commit();
		    return $salecode;
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}
	}

	static public function mdlTransferResale($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$client_status = $data["client_status"];
			if ($client_status == 'New'){
				$client_id = $pdo->prepare("SELECT CONCAT('C', LPAD((count(id)+1),7,'0')) as gen_id FROM client FOR UPDATE");

				$client_id->execute();
				$clientid = $client_id -> fetchAll(PDO::FETCH_ASSOC);
				$isactive = 1;
				$client_identification = $clientid[0]['gen_id'];

				$stmt = $pdo->prepare("INSERT INTO client(clientid, isactive, lname, fname, mi, address, landline, mobile, email) VALUES (:clientid, :isactive, :lname, :fname, :mi, :address, :landline, :mobile, :email)");

				$last_name = ucwords($data["lname"]);
				$first_name = ucwords($data["fname"]);
				$mid_initial = strtoupper($data["mi"]);
	
				$stmt->bindParam(":clientid", $client_identification, PDO::PARAM_STR);
				$stmt->bindParam(":isactive", $isactive, PDO::PARAM_INT);
				$stmt->bindParam(":lname", $last_name, PDO::PARAM_STR);
				$stmt->bindParam(":fname", $first_name, PDO::PARAM_STR);
				$stmt->bindParam(":mi", $mid_initial, PDO::PARAM_STR);
				$stmt->bindParam(":address", $data["address"], PDO::PARAM_STR);
				$stmt->bindParam(":landline", $data["landline"], PDO::PARAM_STR);
				$stmt->bindParam(":mobile", $data["mobile"], PDO::PARAM_STR);
				$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
				$stmt->execute();
			}else{
				$client_identification = $data["clientid"];			// Use existing client id
			}
		
			$transaction = $data["transaction"];		    		// TRANSFER LOT | RESALE LOT
			if ($transaction == 'TRANSFER LOT'){
				$salestatus = 'Transferred';
				$saleid = $data["saleid"];
				$stmt_transfer = $pdo->prepare("UPDATE sales SET clientid = :clientid, salestatus = :salestatus, purdate = :purdate, beneficiary = :beneficiary, relation = :relation, certnum = :certnum, scode = :scode, salecode = :salecode, remarks = :remarks WHERE saleid = :saleid");

				$stmt_transfer->bindParam(":clientid", $client_identification, PDO::PARAM_STR);
				$stmt_transfer->bindParam(":purdate", $data["purdate"], PDO::PARAM_STR);
				$stmt_transfer->bindParam(":beneficiary", $data["beneficiary"], PDO::PARAM_STR);
				$stmt_transfer->bindParam(":relation", $data["relation"], PDO::PARAM_STR);
				$stmt_transfer->bindParam(":certnum", $data["certnum"], PDO::PARAM_STR);
				$stmt_transfer->bindParam(":scode", $data["scode"], PDO::PARAM_STR);
				$stmt_transfer->bindParam(":salecode", $data["salecode"], PDO::PARAM_STR);
				$stmt_transfer->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
				$stmt_transfer->bindParam(":saleid", $saleid, PDO::PARAM_STR);
				$stmt_transfer->bindParam(":salestatus", $salestatus, PDO::PARAM_STR);
				$stmt_transfer->execute();
			}else{
				$salestatus = 'Resale';
				$sale_id = $pdo->prepare("SELECT saleid FROM sales ORDER BY id DESC LIMIT 1");

				$sale_id->execute();
				$salecode = $sale_id -> fetchAll(PDO::FETCH_ASSOC);

				$sale_number = $salecode[0]['saleid'];
				$sequence_code = strval(intval(substr($sale_number,-7)) + 1);
				$saleid = 'S' . str_repeat("0",7 - strlen($sequence_code)) . $sequence_code;

				$stmt_resale = $pdo->prepare("INSERT INTO sales(saleid, salestatus, lotid, clientid, purdate, beneficiary, relation, certnum, scode, salecode, remarks) VALUES (:saleid, :salestatus,:lotid, :clientid, :purdate, :beneficiary, :relation, :certnum, :scode, :salecode, :remarks)");	

				$stmt_resale->bindParam(":saleid", $saleid, PDO::PARAM_STR);
				$stmt_resale->bindParam(":salestatus", $salestatus, PDO::PARAM_STR);
				$stmt_resale->bindParam(":lotid", $data["lotid"], PDO::PARAM_STR);
				$stmt_resale->bindParam(":clientid", $client_identification, PDO::PARAM_STR);
				$stmt_resale->bindParam(":purdate", $data["purdate"], PDO::PARAM_STR);
				$stmt_resale->bindParam(":beneficiary", $data["beneficiary"], PDO::PARAM_STR);
				$stmt_resale->bindParam(":relation", $data["relation"], PDO::PARAM_STR);
				$stmt_resale->bindParam(":certnum", $data["certnum"], PDO::PARAM_STR);
				$stmt_resale->bindParam(":scode", $data["scode"], PDO::PARAM_STR);
				$stmt_resale->bindParam(":salecode", $data["salecode"], PDO::PARAM_STR);
				$stmt_resale->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
				$stmt_resale->execute();
				
				$lot_status = "Sold";
				$stmt_sold = $pdo->prepare("UPDATE lotinfo SET lotstatus = :lotstatus WHERE lotid = :lotid");
				$stmt_sold->bindParam(":lotid", $data["lotid"], PDO::PARAM_STR);
				$stmt_sold->bindParam(":lotstatus", $lot_status, PDO::PARAM_STR);
				$stmt_sold->execute();
			}

			// Return new or existing client ID and sales ID
			$clientid_saleid = $client_identification . ',' . $saleid;
		    $pdo->commit();
		    return $clientid_saleid;
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}
	}	
	
	static public function mdlCancelSale($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$sale_status = "Cancelled";
			$stmt = $pdo->prepare("UPDATE sales SET salestatus = :salestatus, purdate = :purdate, remarks = :remarks WHERE saleid = :saleid");

			$stmt->bindParam(":purdate", $data["datecancelled"], PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $data["cancelremarks"], PDO::PARAM_STR);
            $stmt->bindParam(":saleid", $data["saleid"], PDO::PARAM_STR);
			$stmt->bindParam(":salestatus", $sale_status, PDO::PARAM_STR);
			$stmt->execute();

			$lot_status = "Cancelled";
			$stmt_cancel = $pdo->prepare("UPDATE lotinfo SET lotstatus = :lotstatus WHERE lotid = :lotid");
			$stmt_cancel->bindParam(":lotid", $data["lotid"], PDO::PARAM_STR);
			$stmt_cancel->bindParam(":lotstatus", $lot_status, PDO::PARAM_STR);
			$stmt_cancel->execute();

			$saleid = $data["saleid"];
		    $pdo->commit();
		    return $saleid;
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}
	}	

	static public function mdlEditSale($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$stmt = $pdo->prepare("UPDATE sales SET saleid = :saleid, salestatus = :salestatus, scode = :scode, salecode = :salecode, lotid = :lotid, clientid = :clientid, purdate = :purdate, certnum = :certnum, certdate = :certdate, beneficiary = :beneficiary, relation = :relation, councilor = :councilor, remarks = :remarks WHERE saleid = :saleid");

            $stmt->bindParam(":saleid", $data["saleid"], PDO::PARAM_STR);
			$stmt->bindParam(":salestatus", $data["salestatus"], PDO::PARAM_STR);
			$stmt->bindParam(":scode", $data["scode"], PDO::PARAM_STR);	
			$stmt->bindParam(":salecode", $data["salecode"], PDO::PARAM_STR);
			$stmt->bindParam(":lotid", $data["lotid"], PDO::PARAM_STR);
			$stmt->bindParam(":clientid", $data["clientid"], PDO::PARAM_STR);
			$stmt->bindParam(":purdate", $data["purdate"], PDO::PARAM_STR);
			$stmt->bindParam(":certnum", $data["certnum"], PDO::PARAM_STR);	
			$stmt->bindParam(":certdate", $data["certdate"], PDO::PARAM_STR);
            $stmt->bindParam(":beneficiary", $data["beneficiary"], PDO::PARAM_STR);
			$stmt->bindParam(":relation", $data["relation"], PDO::PARAM_STR);
			$stmt->bindParam(":councilor", $data["councilor"], PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
			$stmt->execute();

			$saleid = $data["saleid"];
		    $pdo->commit();
		    return $saleid;
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}
	}	

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

		$whereClause = "WHERE (e.saleid != '')" . $category_code . $class_code . $status;// . $dates;

		$stmt = (new Connection)->connect()->prepare("SELECT e.purdate,d.lname,d.fname,d.mi,CONCAT(d.fname,' ',d.mi,'. ',d.lname) AS full_name,e.lotid,a.catdescription,c.catnumber,e.beneficiary,e.saleid,c.latitude,c.longitude,e.salestatus,IFNULL(f.decedentlist, '') AS decedentlist FROM sales AS e INNER JOIN client AS d ON (e.clientid = d.clientid) INNER JOIN lotinfo AS c ON (e.lotid = c.lotid) INNER JOIN category AS a ON (c.categorycode = a.categorycode) LEFT JOIN interment AS f ON (e.saleid = f.saleid) $whereClause ORDER BY full_name");

		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}	    

	static public function mdlSalesHistoryList($lotid){
		$stmt = (new Connection)->connect()->prepare("SELECT e.purdate,d.lname,d.fname,d.mi,CONCAT(d.fname,' ',d.mi,'. ',d.lname) AS full_name,e.lotid,e.beneficiary,e.saleid,e.salestatus,e.remarks FROM saleshistory AS e INNER JOIN client AS d ON (e.clientid = d.clientid) INNER JOIN lotinfo AS c ON (e.lotid = c.lotid) WHERE e.lotid = '$lotid' ORDER BY e.purdate DESC");

		$stmt -> execute();
		return $stmt -> fetchAll();
		// $stmt -> close();
		// $stmt = null;
	}

	static public function mdlShowSale($saleid){
		$stmt = (new Connection)->connect()->prepare("SELECT a.clientid,a.lname,a.fname,a.mi,b.saleid,b.salestatus,b.scode,b.lotid,b.purdate,b.certnum,b.certdate,b.beneficiary,b.relation,b.councilor,b.remarks,b.salecode FROM client as a INNER JOIN sales as b ON (a.clientid = b.clientid) WHERE (saleid = '$saleid')");
		$stmt -> execute();
		return $stmt -> fetch();
		// $stmt -> close();
		// $stmt = null;
	}

	static public function mdlShowSaleLotInfo($lotid){
		$stmt = (new Connection)->connect()->prepare("SELECT a.clientid,a.lname,a.fname,a.mi,b.saleid,b.salestatus,b.scode,b.lotid,b.purdate,b.certnum,b.certdate,b.beneficiary,b.relation,b.councilor,b.remarks,b.salecode,IFNULL(c.decedentlist,'') as decedentlist FROM client as a INNER JOIN sales as b ON (a.clientid = b.clientid) LEFT JOIN interment as c ON (b.saleid = c.saleid) WHERE (b.lotid = '$lotid')");
		$stmt -> execute();
		return $stmt -> fetch();
	}	
}