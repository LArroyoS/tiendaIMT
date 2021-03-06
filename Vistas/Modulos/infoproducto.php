<?php 

    $urlServidor = Ruta:: ctrRutaServidor();
    $urlTienda = Ruta::ctrRuta();

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
INFO PRODUCTOS
========================================================-->
<div class="container-fluid infoproducto pt-4">

    <div class="container">

        <div class="row">

            <?php 

                $item = "ruta";
                $valor = $rutas[0];
                $infoproducto = ControladorProductos::ctrMostrarInfoProducto($item,$valor);

                //var_dump($infoproducto['multimedia']);
                $multimedia = json_decode($infoproducto['multimedia'],true);
                //var_dump($multimedia);
                //var_dump($multimedia[0]['foto']);

                //var_dump($infoproducto);

            ?>

            <?php if($multimedia != null): ?>

                <div class="col-md-5 col-sm-6 col-xs-12 visorImg">

                    <!-- Place somewhere in the <body> of your page -->
                    <div id="slider" class="flexslider visor">

                        <ul class="slides">

                            <?php foreach($multimedia as $multi): ?>

                                <?php foreach($multi as $key => $value): ?>

                                    <?php if($key=='foto'): ?>

                                        <li>

                                            <!--=========================================================
                                            VISOR IMAGENES
                                            ==========================================================-->
                                            <img class="img-thumbnail" src="<?php echo $urlServidor; ?><?php echo htmlspecialchars($value); ?>" 
                                                alt="<?php echo htmlspecialchars($infoproducto['titulo']); ?>">

                                        </li>

                                    <?php elseif($key=='video'): ?>

                                        <li>

                                            <!--=========================================================
                                            VISOR VIDEO
                                            ==========================================================-->
                                            <iframe width="100%" 
                                                src="https://www.youtube.com/embed/<?php echo htmlspecialchars($value); ?>?autoplay=0&rel=0" 
                                                frameborder="0" 
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                                allowfullscreen
                                                class="videoPresentacion">

                                            </iframe>

                                        </li>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            <?php endforeach; ?>

                            <!-- items mirrored twice, total of 12 -->
                        </ul>

                    </div>

                    <div id="carousel" class="flexslider">

                        <ul class="slides">

                            <?php foreach($multimedia as $multi): ?>

                                <?php foreach($multi as $key => $value): ?>

                                    <?php if($key=='foto'): ?>

                                        <li>

                                            <!--=========================================================
                                                CARRUCEL IMAGENES
                                                ==========================================================-->
                                            <img class="img-thumbnail" src="<?php echo $urlServidor; ?><?php echo htmlspecialchars($value); ?>" 
                                                alt="<?php echo htmlspecialchars($infoproducto['titulo']); ?>">

                                        </li>

                                    <?php elseif($key=='video'): ?>

                                        <li>

                                            <!--=========================================================
                                                CARRUCEL VIDEO
                                                ==========================================================-->
                                            <img class="img-thumbnail" src="http://i3.ytimg.com/vi/<?php echo htmlspecialchars($value); ?>/hqdefault.jpg" 
                                                alt="<?php echo htmlspecialchars($infoproducto['titulo']); ?>">

                                        </li>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            <?php endforeach; ?>

                        </ul>

                    </div>

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
                        <!--
                        <small>[ <?php //echo htmlspecialchars($infoproducto["id"]); ?> ]</small>
                        -->

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

                                MXN $<?php echo htmlspecialchars(number_format($infoproducto["precio"],2)); ?>

                            <?php else: ?>

                                <span>

                                    <strong class="oferta">

                                        MXN $<?php echo htmlspecialchars(number_format($infoproducto["precio"],2)); ?>

                                    </strong>

                                </span>

                                <span>

                                    $ <?php echo htmlspecialchars(number_format($infoproducto['precioOferta'],2)); ?>

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

                        <hr>

                        <div class="row">

                            <?php if($infoproducto["detalles"] != null): ?>

                                <?php 

                                    $detalles = json_decode($infoproducto['detalles'], true);
                                    //var_dump($detalles);

                                ?>

                                <?php if($infoproducto['tipo'] == "fisico"): ?>

                                    <?php foreach($detalles as $key => $detalle): ?>

                                        <div class="col form-group">

                                            <?php if($detalle!=null): ?>

                                                <select class="form-control seleccionarDetalle" detalle="<?php echo $key; ?>">

                                                    <option value="">

                                                        <?php echo $key; ?>

                                                    </option>

                                                    <?php foreach($detalle as $key => $value): ?>

                                                        <option value="<?php echo htmlspecialchars($value); ?>">

                                                            <?php echo htmlspecialchars($value); ?>

                                                        </option>

                                                    <?php endforeach; ?>

                                                </select>

                                            <?php endif; ?>

                                        </div>

                                    <?php endforeach;?>

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

                            <?php endif; ?>

                        </div>

                        <hr>

                    </div>

                    <!--======================================================
                    ENTREGA
                    ========================================================-->
                    <div class="col-12 badge badge-primary infoEntrega">

                        <div class=" row"
                            style="font-weight: 100">

                            <div class="col-xs-12 col-lg-4">

                                <i class="fa fa-clock"></i>

                                <?php if($infoproducto['entrega'] == 0): ?>

                                    Entrega inmediata

                                <?php else: ?>

                                    <?php echo htmlspecialchars($infoproducto['entrega']); ?> días hábiles para la entrega

                                <?php endif; ?>

                            </div>

                            <?php if($infoproducto['precio'] == 0): ?>

                                <div class="col-xs-12 col-lg-4">

                                    <i class="fa fa-shopping-cart"></i>
                                    <?php echo htmlspecialchars($infoproducto['ventasGratis']); ?> 
                                    <?php echo ($infoproducto['tipo']=='fisico')? 'Solicitudes': 'Inscritos';?>

                                </div>
                                <div class="col-xs-12 col-lg-4">

                                    <i class="fa fa-eye"></i>
                                    Visto por 
                                    <span class="vistas" precio="<?php echo htmlspecialchars(number_format($infoproducto['precio'],2)); ?>">

                                        <?php echo htmlspecialchars($infoproducto['vistasGratis']); ?> 

                                    </span>

                                    Personas

                                </div>

                            <?php else: ?>

                                <div class="col-xs-12 col-lg-4">

                                    <i class="fa fa-shopping-cart"></i>
                                    <?php echo htmlspecialchars($infoproducto['ventas']); ?> 
                                    <?php echo ($infoproducto['tipo']=='fisico')? 'Ventas': 'Inscritos';?>

                                </div>

                                <div class="col-xs-12 col-lg-4">

                                    <i class="fa fa-eye"></i>
                                    Visto por 
                                    <span class="vistas" precio="<?php echo htmlspecialchars(number_format($infoproducto['precio'],2)); ?>">

                                        <?php echo htmlspecialchars($infoproducto['vistas']); ?> 

                                    </span>

                                    Personas

                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                    <!--======================================================
                    BOTONES DE COMPRA
                    ========================================================-->
                    <div class="col-12">

                        <br>

                        <div class="row text-center">

                            <?php if($infoproducto['tipo'] == 'virtual'): ?>

                                <div class="col">

                                    <button class="btn btn-outline-success btn-block">

                                        <?php 

                                            echo ($infoproducto['precio'] == 0)? 
                                                    'SOLICITAR AHORA':
                                                    'COMPRAR AHORA'; 

                                        ?>

                                    </button>

                                </div>

                            <?php else: ?>

                                <div class="col">

                                    <button class="btn backColor btn-block agregarCarrito"
                                        idProducto="<?php echo htmlspecialchars($infoproducto['id']); ?>" 
                                        imagen="<?php echo htmlspecialchars($urlServidor.$infoproducto['portada']); ?>"
                                        titulo="<?php echo htmlspecialchars($infoproducto['titulo']); ?>"

                                        <?php if($infoproducto['oferta'] != 0): ?>

                                            precio="<?php echo htmlspecialchars(number_format($infoproducto['precioOferta'],2)); ?>"

                                        <?php else: ?>

                                            precio="<?php echo htmlspecialchars(number_format($infoproducto['precio'],2)); ?>"

                                        <?php endif; ?>

                                        tipo="<?php echo htmlspecialchars($infoproducto['tipo']); ?>"
                                        peso="<?php echo htmlspecialchars($infoproducto['peso']); ?>">

                                        AÑADIR AL CARRO
                                        <i class="fa fa-shopping-cart"></i>

                                    </button>

                                </div>



                            <?php endif; ?>

                        </div>

                    </div>

                    <!--======================================================
                    LUPA
                    ========================================================-->
                    <figure class="lupa">

                        <img src="">

                    </figure>

                </div>

            </div>

        </div>

        <br>

        <hr>

        <?php include 'comentarios.php'; ?>

        <hr>

        <?php include 'productos_relacionados.php'; ?>

    </div>

</div>