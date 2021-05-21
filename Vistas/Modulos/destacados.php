<?php 

    $urlServidor = Ruta:: ctrRutaServidor();

?>

<!--==============================================
Banner
===============================================-->
<?php include "banner.php"; ?>

<!--====================================================
PRODUCTOS
======================================================-->
<?php 

    $tituloModulos = array("ARTICULOS GRATUITOS","LO MÁS VENDIDOS", "LO MAS VISTO");
    $rutaModulos = array("articulos-gratis","lo-mas-vendido", "lo-mas-visto");

    $ordenar = "";

    $base = 0;
    $tope = 4;
    $modo = "DESC";

    if($tituloModulos[0] == "ARTICULOS GRATUITOS"){

        $ordenar = "id";
        $item = "precio";
        $valor = "0";

        $gratis = ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);

    }

    if($tituloModulos[1] == "LO MÁS VENDIDOS"){

        $ordenar = "ventas";
        $item = null;
        $valor = null;
        $ventas = ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);

    }

    if($tituloModulos[2] == "LO MAS VISTO"){

        $ordenar = "vistas";
        $item = null;
        $valor = null;
        $vistas = ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo);

    }

    $modulo = array($gratis,$ventas,$vistas);

?>

<?php for( $i=0 ; $i < count($tituloModulos); $i++): ?>

    <div class="container-fluid">

        <!--====================================================
        BARRA PRODUCTOS
        ======================================================-->

        <div class="col-12 card card-body bg-light">

            <div class="container">

                <div class="col-12 organizarProductos">

                    <div class="btn-group float-right">

                        <button type="button" 
                            class="btn btn-outline-secondary btnGrid" 
                            id="btnGrid<?php echo htmlspecialchars($i); ?>">

                            <i class="fa fa-th" aria-hidden="true"></i>
                            <span class="col-xs-0 float-right">MOSAICO</span>

                        </button>

                        <button type="button" 
                            class="btn btn-outline-secondary btnList" 
                            id="btnList<?php echo htmlspecialchars($i); ?>">

                            <i class="fa fa-list" aria-hidden="true"></i>
                            <span class="col-xs-0 float-right">LISTA</span>

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!--====================================================
        VITRINA DE PRODUCTOS
        ======================================================-->

        <div class="col-12 productos">

            <!--==============================================
            BARRA TITULO
            ===============================================-->
            <div class="container tituloDestacado mt-3">

                <div class="row">

                    <!--==========================================-->

                    <div class="col-sm-6 col-xs-12">

                        <h1>

                            <small>

                                <?php echo htmlspecialchars($tituloModulos[$i]); ?>

                            </small>

                        </h1>

                    </div>

                        <!--==========================================-->

                    <div class="col-sm-6 col-xs-12">

                        <a href="<?php echo htmlspecialchars($rutaModulos[$i]); ?>">

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

            <!--==============================================
            VITRINA DE PRODUCTOS EN CUADRICULA
            ===============================================-->
            <ul class="grid<?php echo $i; ?> row col-12">

                <?php foreach($modulo[$i] as $key => $value): ?>

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
                                            class="btn btn-outline-secondary btn-xs"                                                data-toggle="tooltip" 
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

            <ul class="list<?php echo $i; ?> row col-12" style="display:none">

                <?php foreach($modulo[$i] as $key => $value): ?>

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

        </div>

    </div>

<?php endfor; ?>