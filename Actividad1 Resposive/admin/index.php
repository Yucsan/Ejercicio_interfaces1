<?php 


if ( isset($_POST['sex_code']) ) {
print_r($_POST);
//echo "<br><br>";
	$correo = $_POST['correo'];
	$clave = $_POST['clave'];

	$baseClave ="";
	$baseCorreo="";

	require '../includes/conexion.inc.php';

	$sqlLogin = "
		SELECT *
			FROM usuario
			WHERE correo_usuario LIKE '".$correo."';
	";
	$queryLogin = mysqli_query($conectar, $sqlLogin);
	if (mysqli_num_rows($queryLogin) < 1) {
				echo 'Usuario y/o Contraseña incorrectos';
			}else{
				$clave = $_POST['clave'];

				while ($rowLogin = mysqli_fetch_assoc($queryLogin)) {
	
				      if (password_verify($clave, $rowLogin['clave_usuario'])) {
    						echo "entra";
    								session_start();
    								$_SESSION['idRol'] = $rowLogin['id_rol'];
    								$_SESSION['idUsu'] = $rowLogin['id_usuario'];
    								$_SESSION['nombreUsu'] = $rowLogin['nombre_usuario'];
    								$_SESSION['correoUsu'] = $rowLogin['correo_usuario'];
    								$_SESSION['estadoUsu'] = $rowLogin['estado_usuario'];
    								$_SESSION['fechaConectFinal'] = $rowLogin['fecha_conect_final'];
  
    								header('Location: main.php');
    		
    					}else{
    						echo 'Usuario y/o Contraseña incorrectos';
    					}

				}
			}


}
		
//  || $_SESSION['rolUsu'] != 'Admin'

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Yo">
	<meta name="copyright" content="">
	<meta name="contact" content="mantenimiento@ejemplo.com">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="robots" content="NoIndex, NoFollow">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Link para utilizar FontAwesome 6  -->
	<link rel="stylesheet" data-purpose="Layout StyleSheet" title="Default" disabled="" href="/css/app-937c1ff7d52fd6f78dd9322599e2b5d4.css?vsn=d">
  <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-2cb75d54de7a2cbae84bbe77a389bb5d.css?vsn=d">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">
  <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">
  <!-- ******* -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/estilos_login.css">
	<link rel="icon" type="icon/png" href="favicon.png">
	<title>Login Panel Dreamlove01</title>
</head>
<body>

	<main role="main" id="principal">
		<div>
			<h4 id="bienvenido">Bienvenido</h4>
			<section>
				<form action="" method="POST" name="Inserta" style="">
					<article>
						<input class="ancho_inp" type="mail" name="correo" placeholder="correo" required>
						<input class="ancho_inp" type="password" name="clave" placeholder="password" required>
						<input type="hidden" value="" name="fecha" id="fecha">
						<input type="hidden" value="" name="hora" id="hora">
						<button class="btn mt-3" type="submit" name="sex_code">
						<!-- <button class="btn btn-success mt-3" type="submit" name="sex_code" style="width: 120px;"> -->INGRESAR</button>
					</article>
				</form>

			</section>
		</div>
	</main>

	<script type="text/javascript">
		//FECHA
		var fecha = new Date();
		let mes = fecha.getMonth()+1
		let fechita = fecha.getDate() + "-"+ mes+ "-" +fecha.getFullYear();
		document.querySelector('#fecha').value = fechita;

		//HORA
		setInterval(function(){
			var fecha = new Date();
			hora = fecha.getHours().toString().padStart(2, '0');
			minutos = fecha.getMinutes().toString().padStart(2, '0');
			segundos = fecha.getSeconds().toString().padStart(2, '0');
			document.getElementById('hora').value = hora+":"+minutos+":"+segundos;
		}, 1000);


// 
		const nuevaFecha = new Date();
		const month = nuevaFecha.getMonth()+1
		// HORA ****************************************
		var fecha = new Date();
			hora = fecha.getHours().toString().padStart(2, '0');
			minutos = fecha.getMinutes().toString().padStart(2, '0');
			segundos = fecha.getSeconds().toString().padStart(2, '0');

		const timestamp = fecha.getFullYear() + "-" +month+"-" +nuevaFecha.getDate()+ " " + hora+":"+minutos+":"+segundos;


		console.log(timestamp);

	</script>

</body>
</html>