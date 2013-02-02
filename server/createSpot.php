<?php
	require_once('inc/conf.php'); 
 	require_once('inc/conn.php'); 


 	//TODO: validações e segurança

	$lat = $_POST['hidLat'];
	$long = $_POST['hidLong'];
	$type = $_POST['cboType'];
	$name = $_POST['txtName'];
	$address = $_POST['txtAddress'];
	$SSID = $_POST['txtSSID'];
	$protected = $_POST['cboProtected'];
	$password = $_POST['txtPassword'];

	if (!is_numeric($lat) || !is_numeric($long)) die('Error: Invalid data.');


	$strSQL = "INSERT INTO mapa(lat, `long`, type, name, address, SSID, protected, password) VALUES ('". $lat . "', '" . $long . "', '" . $type . "', '" . $name . "', '" . $address . "', '" . $SSID . "', '" . $protected . "', '" . $password . "');";
	mysql_query($strSQL) or die(mysql_error());

	print 'OK';
?>