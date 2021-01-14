<?php 

    $urlServidor = Ruta:: ctrRutaServidor();

?>
<!--====================================================
BANNER
======================================================-->

<figure class="banner">

    <img src="<?php echo $urlServidor; ?>Vistas/img/banner/default.jpg">

    <div class="textoBanner textoIzq">

        <h1 style="color:#fff">OFERTAS ESPECIALES</h1>
        <h2 style="color:#fff">

            <strong>50% menos</strong>

        </h2>
        <h3 style="color:#fff" >Termina mañana</h3>

    </div>

</figure>

<!--====================================================
BARRA PRODUCTOS GRATIS
======================================================-->

<div class="container-fluid card card-body bg-light barraProductos">

    <div class="container">

        <div class="col-12 organizarProductos">

            <div class="btn-group float-right">

                <button type="button" class="btn btn-outline-secondary btnGrid" id="btnGrid0">

                    <i class="fa fa-th" aria-hidden="true"></i>
                    <span class="col-xs-0 float-right">MOSAICO</span>

                </button>

                <button type="button" class="btn btn-outline-secondary btnGrid" id="btnGrid1">

                    <i class="fa fa-list" aria-hidden="true"></i>
                    <span class="col-xs-0 float-right">LISTA</span>

                </button>

            </div>

        </div>

    </div>

</div>

<!--====================================================
VITRINA DE PRODUCTOS GRATIS
======================================================-->

<div class="container-fluid productos">

    <!--==============================================
    BARRA TITULO
    ===============================================-->
    <div class="container tituloDestacado mt-3">

        <div class="row">

            <!--==========================================-->

            <div class="col-sm-6 col-xs-12">

                <h1><small>ARTÍCULOS GRATUITOS</small></h1>

            </div>

            <!--==========================================-->

            <!--==========================================-->

            <div class="col-sm-6 col-xs-12">

                <a href="articulos-gratis">

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
        <ul class="grid0 row">

            <!-- Producto1 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/accesorios/accesorio04.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                Collar de diamentes<br><br>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2><small>GRATIS</small></h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

            <!-- Producto2 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/accesorios/accesorio03.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                BOLSO DEPORTIVO GRIS<br><br>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2><small>GRATIS</small></h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

            <!-- Producto3 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/accesorios/accesorio02.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                BOLSO MILITAR<br><br>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2><small>GRATIS</small></h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>

            <!-- Producto4 -->
            <li class="col-md-3 col-sm-6 col-xs-12">

                <!--==========================================-->
                <figure>

                    <a href="#" class="pixelProducto">

                        <img src="<?php echo $urlServidor; ?>Vistas/img/productos/accesorios/accesorio01.jpg" class="img-fluid">

                    </a>

                </figure>
                <!--==========================================-->
                <div class="row">

                    <!--==========================================-->
                    <h4 class="col-12">

                        <small>

                            <a href="#" class="pixelProducto">

                                PULCERA DE DIAMANTES<br><br>

                            </a>

                        </small>

                    </h4>
                    <!--==========================================-->
                    <div class="col-6 precio">

                        <h2><small>GRATIS</small></h2>

                    </div>
                    <!--==========================================-->
                    <div class="col-6 enlaces">

                        <div class="btn-group">

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>


        </ul>

    </div>

</div>

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

                <button type="button" class="btn btn-outline-secondary btnGrid" id="btnGrid1">

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

                                <span class="label label-warning fontSize">Nuevo</span>

                                <span class="label label-warning fontSize">40% off</span>

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

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

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

                                <span class="label label-warning fontSize">40% off</span>

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

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

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

                                <span class="label label-warning fontSize">40% off</span>

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

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

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

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>


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

                <button type="button" class="btn btn-outline-secondary btnGrid" id="btnGrid2">

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

                                Curso Bootstrap<br>

                                <span class="label label-warning fontSize">90% off</span>

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

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="404" imagen="Vistas/img/productos/cursos/curso05.jpg" titulo="Curso de Bootstrap" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar a carrito de compras">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

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

                                <span class="label label-warning fontSize">90% off</span>

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

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="404" imagen="Vistas/img/productos/cursos/curso04.jpg" titulo="Curso de Canvas y Javascript" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar a carrito de compras">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

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

                                <span class="label label-warning fontSize">90% off</span>

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

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="404" imagen="Vistas/img/productos/cursos/curso02.jpg" titulo="Aprende Javascript desde cero" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar a carrito de compras">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

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

                                <span class="label label-warning fontSize">90% off</span>

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

                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" id="470"
                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                <i class="fa fa-heart" aria-hidden="true"></i>

                            </button>

                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="404" imagen="Vistas/img/productos/cursos/curso03.jpg" titulo="Curso de JQuery" precio="10" tipo="virtual" peso="0" data-toggle="tooltip" title="Agregar a carrito de compras">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                            </button>

                            <a href="#" class="pixelProducto">

                                <button type="button" class="btn btn-outline-secondary btn-xs"
                                data-toggle="tooltip" title="Ver producto">

                                    <i class="fa fa-eye" aria-hidden="true"></i>

                                </button>

                            </a>

                        </div>

                    </div>

                </div>
                <!--==========================================-->

            </li>


        </ul>

    </div>

</div>