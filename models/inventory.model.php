<?php
require_once "connection.php";
class ModelInventory{
	static public function mdlAddInventory($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $inventory_id = $pdo->prepare("SELECT CONCAT('I', LPAD((count(id)+1),5,'0')) as gen_id FROM inventory");

            $inventory_id->execute();
		    $inventoryid = $inventory_id -> fetchAll(PDO::FETCH_ASSOC);

			$stmt = $pdo->prepare("INSERT INTO inventory(countedby, invstatus, invdate, invnumber, postedby, remarks, productlist) VALUES (:countedby, :invstatus, :invdate, :invnumber, :postedby, :remarks, :productlist)");

			$stmt->bindParam(":countedby", $data["countedby"], PDO::PARAM_STR);
			$stmt->bindParam(":invstatus", $data["invstatus"], PDO::PARAM_STR);
			$stmt->bindParam(":invdate", $data["invdate"], PDO::PARAM_STR);
			$stmt->bindParam(":invnumber", $inventoryid[0]['gen_id'], PDO::PARAM_STR);
			$stmt->bindParam(":postedby", $data["postedby"], PDO::PARAM_STR);
			$stmt->bindParam(":remarks", $data["remarks"], PDO::PARAM_STR);
            $stmt->bindParam(":productlist", $data["productlist"], PDO::PARAM_STR);	
			$stmt->execute();

			$itemsList = json_decode($data["productlist"]);
			foreach($itemsList as $product){
				$items = $pdo->prepare("INSERT INTO inventoryitems(invnumber, qty, itemid) VALUES (:invnumber, :qty, :itemid)");

				$items->bindParam(":invnumber", $inventoryid[0]['gen_id'], PDO::PARAM_STR);
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
}