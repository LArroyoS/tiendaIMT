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

                                <strong>MXN $ <span class="sumaCesta"></span></strong>

                            </h4>

                        </div>

                    </div>

                </div>

            </div>

            <!--==========================================================
            checkout
            ==============================================================-->
            <div class="card-header cabeceraCheckout">  

                <?php if(isset($_SESSION['validarSesion']) && $_SESSION['validarSesion']=='ok'):?>

                    <a href="#modalCheckout" data-toggle="modal" data-target="#CheckOut">

                        <button class="btn backColor btn-lg float-right" id="btnCheckout"
                            idUsuario="<?php echo htmlspecialchars($_SESSION['id']); ?>">
                            REALIZAR PAGO
                        </button>

                    </a>

                <?php else: ?>

                    <a href="#modalIngreso" data-toggle="modal" data-target="#Ingresar">

                        <button class="btn backColor btn-lg float-right">REALIZAR PAGO</button>

                    </a>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>

<!-- =================================================================================
Ventana modal checkout
=================================================================================== -->

<!--===========================================================
VENTANA MODAL OLVIDASTE CONTRSEÑA
============================================================-->
<div class="container">

    <!-- The Modal -->
    <div class="modal modalFormulario" id="CheckOut">

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body modalTitulo">

                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title backColor">REALIZAR PAGO</h3>

                    <div class="contenidoCheckout">

                        <?php 

                            $respuesta = ControladorCarrito::ctrMostrarTarifas();
                            //var_dump($respuesta);

                        ?>

                        <input type="hidden" id="tasaImpuesto" value="<?php echo htmlspecialchars($respuesta['impuesto'])?>" >
                        <input type="hidden" id="envioNacional" value="<?php echo htmlspecialchars($respuesta['envioNacional'])?>" >
                        <input type="hidden" id="envioInternacional" value="<?php echo htmlspecialchars($respuesta['envioInternacional'])?>" >
                        <input type="hidden" id="tasaMinimaNal" value="<?php echo htmlspecialchars($respuesta['tasaMinimaNal'])?>" >
                        <input type="hidden" id="tasaMinimaInt" value="<?php echo htmlspecialchars($respuesta['tasaMinimaInt'])?>" >
                        <input type="hidden" id="tasaPais" value="<?php echo htmlspecialchars($respuesta['pais'])?>" >

                        <div class="formEnvio row pt-3">

                            <h4 class="text-center card card-body bg-light text-muted text-uppercase">

                                Información de envío

                            </h4>

                            <div class="col-12 seleccionePais">

                            </div>

                        </div>

                        <br>

                        <div class="formPago">

                            <h4 class="text-center card card-body bg-light text-muted text-uppercase">

                                Elije la forma de pago

                            </h4>

                            <div class="row pt-3">

                                <figure class="col-6">

                                    <label for="checkPaypal" tipo="radioButton">

                                        <center class="d-none">

                                            <input id="checkPaypal" type="radio" name="pago" value="paypal" checked="true">

                                        </center>

                                        <img src="<?php echo htmlspecialchars($urlServidor); ?>Vistas/img/plantilla/paypal.jpg" class="img-thumbnail">

                                    </label>

                                </figure>

                                <figure class="col-6">

                                    <label for="checkPayu" tipo="radioButton">

                                        <center class="d-none">

                                            <input id="checkPayu" type="radio" name="pago" value="payu">

                                        </center>

                                        <img src="<?php echo htmlspecialchars($urlServidor); ?>Vistas/img/plantilla/payu.jpg" class="img-thumbnail">

                                    </label>

                                </figure>

                            </div>

                        </div>

                        <br>

                        <div class="listaProductos row">

                            <h4 class="text-center card card-body bg-light text-muted text-uppercase">

                                Productos a comprar

                            </h4>

                            <table class="table table-striped tablaProductos">

                                <thead>

                                    <tr>

                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>

                                    </tr>

                                </thead>

                                <tbody>

                                </tbody>

                            </table>

                            <div class="col-12">

                                <div class="col-sm-6 col-12 float-right">

                                    <table class="table table-striped tablaTasas">

                                        <tbody>

                                            <tr>

                                                <td>SubTotal</td>
                                                <td>
                                                    <span class="cambioDivisa">MXN</span> $
                                                    <span class="valorSubTotal" valor="0">
                                                        00
                                                    </span>
                                                </td>

                                            </tr>

                                            <tr>

                                                <td>Envio</td>
                                                <td><span class="cambioDivisa">MXN</span> $
                                                    <span class="valorTotalEnvio" valor="0">
                                                        00
                                                    </span>
                                                </td>

                                            </tr>

                                            <tr>

                                                <td>Impuesto</td>
                                                <td>
                                                    <span class="cambioDivisa">MXN</span> $
                                                    <span class="valorTotalImpuesto" valor="0">
                                                        00
                                                    </span>
                                                </td>

                                            </tr>

                                            <tr>

                                                <td><strong>Total</strong></td>
                                                <td>
                                                    <strong>
                                                        <span class="cambioDivisa">MXN</span> $
                                                        <span class="valorTotalCompra" valor="0">
                                                            00
                                                        </span>
                                                    </strong>
                                                </td>

                                            </tr>

                                        </tbody>

                                    </table>

                                    <div class="divisa">

                                        <select class="form-control" id="cambiarDivisa" name="divisa">

                                        </select>

                                        <br>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <button class="btn btn-block btn-lg btn-primary backColor btnPagar">

                            PAGAR

                        </button>

                    </div>

                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">

                    

                </div>

            </div>

        </div>

    </div>

</div>