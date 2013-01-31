<?php 
	require_once('inc/conf.php'); 
 	require_once('inc/conn.php'); 

	$lat = $_GET['lat'];
	$long = $_GET['long'];

	if (!is_numeric($lat) || !is_numeric($long)) die('Error: Invalid data.');

	//aumenta o range da busca
	$lat = $lat > 0 ? substr($lat, 0, 5) : substr($lat, 0, 6);
	$long = $long > 0 ? substr($long, 0, 5) : substr($long, 0, 6);

	$strSQL = "SELECT lat, `long`, type, name, address, SSID, protected, password, effdt FROM mapa WHERE lat LIKE '$lat%' AND `long` LIKE '$long%'";
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

	//header('Content-Type: application/javascript');
	header('Content-Type: application/json');
	print json_encode($results);
?>