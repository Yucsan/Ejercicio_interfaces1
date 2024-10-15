<?php

	// error_reporting(0);

	$servidorBD = "localhost";
	$usuarioBD = "root";
	$claveBD = "YucsanChang37";
	$nombreBD = "fersevilla";

	$conectar = mysqli_connect($servidorBD, $usuarioBD, $claveBD, $nombreBD);

	mysqli_set_charset($conectar, "utf8mb4");

	if (!$conectar) {
		die('Error al conectar con la BBDD. Inténtelo más tarde');
	}

?>