<?php
    require_once('handler.php');
    if (!empty($_POST['cliID']) && !empty($_POST['recID'])) {
        
        $cliID = $_POST['cliID'];
        $recID = $_POST['recID'];
        $lname = $_POST['cliLname'];
        $fname = $_POST['cliFname'];
        $tel = $_POST['cliTelNo'];
        $mob = $_POST['cliMobNo'];
        $result = "";

        $chkClient = $handler->prepare("SELECT 
            client_lname, 
            client_fname, 
            client_add1,
            client_email,
            client_tel,
            client_mobile 
            FROM client WHERE 
            (client_lname=? AND client_fname=? AND
            client_tel=? AND client_mobile=?)
            AND client_id != ?
        ");


        
        $chkClient->execute(array($lname,$fname,$tel,$mob,$cliID));

        if ($chkClient->rowCount()) {
            echo 2;
        }else{
             $sql = $handler->prepare("UPDATE client SET
                        client_lname = :client_lname,
                        client_fname = :client_fname,
                        client_mname = :client_mname,
                        client_add1 = :client_add1,
                        client_zipcode = :client_zipcode,
                        client_email = :client_email,
                        client_tel = :client_tel,
                        client_mobile = :client_mobile,
                        client_ass = :client_ass
                        WHERE client_id = :cliID            
                    ");
            $sql->execute(array(
                'cliID' => $cliID ? $cliID : null,
                'client_lname' => isset($_POST['cliLname']) ? $_POST['cliLname'] : null,
                'client_fname' => isset($_POST['cliFname']) ? $_POST['cliFname'] : null,
                'client_mname' => isset($_POST['cliMname']) ? $_POST['cliMname'] : null,
                'client_add1' => isset($_POST['cliAdd1']) ? $_POST['cliAdd1'] : null,
                'client_zipcode' => isset($_POST['cliZip']) ? $_POST['cliZip'] : null,
                'client_email' => isset($_POST['cliEma']) ? $_POST['cliEma'] : null,
                'client_tel' => isset($_POST['cliTelNo']) ? $_POST['cliTelNo'] : null,
                'client_mobile' => isset($_POST['cliMobNo']) ? $_POST['cliMobNo'] : null,
                'client_ass' => isset($_POST['assAge']) ? $_POST['assAge'] : null
            ));


            $sqlRec = $handler->prepare("UPDATE recipient SET
                            recipient_lname = :recipient_lname,
                            recipient_fname = :recipient_fname,
                            recipient_mname = :recipient_mname,
                            recipient_add1 = :recipient_add1,
                            recipient_zipcode = :recipient_zipcode,
                            recipient_email = :recipient_email,
                            recipient_tel = :recipient_tel,
                            recipient_mobile = :recipient_mobile
                            WHERE recipient_id = :recID
                        ");
            
            $sqlRec->execute(array(
                        'recID' => $recID ? $recID : null,
                        'recipient_lname' => isset($_POST['recLname']) ? $_POST['recLname'] : null,
                        'recipient_fname' => isset($_POST['recFname']) ? $_POST['recFname'] : null,
                        'recipient_mname' => isset($_POST['recMname']) ? $_POST['recMname'] : null,
                        'recipient_add1' => isset($_POST['recAdd1']) ? $_POST['recAdd1'] : null,
                        'recipient_zipcode' => isset($_POST['recZip']) ? $_POST['recZip'] : null,
                        'recipient_email' => isset($_POST['recEma']) ? $_POST['recEma'] : null,
                        'recipient_tel' => isset($_POST['recTelNo']) ? $_POST['recTelNo'] : null,
                        'recipient_mobile' => isset($_POST['recMobNo']) ? $_POST['recMobNo'] : null
                    ));
            echo 0;
        }


       

    }else if(!empty($_POST['del']) && !empty($_POST['cliID'])){
        $cliID = $_POST['cliID'];
        $recID = $_POST['recDelID'];
        

        $chkCli = $handler->prepare("SELECT client_id FROM client_recipient WHERE client_id =?");
        $chkCli->execute(array($cliID));
        
        if ($chkCli->rowCount() > 1) {
            $sql = $handler->prepare("DELETE FROM client_recipient WHERE client_id =? AND recipient_id=?");
            $sql->execute(array($cliID,$recID));

            $sql = $handler->prepare("DELETE FROM recipient WHERE recipient_id=?");
            $sql->execute(array($recID));
        }else{
            $sql = $handler->prepare("DELETE FROM client WHERE client_id=?");
            $sql->execute(array($cliID));
            
            $sql = $handler->prepare("DELETE FROM recipient WHERE recipient_id=?");
            $sql->execute(array($recID));
            
            $sql = $handler->prepare("DELETE FROM client_recipient WHERE client_id =? AND recipient_id=?");
            $sql->execute(array($cliID,$recID));
        }
		

    }else if (!empty($_POST['cliLname']) && !empty($_POST['recLname'])) {
        $compcodeCli = "CLI";
        $comcodeRec = "REC";


        $lname = $_POST['cliLname'];
        $fname = $_POST['cliFname'];
        $add = $_POST['cliAdd1'];
        $tel = $_POST['cliTelNo'];
        $email = $_POST['cliEma'];
        $mob = $_POST['cliMobNo'];

        $chkClient = $handler->prepare("SELECT 
                    client_lname, 
                    client_fname, 
                    client_add1,
                    client_email,
                    client_tel,
                    client_mobile 
                    FROM client WHERE 
                    client_lname=? AND client_fname=? AND
                    client_add1=? AND client_email=? AND
                    client_tel=? AND client_mobile=?
                ");

        $chkClient->execute(array($lname,$fname,$add,$email,$tel,$mob));
        
        if ($chkClient->rowCount()) {
            echo 2;
		}else{
            $chkSqlCli = $handler->query("SELECT client_id FROM client ORDER BY client_indate DESC");
            if ($chkSqlCli->rowCount()) {
                $r = $chkSqlCli->fetch(PDO::FETCH_OBJ);
                $cus_con = substr($r->client_id, 3);
                $convert = $cus_con + 1;
            }else{
                $convert = 1;
            }
    
            $chkSqlRec = $handler->query("SELECT recipient_id FROM recipient ORDER BY recipient_indate DESC");
            if ($chkSqlRec->rowCount()) {
                $row = $chkSqlRec->fetch(PDO::FETCH_OBJ);
                $cus_con_rec = substr($row->recipient_id, 3);
                $convertRec = $cus_con_rec + 1;
            }else{
                $convertRec = 1;
            }
            
            $client_id =  $compcodeCli.str_pad($convert, 5, "0", STR_PAD_LEFT);
            $recipient_id =  $comcodeRec.str_pad($convertRec, 5, "0", STR_PAD_LEFT);
            
            #save the client
            $sqlCli = $handler->prepare("INSERT INTO client
                    (`client_id`,
                    `client_lname`,
                    `client_fname`,
                    `client_mname`,
                    `client_add1`,
                    `client_zipcode`,
                    `client_email`,
                    `client_tel`,
                    `client_mobile`,
                    `client_ass`,
                    `client_indate`
                    )
                VALUES(
                    :client_id,
                    :client_lname,
                    :client_fname,
                    :client_mname,
                    :client_add1,
                    :client_zipcode,
                    :client_email,
                    :client_tel,
                    :client_mobile,
                    :client_ass,
                    NOW()
                    ) 
            ");
    
            $sqlCli->execute(array(
                'client_id' => $client_id ? $client_id : null,
                'client_lname' => isset($_POST['cliLname']) ? $_POST['cliLname'] : null,
                'client_fname' => isset($_POST['cliFname']) ? $_POST['cliFname'] : null,
                'client_mname' => isset($_POST['cliMname']) ? $_POST['cliMname'] : null,
                'client_add1' => isset($_POST['cliAdd1']) ? $_POST['cliAdd1'] : null,
                'client_zipcode' => isset($_POST['cliZip']) ? $_POST['cliZip'] : null,
                'client_email' => isset($_POST['cliEma']) ? $_POST['cliEma'] : null,
                'client_tel' => isset($_POST['cliTelNo']) ? $_POST['cliTelNo'] : null,
                'client_mobile' => isset($_POST['cliMobNo']) ? $_POST['cliMobNo'] : null,
                'client_ass' => isset($_POST['assAge']) ? $_POST['assAge'] : null
            ));
    
            #save to recipient
            $sqlRec = $handler->prepare("INSERT INTO recipient
                    (`recipient_id`,
                    `recipient_lname`,
                    `recipient_fname`,
                    `recipient_mname`,
                    `recipient_add1`,
                    `recipient_zipcode`,
                    `recipient_email`,
                    `recipient_tel`,
                    `recipient_mobile`,
                    `recipient_indate`
                    )
                VALUES(
                    :recipient_id,
                    :recipient_lname,
                    :recipient_fname,
                    :recipient_mname,
                    :recipient_add1,
                    :recipient_zipcode,
                    :recipient_email,
                    :recipient_tel,
                    :recipient_mobile,
                    NOW()
                    ) 
            ");
    
            $sqlRec->execute(array(
                'recipient_id' => $recipient_id ? $recipient_id : null,
                'recipient_lname' => isset($_POST['recLname']) ? $_POST['recLname'] : null,
                'recipient_fname' => isset($_POST['recFname']) ? $_POST['recFname'] : null,
                'recipient_mname' => isset($_POST['recMname']) ? $_POST['recMname'] : null,
                'recipient_add1' => isset($_POST['recAdd1']) ? $_POST['recAdd1'] : null,
                'recipient_zipcode' => isset($_POST['recZip']) ? $_POST['recZip'] : null,
                'recipient_email' => isset($_POST['recEma']) ? $_POST['recEma'] : null,
                'recipient_tel' => isset($_POST['recTelNo']) ? $_POST['recTelNo'] : null,
                'recipient_mobile' => isset($_POST['recMobNo']) ? $_POST['recMobNo'] : null
            ));
    
            $sqlCR = $handler->prepare("INSERT client_recipient(`client_id`,`recipient_id`,`cp_indate`) 
                    VALUES(:client_id,:recipient_id,NOW())");
    
            $sqlCR->execute(array('client_id' => $client_id , 'recipient_id' => $recipient_id ));
    
            echo 0;

        }


    }else if(isset($_POST['clientID'])){
        
        $clientID = $_POST['clientID'];
        $recID = $_POST['recID'];
        $result = "";

        $sql = $handler->prepare('SELECT 
                                    client.client_id,
                                    client.client_lname,
                                    client.client_fname,
                                    client.client_mname, 
                                    client.client_add1,
                                    client.client_zipcode,
                                    client.client_email,
                                    client.client_tel,
                                    client.client_mobile,
                                    client.client_ass,
                                    client_recipient.recipient_id,
                                    recipient.recipient_lname,
                                    recipient.recipient_fname,
                                    recipient.recipient_mname,
                                    recipient.recipient_add1,
                                    recipient.recipient_zipcode,
                                    recipient.recipient_email,
                                    recipient.recipient_tel,
                                    recipient.recipient_mobile
                                    FROM client INNER JOIN 
                                    client_recipient ON 
                                    client.client_id = client_recipient.client_id
                                    INNER JOIN recipient
                                    ON client_recipient.recipient_id = recipient.recipient_id WHERE
                                    client_recipient.client_id = ? AND client_recipient.recipient_id = ?
                                    ORDER BY client.client_indate DESC
                                ');
        $sql->execute(array($clientID, $recID));

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $result[] = array(
                'client_id' => $row->client_id,
                'client_lname' => $row->client_lname,
                'client_fname' => $row->client_fname,
                'client_mname' => $row->client_mname,
                'client_add1' => $row->client_add1,
                'client_zipcode' => $row->client_zipcode,
                'client_email' => $row->client_email,
                'client_tel' => $row->client_tel,
                'client_mobile' => $row->client_mobile,
                'client_ass' => $row->client_ass,
                'recipient_id' => $row->recipient_id,
                'recipient_lname' => $row->recipient_lname,
                'recipient_fname' => $row->recipient_fname,
                'recipient_mname' => $row->recipient_mname,
                'recipient_add1' => $row->recipient_add1,
                'recipient_zipcode' => $row->recipient_zipcode,
                'recipient_email' => $row->recipient_email,
                'recipient_tel' => $row->recipient_tel,
                'recipient_mobile' => $row->recipient_mobile 
            );
        }

        echo json_encode($result);
    }else{
        $result ="";
        $sql = $handler->query('SELECT 
                                client.client_id,
                                client.client_lname,
                                client.client_fname,
                                client.client_mname, 
                                client.client_add1,
                                client.client_tel,
                                client.client_mobile,
                                client.client_ass,
                                client_recipient.recipient_id,
                                recipient.recipient_lname,
                                recipient.recipient_fname,
                                recipient.recipient_mname,
                                recipient.recipient_add1,
                                recipient.recipient_tel,
                                recipient.recipient_mobile
                                FROM client INNER JOIN 
                                client_recipient ON 
                                client.client_id = client_recipient.client_id
                                INNER JOIN recipient
                                ON client_recipient.recipient_id = recipient.recipient_id
                                ORDER BY client.client_indate DESC
                            ');

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            if ($row->client_mname!="") {
				$mname = ucfirst($row->client_mname).".";
			}else{
				$mname = "";
            }
            
            if ($row->recipient_mname!="") {
				$recmname = ucfirst($row->recipient_mname).".";
			}else{
				$recmname = "";
			}

            $fullname = ucfirst($row->client_lname)." ".ucfirst($row->client_fname)." ".$mname;
            $recfullname = ucfirst($row->recipient_lname)." ".ucfirst($row->recipient_fname)." ".$recmname;
            $result[] = array(
                'client_chk' => $row->client_id,
                'client_id' => $row->client_id,
                'fullname' => $fullname,
                'client_add1' => $row->client_add1,
                'client_tel' => $row->client_tel,
                 'client_mobile' => $row->client_mobile,
                'client_ass' => $row->client_ass,
                'recipient_id' => $row->recipient_id,
                'rec_fullname' => $recfullname,
                'recipient_add1' => $row->recipient_add1,
                'recipient_tel' => $row->recipient_tel,
                'recipient_mobile' => $row->recipient_mobile
            );
        }

        echo json_encode($result);
    }
?>