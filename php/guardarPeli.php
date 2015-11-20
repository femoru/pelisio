<?php
	session_start();
	require 'db.php';
	$movies = ($_POST['movies']);
	$db = new DBmysql('192.168.0.93','pelisio','pel2015','pelisio');
	$result = $db->ejecutar("DELETE FROM pelicula;");
	$result = $db->ejecutar("DELETE FROM votos;");
	
	for ($i = 0; $i < count($movies); $i++) {
		$result = $db->ejecutar("INSERT INTO pelicula(codigo,propuesta) VALUES(".$movies[$i].",'".$_SESSION["userid"]."');");
	}
	$db->desconectar();
?>