<?php
	$conn = mysql_connect($DB_SERVER, $DB_USER, $DB_PASS) or die('Could not connect: ' . mysql_error());
	mysql_select_db($DB_NAME, $conn) or die('Could not select db: ' . mysql_error());
?>