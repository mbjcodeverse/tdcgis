<?php
    require_once "models/connection.php";
    $db = new Connection();
    $pdo = $db->connect();
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $categorycode = '0001';
        $catnumber = 1;
        $classcode = '';
        $lotstatus = 'Available';
        $remarks = '';
        for($i = 1; $i <= 335; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 10; $a++){
                if ($a == 1){
                    $lotletter = 'A';
                }elseif ($a == 2){
                    $lotletter = 'B';
                }elseif ($a == 3){
                    $lotletter = 'C';
                }elseif ($a == 4){
                    $lotletter = 'D';
                }elseif ($a == 5){
                    $lotletter = 'E';
                }elseif ($a == 6){
                    $lotletter = 'F';
                }elseif ($a == 7){
                    $lotletter = 'G';
                }elseif ($a == 8){
                    $lotletter = 'H';
                }elseif ($a == 9){
                    $lotletter = 'I';
                }else{
                    $lotletter = 'J';
                }
                $lotid = 'L3-'.$lotnum.$lotletter;
                
                $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid)");

                $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                $stmt->execute();
            }
        }

        $sourcedata = $pdo->prepare("SELECT * FROM sourcedata");
        $sourcedata->execute();
        $source = $sourcedata -> fetchAll(PDO::FETCH_ASSOC);
        if(count($source)!=0){
            for($i = 0; $i < count($source); $i++){
                $scode = $source[$i]['scode'];

                $lname = $source[$i]['lname'];
                $mi = $source[$i]['mi'];
                $fname = $source[$i]['fname'];
                $full_name = $lname . $fname . $mi;

                $corporation = $source[$i]['corporation'];
                $landline = $source[$i]['landline'];
                $email = $source[$i]['email'];
                $mobile = $source[$i]['mobile'];
                $address = $source[$i]['address'];
                $lotid = $source[$i]['lotid'];
                $purdate = $source[$i]['purdate'];
                $salecode = $source[$i]['salecode'];
                $councilor = $source[$i]['councilor'];
                $certnum = $source[$i]['certnum'];
                $certdate = $source[$i]['certdate'];
                $beneficiary = $source[$i]['beneficiary'];
                $relation = $source[$i]['relation'];   
                $spouse = '';
                $isactive = 1;
                $bday = '0000-00-00';
                $salestatus = 'Sold';

                $client_name = $pdo->prepare("SELECT * FROM client WHERE CONCAT(lname,fname,mi) = '$full_name'");
                $client_name->execute();
                $clientname = $client_name -> fetchAll(PDO::FETCH_ASSOC);

                if(count($clientname) == 0){
                    $client_id = $pdo->prepare("SELECT CONCAT('C', LPAD((count(id)+1),7,'0')) as gen_id FROM client FOR UPDATE");
                    $client_id->execute();
                    $clientid = $client_id -> fetchAll(PDO::FETCH_ASSOC);
                    $client_code = $clientid[0]['gen_id'];
               
                    $client_info = $pdo->prepare("INSERT INTO client(clientid, lname, fname, mi, isactive, corporation, address, landline, mobile, email, bday, spouse) VALUES (:clientid, :lname, :fname, :mi, :isactive, :corporation, :address, :landline, :mobile, :email, :bday, :spouse)");

                    $client_info->bindParam(":clientid", $client_code, PDO::PARAM_STR);    
                    $client_info->bindParam(":lname", $lname, PDO::PARAM_STR);
                    $client_info->bindParam(":fname", $fname, PDO::PARAM_STR);
                    $client_info->bindParam(":mi", $mi, PDO::PARAM_STR);
                    $client_info->bindParam(":isactive", $isactive, PDO::PARAM_INT);
                    $client_info->bindParam(":corporation", $corporation, PDO::PARAM_STR);
                    $client_info->bindParam(":address", $address, PDO::PARAM_STR);
                    $client_info->bindParam(":landline", $landline, PDO::PARAM_STR);
                    $client_info->bindParam(":mobile", $mobile, PDO::PARAM_STR);
                    $client_info->bindParam(":email", $email, PDO::PARAM_STR);
                    $client_info->bindParam(":bday", $bday, PDO::PARAM_STR);
                    $client_info->bindParam(":spouse", $spouse, PDO::PARAM_STR);
                    $client_info->execute();
                }

                $sale_id = $pdo->prepare("SELECT CONCAT('S', LPAD((count(id)+1),7,'0')) as gen_id FROM sales FOR UPDATE");
                $sale_id->execute();
                $saleid = $sale_id -> fetchAll(PDO::FETCH_ASSOC);
                
                $sale_info = $pdo->prepare("INSERT INTO sales(saleid, salestatus, scode, salecode, lotid, clientid, purdate, certnum, certdate, beneficiary, relation, councilor) VALUES (:saleid, :salestatus, :scode, :salecode, :lotid, :clientid, :purdate, :certnum, :certdate, :beneficiary, :relation, :councilor)");
    
                $sale_info->bindParam(":saleid", $saleid[0]['gen_id'], PDO::PARAM_STR); 
                $sale_info->bindParam(":salestatus", $salestatus, PDO::PARAM_STR);
                $sale_info->bindParam(":scode", $scode, PDO::PARAM_STR);
                $sale_info->bindParam(":salecode", $salecode, PDO::PARAM_STR);
                $sale_info->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                $sale_info->bindParam(":clientid", $client_code, PDO::PARAM_STR);
                $sale_info->bindParam(":purdate", $purdate, PDO::PARAM_STR);
                $sale_info->bindParam(":certnum", $certnum, PDO::PARAM_STR);
                $sale_info->bindParam(":certdate", $certdate, PDO::PARAM_STR);
                $sale_info->bindParam(":beneficiary", $beneficiary, PDO::PARAM_STR);
                $sale_info->bindParam(":relation", $relation, PDO::PARAM_STR);
                $sale_info->bindParam(":councilor", $councilor, PDO::PARAM_STR);
                $sale_info->execute();

                $lotstatus = 'Sold';
                $lot_update = $pdo->prepare("UPDATE lotinfo SET lotstatus = :lotstatus WHERE lotid = :lotid");
				$lot_update->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
				$lot_update->bindParam(":lotid", $lotid, PDO::PARAM_STR);
				$lot_update->execute();
            } 
        }
        $pdo->commit();
    }catch (Exception $e){
        $pdo->rollBack();
    }
?>