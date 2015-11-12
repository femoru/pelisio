<?php
	
	require 'db.php';

	$db = new DBmysql('192.168.0.93','pelisio','pel2015','pelisio');

	$temp = $db->consulta("SELECT codigo FROM pelicula where activo = 1");

	$pila = array();
	foreach($temp as $clave => $valor){
		$pila[] = $clave;
	}
	
	echo json_encode($pila);
?>