<?php
	require_once('handler.php');

	if(isset($_POST['lotNo'])){
		$sqlChk = $handler->prepare("SELECT man_lotNo FROM manifest WHERE man_lotNo=?");
		$sqlChk->execute(array($_POST['lotNo']));

		if($sqlChk->rowCount()){
			echo 1;
		}else{
			$lotNo = $_POST['lotNo'];
			$sql = $handler->prepare('INSERT INTO manifest(`man_lotNo`,`man_indate`) VALUES(?,now())');
			$sql->execute(array($_POST['lotNo']));

			foreach ($_POST['shipNo'] as $key) {
				$sql = $handler->prepare('INSERT INTO manifest_record(`man_lotNo`,`ship_invonum`) VALUES(?,?)');
				$sql->execute(array($_POST['lotNo'], $key));
		
			}
			echo 0;
		}
	}elseif(isset($_POST['generate'])){
		$sql = $handler->prepare('SELECT 
			shipment.ship_invonum, 
			shipment.ship_indate, 
			CONCAT(client_fname," ", client_mname," ", client_lname) as fullname 
			FROM shipment INNER JOIN client 
			ON shipment.client_id = client.client_id 
			WHERE shipment.ship_lot=?');

		$sql->execute(array($_POST['generate']));

		if($sql->rowCount()){
			while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
				$fullname = $row->fullname;
				$result[] = array(
					'id' => $row->ship_invonum,
					'invoice' => $row->ship_invonum." | ".$fullname
				);
			}
			echo json_encode($result);
		}else{
			echo 0;
		}

		
		
	}elseif(isset($_POST['lotNoEdit'])) {
		$oldLot = $_POST['lotNoHide'];
		$newLot = $_POST['lotNoEdit'];

		if($oldLot != $newLot){
			$sqlChk = $handler->prepare("SELECT man_lotNo FROM manifest WHERE man_lotNo=?");
			$sqlChk->execute(array($newLot));

			if($sqlChk->rowCount()){
				echo 1;
			}else{

				$sql = $handler->prepare("UPDATE manifest SET man_lotNo=? WHERE man_lotNo=?");
				$sql->execute(array($newLot, $oldLot));

				//delete all and insert
				foreach ($_POST['shipNoEdit'] as $key) {
					$sql = $handler->prepare('DELETE FROM manifest_record WHERE man_lotNo=?');
					$sql->execute(array($oldLot));

					$sql = $handler->prepare('INSERT INTO manifest_record(`man_lotNo`,`ship_invonum`) VALUES(?,?)');
					$sql->execute(array($newLot, $key));
			
				}

				echo 0;
			}
		}else{
				foreach ($_POST['shipNoEdit'] as $key) {
					$sql = $handler->prepare('DELETE FROM manifest_record WHERE man_lotNo=?');
					$sql->execute(array($oldLot));
			
				}

				foreach ($_POST['shipNoEdit'] as $key) {
					$sql = $handler->prepare('INSERT INTO manifest_record(`man_lotNo`,`ship_invonum`) VALUES(?,?)');
					$sql->execute(array($oldLot, $key));
				}

			echo 0;
		}

	}elseif (isset($_POST['del'])) {
		$lot = $_POST['lot'];
		$sql = $handler->prepare('DELETE FROM manifest WHERE man_lotNo=?');
		$sql->execute(array($lot));

		$sql = $handler->prepare('DELETE FROM manifest_record WHERE man_lotNo=?');
		$sql->execute(array($lot));

		echo 0;
	}elseif (isset($_POST['formData'])) {

		$sql = $handler->prepare('SELECT shipment.ship_invonum, shipment.ship_indate, CONCAT(client_fname," ", client_mname," ", client_lname) as fullname FROM shipment INNER JOIN client ON shipment.client_id = client.client_id INNER JOIN manifest_record ON manifest_record.ship_invonum = shipment.ship_invonum WHERE manifest_record.man_lotNo=?');
		$sql->execute(array($_POST['formData']));

		while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
			$fullname = $row->fullname;
			$result[] = array(
				'id' => $row->ship_invonum,
				'invoice' => $row->ship_invonum." | ".$fullname
			);
		}

		echo json_encode($result);

	}elseif(isset($_POST['manifestData'])){
		$sql = $handler->prepare('SELECT manifest.man_lotNo, manifest.man_indate FROM manifest WHERE manifest.man_lotNo=?');
		$sql->execute(array($_POST['manifestData']));

		while ($row = $sql->fetch(PDO::FETCH_OBJ)) {
			$dateCre = date_create($row->man_indate);
            $date = date_format($dateCre, 'M. d, Y');
			$result[] = array(
				'lot' => $row->man_lotNo,
				'date' => $date,
				'today' =>date("m/d/Y")
			);
		}

		echo json_encode($result);

	}elseif(isset($_POST['print'])){
		$result = "";
		$sql = $handler->prepare("SELECT 
                        shipment.ship_invonum, 
                        shipment.ship_lot, 
                        shipment.ship_date,
                        shipment.ship_box,
                        client.client_lname,
                        client.client_fname,
                        client.client_mname,
                        client.client_tel,
                        recipient.recipient_lname,
                        recipient.recipient_fname,
                        recipient.recipient_mname,
                        recipient.recipient_mobile,
                        recipient.recipient_add1,
                        shipment.ship_area,
                        agent.agent_name,
                        shipment.ship_indate
                        FROM shipment INNER JOIN
                        client on shipment.client_id = client.client_id
                        INNER JOIN recipient ON shipment.recipient_id = recipient.recipient_id
                        LEFT JOIN agent ON shipment.agent_code = agent.agent_code
                        INNER JOIN manifest_record ON shipment.ship_invonum = manifest_record.ship_invonum
                        WHERE manifest_record.man_lotNo=?
                        ORDER BY ship_indate DESC
                ");
		$sql->execute(array($_POST['print']));

        while ($row=$sql->fetch(PDO::FETCH_OBJ)) {

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

            $cliName = ucfirst($row->client_lname)." ".ucfirst($row->client_fname)." ".$mname;
            $recName = ucfirst($row->recipient_lname)." ".ucfirst($row->recipient_fname)." ".$recmname;
            $dateCre = date_create($row->ship_indate);
            $date = date_format($dateCre, 'M. d, Y | h:i a');
            
            $shipDateCre = date_create($row->ship_date);
            $shipDate = date_format($shipDateCre, 'M. d, Y');
            $result[] = array(
                'shipid' => $row->ship_invonum,
                'invoice' => $row->ship_invonum,
                'tel' => $row->client_tel,
                'address' => $row->recipient_add1,
                'cliName' => $cliName,
                'recName' => $recName,
                'box' => $row->ship_box,
                'area' => $row->ship_area,
                'ageName' => $row->agent_name,
                'contact' => $row->recipient_mobile
            );
        }

        echo json_encode($result);
	}else{
		$result = "";
		//$cnt = $handler->query("SELECT *")
		$sql = $handler->query("SELECT COUNT(ship_invonum) as cnt, man_lotNo FROM manifest_record GROUP BY man_lotNo");

		while ($row = $sql->fetch(PDO::FETCH_OBJ)) {

			$sqlSel = $handler->prepare("SELECT man_indate FROM manifest WHERE man_lotNo=?");
			$sqlSel->execute(array($row->man_lotNo));

			while ($rowSel = $sqlSel->fetch(PDO::FETCH_OBJ)) {
				$dateCre = date_create($rowSel->man_indate);
            	$date = date_format($dateCre, 'M. d, Y | h:i a');
			}

			

			$result[] = array(
				'id' => $row->man_lotNo , 
				'date' => $date,
				'total' => $row->cnt
			);
		}

		echo json_encode($result);
	}
?>