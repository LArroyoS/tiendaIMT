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

                                Collar de diamentes<br>

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
                                data-toggle="tooltip" title="Agregar a mi lista de deseos">

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

                                BOLSO DEPORTIVO GRIS<br>

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
                                data-toggle="tooltip" title="Agregar a mi lista de deseos">

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

                                BOLSO MILITAR<br>

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
                                data-toggle="tooltip" title="Agregar a mi lista de deseos">

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

                                PULCERA DE DIAMANTES<br>

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
                                data-toggle="tooltip" title="Agregar a mi lista de deseos">

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