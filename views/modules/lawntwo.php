<?php
    require_once "models/connection.php";
    $db = new Connection();
    $pdo = $db->connect();
    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->beginTransaction();

        $categorycode = '0008';
        $catnumber = 1;
        $classcode = '';
        $lotstatus = 'Available';
        $remarks = '';

        // 1 - 164
        for($i = 1; $i <= 164; $i++){
            if (($i!= 121)&&($i!=123)&&($i!= 126)){
                $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
                if (($i==6)||($i==12)||($i==18)||($i==24)||($i==30)||($i==36)||($i==42)||($i==48)||($i==54)||($i==60)||($i==66)||($i==72)||($i==78)||($i==84)||($i==90)||($i==96)||($i==102)||($i==108)||($i==114)||($i==120)){
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
                        $lotid = 'L2-'.$lotnum.$lotletter;
                        
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
                        $lotid = 'L2-'.$lotnum.$lotletter;
                        
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
            }
        }

        // 121 - 121 (A - I)
        for($i = 121; $i <= 121; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 123 - 123 (A - K)
        for($i = 123; $i <= 123; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 11; $a++){
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
                }else{
                    $lotletter = 'K';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 126 - 126 (A - N)
        for($i = 126; $i <= 126; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 165 - 169 (A - N)
        for($i = 165; $i <= 169; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 170 - 222 (A - J)
        for($i = 170; $i <= 222; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 223 - 223 (A - L)
        for($i = 223; $i <= 223; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 224 - 233 (A - J)
        for($i = 224; $i <= 233; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 234 - 246 (A - J)
        for($i = 234; $i <= 246; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 247 - 247 (A - K)
        for($i = 247; $i <= 247; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 11; $a++){
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
                }else{
                    $lotletter = 'K';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 248 - 258 (A - J)
        for($i = 248; $i <= 258; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 259 - 270 (A - J)
        for($i = 259; $i <= 270; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 271 - 271 (A - O)
        for($i = 271; $i <= 271; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 272 - 272 (A - O)
        for($i = 272; $i <= 272; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 281 - 291 (A - J)
        for($i = 281; $i <= 291; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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
        
        // 284 - 297 (A - J)
        for($i = 284; $i <= 297; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 298 - 298 (A - O)
        for($i = 298; $i <= 298; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 299 - 309 (A - J)
        for($i = 299; $i <= 309; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 297 - 297 (A - R)
        for($i = 284; $i <= 297; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 18; $a++){
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
                }elseif ($a == 17){
                    $lotletter = 'Q';               
                }else{
                    $lotletter = 'R';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 310 - 322 (A - J)
        for($i = 310; $i <= 322; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 323 - 323 (A - P)
        for($i = 323; $i <= 323; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 16; $a++){
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
                }else{
                    $lotletter = 'P';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 324 - 324 (A - R)
        for($i = 324; $i <= 324; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 18; $a++){
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
                }elseif ($a == 17){
                    $lotletter = 'Q';               
                }else{
                    $lotletter = 'R';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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
        
        // 325 - 345 (A - J)
        for($i = 325; $i <= 345; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 501 (A - N)
        for($i = 501; $i <= 501; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 502 (A - B)
        for($i = 502; $i <= 502; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 2; $a++){
                if ($a == 1){
                    $lotletter = 'A';               
                }else{
                    $lotletter = 'B';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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
        
        // 503 - 537 (A - J)
        for($i = 503; $i <= 537; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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
        
        // 538 (A - D)
        for($i = 538; $i <= 538; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 4; $a++){
                if ($a == 1){
                    $lotletter = 'A';
                }elseif ($a == 2){
                    $lotletter = 'B';
                }elseif ($a == 3){
                    $lotletter = 'C';
                }else{
                    $lotletter = 'D';
                }

                $lotid = 'L2-'.$lotnum.$lotletter;
                
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
        
        // 539 - 546 (A - J)
        for($i = 539; $i <= 546; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 547 - 547 (A - I)
        for($i = 547; $i <= 547; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 548 - 556 (A - J)
        for($i = 548; $i <= 556; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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
        
        // 600 - 609 (A - O)
        for($i = 600; $i <= 609; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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
        
        // 610 - 610 (A - L)
        for($i = 610; $i <= 610; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 611 - 612 (A - P)
        for($i = 611; $i <= 612; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 16; $a++){
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
                }else{
                    $lotletter = 'P';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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
        
        // 613 - 613 (A - S)
        for($i = 613; $i <= 613; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 19; $a++){
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
                }elseif ($a == 17){
                    $lotletter = 'Q';               
                }elseif ($a == 18){
                    $lotletter = 'R';               
                }else{
                    $lotletter = 'S';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 614 - 614 (A - T)
        for($i = 614; $i <= 614; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 20; $a++){
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
                }elseif ($a == 17){
                    $lotletter = 'Q';               
                }elseif ($a == 18){
                    $lotletter = 'R';               
                }elseif ($a == 19){
                    $lotletter = 'S';               
                }else{
                    $lotletter = 'T';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 615 - 615 (A - K)
        for($i = 615; $i <= 615; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 11; $a++){
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
                }else{
                    $lotletter = 'K';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 616 - 616 (A - M)
        for($i = 616; $i <= 616; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 13; $a++){
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
                }else{
                    $lotletter = 'M';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        // 617 - 617 (A - K)
        for($i = 617; $i <= 617; $i++){
            $lotnum = str_pad($i,3,"0",STR_PAD_LEFT);
            for($a = 1; $a <= 11; $a++){
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
                }else{
                    $lotletter = 'K';
                }
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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
        
        // 619 - 625 (A - J)
        for($i = 619; $i <= 625; $i++){
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
                $lotid = 'L2-'.$lotnum.$lotletter;
                
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

        $sourcedata = $pdo->prepare("SELECT * FROM lawntwo");
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
                $bnorth = $source[$i]['bnorth'];
                $bsouth = $source[$i]['bsouth'];
                $beast = $source[$i]['beast'];
                $bwest = $source[$i]['bwest'];
                $remarks = $source[$i]['remarks'];   
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