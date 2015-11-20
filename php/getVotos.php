<?php
	
	require 'db.php';

	$cod = $_POST['cod'];
	$db = new DBmysql('192.168.0.93','pelisio','pel2015','pelisio');

	$temp = $db->consulta2("SELECT IFNULL(COUNT(cod),0) total FROM votos WHERE cod =".$cod);

	echo($temp['total']);

	//echo json_encode($temp);
?>