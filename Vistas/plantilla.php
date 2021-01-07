<!DOCTYPE html>
<html lang=”en”>

<head>
    
    <meta charset=”UTF-8″ />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, 
    minimum-scale1.0, maximum-scale=1.0, user-scalable=no">
    <title>Tienda IMT</title>

    <?php 

        $icono = ControladorPlantilla::ctrEstiloPlantilla();

        echo '<link rel="icon" href="http://localhost/adminIMT/'.$icono['icono'].'">';

        /*============================================
        MANTENER LA RUTA FIJA DEL PROJECTO
        ============================================*/

        $url = Ruta::ctrRuta();

    ?>

    <meta name="title" content="Tienda IMT">
    <meta name="description" content="Refaccionaria IMT">
    <meta name="keywords" content="tortilladoras, masa, mais, refaccionaria">

    <!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>-->
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/plugins/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/plantilla.css?1.2">
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/cabezote.css?1.2">
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/slide.css?1.4">

    <script src="<?php echo $url; ?>Vistas/js/plugins/all.js"></script>
    <script src="<?php echo $url; ?>Vistas/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $url; ?>Vistas/js/plugins/bootstrap.min.js"></script>
    <!-- https://easings.net -->
    <script src="<?php echo $url; ?>Vistas/js/plugins/jquery.easing.js"></script>

</head>

<body> 

<?php

/*=============================================  
CABEZOTE
===============================================*/

include "Modulos/cabezote.php";

/*=============================================  
CONTENIDO DINAMICO
===============================================*/

$rutas = array();
$ruta = null;

if(isset($_GET['ruta'])){

    $rutas = explode("/",$_GET['ruta']);

    $item = "ruta";
    $valor = $rutas[0];

    /*=============================================  
    URL's AMIGABLES CATEGORIAS
    ===============================================*/

    $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item,$valor);

    if($valor == (is_array($rutaCategorias)? $rutaCategorias['ruta']:null)){

        $ruta = $valor;

    }

    /*=============================================  
    URL's AMIGABLES SUBCATEGORIAS
    ===============================================*/

    $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item,$valor);

    foreach($rutaSubCategorias as $key => $value){

        if($valor == $value['ruta']){

            $ruta = $valor;
    
        }

    }

    /*=============================================  
    LISTA BLANCA
    ===============================================*/

    if($ruta != null){

        include "Modulos/productos.php";

    }
    else{

        include "Modulos/error404.php";

    }

}
else{

    include "Modulos/slide.php";

}

?>

<script src="<?php echo $url; ?>Vistas/js/cabezote.js"></script>
<script src="<?php echo $url; ?>Vistas/js/plantilla.js"></script>
<script src="<?php echo $url; ?>Vistas/js/slide.js?1.1"></script>

</body>

</html>