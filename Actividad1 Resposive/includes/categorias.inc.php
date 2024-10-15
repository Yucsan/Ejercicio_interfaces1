<?php 

	$i=1;
	$categorias = $_POST['catego'];
	while ($i <= $categorias){

			if ($i==1) {
				'<div class="activo" id="t'.$i.'" onclick="ver(this.id);"><img class="imgsCategorias" src="assets/rsc/img/logo_aqua.png"></div>';
			} 			
 			if($i<=2){
 				'<div class="noActivo" id="t'.$i.'" onclick="ver(this.id);"><img class="imgsCategorias" src="assets/rsc/img/logo_aqua.png"></div>';
 			}
 		$i++;	
	}

 ?>