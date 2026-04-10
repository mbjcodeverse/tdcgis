<?php
    require_once "models/connection.php";
    $db = new Connection();
    $pdo = $db->connect();
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $categorycode = '0009';
        $catnumber = 9;
        $classcode = '';
        $lotstatus = 'Available';
        $remarks = '';
        $latitude = '0.00000000000000';
        $longitude = '0.00000000000000';
        $bnorth = '';
        $bsouth = '';
        $beast = '';
        $bwest = '';

        // 1 - 590
        for($i = 1; $i <= 590; $i++){
            // $lotnum = 'MOM';
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            if (($i == 8)||($i == 22)||($i == 36)||($i == 50)||($i == 64)){
                for($a = 1; $a <= 14; $a++){
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
                    }elseif ($a == 10){
                        $lotletter = 'J';
                    }elseif ($a == 11){
                        $lotletter = 'K';
                    }elseif ($a == 12){
                        $lotletter = 'L'; 
                    }elseif ($a == 13){
                        $lotletter = 'M';  
                    }else{
                        $lotletter = 'N';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                }
            }elseif ($i == 42){
                for($a = 1; $a <= 12; $a++){
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
                    }elseif ($a == 10){
                        $lotletter = 'J';
                    }elseif ($a == 11){
                        $lotletter = 'K'; 
                    }else{
                        $lotletter = 'L';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                }    
            }elseif ($i == 56){
                for($a = 1; $a <= 15; $a++){
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
                    }elseif ($a == 10){
                        $lotletter = 'J';
                    }elseif ($a == 11){
                        $lotletter = 'K'; 
                    }elseif ($a == 12){
                        $lotletter = 'L';
                    }elseif ($a == 13){
                        $lotletter = 'M';
                    }elseif ($a == 14){
                        $lotletter = 'N';     
                    }else{
                        $lotletter = 'O';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                }
            }elseif ($i == 70){
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
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                }    
            }elseif ($i == 71){
                for($a = 1; $a <= 9; $a++){
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
                    }else{
                        $lotletter = 'I';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                }
            }elseif ($i == 136){
                for($a = 1; $a <= 14; $a++){
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
                    }elseif ($a == 10){
                        $lotletter = 'J';
                    }elseif ($a == 11){
                        $lotletter = 'K'; 
                    }elseif ($a == 12){
                        $lotletter = 'L';
                    }elseif ($a == 13){
                        $lotletter = 'M';   
                    }else{
                        $lotletter = 'N';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                }   
            }elseif ($i == 137){
                for($a = 1; $a <= 9; $a++){
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
                    }else{
                        $lotletter = 'I';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                }
            }elseif ($i == 138){
                for($a = 1; $a <= 8; $a++){
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
                    }else{
                        $lotletter = 'H';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                }
            }elseif ($i == 139){
                for($a = 1; $a <= 12; $a++){
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
                    }elseif ($a == 10){
                        $lotletter = 'J';
                    }elseif ($a == 11){
                        $lotletter = 'K';    
                    }else{
                        $lotletter = 'L';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                }
            }elseif ($i == 140){
                for($a = 1; $a <= 17; $a++){
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
                    }elseif ($a == 10){
                        $lotletter = 'J';
                    }elseif ($a == 11){
                        $lotletter = 'K'; 
                    }elseif ($a == 12){
                        $lotletter = 'L';
                    }elseif ($a == 13){
                        $lotletter = 'M';
                    }elseif ($a == 14){
                        $lotletter = 'N';
                    }elseif ($a == 15){
                        $lotletter = 'O';
                    }elseif ($a == 16){
                        $lotletter = 'P';       
                    }else{
                        $lotletter = 'Q';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                }
            }elseif ($i == 144){
                for($a = 1; $a <= 12; $a++){
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
                    }elseif ($a == 10){
                        $lotletter = 'J';
                    }elseif ($a == 11){
                        $lotletter = 'K';    
                    }else{
                        $lotletter = 'L';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                }
            }elseif (($i == 165)||($i == 166)||($i == 167)||($i == 168)||($i == 169)){
                for($a = 1; $a <= 14; $a++){
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
                    }elseif ($a == 10){
                        $lotletter = 'J';
                    }elseif ($a == 11){
                        $lotletter = 'K'; 
                    }elseif ($a == 12){
                        $lotletter = 'L';
                    }elseif ($a == 13){
                        $lotletter = 'M';   
                    }else{
                        $lotletter = 'N';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                } 
            }elseif (($i == 569)||($i == 555)||($i == 541)||($i == 527)||($i == 513)||($i == 228)||($i == 247)||($i == 269)||($i == 288)||($i == 307)||($i == 587)||($i == 588)||($i == 589)||($i == 590)){
                for($a = 1; $a <= 15; $a++){
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
                    }elseif ($a == 10){
                        $lotletter = 'J';
                    }elseif ($a == 11){
                        $lotletter = 'K'; 
                    }elseif ($a == 12){
                        $lotletter = 'L';
                    }elseif ($a == 13){
                        $lotletter = 'M';  
                    }elseif ($a == 14){
                        $lotletter = 'N';     
                    }else{
                        $lotletter = 'O';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                } 
            }elseif (($i == 571)||($i == 572)||($i == 573)||($i == 574)||($i == 575)||($i == 576)||($i == 577)||($i == 578)||($i == 579)||($i == 580)||($i == 581)||($i == 582)){
                for($a = 1; $a <= 8; $a++){
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
                    }else{
                        $lotletter = 'H';
                    }
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                } 
            }elseif ($i == 583){
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
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                }    
            }else{
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
                    
                    $lotid = 'L1-'.$lotnum.$lotletter;
                    $stmt = $pdo->prepare("INSERT INTO lotinfo(categorycode, catnumber, classcode, lotnum, lotletter, lotstatus, remarks, lotid, latitude, longitude, bnorth, bsouth, beast, bwest) VALUES (:categorycode, :catnumber, :classcode, :lotnum, :lotletter, :lotstatus, :remarks, :lotid, :latitude, :longitude, :bnorth, :bsouth, :beast, :bwest)");
    
                    $stmt->bindParam(":categorycode", $categorycode, PDO::PARAM_STR);
                    $stmt->bindParam(":catnumber", $catnumber, PDO::PARAM_STR);
                    $stmt->bindParam(":classcode", $classcode, PDO::PARAM_STR);
                    $stmt->bindParam(":lotnum", $lotnum, PDO::PARAM_STR);
                    $stmt->bindParam(":lotletter", $lotletter, PDO::PARAM_STR);
                    $stmt->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
                    $stmt->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                    $stmt->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                    $stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
                    $stmt->bindParam(":longitude", $longitude, PDO::PARAM_STR);
                    $stmt->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                    $stmt->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                    $stmt->bindParam(":beast", $beast, PDO::PARAM_STR);
                    $stmt->bindParam(":bwest", $bwest, PDO::PARAM_STR);
                    $stmt->execute();
                }                
            }
        }

        $sourcedata = $pdo->prepare("SELECT * FROM lawnone");
        $sourcedata->execute();
        $source = $sourcedata -> fetchAll(PDO::FETCH_ASSOC);

        if(count($source)!=0){
            for($i = 0; $i < count($source); $i++){
                $scode = $source[$i]['scode'];

                $lname = $source[$i]['lname'];
                $mi = $source[$i]['mi'];
                $fname = $source[$i]['fname'];
                $full_name = $lname . $fname . $mi;
                // echo $full_name;

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
                $bnorth = $source[$i]['bnorth'];
                $bsouth = $source[$i]['bsouth'];
                $beast = $source[$i]['beast'];
                $bwest = $source[$i]['bwest'];
                $remarks = $source[$i]['remarks'];   
                $spouse = '';
                $isactive = 1;
                $bday = '0000-00-00';
                $salestatus = 'Sold';

                $client_name = $pdo->prepare("SELECT * FROM client 
                    WHERE lname = :lname 
                    AND fname = :fname 
                    AND mi = :mi
                ");
                $client_name->execute([
                    ':lname' => $lname,
                    ':fname' => $fname,
                    ':mi' => $mi
                ]);
                // $client_name = $pdo->prepare("SELECT * FROM client WHERE CONCAT(lname,fname,mi) = '$full_name'");
                // $client_name->execute();
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
                }else{
                    $client_code = $clientname[0]['clientid'];
                }

                $sale_id = $pdo->prepare("SELECT CONCAT('S', LPAD((count(id)+1),7,'0')) as gen_id FROM sales FOR UPDATE");
                $sale_id->execute();
                $saleid = $sale_id -> fetchAll(PDO::FETCH_ASSOC);
                
                $sale_info = $pdo->prepare("INSERT INTO sales(saleid, salestatus, scode, salecode, lotid, clientid, purdate, certnum, certdate, beneficiary, relation, councilor, remarks) VALUES (:saleid, :salestatus, :scode, :salecode, :lotid, :clientid, :purdate, :certnum, :certdate, :beneficiary, :relation, :councilor, :remarks)");
    
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
                $sale_info->bindParam(":remarks", $remarks, PDO::PARAM_STR);
                $sale_info->execute();

                $lotstatus = 'Sold';
                $lot_update = $pdo->prepare("UPDATE lotinfo SET lotstatus = :lotstatus, bnorth = :bnorth, bsouth = :bsouth, beast = :beast, bwest = :bwest WHERE lotid = :lotid");
				$lot_update->bindParam(":lotstatus", $lotstatus, PDO::PARAM_STR);
				$lot_update->bindParam(":lotid", $lotid, PDO::PARAM_STR);
                $lot_update->bindParam(":bnorth", $bnorth, PDO::PARAM_STR);
                $lot_update->bindParam(":bsouth", $bsouth, PDO::PARAM_STR);
                $lot_update->bindParam(":beast", $beast, PDO::PARAM_STR);
                $lot_update->bindParam(":bwest", $bwest, PDO::PARAM_STR);
				$lot_update->execute();
            } 
        }
        $pdo->commit();
    }catch (Exception $e){
        $pdo->rollBack();
    }
?>