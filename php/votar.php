<?php

	require 'db.php';

	$ipvisitante= $_SERVER["REMOTE_ADDR"];
	$idpelicula = $_REQUEST['id'];

	$db = new DBmysql('192.168.0.93','pelisio','pel2015','pelisio');
  	
	$statement = $db->statment("INSERT INTO votos (cod, pip) VALUES(?, ?)");
	$statement->bind_param('is', $idpelicula, $ipvisitante);
	$statement->execute();
	$statement->close();

	$temp = $db->consulta("SELECT cod, SUM(1) votos FROM votos group by cod");

	$db->desconectar();


  echo json_encode($temp);
?>