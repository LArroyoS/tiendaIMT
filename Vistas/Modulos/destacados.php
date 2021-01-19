<?php 

    $urlServidor = Ruta:: ctrRutaServidor();

?>
<!--====================================================
BANNER
======================================================-->

<figure class="banner">

    <img width="150%" src="<?php echo $urlServidor; ?>Vistas/img/banner/default.jpg">

    <div class="textoBanner textoIzq">

        <h1 style="color:#fff">OFERTAS ESPECIALES</h1>
        <h2 style="color:#fff">

            <strong>50% menos</strong>

        </h2>

        <h3 style="color:#fff" >Termina mañana</h3>

    </div>

</figure>

<!--====================================================
PRODUCTOS
======================================================-->

<?php 

    $tituloModulos = array("ARTICULOS GRATUITOS","LO MÁS VENDIDOS", "LO MAS VISTO");
    $rutaModulos = array("articulos-gratis","lo-mas-vendido", "lo-mas-visto");

    $ordenar = "";

    if($tituloModulos[0] == "ARTICULOS GRATUITOS"){

        $ordenar = "id";
        $item = "precio";
        $valor = "0";

        $gratis = ControladorProductos::ctrMostrarPoductos($ordenar,$item,$valor);

    }

    if($tituloModulos[1] == "LO MÁS VENDIDOS"){

        $ordenar = "ventas";
        $item = null;
        $valor = null;
        $ventas = ControladorProductos::ctrMostrarPoductos($ordenar,$item,$valor);

    }

    if($tituloModulos[2] == "LO MAS VISTO"){

        $ordenar = "vistas";
        $item = null;
        $valor = null;
        $vistas = ControladorProductos::ctrMostrarPoductos($ordenar,$item,$valor);

    }

    $modulo = array($gratis,$ventas,$vistas);

    for( $i=0 ; $i < count($tituloModulos); $i++){

        echo '

            <div class="container-fluid">

                <!--====================================================
                BARRA PRODUCTOS
                ======================================================-->

                <div class="col-12 card card-body bg-light barraProductos">

                    <div class="container">

                        <div class="col-12 organizarProductos">

                            <div class="btn-group float-right">

                                <button type="button" class="btn btn-outline-secondary btnGrid" id="btnGrid'.$i.'">

                                    <i class="fa fa-th" aria-hidden="true"></i>
                                    <span class="col-xs-0 float-right">MOSAICO</span>

                                </button>

                                <button type="button" class="btn btn-outline-secondary btnList" id="btnList'.$i.'">

                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    <span class="col-xs-0 float-right">LISTA</span>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>';

        echo '

                <!--====================================================
                VITRINA DE PRODUCTOS
                ======================================================-->

                <div class="container-fluid productos">

                    <!--==============================================
                    BARRA TITULO
                    ===============================================-->
                    <div class="container tituloDestacado mt-3">

                        <div class="row">

                            <!--==========================================-->

                            <div class="col-sm-6 col-xs-12">

                                <h1><small>'.$tituloModulos[$i].'</small></h1>

                            </div>

                            <!--==========================================-->

                            <!--==========================================-->

                            <div class="col-sm-6 col-xs-12">

                                <a href="'.$rutaModulos[$i].'">

                                    <button class="btn btn-outline-secondary backColor float-right">

                                        VER MÁS <span class="fa fa-chevron-right"></span>

                                    </button>

                                </a>

                            </div>

                            <!--==========================================-->

                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <hr>

                </div>';

        echo '

                <!--==============================================
                VITRINA DE PRODUCTOS EN CUADRICULA
                ===============================================-->
                <ul class="grid'.$i.' row">';

                foreach($modulo[$i] as $key => $value){

                    echo '

                        <!-- Producto -->
                        <li class="col-md-3 col-sm-6 col-xs-12">

                            <!--==========================================-->
                            <figure>

                                <a href="'.$value['ruta'].'" class="pixelProducto">

                                    <img src="'.$urlServidor.$value["portada"].'" class="img-fluid">

                                </a>

                            </figure>
                            <!--==========================================-->
                            <div class="row">

                                <!--==========================================-->
                                <h4 class="col-12">

                                    <small>

                                        <a href="#" class="pixelProducto">

                                            '.$value['titulo'].'<br><br>

                                        </a>

                                    </small>

                                </h4>
                                <!--==========================================-->
                                <div class="col-6 precio">

                                    <h2><small>'.$value['precio'].'</small></h2>

                                </div>
                                <!--==========================================-->
                                <div class="col-6 enlaces">

                                    <div class="btn-group">

                                        <button type="button" class="btn btn-outline-secondary btn-xs deseos" idProducto="'.$value['id'].'"
                                        data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                            <i class="fa fa-heart" aria-hidden="true"></i>

                                        </button>

                                        <a href="#" class="pixelProducto">

                                            <button type="button" class="btn btn-outline-secondary btn-xs"
                                            data-toggle="tooltip" title="Ver Producto">

                                                <i class="fa fa-eye" aria-hidden="true"></i>

                                            </button>

                                        </a>

                                    </div>

                                </div>

                            </div>
                            <!--==========================================-->

                        </li>';

                }

        echo '

                </ul>';

        /*
        echo '

            <!--==============================================
            VITRINA DE PRODUCTOS EN LISTA
            ===============================================-->

            <ul class="list'.$i.' row" style="display:none">

                <!-- PRODUCTO 1 -->

                <li class="col-12">

                    <div class="row">

                        <!--=========================================-->

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                            <figure>

                                <a href="#" class="pixelProducto">

                                    <img src="<?php echo $urlServidor; ?>Vistas/img/productos/accesorios/accesorio04.jpg" class="img-fluid">

                                </a>

                            </figure>

                        </div>

                        <!--=========================================-->

                        <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                            <h1>

                                <small>

                                    <a href="#" class="pixelProducto">Collar de diamantes</a>

                                </small>

                            </h1>

                            <p class="text-muted">

                            Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor

                            </p>

                            <h2>

                                <small>

                                    GRATIS

                                </small>

                            </h2>

                            <div class="btn-group float-left enlaces">

                                <button type="button" class="btn btn-outline-secondary btn-xs deseos"
                                idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                    <i class="fa fa-heart" aria-hidden="true"></i>

                                </button>

                                <a href="#" class="pixelProducto">

                                    <button type="button" class="btn btn-outline-secondary btn-xs"
                                    data-toggle="tooltip" title="Ver Producto">

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

            </ul>';
        */

        echo '

            </div>';

    }

?>

<!--====================================================
BARRA PRODUCTOS MÁS VENDIDOS
======================================================-->

<div class="container-fluid card card-body bg-light barraProductos">

    <div class="container">

        <div class="col-12 organizarProductos">

            <div class="btn-group float-right">

                <button type="button" class="btn btn-outline-secondary btnGrid" id="btnGrid1">

                    <i class="fa fa-th" aria-hidden="true"></i>
                    <span class="col-xs-0 float-right">MOSAICO</span>

                </button>

                <button type="button" class="btn btn-outline-secondary btnList" id="btnList1">

                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span class="col-xs-0 float-right">LISTA</span>

                </button>

            </div>

        </div>

    </div>

</div>

<!--====================================================
VITRINA DE PRODUCTOS MÁS VENDIDOS
======================================================-->

<div class="container-fluid productos">

    <!--==============================================
    BARRA TITULO
    ===============================================-->
    <div class="container tituloDestacado mt-3">

        <div class="row">

            <!--==========================================-->

            <div class="col-sm-6 col-xs-12">

                <h1><small>LO MÁS VENDIDO</small></h1>

            </div>

            <!--==========================================-->

            <!--==========================================-->

                <div class="col-sm-6 col-xs-12">

                    <a href="lo-mas-vendido">

                        <button class="btn btn-outline-secondary backColor float-right">

                            VER MÁS <span class="fa fa-chevron-right"></span>

                        </button>

                    </a>

                </div>

            <!--==========================================-->
            </div>

            <div class="clearfix"></div>

            <hr>

        </div>

        <!--==============================================
        VITRINA DE PRODUCTOS EN CUADRICULA
        ===============================================-->
        <ul class="grid1 row">

            <!-- Producto 1 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/ropa/ropa03.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                Flada de Flores<br>

                                <span class="badge badge-warning fontSize">Nuevo</span>

                                <span class="badge badge-warning fontSize">40% off</span>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2>

                            <small>

                                <strong class="oferta">USD $29</strong>

                            </small>

                            <small>$11</small>
                        
                        </h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" idProducto="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

            <!-- Producto 2 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/ropa/ropa04.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                Vestido Jean<br>

                                <span class="badge badge-warning fontSize">40% off</span>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2>

                            <small>

                                <strong class="oferta">USD $29</strong>

                            </small>

                            <small>$11</small>
                        
                        </h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" idProducto="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

            <!-- Producto 3 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/ropa/ropa02.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                Vestido Clásico<br>

                                <span class="badge badge-warning fontSize">40% off</span>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2>

                            <small>

                                <strong class="oferta">USD $29</strong>

                            </small>

                            <small>$11</small>
                        
                        </h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" idProducto="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

            <!-- Producto 4 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/ropa/ropa06.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                Top Dama<br>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2>

                            <small>USD $29</small>
                        
                        </h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" idProducto="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>


        </ul>

        <!--==============================================
        VITRINA DE PRODUCTOS EN LISTA
        ===============================================-->

        <ul class="list1 row" style="display:none">

            <!-- PRODUCTO 1 -->

            <li class="col-12">

                <div class="row">

                    <!--=========================================-->

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $urlServidor; ?>Vistas/img/productos/ropa/ropa03.jpg" class="img-fluid">

                            </a>

                        </figure>

                    </div>

                    <!--=========================================-->

                    <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                        <h1>

                            <small>

                                <a href="#" class="pixelProducto">

                                    FALDA DE Flores

                                    <span class="badge badge-warning">Nuevo</span>
                                    <span class="badge badge-warning">40% menos</span>

                                </a>

                            </small>

                        </h1>

                        <p class="text-muted">

                        Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor

                        </p>

                        <h2>

                            <small>

                                <strong class="oferta">USD $29</strong>

                            </small>

                            <small>

                                $11

                            </small>

                        </h2>

                        <div class="btn-group float-left enlaces">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos"
                            idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

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

            <!--==============================================-->

        </ul>

    </div>

</div>

<!--====================================================
BARRA PRODUCTOS MÁS VISTOS
======================================================-->

<div class="container-fluid card card-body bg-light barraProductos">

    <div class="container">

        <div class="col-12 organizarProductos">

            <div class="btn-group float-right">

                <button type="button" class="btn btn-outline-secondary btnGrid" id="btnGrid2">

                    <i class="fa fa-th" aria-hidden="true"></i>
                    <span class="col-xs-0 float-right">MOSAICO</span>

                </button>

                <button type="button" class="btn btn-outline-secondary btnList" id="btnList2">

                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span class="col-xs-0 float-right">LISTA</span>

                </button>

            </div>

        </div>

    </div>

</div>

<!--====================================================
VITRINA DE PRODUCTOS MÁS VISTOS
======================================================-->

<div class="container-fluid productos">

    <!--==============================================
    BARRA TITULO
    ===============================================-->
    <div class="container tituloDestacado mt-3">

        <div class="row">

            <!--==========================================-->

            <div class="col-sm-6 col-xs-12">

                <h1><small>LO MÁS VISTO</small></h1>

            </div>

            <!--==========================================-->

            <!--==========================================-->

                <div class="col-sm-6 col-xs-12">

                    <a href="lo-mas-visto">

                        <button class="btn btn-outline-secondary backColor float-right">

                            VER MÁS <span class="fa fa-chevron-right"></span>

                        </button>

                    </a>

                </div>

            <!--==========================================-->
            </div>

            <div class="clearfix"></div>

            <hr>

        </div>

        <!--==============================================
        VITRINA DE PRODUCTOS EN CUADRICULA
        ===============================================-->
        <ul class="grid2 row">

            <!-- Producto 1 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso05.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                Curso de Bootstrap<br>

                                <span class="badge badge-warning fontSize">90% off</span>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2>

                            <small>

                                <strong class="oferta">USD $100</strong>

                            </small>

                            <small>$10</small>
                        
                        </h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" idProducto="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="470" 
                            imagen="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso05.jpg"
                            titulo="Curso de Bootstrap"
                            precio="10"
                            tipo="virtual"
                            peso="0"
                            data-toggle="tooltip" title="Agregar a carrito de compras">

                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

            <!-- Producto 2 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso04.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                Curso de Canvas y Javascript<br>

                                <span class="badge badge-warning fontSize">90% off</span>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2>

                            <small>

                                <strong class="oferta">USD $100</strong>

                            </small>

                            <small>$10</small>
                        
                        </h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" idProducto="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="470" 
                            imagen="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso04.jpg"
                            titulo="Curso de Canvas y Javascript"
                            precio="10"
                            tipo="virtual"
                            peso="0"
                            data-toggle="tooltip" title="Agregar a carrito de compras">

                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

            <!-- Producto 3 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso02.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                Aprende Javascript desde cero<br>

                                <span class="badge badge-warning fontSize">90% off</span>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2>

                            <small>

                                <strong class="oferta">USD $100</strong>

                            </small>

                            <small>$10</small>
                        
                        </h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" idProducto="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="470" 
                            imagen="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso02.jpg"
                            titulo="Aprende Javascript desde cero"
                            precio="10"
                            tipo="virtual"
                            peso="0"
                            data-toggle="tooltip" title="Agregar a carrito de compras">

                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

            <!-- Producto 4 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso03.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                Curso de JQuery<br>

                                <span class="badge badge-warning fontSize">90% off</span>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2>

                            <small>

                                <strong class="oferta">USD $100</strong>

                            </small>

                            <small>$10</small>
                        
                        </h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" idProducto="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="470" 
                            imagen="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso03.jpg"
                            titulo="Curso de JQuery"
                            precio="10"
                            tipo="virtual"
                            peso="0"
                            data-toggle="tooltip" title="Agregar a carrito de compras">

                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

        </ul>

        <!--==============================================
        VITRINA DE PRODUCTOS EN LISTA
        ===============================================-->

        <ul class="list2 row" style="display:none">

            <!-- PRODUCTO 1 -->

            <li class="col-12">

                <div class="row">

                    <!--=========================================-->

                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                        <figure>

                            <a href="#" class="pixelProducto">

                                <img src="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso03.jpg" class="img-fluid">

                            </a>

                        </figure>

                    </div>

                    <!--=========================================-->

                    <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                        <h1>

                            <small>

                                <a href="#" class="pixelProducto">

                                    Curso de JQuery

                                    <span class="badge badge-warning">90% menos</span>

                                </a>

                            </small>

                        </h1>

                        <p class="text-muted">

                        Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor Lorem ipsum dolor

                        </p>

                        <h2>

                            <small>

                                <strong class="oferta">USD $100</strong>

                            </small>

                            <small>

                                $10

                            </small>

                        </h2>

                        <div class="btn-group float-left enlaces">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos"
                            idProducto="470" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="470" 
                            imagen="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso03.jpg"
                            titulo="Curso de JQuery"
                            precio="10"
                            tipo="virtual"
                            peso="0"
                            data-toggle="tooltip" title="Agregar a carrito de compras">

                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver Producto">

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

            <!--==============================================-->

        </ul>

    </div>

</div>