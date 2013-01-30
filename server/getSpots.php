<?php 
	require_once('inc/conf.php'); 
 	require_once('inc/conn.php'); 

	$lat = $_GET['lat'];
	$long = $_GET['long'];

	if (!is_numeric($lat) || !is_numeric($long)) die('Error: Invalid data.');

	//header('Content-Type: application/javascript');
	header('Content-Type: application/json');

	$strSQL = "SELECT lat, `long`, type, name, address, SSID, protected, password, effdt FROM mapa";
	$query = mysql_query($strSQL);

	$results = array();

	while($rs = mysql_fetch_assoc($query)){
	   	$results[] = array(
	      'lat' => $rs['lat'],
	      'long' => $rs['long'],
	      'type' => $rs['type'],
	      'name' => $rs['name'],
	      'address' => $rs['address'],
	      'SSID' => $rs['SSID'],
	      'protected' => $rs['protected'],
	      'password' => $rs['password'],
	      'effdt' => $rs['effdt']
	   	);
	};
	print json_encode($results);
?>