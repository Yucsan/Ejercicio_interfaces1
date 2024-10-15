<?php 


// IMAGEN GENERICA DEL BANNER
$general = "";
  $sqlGeneral ='
    SELECT principal_img_cabecera
      FROM img_cabecera
        WHERE id_marca LIKE "'.$identidad.'";
  ';
  $queryGeneral = mysqli_query($conectar, $sqlGeneral);
  while ($rowGeneral = mysqli_fetch_assoc($queryGeneral)) {
    $general = $rowGeneral['principal_img_cabecera'];
    }

    if (mysqli_num_rows($queryGeneral) > 0) { 
    $f_generica = $general; 
  }else{
    $f_generica = 'assets/rsc/img/generica_plantilla.png';
  }

   $existente = "";
   $sqlVerTitu ='
     SELECT cabecera_titular_es
       FROM cabecera
         WHERE id_marca LIKE "'.$identidad.'";  
   ';
   $queryVerTitu = mysqli_query($conectar, $sqlVerTitu);
    while($rowVerTitu = mysqli_fetch_assoc($queryVerTitu)){
     $existente = $rowVerTitu['cabecera_titular_es'];
   }

 ?>

<!-- BANNERRRRRRRR principal -->
  <section class="kenburns-top sectionBanner ibizaBanner" id="particles-js" style="">
  <div class="caja_banner" style="">
    <section id="parte1">
      
      <img id="chica1" src="assets/rsc/img/coquette_banner/chica_lubs2.jpg" alt="">
      <span id="letras1" style="">VEGAN LUBES</span>
      <img id="frascos" src="assets/rsc/img/coquette_banner/frascos.png" alt="">
      <img id="fantasy" src="assets/rsc/img/coquette_banner/fantasy_fondo.jpg" alt="">
      <span id="letras2" style="">VEGAN LEATHER</span>
      <img id="prodFan" src="assets/rsc/img/coquette_banner/fantasy_products.png" alt="">

    </section>
  </div> 
  </section>
  </div>      
</header>

