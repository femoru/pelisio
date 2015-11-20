<?php
	session_start();
	require 'db.php';
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$db = new DBmysql('192.168.0.93','pelisio','pel2015','pelisio');

	if($result = $db->consulta2("SELECT user,pass,activo FROM usuario WHERE user = '$user';")){
		
		if($result['activo'] != 1){
			echo "3";
		}else if ($result['pass'] != $pass) {
			echo "2";
		}else{
			$_SESSION["userid"] = $user;
			echo "1";
		}
	}else{
		echo 404;
	}
	$db->desconectar();
?>