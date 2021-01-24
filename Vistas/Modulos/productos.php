<?php 

    $urlServidor = Ruta:: ctrRutaServidor();
    $urlTienda = Ruta::ctrRuta();

?>
<!--====================================================
BANNER
======================================================-->

<figure class="banner">

    <img width="150%" 
        src="<?php echo $urlServidor; ?>Vistas/img/banner/default.jpg">

    <div class="textoBanner textoIzq">

        <h1 style="color:#fff">OFERTAS ESPECIALES</h1>
        <h2 style="color:#fff">

            <strong>50% menos</strong>

        </h2>

        <h3 style="color:#fff" >Termina mañana</h3>

    </div>

</figure>

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

                            <li><a href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1/recientes">Más Reciente</a></li>
                            <li><a href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1/antiguos">Más Antiguo</a></li>

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

                    $modo = (isset($_SESSION['ordenar'])? $_SESSION['ordenar']:"DESC");

                    if(isset($rutas[1])){

                        $base = (($rutas[1])-1)*12;

                        if(isset($rutas[2])){

                            if($rutas[2] == 'antiguos'){

                                $modo = "ASC";

                            }
                            else{

                                $modo = "DESC";

                            }

                            $_SESSION["ordenar"] = $modo;

                        }

                    }
                    else{

                        $rutas[1] = 1;
                        $base = 0;

                    }

                    /*==============================================
                    LLAMADO A CATEGORIAS, SUBCATEGORIAS Y DESTACADOS
                    ===============================================-*/

                    $ordenar = "id";
                    $itemP = null;
                    $valorP = null;

                    if($rutas[0] == "articulos-gratis"){

                        $itemP = "precio";
                        $valorP = 0;
                        $ordenar = "id";

                    }else if($rutas[0] == "lo-mas-vendido"){

                        $itemP = null;
                        $valorP = null;
                        $ordenar = "ventas";

                    }
                    else if($rutas[0] == "lo-mas-visto"){

                        $itemP = null;
                        $valorP = null;
                        $ordenar = "vistas";

                    }
                    else{

                        $item = "ruta";
                        $valor = $rutas[0];
                        $ordenar = "id";

                        $categorias = ControladorProductos::ctrMostrarCategorias($item,$valor);

                        if(!$categorias){

                            $subCategorias = ControladorProductos::ctrMostrarSubCategorias($item,$valor);
                            //var_dump($subCategorias[0]['id']);

                            $itemP = "id_subcategoria";
                            $valorP = $subCategorias[0]['id'];

                        }
                        else{

                            $itemP = "id_categoria";
                            $valorP = $categorias['id'];

                        }

                    }

                    $tope = 12;

                    $productos = ControladorProductos::ctrMostrarProductos($ordenar,/*$itemP*/ null,/*$valorP*/null,$base,$tope,$modo);
                    $listaProductos = ControladorProductos::ctrListarProductos($ordenar,$itemP,$valorP);
                    //var_dump(count($productos));

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

                                    <h2>

                                        <?php echo htmlspecialchars($value['id']); ?>

                                    </h2>
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

                <?php 

                    /*==============================================
                    LLAMADO A CATEGORIAS, SUBCATEGORIAS Y DESTACADOS
                    ===============================================-*/

                    //var_dump(count($listaProductos));
                    if(count($listaProductos)!=0):

                ?>

                    <?php 
                    
                        $pagProductos = ceil(count($listaProductos)/12);
                        //var_dump($pagProductos);
                        //var_dump($rutas);

                    ?>

                    <?php if($pagProductos>4): ?>

                        <?php 

                            /*==============================================
                            Primera pagina
                            ===============================================-*/

                            if($rutas[1]==1):

                        ?>

                            <ul class="pagination mx-auto">

                                <?php for($i=1; $i<= 4; $i++): ?>

                                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                                        class="page-item">

                                        <a class="page-link" 
                                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                                            <?php echo htmlspecialchars($i); ?>

                                        </a>

                                    </li>

                                <?php endfor; ?>

                                <li class="page-item disabled">

                                    <a class="page-link">...</a>

                                </li>

                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($pagProductos); ?>">

                                        <?php echo htmlspecialchars($pagProductos); ?>

                                    </a>

                                </li>

                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/2">

                                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                                    </a>

                                </li>

                            </ul>

                        <?php 

                            /*==============================================
                            Ultima pagina
                            ===============================================-*/
                            elseif($rutas[1]==$pagProductos):

                        ?>

                            <ul class="pagination mx-auto">

                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($pagProductos-1); ?>">

                                        <i class="fa fa-angle-left" aria-hidden="true"></i>

                                    </a>

                                </li>
                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1">

                                        1

                                    </a>

                                </li>
                                <li class="page-item disabled">

                                    <a class="page-link">...</a>

                                </li>

                                <?php for($i = ($pagProductos-3); $i<= $pagProductos; $i++): ?>

                                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                                        class="page-item">

                                        <a class="page-link" 
                                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                                            <?php echo htmlspecialchars($i); ?>

                                        </a>

                                    </li>

                                <?php endfor; ?>

                            </ul>

                        <?php 

                            /*==============================================
                            Mitad hacia abajo
                            ===============================================-*/
                            elseif($rutas[1] != $pagProductos &&
                                    $rutas[1] != 1 &&
                                    $rutas[1] < $pagProductos/2 &&
                                    $rutas[1] < $pagProductos-3):

                        ?>

                            <?php $numPagActual = $rutas[1] ?>

                            <ul class="pagination mx-auto">

                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual-1); ?>">

                                        <i class="fa fa-angle-left" aria-hidden="true"></i>

                                    </a>

                                </li>
                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1">

                                        1

                                    </a>

                                </li>
                                <li class="page-item disabled">

                                    <a class="page-link">...</a>

                                </li>

                                <?php for($i = ($numPagActual); $i <= ($numPagActual+3); $i++): ?>

                                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                                        class="page-item">

                                        <a class="page-link" 
                                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                                            <?php echo htmlspecialchars($i); ?>

                                        </a>

                                    </li>

                                <?php endfor; ?>

                                <li class="page-item disabled"><a class="page-link">...</a></li>
                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($pagProductos); ?>">

                                        <?php echo htmlspecialchars($pagProductos); ?>

                                    </a>

                                </li>

                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual+1); ?>">

                                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                                    </a>

                                </li>

                            </ul>

                        <?php

                            /*==============================================
                            Mitad hacia arriba
                            ===============================================-*/
                            elseif($rutas[1] != $pagProductos &&
                                    $rutas[1] != 1 &&
                                    $rutas[1] >= $pagProductos/2 &&
                                    $rutas[1] < $pagProductos-3):

                        ?>

                            <?php $numPagActual = $rutas[1]; ?>

                            <ul class="pagination mx-auto">

                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual-1); ?>">

                                        <i class="fa fa-angle-left" aria-hidden="true"></i>

                                    </a>

                                </li>
                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1">

                                        1

                                    </a>

                                </li>
                                <li class="page-item disabled">

                                    <a class="page-link">...</a>

                                </li>

                                <?php for($i = ($numPagActual); $i <= ($numPagActual+3); $i++): ?>

                                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                                        class="page-item">

                                        <a class="page-link" 
                                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                                            <?php echo htmlspecialchars($i); ?>

                                        </a>

                                    </li>

                                <?php endfor; ?> 

                                <li class="page-item disabled">

                                    <a class="page-link">...</a>

                                </li>
                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($pagProductos); ?>">

                                        <?php echo htmlspecialchars($pagProductos); ?>

                                    </a>

                                </li>

                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual+1); ?>">

                                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                                    </a>

                                </li>

                            </ul>

                        <?php 

                            /*==============================================
                            ultimas 4 paginas
                            ===============================================-*/
                            else:

                        ?>

                            <?php $numPagActual = $rutas[1]; ?>

                            <ul class="pagination mx-auto">

                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual-1); ?>">

                                        <i class="fa fa-angle-left" aria-hidden="true"></i>

                                    </a>

                                </li>
                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1">

                                        1</a>

                                </li>

                                <li class="page-item disabled">

                                    <a class="page-link">...</a>

                                </li> 

                                <?php for($i = ($pagProductos-3); $i <= ($pagProductos); $i++): ?>

                                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                                        class="page-item">

                                        <a class="page-link" 
                                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                                            <?php echo htmlspecialchars($i); ?>

                                        </a>

                                    </li> 

                                <?php endfor; ?>

                                <li class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual+1); ?>">

                                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                                    </a>

                                </li> 

                            </ul>

                        <?php endif; ?>

                    <?php else: ?>

                        <ul class="pagination mx-auto"> 

                            <?php for($i=1; $i<= $pagProductos; $i++): ?>

                                <li id="item<?php echo htmlspecialchars($i); ?>" 
                                    class="page-item">

                                    <a class="page-link" 
                                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                                        <?php echo htmlspecialchars($i); ?>

                                    </a>

                                </li>

                            <?php endfor; ?>

                        </ul>

                    <?php endif; ?>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>