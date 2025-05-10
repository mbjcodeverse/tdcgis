<?php
require_once "connection.php";
class ModelInterment{
	static public function mdlAddInterment($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			$code_format = "I" . substr($data["userid"],-3);

            // $interment_id = $pdo->prepare("SELECT intermentid FROM interment ORDER BY id DESC LIMIT 1");

			$interment_id = $pdo->prepare("SELECT intermentid FROM interment WHERE (SUBSTRING(intermentid,1,4) = '$code_format') ORDER BY id DESC LIMIT 1");

            $interment_id->execute();
		    $intermentid = $interment_id -> fetchAll(PDO::FETCH_ASSOC);

		    $interment_number = $intermentid[0]['intermentid'];
		    $sequence_code = strval(intval(substr($interment_number,-7)) + 1);
		    // $intermentcode = 'I' . str_repeat("0",7 - strlen($sequence_code)) . $sequence_code;
			$intermentcode = $code_format . str_repeat("0",7 - strlen($sequence_code)) . $sequence_code;

			// Get the current date and time in the format 'Y-m-d H:i:s' (e.g., '2025-03-19 15:30:00')
			$currentDateTime = date('Y-m-d H:i:s');

			$stmt = $pdo->prepare("INSERT INTO interment(intermentid, saleid, interdate, location, layer, remarks, decedentlist, userid, entrydate) VALUES (:intermentid, :saleid, :interdate, :location, :layer, :remarks, :decedentlist, :userid, :entrydate)");	

            $stmt->bindParam(":saleid", $data["saleid"], PDO::PARAM_STR);
			$stmt->bindParam(":intermentid", $intermentcode, PDO::PARAM_STR);
			$stmt->bindParam(":interdate", $data["interdate"], PDO::PARAM_STR);
			$stmt->bindParam(":location", $data["location"], PDO::PARAM_STR);	
			$stmt->bindParam(":layer", $data["layer"], PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
			$stmt->bindParam(":decedentlist", $data["decedentlist"], PDO::PARAM_STR);
			$stmt->bindParam(":userid", $data["userid"], PDO::PARAM_STR);
			$stmt->bindParam(":entrydate", $currentDateTime, PDO::PARAM_STR);
			$stmt->execute();	

            $decedentList = json_decode($data["decedentlist"]);
			foreach($decedentList as $decedents){
				$items = $pdo->prepare("INSERT INTO intermentdetails(intermentid, decedentid, decedent, datedied, relation, remains, reinterred, source) VALUES (:intermentid, :decedentid, :decedent, :datedied, :relation, :remains, :reinterred, :source)");

                $datedied = $decedents->datedied;

				if ($datedied != ''){
                	$date = DateTime::createFromFormat('m/d/Y', $datedied);
                	$formattedDate = $date->format('Y-m-d');
				}else{
					$formattedDate = '';
				}

				$items->bindParam(":intermentid", $intermentcode, PDO::PARAM_STR);
                $items->bindParam(":decedentid", $decedents->decedentid, PDO::PARAM_STR);
				$items->bindParam(":decedent", $decedents->decedent, PDO::PARAM_STR);
				$items->bindParam(":datedied", $formattedDate, PDO::PARAM_STR);
				$items->bindParam(":relation", $decedents->relation, PDO::PARAM_STR);
				$items->bindParam(":remains", $decedents->remains, PDO::PARAM_STR);
				$items->bindParam(":reinterred", $decedents->reinterred, PDO::PARAM_STR);
                $items->bindParam(":source", $decedents->source, PDO::PARAM_STR);
				$items->execute();
			}		
            
            $lot_status = "Used";
			$stmt_used = $pdo->prepare("UPDATE lotinfo SET lotstatus = :lotstatus WHERE lotid = :lotid");
			$stmt_used->bindParam(":lotid", $data["lotid"], PDO::PARAM_STR);
			$stmt_used->bindParam(":lotstatus", $lot_status, PDO::PARAM_STR);
			$stmt_used->execute();

		    $pdo->commit();
		    return $intermentcode;
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}
	}

	static public function mdlEditInterment($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

			// Get the current date and time in the format 'Y-m-d H:i:s' (e.g., '2025-03-19 15:30:00')
			$currentDateTime = date('Y-m-d H:i:s');

			$stmt = $pdo->prepare("UPDATE interment SET saleid = :saleid, interdate = :interdate, location = :location, layer = :layer, remarks = :remarks, decedentlist = :decedentlist, useridedit = :useridedit, alterdate = :alterdate WHERE intermentid = :intermentid");

			$stmt->bindParam(":saleid", $data["saleid"], PDO::PARAM_STR);
			$stmt->bindParam(":intermentid", $data["intermentid"], PDO::PARAM_STR);
			$stmt->bindParam(":interdate", $data["interdate"], PDO::PARAM_STR);
			$stmt->bindParam(":location", $data["location"], PDO::PARAM_STR);	
			$stmt->bindParam(":layer", $data["layer"], PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
			$stmt->bindParam(":decedentlist", $data["decedentlist"], PDO::PARAM_STR);
			$stmt->bindParam(":useridedit", $data["userid"], PDO::PARAM_STR);
			$stmt->bindParam(":alterdate", $currentDateTime, PDO::PARAM_STR);
			$stmt->execute();	

			// Delete existing interment items
		    $delete_items = (new Connection)->connect()->prepare("DELETE FROM intermentdetails WHERE intermentid = :intermentid");
		    $delete_items -> bindParam(":intermentid", $data["intermentid"], PDO::PARAM_STR);
		    $delete_items->execute();

			$intermentid = $data["intermentid"];
			$decedentList = json_decode($data["decedentlist"]);
			foreach($decedentList as $decedents){
				$items = $pdo->prepare("INSERT INTO intermentdetails(intermentid, decedentid, decedent, datedied, relation, remains, reinterred, source) VALUES (:intermentid, :decedentid, :decedent, :datedied, :relation, :remains, :reinterred, :source)");

                $datedied = $decedents->datedied;
                $date = DateTime::createFromFormat('m/d/Y', $datedied);
                $formattedDate = $date->format('Y-m-d');

				$items->bindParam(":intermentid", $intermentid, PDO::PARAM_STR);
                $items->bindParam(":decedentid", $decedents->decedentid, PDO::PARAM_STR);
				$items->bindParam(":decedent", $decedents->decedent, PDO::PARAM_STR);
				$items->bindParam(":datedied", $formattedDate, PDO::PARAM_STR);
				$items->bindParam(":relation", $decedents->relation, PDO::PARAM_STR);
				$items->bindParam(":remains", $decedents->remains, PDO::PARAM_STR);
				$items->bindParam(":reinterred", $decedents->reinterred, PDO::PARAM_STR);
                $items->bindParam(":source", $decedents->source, PDO::PARAM_STR);
				$items->execute();
			}		

		    $pdo->commit();
		    return $intermentid;
		}catch (Exception $e){
			$pdo->rollBack();
			return "error";
		}
	}	


	static public function mdlIntermentInfoList($categorycode, $start_date, $end_date, $reinterred){
		if ($categorycode != ''){
			$category_code = " AND (f.categorycode = '$categorycode')";
		}else{
			$category_code = "";
		}

		// if ($salestatus != ''){
        //     $status = " AND (e.salestatus = '$salestatus')";
		// }else{
		// 	$status = "";
		// }

		if(!empty($end_date)){
			$dates = " AND (b.interdate BETWEEN '$start_date' AND '$end_date')";
		}else{
			$dates = "";
		}					

		$whereClause = "WHERE (b.intermentid != '')" . $category_code . $dates; //. $class_code . $status;

		$stmt = (new Connection)->connect()->prepare("SELECT a.fname,a.mi,a.lname,b.interdate,b.intermentid,e.lotid,b.decedentlist,e.saleid,f.catdescription FROM client AS a INNER JOIN sales AS e ON (a.clientid = e.clientid) INNER JOIN interment AS b ON (e.saleid = b.saleid) INNER JOIN lotinfo AS d ON (d.lotid = e.lotid) INNER JOIN category AS f ON (f.categorycode = d.categorycode) $whereClause");

		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}	 
	
	static public function mdlShowInterment($intermentid){
		$stmt = (new Connection)->connect()->prepare("SELECT c.lname,c.fname,c.mi,a.intermentid,a.saleid,a.interdate,a.location,a.layer,a.remarks,a.decedentlist,b.lotid FROM interment AS a INNER JOIN sales AS b ON (a.saleid = b.saleid) INNER JOIN client AS c ON (c.clientid = b.clientid) WHERE (a.intermentid = '$intermentid')");
		$stmt -> execute();
		return $stmt -> fetch();
	}
}