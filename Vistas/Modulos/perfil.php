<!--=========================================================
Validar sesion
===========================================================-->
<?php 

    $url = Ruta::ctrRuta();
    $urlServidor = Ruta::ctrRutaServidor();

    if(!isset($_SESSION["validarSesion"])){

        echo '
        <script>

            window.location = "'.$url.'";

        </script>';

        exit();

    }

?>

<!--======================================================
BREADCRUB INFOPRODUCTOS
========================================================-->
<div class="container-fluid card bg-light">

    <div class="container">

        <div class="row">

            <ul class="breadcrumb text-uppercase fondoBreadcrumb col-12 bg-light">

                <li class="breadcrumb-item"><a href="<?php echo $urlTienda ?>">INICIO</a></li>
                <li class="breadcrumb-item active pagActiva" aria-current="page"><?php echo $rutas[0]; ?></li>

            </ul>

        </div>

    </div>

</div>

<!--======================================================
sesion perfil
========================================================-->
<div class="container-fluid pt-4">

    <div class="container">

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#compras">
                    <i class="fa fa-list-ul"></i>
                    &nbsp;MIS COMPRAS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#deseos">
                    <i class="fa fa-gift"></i>
                    &nbsp;MI LISTA DE DESEOS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#perfil">
                    <i class="fa fa-user"></i>
                    &nbsp;EDITAR PERFIL
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo htmlspecialchars($url); ?>/ofertas">
                    <i class="fa fa-star"></i>
                    &nbsp;VER OFERTAS
                </a>
            </li>
        </ul>

        <div class="tab-content">

            <!--======================================================
            pestaña compras
            ========================================================-->
            <div class="tab-pane container active" id="compras">

                <?php include 'pestañaCompras.php'; ?>

            </div>
            <!--======================================================
            pestaña deseos
            ========================================================-->
            <div class="tab-pane container fade" id="deseos">

                <?php include 'pestañaListaDeDeseos.php'; ?>

            </div>
            <!--======================================================
            pestaña perfil
            ========================================================-->
            <div class="tab-pane container fade" id="perfil">

                <?php include 'pestañaPerfil.php'; ?>

            </div>

        </div>

    </div>

</div>