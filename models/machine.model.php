<?php
require_once "connection.php";
class ModelMachine{
	static public function mdlAddMachine($data){
		$db = new Connection();
		$pdo = $db->connect();
        try{
        	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->beginTransaction();

            $machine_id = $pdo->prepare("SELECT CONCAT('', LPAD((count(id)+1),4,'0')) as gen_id FROM machine FOR UPDATE");

            $machine_id->execute();
		    $machine_code = $machine_id -> fetchAll(PDO::FETCH_ASSOC);

		    //--------------------------------------------------------
		 //    $path = "views/img/machine/default/machine.jpg";
		 //    $next_id = (new Connection)->connect()->query("SHOW TABLE STATUS LIKE 'machine'")->fetch(PDO::FETCH_ASSOC)['Auto_increment'];

			// $folder = "views/img/machine/M".$next_id;
			// mkdir($folder, 0755);

			$tmp_name = $data["image"];

			$random = mt_rand(100,999);
			// $image = "views/img/machine/M".$next_id."/".$random.".jpg";
			$image = "views/img/machine/".$random.".jpg";
			move_uploaded_file($tmp_name, $image);

			//--------------------------------------------------------

			$stmt = $pdo->prepare("INSERT INTO machine(classcode, machtype, machabbr, machinedesc, buildingcode, isactive, machstatus, machineid, image, attributelist) VALUES (:classcode, :machtype, :machabbr, :machinedesc, :buildingcode, :isactive, :machstatus, :machineid, :image, :attributelist)");

			$stmt->bindParam(":machineid", $machine_code[0]['gen_id'], PDO::PARAM_STR);
			$stmt->bindParam(":classcode", $data["classcode"], PDO::PARAM_STR);
			$stmt->bindParam(":machtype", $data["machtype"], PDO::PARAM_STR);
			$stmt->bindParam(":machabbr", $data["machabbr"], PDO::PARAM_STR);
			$stmt->bindParam(":machinedesc", $data["machinedesc"], PDO::PARAM_STR);
			$stmt->bindParam(":buildingcode", $data["buildingcode"], PDO::PARAM_STR);
			$stmt->bindParam(":isactive", $data["isactive"], PDO::PARAM_INT);
			$stmt->bindParam(":machstatus", $data["machstatus"], PDO::PARAM_STR);
			$stmt->bindParam(":image", $image, PDO::PARAM_STR);
			$stmt->bindParam(":attributelist", $data["attributelist"], PDO::PARAM_STR);
			$stmt->execute();

			$attributeList = json_decode($data["attributelist"]);
			foreach($attributeList as $attribute){
				$attributes = $pdo->prepare("INSERT INTO machineattributes(machineid, attribute, detail) VALUES (:machineid, :attribute, :detail)");

				$attributes->bindParam(":machineid", $machine_code[0]['gen_id'], PDO::PARAM_STR);
				$attributes->bindParam(":attribute", $attribute->attribute, PDO::PARAM_STR);
				$attributes->bindParam(":detail", $attribute->detail, PDO::PARAM_STR);
				$attributes->execute();
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

	static public function mdlShowMachineList(){
		$stmt = (new Connection)->connect()->prepare("SELECT * FROM machine ORDER BY machinedesc");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}	
}