<?php 

    $urlTienda = Ruta::ctrRuta();
    $urlServidor = Ruta::ctrRutaServidor();

?>

<!--======================================================
BREADCRUB Carrito de compras
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
tabla carrito de compras
========================================================-->
<div class="container-fluid pt-3">

    <div class="container">

        <div class="card">

            <!--======================================================
            cabecera carrito
            ========================================================-->
            <div class="card-header">

                <div class="cabeceraCarrito row">

                    <div class="col-md-6 col-sm-7 col-12 text-center">

                        <h3><small>PRODUCTO</small></h3>

                    </div>

                    <div class="col-md-2 col-sm-1 col-0 text-center">

                        <h3><small>PRECIO</small></h3>

                    </div>

                    <div class="col-sm-2 col-0 text-center">

                        <h3><small>CANTIDAD</small></h3>

                    </div>

                    <div class="col-sm-2 col-0 text-center">

                        <h3><small>SUBTOTAL</small></h3>

                    </div>

                </div>

            </div>

            <!--======================================================
            cuerpo carrito
            ========================================================-->
            <div class="card-body cuerpoCarrito">

                <!-- ITEM 1 -->
                <div class="row itemCarrito">

                    <div class="col-sm-1 col-12 text-center">

                        <br>
                        <center>

                            <button class="btn backColor">

                                <i class="fas fa-times"></i>

                            </button>

                        </center>

                    </div>

                    <div class="col-sm-1 col-12">

                        <figure>

                            <img src="<?php echo $urlServidor; ?>Vistas/img/productos/cursos/curso02.jpg"
                                class="img-thumbnail" >

                        </figure>

                    </div>

                    <div class="col-sm-4 col-12 text-center">

                        <br>
                        <p class="tituloCarritoCompra text-left">Aprende javascript desde cero</p>

                    </div>

                    <div class="col-md-2 col-sm-1 col-12 text-center">

                        <br>
                        <p class="precioCarritoCompra text-center">USD $ <span>10</span></p>

                    </div>

                    <div class="col-md-2 col-sm-3 col-8 text-center">

                        <br>

                        <div class="col-8">

                            <center>

                                <input type="number" class="form-control text-center" min="1" value="1" readonly>

                            </center>

                        </div>

                    </div>

                    <div class="col-md-2 col-sm-1 col-4 text-center">

                        <br>

                        <p><strong>USD $ <span>10</span></strong></p>

                    </div>

                </div>

                <div class="clearfix"></div>
                <hr>

                <!-- ITEM 2 -->
                <div class="row itemCarrito">

                    <div class="col-sm-1 col-12 text-center">

                        <br>
                        <center>

                            <button class="btn backColor">

                                <i class="fas fa-times"></i>

                            </button>

                        </center>

                    </div>

                    <div class="col-sm-1 col-12">

                        <figure>

                            <img src="<?php echo $urlServidor; ?>Vistas/img/productos/ropa/ropa04.jpg"
                                class="img-thumbnail" >

                        </figure>

                    </div>

                    <div class="col-sm-4 col-12 text-center">

                        <br>
                        <p class="tituloCarritoCompra text-left">Vestido Jean</p>

                    </div>

                    <div class="col-md-2 col-sm-1 col-12 text-center">

                        <br>
                        <p class="precioCarritoCompra text-center">USD $ <span>11</span></p>

                    </div>

                    <div class="col-md-2 col-sm-3 col-8 text-center">

                        <br>

                        <div class="col-8">

                            <center>

                                <input type="number" class="form-control text-center" min="1" value="1">

                            </center>

                        </div>

                    </div>

                    <div class="col-md-2 col-sm-1 col-4 text-center">

                        <br>

                        <p><strong>USD $ <span>11</span></strong></p>

                    </div>

                </div>

                <div class="clearfix"></div>
                <hr>

            </div>

            <!--==========================================================
            Suma total de carrito
            ==============================================================-->
            <div class="card-body sumaCarrito">

                <div class="col-md-4 col-sm-6 col-12 float-right border border-dark bg-light p-4">

                    <div class="row">

                        <div class="col-6">

                            <h4>TOTAL:</h4>

                        </div>

                        <div class="col-6">

                            <h4 class="sumaSubTotal">

                                <strong>USD $ <span>21</span></strong>

                            </h4>

                        </div>

                    </div>

                </div>

            </div>

            <!--==========================================================
            checkout
            ==============================================================-->
            <div class="card-header cabeceraCheckout">

                <button class="btn backColor btn-lg float-right">REALIZAR PAGO</button>

            </div>

        </div>

    </div>

</div>