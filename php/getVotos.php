<?php
	
	require 'db.php';

	$db = new DBmysql('192.168.0.93','pelisio','pel2015','pelisio');

	$temp = $db->consulta("SELECT cod, SUM(1) otro FROM votos group by cod");

echo json_encode($temp);
?>