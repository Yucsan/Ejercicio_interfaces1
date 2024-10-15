<?php 

require '../includes/conexion.inc.php';

$sqlnumId = "  
			SELECT max(id_usuario)as idUsu from usuario;
		";
		$queryId_usuario = mysqli_query($conectar, $sqlnumId);

		$rowId_usuario = mysqli_fetch_assoc($queryId_usuario);
		print_r($rowId_usuario);
		echo $rowId_usuario['idUsu'];
			     
			

 ?>