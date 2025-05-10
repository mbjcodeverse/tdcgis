<?php
require_once "connection.php";
class ModelPurchaseOrder{
	static public function mdlAddPurchaseOrder($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $purchase_id = $pdo->prepare("SELECT CONCAT('P', LPAD((count(id)+1),5,'0')) as gen_id FROM purchaseorder");

            $purchase_id->execute();
		    $purchaseid = $purchase_id -> fetchAll(PDO::FETCH_ASSOC);

		    // $purchase_number = $purchaseid[0]['ponumber'];
		    // $sequence_code = strval(intval(substr($purchase_number,-5)) + 1);
		    // $pocode = 'P' . str_repeat("0",5 - strlen($sequence_code)) . $sequence_code;

			$stmt = $pdo->prepare("INSERT INTO purchaseorder(suppliercode, podate, postatus, ponumber, orderedby, machineid, preparedby, remarks, amount, discount, netamount, productlist) VALUES (:suppliercode, :podate, :postatus, :ponumber, :orderedby, :machineid, :preparedby, :remarks, :amount, :discount, :netamount, :productlist)");

			$stmt->bindParam(":suppliercode", $data["suppliercode"], PDO::PARAM_STR);
			$stmt->bindParam(":podate", $data["podate"], PDO::PARAM_STR);
			$stmt->bindParam(":postatus", $data["postatus"], PDO::PARAM_STR);
			$stmt->bindParam(":ponumber", $purchaseid[0]['gen_id'], PDO::PARAM_STR);
			// $stmt->bindParam(":ponumber", $pocode, PDO::PARAM_STR);
			$stmt->bindParam(":orderedby", $data["orderedby"], PDO::PARAM_STR);
			$stmt->bindParam(":machineid", $data["machineid"], PDO::PARAM_STR);
			$stmt->bindParam(":preparedby", $data["preparedby"], PDO::PARAM_STR);
            $stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);	
            $stmt->bindParam(":amount", $data["amount"], PDO::PARAM_STR);
            $stmt->bindParam(":discount", $data["discount"], PDO::PARAM_STR);
            $stmt->bindParam(":netamount", $data["netamount"], PDO::PARAM_STR);	
            $stmt->bindParam(":productlist", $data["productlist"], PDO::PARAM_STR);	

			$stmt->execute();

			$itemsList = json_decode($data["productlist"]);
			foreach($itemsList as $product){
				$items = $pdo->prepare("INSERT INTO purchaseitems(ponumber, qty, price, tamount, itemid) VALUES (:ponumber, :qty, :price, :tamount, :itemid)");

				$items->bindParam(":ponumber", $purchaseid[0]['gen_id'], PDO::PARAM_STR);
				$items->bindParam(":qty", $product->qty, PDO::PARAM_STR);
				$items->bindParam(":price", $product->price, PDO::PARAM_STR);
				$items->bindParam(":tamount", $product->tamount, PDO::PARAM_STR);
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

    // Update EXISTING RECORD
	static public function mdlEditPurchaseOrder($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            // PO # not included
			$stmt = $pdo->prepare("UPDATE purchaseorder SET suppliercode = :suppliercode, podate = :podate, postatus = :postatus,  orderedby = :orderedby, machineid = :machineid, preparedby = :preparedby, remarks = :remarks, amount = :amount, discount = :discount, netamount = :netamount, productlist = :productlist WHERE ponumber = :ponumber");

			$stmt->bindParam(":suppliercode", $data["suppliercode"], PDO::PARAM_STR);
			$stmt->bindParam(":podate", $data["podate"], PDO::PARAM_STR);
			$stmt->bindParam(":postatus", $data["postatus"], PDO::PARAM_STR);
			$stmt->bindParam(":ponumber", $data["ponumber"], PDO::PARAM_STR);
			$stmt->bindParam(":orderedby", $data["orderedby"], PDO::PARAM_STR);
			$stmt->bindParam(":machineid", $data["machineid"], PDO::PARAM_STR);
			$stmt->bindParam(":preparedby", $data["preparedby"], PDO::PARAM_STR);
            $stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);	
            $stmt->bindParam(":amount", $data["amount"], PDO::PARAM_STR);
            $stmt->bindParam(":discount", $data["discount"], PDO::PARAM_STR);
            $stmt->bindParam(":netamount", $data["netamount"], PDO::PARAM_STR);	
            $stmt->bindParam(":productlist", $data["productlist"], PDO::PARAM_STR);	
			$stmt->execute();

			// Delete existing Purchase Items
		    $delete_items = (new Connection)->connect()->prepare("DELETE FROM purchaseitems WHERE ponumber = :ponumber");
		    $delete_items -> bindParam(":ponumber", $data["ponumber"], PDO::PARAM_STR);
		    $delete_items->execute();

		    // Insert updated/new Purchase Items
			$itemsList = json_decode($data["productlist"]);
			foreach($itemsList as $product){
				$items = $pdo->prepare("INSERT INTO purchaseitems(ponumber, qty, price, tamount, itemid) VALUES (:ponumber, :qty, :price, :tamount, :itemid)");

				$items->bindParam(":ponumber", $data["ponumber"], PDO::PARAM_STR);
				$items->bindParam(":qty", $product->qty, PDO::PARAM_STR);
				$items->bindParam(":price", $product->price, PDO::PARAM_STR);
				$items->bindParam(":tamount", $product->tamount, PDO::PARAM_STR);
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

    // Get PO Details
	// static public function mdlShowPurchaseOrder($field, $ponumber){
	// 	$stmt = (new Connection)->connect()->prepare("SELECT * FROM purchaseorder WHERE $field = :$ponumber");
	// 	$stmt -> bindParam(":".$ponumber, $ponumber, PDO::PARAM_STR);
	// 	$stmt -> execute();
	// 	return $stmt -> fetch();
	// 	$stmt -> close();
	// 	$stmt = null;
	// }

	static public function mdlShowPurchaseOrder($ponumber){
		$stmt = (new Connection)->connect()->prepare("SELECT IFNULL(a.machinedesc,'') AS machinedesc,a.machineid,b.name,b.address,c.suppliercode,c.podate,c.postatus,c.ponumber,c.orderedby,CONCAT(d.lname,', ',d.fname) AS order_by,c.remarks,c.amount,c.discount,c.netamount,c.preparedby,c.productlist FROM machine AS a RIGHT JOIN purchaseorder AS c ON (a.machineid = c.machineid) INNER JOIN supplier AS b ON (c.suppliercode = b.suppliercode) INNER JOIN employees AS d ON (d.empid = c.orderedby) WHERE (c.ponumber = '$ponumber')");

		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}	

    // Get PO Details - For Incoming
	static public function mdlShowPurchaseOrderForIncoming($ponumber){
		$stmt = (new Connection)->connect()->prepare("SELECT a.ponumber,a.suppliercode,a.productlist,IFNULL(b.machinedesc,'') AS machinedesc,c.name FROM purchaseorder AS a LEFT JOIN machine AS b ON (a.machineid = b.machineid) INNER JOIN supplier AS c ON (a.suppliercode = c.suppliercode) WHERE ponumber = :$ponumber");
		$stmt -> bindParam(":".$ponumber, $ponumber, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}		

    // Cancel PO
	static public function mdlCancelPurchaseOrder($field, $ponumber){
		$stmt = (new Connection)->connect()->prepare("UPDATE purchaseorder SET postatus = 'Cancelled' WHERE $field = :$ponumber");
		$stmt -> bindParam(":".$ponumber, $ponumber, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}	

    // Close PO
	static public function mdlClosePurchaseOrder($field, $ponumber){
		$stmt = (new Connection)->connect()->prepare("UPDATE purchaseorder SET postatus = 'Closed' WHERE $field = :$ponumber");
		$stmt -> bindParam(":".$ponumber, $ponumber, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}		

    // GET Purchase Order Items
	static public function mdlShowPurchaseOrderItems($ponumber){
		$stmt = (new Connection)->connect()->prepare("SELECT a.qty,a.price,a.tamount,a.itemid,b.pdesc,b.meas1 FROM purchaseitems AS a INNER JOIN items AS b ON (a.itemid = b.itemid) WHERE (a.ponumber = '$ponumber')");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

    // Purchase | Incoming Qty Comparison
	static public function mdlShowPurchaseIncoming($ponumber){
		$stmt = (new Connection)->connect()->prepare("SELECT a.itemid,'Purchase' AS tdetails,a.pdesc,SUM(c.qty) AS ttl_qty FROM items AS a INNER JOIN purchaseitems AS c ON (a.itemid = c.itemid) WHERE (c.ponumber = '$ponumber') GROUP BY a.itemid,tdetails UNION ALL SELECT a.itemid,'Incoming' AS tdetails,a.pdesc,SUM(c.qty) AS ttl_qty FROM items AS a INNER JOIN incomingitems AS c ON (a.itemid = c.itemid) WHERE (c.ponumber = '$ponumber') GROUP BY a.itemid,tdetails ORDER BY itemid");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

	static public function mdlShowPurchaseOrderTransactionList($machineid, $start_date, $end_date, $suppliercode, $postatus){
		if ($machineid != ''){
			$machine = " AND (a.machineid = '$machineid')";
		}else{
			$machine = "";
		}

		if ($suppliercode != ''){
			$supplier = " AND (a.suppliercode = '$suppliercode')";
		}else{
			$supplier = "";
		}	

		if ($postatus != ''){
			if ($postatus == 'Pending | Partial'){
				$status = " AND ((a.postatus = 'Pending') OR (a.postatus = 'Partial'))";
			}else{
				$status = " AND (a.postatus = '$postatus')";
			}
		}else{
			$status = "";
		}

		if(!empty($end_date)){
			$dates = " AND (a.podate BETWEEN '$start_date' AND '$end_date')";
		}else{
			$dates = "";
		}					

		$whereClause = "WHERE (a.ponumber != '')" . $machine . $supplier . $status . $dates;

		$stmt = (new Connection)->connect()->prepare("SELECT a.podate,b.name,a.ponumber,c.machinedesc,a.postatus,a.netamount FROM purchaseorder AS a INNER JOIN supplier AS b ON (a.suppliercode = b.suppliercode) LEFT JOIN machine AS c ON (a.machineid = c.machineid) $whereClause");

		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}	
}