<!DOCTYPE html>
<html lang=”en”>

<head>
    
    <meta charset=”UTF-8″ />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, 
    minimum-scale1.0, maximum-scale=1.0, user-scalable=no">
    <title>Tienda IMT</title>

    <?php 

        session_start();

        $urlServidor = Ruta:: ctrRutaServidor();
        $icono = ControladorPlantilla::ctrEstiloPlantilla();

        echo '<link rel="icon" href="'.$urlServidor.$icono['icono'].'">';

        /*============================================
        MANTENER LA RUTA FIJA DEL PROJECTO
        ============================================*/

        $url = Ruta::ctrRuta();

    ?>

    <meta name="title" content="Tienda IMT">
    <meta name="description" content="Refaccionaria IMT">
    <meta name="keywords" content="tortilladoras, masa, mais, refaccionaria">

    <!--============================================
    PLUGINS DE CSS
    ============================================-->
    <!--<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>-->
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/plugins/fontawesome.css">
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/plugins/sweetalert.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <link type="text/css" media="screen" href="<?php echo $url; ?>Vistas/css/plugins/flexslider.css" rel="stylesheet">

    <!--============================================
    ESTILOS PERSONALIZADOS
    ============================================-->
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/plantilla.css?1.1">
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/cabezote.css?2.1">
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/slide.css?1.0">
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/productos.css?1.2">
    <link rel="stylesheet" href="<?php echo $url; ?>Vistas/css/infoproducto.css?1.1">

    <!--============================================
    PLUGINS DE JAVASCRIPT
    ============================================-->
    <script src="<?php echo $url; ?>Vistas/js/plugins/all.js"></script>
    <script src="<?php echo $url; ?>Vistas/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $url; ?>Vistas/js/plugins/popper.js"></script>
    <script src="<?php echo $url; ?>Vistas/js/plugins/bootstrap.min.js"></script>
    <!-- https://easings.net -->
    <script src="<?php echo $url; ?>Vistas/js/plugins/jquery.easing.js"></script>
    <script src="<?php echo $url; ?>Vistas/js/plugins/jquery.scrollUp.js"></script>
    <script src="<?php echo $url; ?>Vistas/js/plugins/jquery.flexslider.js"></script>
    <script src="<?php echo $url; ?>Vistas/js/plugins/sweetalert.min.js"></script>
    <script>

        var rutaActual = location.href;

    </script>
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
$infoProducto = null;

if(isset($_GET['ruta'])){

    $rutas = explode("/",$_GET['ruta']);

    $item = "ruta";
    $valor = $rutas[0];

    /*=============================================  
    URL's AMIGABLES CATEGORIAS
    ===============================================*/

    $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item,$valor);

    if($valor == (is_array($rutaCategorias)? $rutaCategorias['ruta']:null) ){

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
    URL's AMIGABLES PRODUCTOS
    ===============================================*/

    $rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item,$valor);

    if($valor == (is_array($rutaProductos)? $rutaProductos["ruta"]: null) ){

        $infoProducto = $valor;

    }

    /*=============================================  
    LISTA BLANCA
    ===============================================*/

    if($ruta != null || 
    $rutas[0] == "articulos-gratis" || 
    $rutas[0] == "lo-mas-vendido" || 
    $rutas[0] == "lo-mas-visto"){

        include "Modulos/productos.php";

    }
    else if($infoProducto != null){

        include "Modulos/infoproducto.php";

    }
    else if($rutas[0] == "buscador" || 
            $rutas[0] == "verificar" || 
            $rutas[0] == "salir" ||
            $rutas[0] == "perfil"){

        include "Modulos/".$rutas[0].".php";

    }
    else{

        include "Modulos/error404.php";

    }

}
else{

    include "Modulos/slide.php";
    include "Modulos/destacados.php";

}

?>

<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">

<!--============================================
JAVASCRIPT PERSONALIZADOS
============================================-->
<script src="<?php echo $url; ?>Vistas/js/cabezote.js?1.0"></script>
<script src="<?php echo $url; ?>Vistas/js/plantilla.js?1.2"></script>
<script src="<?php echo $url; ?>Vistas/js/slide.js?1.2"></script>
<script src="<?php echo $url; ?>Vistas/js/buscador.js?1.5"></script>
<script src="<?php echo $url; ?>Vistas/js/infoproducto.js?1.0"></script>
<script src="<?php echo $url; ?>Vistas/js/usuarios.js?1.6"></script>
<script src="<?php echo $url; ?>Vistas/js/registroFacebook.js?1.4"></script>

<!--============================================
SCRIPTS
==============================================-->

<script>

    window.fbAsyncInit = function() {
        FB.init({
        appId      : '438843627380358',
        cookie     : true,
        xfbml      : true,
        version    : 'v10.0'
        });
        
        FB.AppEvents.logPageView();   
        
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>

</body>

</html>