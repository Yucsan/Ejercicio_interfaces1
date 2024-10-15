<?php 

  session_start();

  if (!isset($_SESSION['idUsu'])) {
    header('Location: index.php');
  }

	if($_POST){
		print_r($_POST);

		$nombre = $_POST['nombreUsu'];
		$correo = $_POST['correo'];;
		$clave = $_POST['clave'];;
		$reClave = $_POST['reClave'];;
		$fecha = $_POST['fecha'];

		if ((isset($correo) && !empty($correo)) && (isset($nombre) && !empty($nombre)) && (isset($clave) && !empty($clave)) && (isset($reClave) && !empty($reClave)) && (isset($fecha) && !empty($fecha))) {

			if ( $clave == $reClave ){
				require '../includes/conexion.inc.php';
					$sqlExisteCorreo = "
			 		SELECT correo_usuario
			 			FROM usuario
			 			WHERE correo_usuario LIKE '".$correo."';
			 	";
			 	$queryExisteCorreo = mysqli_query($conectar, $sqlExisteCorreo);
			 	if (mysqli_num_rows($queryExisteCorreo) > 0) {
					echo "Ese correo ya está registrado. Utilice otro";
				}else{
					echo "Inserto algo";
					// Rescate de número de ID

					$id_usuario = ""; // variable suma de ID
						$sqlnumId = "  
							SELECT max(id_usuario)as idUsu from usuario;
						";
						$queryId_usuario = mysqli_query($conectar, $sqlnumId);
						$rowId_usuario = mysqli_fetch_assoc($queryId_usuario);
					  echo $id_numId = $rowId_usuario['idUsu']+1; //suma ultimo ID

					  // INSERTO LOS DATOS DEL NMUEVO USUARIO
					  
					  $insertaUsu = '
					  	INSERT INTO usuario values("'.$id_numId.'", 1, "'.$nombre.'", "'.$correo.'", "'.password_hash($clave, PASSWORD_DEFAULT).'", "'.$fecha.'", "'.$fecha.'", 1 , 1 );

					  ';
					  $queryInsertaUsu = mysqli_query($conectar, $insertaUsu);
						
					  echo "inserta";


				}
			}

			// if ($clave == $reClave) {
			// 	require 'includes/conexion.inc.php';

			// 	$sqlExisteCorreo = "
			// 		SELECT correo_usuario
			// 			FROM usuario
			// 			WHERE correo_usuario LIKE '".$correo."';
			// 	";

			// 	$queryExisteCorreo = mysqli_query($conectar, $sqlExisteCorreo);

			// 	if (mysqli_num_rows($queryExisteCorreo) > 0) {
			// 		echo "Ese correo ya está registrado. Utilice otro";
			// 	}else{
			// 		$sqlNuevoUsuario = "
			// 			INSERT INTO usuario
			// 				VALUES (null, '".$nombre."', '".$correo."', '".password_hash($clave, PASSWORD_DEFAULT)."', 'users/hombre.jpg', '".$fdn."', '', '', NOW(), '".$sexo."', 1, 0, 0, 0, 2);
			// 		";
			// 		$queryNuevoUsuario = mysqli_query($conectar, $sqlNuevoUsuario);
			// 	if (!$queryNuevoUsuario) {
			// 			echo "Ocurrió un error inesperado. Inténtelo más tarde 1";
			// 	}

		}
	}

		$roles = array();
		require '../includes/conexion.inc.php';
		$db_rol='  
				SELECT nombre_rol FROM rol;
		';
		$querydb_rol = mysqli_query($conectar, $db_rol);
		mysqli_close($conectar);
		while ($rowDb_rol = mysqli_fetch_assoc($querydb_rol)) {
			array_push($roles, $rowDb_rol['nombre_rol']);
		}
/*
		if(!empty($roles)){
			print_r($roles);
		}
*/


 ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
 	<link rel="stylesheet" href="assets/css/main.css">
 	<title>Panel de control Fernando Sevilla</title>
 </head>
 <body>

 		<h1>PANEL DE CONTROL</h1>
 	<main>
 		<form action="" method="POST" name="nuevoUsuario">
 			<h3>Nuevo Usuario</h3>
 				<input type="text" name="nombreUsu" value="" placeholder="Nuevo Usuario"><br>
 				 <label for="cars">ROL:</label>
					<select class="rol" id="cars" name="rol">
						<?php 

							foreach ($roles as $value) {
								echo "<option value=".$value.">".$value."</option>";
							}

						 ?>
					</select><br> 
 				<input type="mail" name="correo" value="" placeholder="correo"><br>
 				<input type="clave" name="clave" value="" placeholder="clave"><br>
 				<input type="clave" name="reClave" value="" placeholder="Confirma clave"><br>
 				<input id="fechita" type="text" value="" name="fecha"><br>
 				<button class="btn agrega">AGREGAR</button>
 		</form>
 	</main>	

<script type="text/javascript">

 
		const nuevaFecha = new Date();
		const month = nuevaFecha.getMonth()+1
		const mesesillo = month.toString().padStart(2, "0");
		// HORA ****************************************
			hora = nuevaFecha.getHours().toString().padStart(2, '0');
			minutos = nuevaFecha.getMinutes().toString().padStart(2, '0');
			segundos = nuevaFecha.getSeconds().toString().padStart(2, '0');
		const timestamp = nuevaFecha.getFullYear() + "-" +month+"-" +nuevaFecha.getDate()+ " " + hora+":"+minutos+":"+segundos;


		setInterval(function(){
			var fecha = new Date();
			hora = fecha.getHours().toString().padStart(2, '0');
			minutos = fecha.getMinutes().toString().padStart(2, '0');
			segundos = fecha.getSeconds().toString().padStart(2, '0');
			document.getElementById('fechita').value = fecha.getFullYear() + "-" +mesesillo+"-" +nuevaFecha.getDate()+ " " + hora+":"+minutos+":"+segundos;
		}, 1000);

		console.log(timestamp);

</script>

 </body>
 </html>