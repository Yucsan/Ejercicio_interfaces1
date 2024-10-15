<?php 

if($_GET){
	session_start();

	//print_r($_POST);

	require '../includes/conexion.inc.php';
	
		$id = $_SESSION['idUsu'];
	
	$sqlActualizaEstado = "
		UPDATE usuario
			SET finc_usuario = '".$_GET['fecha']." -- hora: ".$_GET['hora']."'
			WHERE id_usuario LIKE ".$id.";
	";
	$queryActualizaEstado = mysqli_query($conectar, $sqlActualizaEstado);
	
	session_destroy();
	header('Location: index.php');
}

 ?>
