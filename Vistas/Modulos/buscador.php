<?php 

    $urlServidor = Ruta:: ctrRutaServidor();
    $urlTienda = Ruta::ctrRuta();

?>

<div class="container-fluid">

    <!--====================================================
    BARRA PRODUCTOS
    ======================================================-->

    <div class="col-12 card card-body bg-light barraProductos">

        <div class="container">

            <div class="row">

                <div class="col-sm-6 col-xs-12">

                    <div class="btn-group">

                        <button type="button" 
                            class="btn btn-outline-secondary dropdown-toggle"
                            data-toggle="dropdown">

                            Ordenar Productos <span class="caret"></span>

                        </button>

                        <ul class="dropdown-menu" role="menu">

                            <li><a href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1/recientes/<?php echo htmlspecialchars($rutas[3]); ?>">Más Reciente</a></li>
                            <li><a href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1/antiguos/<?php echo htmlspecialchars($rutas[3]); ?>">Más Antiguo</a></li>

                        </ul>

                    </div>

                </div>

                <div class="col-sm-6 col-xs-12 organizarProductos">

                    <div class="btn-group float-right">

                        <button type="button" class="btn btn-outline-secondary btnGrid" id="btnGrid0">

                            <i class="fa fa-th" aria-hidden="true"></i>
                            <span class="col-xs-0 float-right">MOSAICO</span>

                        </button>

                        <button type="button" class="btn btn-outline-secondary btnList" id="btnList0">

                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span class="col-xs-0 float-right">LISTA</span>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <br>

    <!--==============================================
    VITRINA DE PRODUCTOS EN LISTA
    ===============================================-->

    <div class="container-fluid productos">

        <div class="container">

            <div class="row">

                <!--==============================================
                BREADCRUMB O MIGAS DE PAN
                ===============================================-->

                <ul class="breadcrumb text-uppercase fondoBreadcrumb lead col-12">

                    <li class="breadcrumb-item"><a href="<?php echo $urlTienda ?>">INICIO</a></li>
                    <li class="breadcrumb-item active pagActiva" aria-current="page"><?php echo $rutas[0]; ?></li>

                </ul>

                <?php 

                    $tope = 12;

                    /*==============================================
                    LLAMADO DE PAGINACION
                    ===============================================*/

                    $orden = "recientes";
                    $modo = "DESC";

                    if(isset($rutas[1])){

                        $base = (($rutas[1])-1)*12;

                        if(isset($rutas[2])){

                            $orden = $rutas[2];
                            if($rutas[2] == 'antiguos'){

                                $modo = "ASC";

                            }
                            else{

                                $orden = "recientes";
                                $modo = "DESC";

                            }

                        }

                    }
                    else{

                        $rutas[1] = 1;
                        $base = 0;

                    }

                    /*==============================================
                    LLAMADO A CATEGORIAS, SUBCATEGORIAS Y DESTACADOS
                    ===============================================-*/

                    $tope = 12;

                    $productos = null;
                    $listaProductos = null;
                    $ordenar = "id";

                    if(isset($rutas[3])){

                        $busqueda = $rutas[3];

                        $productos = ControladorProductos::ctrBuscarProductos($busqueda,$base,$tope,$ordenar, $modo);
                        $listaProductos = ControladorProductos::ctrListarProductosBusqueda($busqueda);
                        //var_dump(count($productos));

                    }

                ?>

                <?php if(!$productos): ?>

                    <div class="col-12 error404 text-center">

                        <h1>

                            <small>¡Oops!</small>

                        </h1>

                        <h2>

                            Aún no hay productos en esta sección

                        </h2>

                    </div>

                <?php else: ?>

                    <!--==============================================
                    VITRINA DE PRODUCTOS EN CUADRICULA
                    ===============================================-->
                    <ul class="grid0 row col-12">

                        <?php foreach($productos as $key => $value): ?>

                            <!-- Producto -->
                            <li class="col-md-3 col-sm-6 col-xs-12">

                                <!--==========================================-->
                                <figure>

                                    <a href="<?php echo htmlspecialchars($value['ruta']); ?>" 
                                        class="pixelProducto">

                                        <img src="<?php echo htmlspecialchars($urlServidor.$value["portada"]); ?>" 
                                            class="img-fluid">

                                    </a>

                                </figure>

                                <!--==========================================-->
                                <div class="row">

                                    <!--==========================================-->
                                    <h4 class="col-12">

                                        <small>

                                            <a href="<?php echo htmlspecialchars($value['ruta']); ?>" 
                                                class="pixelProducto">

                                                <?php echo htmlspecialchars($value['titulo']); ?>

                                                <br>

                                                <span style="color: white !important;">-</span>

                                                <?php if($value['nuevo'] !=0): ?>

                                                    <span class="badge badge-warning fontSize">

                                                        Nuevo

                                                    </span>

                                                <?php endif; ?>

                                                <?php if($value['oferta'] !=0): ?>

                                                    <span class="badge badge-warning fontSize">

                                                        <?php echo htmlspecialchars($value['descuentoOferta']); ?>% Descuento

                                                    </span>

                                                <?php endif; ?>

                                            </a>

                                        </small>

                                    </h4>

                                    <!--==========================================-->
                                    <div class="col-6 precio">

                                        <?php if($value["precio"]==0): ?>

                                            <h2>

                                                <small>

                                                    GRATIS

                                                </small>

                                            </h2>

                                        <?php else: ?>

                                            <h2>

                                                <?php if($value["oferta"] != 0): ?>

                                                    <small>

                                                        <strong class="oferta">

                                                            USD $<?php echo htmlspecialchars($value['precio']); ?>

                                                        </strong>

                                                    </small>

                                                    <small>

                                                        $<?php echo htmlspecialchars($value['precioOferta']); ?>

                                                    </small>

                                                <?php else: ?>

                                                    <small>

                                                        USD $<?php echo htmlspecialchars($value['precio']); ?>

                                                    </small>

                                                <?php endif; ?>

                                            </h2>

                                        <?php endif; ?>

                                    </div>

                                    <!--==========================================-->
                                    <div class="col-6 enlaces">

                                        <div class="btn-group">

                                            <button type="button" 
                                                class="btn btn-outline-secondary btn-xs deseos" 
                                                idProducto="<?php echo htmlspecialchars($value['id']); ?>"
                                                data-toggle="tooltip" 
                                                title="Agregar a mi lista de deseos">

                                                <i class="fa fa-heart" aria-hidden="true"></i>

                                            </button>

                                            <?php if($value['tipo'] == "virtual"): ?>

                                                <button type="button" 
                                                    class="btn btn-outline-secondary btn-xs agregarCarrito" 
                                                    idProducto="<?php echo htmlspecialchars($value['id']); ?>" 
                                                    imagen="<?php echo htmlspecialchars($urlServidor.$value['portada']); ?>"
                                                    titulo="<?php echo htmlspecialchars($value['titulo']); ?>"
                                    
                                                    <?php if($value['oferta'] != 0): ?>

                                                        precio="<?php echo htmlspecialchars($value['precioOferta']); ?>"

                                                    <?php else: ?>

                                                        precio="<?php echo htmlspecialchars($value['precio']); ?>"

                                                    <?php endif; ?>

                                                    tipo="<?php echo htmlspecialchars($value['tipo']); ?>"
                                                    peso="<?php echo htmlspecialchars($value['peso']); ?>"
                                                    data-toggle="tooltip" 
                                                    title="Agregar a carrito de compras">

                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                                </button>

                                            <?php endif; ?>

                                            <a href="<?php echo htmlspecialchars($value['ruta']); ?>" 
                                                class="pixelProducto">

                                                <button type="button" 
                                                    class="btn btn-outline-secondary btn-xs"
                                                    data-toggle="tooltip" 
                                                    title="Ver Producto">

                                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                                </button>

                                            </a>

                                        </div>

                                    </div>

                                </div>
                                <!--==========================================-->

                            </li>

                        <?php endforeach; ?>

                    </ul>

                    <!--==============================================
                    VITRINA DE PRODUCTOS EN LISTA
                    ===============================================-->

                    <ul class="list0 row col-12" style="display:none">

                        <?php foreach($productos as $key => $value): ?>

                            <!-- PRODUCTO -->
                            <li class="col-12">

                                <div class="row">

                                    <!--=========================================-->
                                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                                        <figure>

                                            <a href='<?php echo htmlspecialchars($value['ruta']); ?>' 
                                                class="pixelProducto">

                                                <img src="<?php echo htmlspecialchars($urlServidor.$value['portada']); ?>" 
                                                    class="img-fluid">

                                            </a>

                                        </figure>

                                    </div>

                                    <!--=========================================-->
                                    <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                                        <h1>

                                            <small>

                                                <a href="<?php echo htmlspecialchars($value['ruta']); ?>" 
                                                    class="pixelProducto">

                                                    <?php echo htmlspecialchars($value['titulo']); ?>
                                                
                                                </a>

                                                <?php if($value['nuevo'] !=0): ?>

                                                    <span class="badge badge-warning">

                                                        Nuevo

                                                    </span>

                                                <?php endif; ?>

                                                <?php if($value['oferta'] !=0): ?>

                                                    <span class="badge badge-warning">

                                                        <?php echo htmlspecialchars($value['descuentoOferta']); ?>% Descuento

                                                    </span>

                                                <?php endif; ?>

                                            </small>

                                        </h1>

                                        <p class="text-muted">

                                            <?php echo htmlspecialchars($value['descripcion']); ?>

                                        </p>

                                        <?php if($value["precio"]==0): ?>

                                            <h2>

                                                <small>

                                                    GRATIS

                                                </small>

                                            </h2>

                                        <?php else: ?>

                                            <h2>

                                                <?php if($value["oferta"] != 0): ?>

                                                    <small>

                                                        <strong class="oferta">

                                                            USD $<?php echo htmlspecialchars($value['precio']); ?>

                                                        </strong>

                                                    </small>

                                                    <small>

                                                        $<?php echo htmlspecialchars($value['precioOferta']); ?>

                                                    </small>

                                                <?php else: ?>

                                                    <small>

                                                        USD $<?php echo htmlspecialchars($value['precio']); ?>

                                                    </small>

                                                <?php endif; ?>

                                            </h2>

                                        <?php endif; ?>

                                        <div class="btn-group float-left enlaces">

                                            <button type="button" 
                                                class="btn btn-outline-secondary btn-xs deseos"
                                                idProducto="<?php echo htmlspecialchars($value['id']); ?>" 
                                                data-toggle="tooltip" 
                                                title="Agregar a mi lista de deseos">

                                                <i class="fa fa-heart" aria-hidden="true"></i>

                                            </button>

                                            <?php if($value['tipo'] == "virtual"): ?>

                                                <button type="button" 
                                                    class="btn btn-outline-secondary btn-xs agregarCarrito" 
                                                    idProducto="<?php echo htmlspecialchars($value['id']); ?>" 
                                                    imagen="<?php echo htmlspecialchars($urlServidor.$value['portada']); ?>"
                                                    titulo="<?php echo htmlspecialchars($value['titulo']); ?>"

                                                    <?php if($value['oferta'] != 0): ?>

                                                        precio="<?php echo htmlspecialchars($value['precioOferta']); ?>"

                                                    <?php else: ?>

                                                        precio="<?php echo htmlspecialchars($value['precio']); ?>"

                                                    <?php endif; ?>

                                                    tipo="<?php echo htmlspecialchars($value['tipo']); ?>"
                                                    peso="<?php echo htmlspecialchars($value['peso']); ?>"
                                                    data-toggle="tooltip" 
                                                    title="Agregar a carrito de compras">

                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                                </button>

                                            <?php endif; ?>

                                            <a href="<?php echo htmlspecialchars($value['ruta']); ?>" 
                                                class="pixelProducto">

                                                <button type="button" 
                                                    class="btn btn-outline-secondary btn-xs"
                                                    data-toggle="tooltip" 
                                                    title="Ver Producto">

                                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                                </button>

                                            </a>

                                        </div>

                                    </div>

                                </div>

                                <!--==============================================-->

                                <div class="col-12">

                                    <hr>

                                </div>

                            </li>

                        <?php endforeach; ?>

                    </ul>

                <?php endif; ?>

                <!--==============================================
                PAGINACIÓN
                ===============================================-->
                <?php include 'paginacionBusqueda.php'; ?>

            </div>

        </div>

    </div>

</div>