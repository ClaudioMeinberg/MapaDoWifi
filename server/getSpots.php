<?php 
	require_once('inc/conf.php'); 
 	require_once('inc/conn.php'); 

	$lat = $_GET['lat'];
	$long = $_GET['long'];

	if (!is_numeric($lat) || !is_numeric($long)) die('Error: Invalid data.');

	header('Content-Type: application/javascript');

	print('[');

	$strSQL = "SELECT lat, `long`, type, name, address, SSID, protected, password, effdt FROM mapa";
	$query = mysql_query($strSQL);

	while($rs = mysql_fetch_assoc($query)){
		print json_encode($rs). ',' ;
	}
	print(']');
?>