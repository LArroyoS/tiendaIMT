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
                        <small>[ <?php echo htmlspecialchars($infoproducto["id"]); ?> ]</small>

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

                        <hr>

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
                                    Visto por <?php echo htmlspecialchars($infoproducto['vistasGratis']); ?> Personas

                                </div>

                            <?php else: ?>

                                <div class="col-xs-12 col-lg-4">

                                    <i class="fa fa-shopping-cart"></i>
                                    <?php echo htmlspecialchars($infoproducto['ventas']); ?> 
                                    <?php echo ($infoproducto['tipo']=='fisico')? 'Ventas': 'Inscritos';?>

                                </div>

                                <div class="col-xs-12 col-lg-4">

                                    <i class="fa fa-eye"></i>
                                    Visto por <?php echo htmlspecialchars($infoproducto['vistas']); ?> Personas

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

                            <?php endif; ?>

                            <?php if($infoproducto['precio'] > 0): ?>

                                <div class="col">

                                    <button class="btn btn-outline-warning btn-block">

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

        <!--======================================================
        LUPA
        ========================================================-->

        <br>

        <div class="col-12">

            <ul class="nav nav-tabs">

                <li class="nav-item">

                    <a class="nav-link active">COMENTARIOS 4</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="">VER MÁS</a>

                </li>

                <li class="mr-auto"></li>

                <li class="float-right">

                    <a class="text-muted" href="">

                        PROMEDIO DE CALIFICACIÓN 3.5 | 
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fas fa-star-half-alt text-success"></i>
                        <i class="far fa-star text-success"></i>

                    </a>

                </li>

            </ul>

            <br>

        </div>

        <div class="row comentarios">

            <div class="pt-3 col-md-3 col-sm-6 col-xs-12">

                <div class="card">

                    <div class="card-header text-uppercase">

                        Usuario1
                        <span class="text-right">

                            <img class="rounded-circle" src="<?php echo htmlspecialchars($urlServidor); ?>Vistas/img\usuarios\default/anonymous.png"
                                width="20%">

                        </span>

                    </div>

                    <div class="card-body">

                        <small> Comentario 1 dcnijfd vnvconcvwc caNOCNWROIVCN AOHCOEANCOIAHC OAHCOIABNCOIWERJ VFPIOHBPRWONB S VAJVWHVJNSPVN  O OSGVWOFVNA NOGVahfvonfvo H</small>

                    </div>

                    <div class="card-footer">

                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fas fa-star-half-alt text-success"></i>
                        <i class="far fa-star text-success"></i>

                    </div>

                </div>

            </div>

            <div class="pt-3 col-md-3 col-sm-6 col-xs-12">

                <div class="card">

                    <div class="card-header text-uppercase">

                        Usuario1
                        <span class="text-right">

                            <img class="rounded-circle" src="<?php echo htmlspecialchars($urlServidor); ?>Vistas/img\usuarios\default/anonymous.png"
                                width="20%">

                        </span>

                    </div>

                    <div class="card-body">

                        <small> Comentario 1 dcnijfd vnvconcvwc caNOCNWROIVCN AOHCOEANCOIAHC OAHCOIABNCOIWERJ VFPIOHBPRWONB S VAJVWHVJNSPVN  O OSGVWOFVNA NOGVahfvonfvo H</small>

                    </div>

                    <div class="card-footer">

                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fas fa-star-half-alt text-success"></i>
                        <i class="far fa-star text-success"></i>

                    </div>

                </div>

            </div>

            <div class="pt-3 col-md-3 col-sm-6 col-xs-12">

                <div class="card">

                    <div class="card-header text-uppercase">

                        Usuario1
                        <span class="text-right">

                            <img class="rounded-circle" src="<?php echo htmlspecialchars($urlServidor); ?>Vistas/img\usuarios\default/anonymous.png"
                                width="20%">

                        </span>

                    </div>

                    <div class="card-body">

                        <small> Comentario 1 dcnijfd vnvconcvwc caNOCNWROIVCN AOHCOEANCOIAHC OAHCOIABNCOIWERJ VFPIOHBPRWONB S VAJVWHVJNSPVN  O OSGVWOFVNA NOGVahfvonfvo H</small>

                    </div>

                    <div class="card-footer">

                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fas fa-star-half-alt text-success"></i>
                        <i class="far fa-star text-success"></i>

                    </div>

                </div>

            </div>

            <div class="pt-3 col-md-3 col-sm-6 col-xs-12">

                <div class="card">

                    <div class="card-header text-uppercase">

                        Usuario1
                        <span class="text-right">

                            <img class="rounded-circle" src="<?php echo htmlspecialchars($urlServidor); ?>Vistas/img\usuarios\default/anonymous.png"
                                width="20%">

                        </span>

                    </div>

                    <div class="card-body">

                        <small> Comentario 1 dcnijfd vnvconcvwc caNOCNWROIVCN AOHCOEANCOIAHC OAHCOIABNCOIWERJ VFPIOHBPRWONB S VAJVWHVJNSPVN  O OSGVWOFVNA NOGVahfvonfvo H</small>

                    </div>

                    <div class="card-footer">

                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fas fa-star-half-alt text-success"></i>
                        <i class="far fa-star text-success"></i>

                    </div>

                </div>

            </div>

            <div class="pt-3 col-md-3 col-sm-6 col-xs-12">

                <div class="card">

                    <div class="card-header text-uppercase">

                        Usuario1
                        <span class="text-right">

                            <img class="rounded-circle" src="<?php echo htmlspecialchars($urlServidor); ?>Vistas/img\usuarios\default/anonymous.png"
                                width="20%">

                        </span>

                    </div>

                    <div class="card-body">

                        <small> Comentario 1 dcnijfd vnvconcvwc caNOCNWROIVCN AOHCOEANCOIAHC OAHCOIABNCOIWERJ VFPIOHBPRWONB S VAJVWHVJNSPVN  O OSGVWOFVNA NOGVahfvonfvo H</small>

                    </div>

                    <div class="card-footer">

                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fa fa-star text-success"></i>
                        <i class="fas fa-star-half-alt text-success"></i>
                        <i class="far fa-star text-success"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>