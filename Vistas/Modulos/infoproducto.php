<?php 

    $urlServidor = Ruta:: ctrRutaServidor();
    $urlTienda = Ruta::ctrRuta();

?>

<!--======================================================
BREADCRUB INFOPRODUCTOS
========================================================-->

<div class="container-fluid">

    <div class="card bg-light col-12">

        <div class="container">

            <div class="row">

                <ul class="breadcrumb text-uppercase fondoBreadcrumb col-12 bg-light">

                    <li class="breadcrumb-item"><a href="<?php echo $urlTienda ?>">INICIO</a></li>
                    <li class="breadcrumb-item active pagActiva" aria-current="page"><?php echo $rutas[0]; ?></li>

                </ul>

            </div>

        </div>

    </div>

</div>

<!--======================================================
INFO PRODUCTOS
========================================================-->
<div class="container-fluid infoproducto">

    <div class="container">

        <div class="row">

            <?php 

                $item = "ruta";
                $valor = $rutas[0];
                $infoproducto = ControladorProductos::ctrMostrarInfoProducto($item,$valor);

                //var_dump($infoproducto);

                /*=========================================================
                VISOR IMAGENES
                ==========================================================*/
                if($infoproducto["tipo"] == "fisico"):

            ?>

                <!--======================================================
                VISOR
                ========================================================-->
                <div class="col-md-5 col-sm-6 col-xs-12 visorImg">

                    <!-- Place somewhere in the <body> of your page -->
                    <div id="slider" class="flexslider visor">

                        <ul class="slides">

                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-01.jpg" alt="tennis-verde 11">
                            </li>
                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-02.jpg" alt="tennis-verde 11">
                            </li>
                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-03.jpg" alt="tennis-verde 11">
                            </li>
                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-04.jpg" alt="tennis-verde 11">
                            </li>
                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-05.jpg" alt="tennis-verde 11">
                            </li>

                            <!-- items mirrored twice, total of 12 -->
                        </ul>

                    </div>

                    <div id="carousel" class="flexslider">

                        <ul class="slides">

                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-01.jpg" alt="tennis-verde 11">
                            </li>
                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-02.jpg" alt="tennis-verde 11">
                            </li>
                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-03.jpg" alt="tennis-verde 11">
                            </li>
                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-04.jpg" alt="tennis-verde 11">
                            </li>
                            <li>
                                <img class="img-thumbnail" src="<?php echo $urlServidor; ?>/Vistas/img/multimedia/tennis-verde/img-05.jpg" alt="tennis-verde 11">
                            </li>

                            <!-- items mirrored twice, total of 12 -->
                        </ul>

                    </div>

                </div>

            <?php 

                /*=========================================================
                VISOR IMAGENES
                ==========================================================*/
                else: 

            ?>

                <!--======================================================
                VISOR DE VIDEO
                ========================================================-->
                <div class="col-sm-6 col-xs-12 visorImg">

                    <iframe width="100%" 
                        src="https://www.youtube.com/embed/7ArCpeOUl8I?autoplay=1&rel=0" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen
                        class="videoPresentacion">
                    </iframe>

                </div>

            <?php endif; ?>

            <!--======================================================
            PRODUCTO
            ========================================================-->
            <div class="<?php echo ($infoproducto["tipo"] == "fisico")? 
                            "col-md-7 col-sm-6 col-xs-12": 
                            "col-sm-6 col-xs-12";?>">

                <div class="row">

                    <!--======================================================
                    REGRESAR A LA TIENDA
                    ========================================================-->
                    <div class="col-6">
                                
                        <h6>

                            <a href="javascript:history.back()">

                                <i class="fa fa-reply"></i> Continuar Comprando

                            </a>

                        </h6>

                    </div>

                    <!--======================================================
                    COMPARTIR REDES
                    ========================================================-->
                    <div class="col-6">

                        <h6>

                            <a class="dropdown-toggle float-right text-muted"
                                href="#"
                                data-toggle="dropdown">

                                <i class="fa fa-plus"></i> Compartir

                            </a>

                            <ul class="dropdown-menu float-right compartirRedes">

                                <li>

                                    <p class="btnFacebook">

                                        <i class="fa fa-facebook-f"></i>
                                        Facebook

                                    </p>

                                </li>

                                <li>

                                    <p class="btnTwitter">

                                        <i class="fa fa-twitter"></i>
                                        Twitter

                                    </p>

                                </li>

                            </ul>

                        </h6>

                    </div>

                    <div class="clearfix"></div>
                    <!--======================================================
                    ESPACIO PRODUCTO
                    ========================================================-->

                        <!--======================================================
                        LUPA
                        ========================================================-->
                        <figure class="lupa">

                            <img src="">

                        </figure>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>