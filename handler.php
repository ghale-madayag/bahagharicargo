<?php
	// error_reporting(E_ALL ^ E_DEPRECATED);
	// error_reporting(0);
	try {
		$handler = new PDO('mysql:host=182.50.133.84:3306;dbname=bahaghari_db','adminroot','Db5s#20m');
		$handler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
		die();	
	}
?>