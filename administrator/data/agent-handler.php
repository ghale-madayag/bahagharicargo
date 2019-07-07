<?php
    require_once('handler.php');
    if(!empty($_POST['agCodeHid'])){

        $ageID = $_POST['agCodeHid'];

        $sql = $handler->prepare("UPDATE agent SET 
                agent_name = :agent_name,
                agent_add = :agent_add,
                agent_zip = :agent_zip,
                agent_email = :agent_email,
                agent_bdate = :agent_bdate,
                agent_telephone = :agent_telephone,
                agent_mob = :agent_mob
                WHERE agent_code = :agCode
            ");
        
            $sql->execute(array(
                'agent_name'=> isset($_POST['agName']) ? $_POST['agName'] : null,
                'agent_add'=> isset($_POST['agAdd']) ? $_POST['agAdd'] : null,
                'agent_zip'=> isset($_POST['agZip']) ? $_POST['agZip'] : null,
                'agent_email'=> isset($_POST['agEma']) ? $_POST['agEma'] : null,
                'agent_bdate'=> isset($_POST['agBdate']) ? $_POST['agBdate'] : null,
                'agent_telephone'=> isset($_POST['agTelNo']) ? $_POST['agTelNo'] : null,
                'agent_mob'=> isset($_POST['agMobNo']) ? $_POST['agMobNo'] : null,
                'agCode' => isset($_POST['agCodeHid']) ? $_POST['agCodeHid'] : null
            ));

            echo 0;
        
    }else if(!empty($_POST['agCode'])){
        $ageID = $_POST['agCode'];
        $chkAge = $handler->prepare("SELECT 
                agent_code 
                FROM agent WHERE 
                agent_code = ?
            ");

        $chkAge->execute(array($ageID));

        if($chkAge->rowCount()){
            echo 2;            
        }else{
                $sql = $handler->prepare("INSERT INTO agent(
                `agent_code`,
                `agent_name`,
                `agent_add`,
                `agent_zip`,
                `agent_email`,
                `agent_bdate`,
                `agent_telephone`,
                `agent_mob`
                ) 
                VALUES(
                    :agent_code,
                    :agent_name,
                    :agent_add,
                    :agent_zip,
                    :agent_email,
                    :agent_bdate,
                    :agent_telephone,
                    :agent_mob
                )");

                $sql->execute(array(
                    'agent_code'=> isset($_POST['agCode']) ? $_POST['agCode'] : null,
                    'agent_name'=> isset($_POST['agName']) ? $_POST['agName'] : null,
                    'agent_add'=> isset($_POST['agAdd']) ? $_POST['agAdd'] : null,
                    'agent_zip'=> isset($_POST['agZip']) ? $_POST['agZip'] : null,
                    'agent_email'=> isset($_POST['agEma']) ? $_POST['agEma'] : null,
                    'agent_bdate'=> isset($_POST['agBdate']) ? $_POST['agBdate'] : null,
                    'agent_telephone'=> isset($_POST['agTelNo']) ? $_POST['agTelNo'] : null,
                    'agent_mob'=> isset($_POST['agMobNo']) ? $_POST['agMobNo'] : null
                ));

            echo 0;
        }
        
    }else if(isset($_POST['agentID'])){
        $agentID = $_POST['agentID'];
        $sql = $handler->prepare("SELECT * FROM agent WHERE agent_code = ?");
        $sql->execute(array($agentID));
        $result="";

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $result[] = array(
                'agent_code' => $row->agent_code,
                'agent_name' => $row->agent_name,
                'agent_add' => $row->agent_add,
                'agent_zip' => $row->agent_zip,
                'agent_email' => $row->agent_email,
                'agent_bdate' => $row->agent_bdate,
                'agent_telephone' => $row->agent_telephone,
                'agent_mob' => $row->agent_mob, 
            );
        }

        echo json_encode($result);

    }else if(!empty($_POST['ageDelID'])){
        $agCode = $_POST['ageDelID'];
        $sql = $handler->prepare("DELETE FROM agent WHERE agent_code =?");
        $sql->execute(array($agCode));
        echo 1;
    }else{

        $result="";

        $sql = $handler->query("SELECT * FROM agent");
        $sql->execute();

        while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
            $result[] = array(
                'agenCode' => $row->agent_code,
                'agent_code' => $row->agent_code,
                'agent_name' => $row->agent_name,
                'agent_add' => $row->agent_add
            );
        }

        echo json_encode($result);
    }
?>