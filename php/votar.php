<?php

	require 'db.php';

	$ipvisitante= $_SERVER["REMOTE_ADDR"];
	$idpelicula = $_REQUEST['id'];

	$db = new DBmysql('192.168.0.93','pelisio','pel2015','pelisio');
  	
  	$temp1 = $db->consulta2("SELECT IFNULL(COUNT(pip),0) AS votos FROM votos WHERE pip = '".$_SERVER["REMOTE_ADDR"]."';");

	if($temp1['votos'] == '0'){
		$statement = $db->statment("INSERT INTO votos (cod, pip) VALUES(?, ?)");
		$statement->bind_param('is', $idpelicula, $ipvisitante);
		$statement->execute();
		$statement->close();
		$temp = $db->consulta2("SELECT cod, SUM(1) AS total FROM votos WHERE cod = ".$idpelicula);
	  	echo $temp['total'];
	}else{
		echo 0;
	}
	$db->desconectar();
?>