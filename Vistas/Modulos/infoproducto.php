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
                VISOR VCIDEO
                ==========================================================*/
                else: 

            ?>

                <div class="col-sm-6 col-xs-12 visorImg">

                    <iframe width="100%" 
                        src="https://www.youtube.com/embed/7ArCpeOUl8I?autoplay=0&rel=0" 
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

                            <a href="javascript:history.back()" class="text-muted">

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

                                        <i class="fab fa-facebook"></i>
                                        Facebook

                                    </p>

                                </li>

                                <li>

                                    <p class="btnTwitter">

                                        <i class="fab fa-twitter"></i>
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

                    <h1 class="text-muted text-uppercase col-12">

                        <!--======================================================
                        TITULO
                        ========================================================-->
                        <?php echo htmlspecialchars($infoproducto["titulo"]); ?>

                        <!--======================================================
                        NUEVO?
                        ========================================================-->
                        <?php if($infoproducto['nuevo'] != 0): ?>

                            <br>
                            <small>

                                <span class="badge badge-warning text-white">

                                    Nuevo

                                </span>

                            </small>

                        <?php endif; ?>

                        <!--======================================================
                        OFERTA?
                        ========================================================-->
                        <?php if($infoproducto['oferta'] != 0): ?>

                            <small>

                                <span class="badge badge-warning text-white">

                                    <?php echo htmlspecialchars($infoproducto["descuentoOferta"]); ?>
                                    % descuento

                                </span>

                            </small>

                        <?php endif; ?>

                    </h1>

                    <!--======================================================
                    PRECIO
                    ========================================================-->
                    <h2 class="text-muted col-12">

                        <?php if($infoproducto["precio"] == 0): ?>

                            GRATIS

                        <?php else: ?>

                            <?php if($infoproducto["oferta"] == 0): ?>

                                USD $<?php echo htmlspecialchars($infoproducto["precio"]); ?>

                            <?php else: ?>

                                <span>

                                    <strong class="oferta">

                                        USD $<?php echo htmlspecialchars($infoproducto["precio"]); ?>

                                    </strong>

                                </span>

                                <span>

                                    $ <?php echo htmlspecialchars($infoproducto['precioOferta']); ?>

                                </span>

                            <?php endif; ?>

                        <?php endif ?>

                    </h2>

                    <!--======================================================
                    DESCRIPCION
                    ========================================================-->
                    <p class="col-12">

                        <?php echo htmlspecialchars($infoproducto['descripcion']); ?>

                    </p>

                    <!--======================================================
                    CARACTERISTICAS
                    ========================================================-->
                    <div class="col-12">

                        <div class="row">

                            <?php if($infoproducto["detalles"] != null): ?>

                                <?php 

                                    $detalles = json_decode($infoproducto['detalles'], true);
                                    //var_dump($detalles);

                                ?>

                                <?php if($infoproducto['tipo'] == "fisico"): ?>

                                    <?php if($detalles['Talla']!=null): ?>

                                        <div class="col form-group">

                                            <select class="form-control seleccionarDetalle" id="seleccionarTalla">

                                                <option value="">Talla</option>

                                                <?php foreach($detalles['Talla'] as $key => $value): ?>

                                                    <option value="<?php echo htmlspecialchars($key); ?>">

                                                        <?php echo htmlspecialchars($value); ?>

                                                    </option>

                                                <?php endforeach; ?>

                                            </select>

                                        </div>

                                    <?php endif; ?>

                                    <?php if($detalles['Color']!=null): ?>

                                        <div class="col form-group">

                                            <select class="form-control seleccionarDetalle" id="seleccionarColor">

                                                <option value="">Color</option>

                                                <?php foreach($detalles['Color'] as $key => $value): ?>

                                                    <option value="<?php echo htmlspecialchars($key); ?>">

                                                        <?php echo htmlspecialchars($value); ?>

                                                    </option>

                                                <?php endforeach; ?>

                                            </select>

                                        </div>

                                    <?php endif; ?>

                                    <?php if($detalles['Marca']!=null): ?>

                                        <div class="col form-group">

                                            <select class="form-control seleccionarDetalle" id="seleccionarMarca">

                                                <option value="">Marca</option>

                                                <?php foreach($detalles['Marca'] as $key => $value): ?>

                                                    <option value="<?php echo htmlspecialchars($key); ?>">

                                                        <?php echo htmlspecialchars($value); ?>

                                                    </option>

                                                <?php endforeach; ?>

                                            </select>

                                        </div>

                                    <?php endif; ?>

                                <?php else: ?>

                                    <div class="col-12 detallesEstilo">

                                        <li>

                                            <i class="fa fa-play-circle"></i>
                                            <?php echo htmlspecialchars($detalles["Clases"]); ?>

                                        </li>
                                        <li>

                                            <i class="fa fa-clock"></i>
                                            <?php echo htmlspecialchars($detalles["Tiempo"]); ?>

                                        </li>
                                        <li>

                                            <i class="fa fa-check-circle"></i>
                                            <?php echo htmlspecialchars($detalles["Nivel"]); ?>

                                        </li>
                                        <li>

                                            <i class="fa fa-info-circle"></i>
                                            <?php echo htmlspecialchars($detalles["Acceso"]); ?>

                                        </li>
                                        <li>

                                            <i class="fa fa-desktop"></i>
                                            <?php echo htmlspecialchars($detalles["Dispositivo"]); ?>

                                        </li>
                                        <li>

                                            <i class="fa fa-trophy"></i>
                                            <?php echo htmlspecialchars($detalles["Certificado"]); ?>

                                        </li>

                                    </div>

                                <?php endif; ?>

                            <?php else: ?>

                                

                            <?php endif; ?>

                        </div>

                    </div>

                    <!--======================================================
                    ENTREGA
                    ========================================================-->
                    <h4 class="col-12">

                        <hr>
                        <span class="badge badge-secondary"
                            style="font-weight: 100">

                            <i class="fa fa-clock" style="margin-right: 5px"></i>

                            <?php if($infoproducto['entrega'] == 0): ?>

                                Entrega inmediata

                            <?php else: ?>

                                <?php echo htmlspecialchars($infoproducto['entrega']); ?> días hábiles para la entrega

                            <?php endif; ?>
                            |
                            <?php if($infoproducto['precio'] == 0): ?>

                                <i class="fa fa-shopping-cart" style="margin: 0px 5px"></i>
                                <?php echo htmlspecialchars($infoproducto['ventasGratis']); ?> 
                                <?php echo ($infoproducto['tipo']=='fisico')? 'Solicitudes': 'Inscritos';?> |
                                <i class="fa fa-eye" style="margin: 0px 5px"></i>
                                Visto por <?php echo htmlspecialchars($infoproducto['vistasGratis']); ?> Personas

                            <?php else: ?>

                                <i class="fa fa-shopping-cart" style="margin: 0px 5px"></i>
                                <?php echo htmlspecialchars($infoproducto['ventas']); ?> 
                                <?php echo ($infoproducto['tipo']=='fisico')? 'Ventas': 'Inscritos';?> |
                                <i class="fa fa-eye" style="margin: 0px 5px"></i>
                                Visto por <?php echo htmlspecialchars($infoproducto['vistas']); ?> Personas

                            <?php endif; ?>

                        </span>

                    </h4>

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