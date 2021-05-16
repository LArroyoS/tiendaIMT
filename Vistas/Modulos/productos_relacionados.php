<div class="col-12">

    <?php 

        $ordenar = "";
        $item = "id_subcategoria";
        $valor = $infoproducto["id_subcategoria"];
        $base = 0;
        $tope = 4;
        $modo = "RAND()";

        $relacionados = ControladorProductos::ctrMostrarProductos($ordenar,$item,$valor,
                        $base,$tope,$modo);
        //var_dump($relacionados);

    ?>

    <?php if(!$relacionados): ?>

        <div class="container pt-3 pb-3">

            <div class="row">

                <div class="col-12 text-center error404">

                    <h2>No hay productos relacionados</h2>

                </div>

            </div>

        </div>

    <?php else: ?>

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

                                PRODUCTOS RELACIONADOS

                            </small>

                        </h1>

                    </div>

                    <!--==========================================-->

                    <div class="col-sm-6 col-xs-12">

                        <?php 

                            $item = "id";
                            $valor = $infoproducto['id_subcategoria'];

                            $rutaArticulosDestacados = ControladorProductos::ctrMostrarSubCategorias($item,$valor);
                            //var_dump($rutaArticulosDestacados[0]["ruta"]);

                        ?>

                        <a
                            href="<?php echo htmlspecialchars($url); ?>/<?php echo htmlspecialchars($rutaArticulosDestacados[0]["ruta"]); ?>">

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
            <ul class="grid0 row">

                <?php foreach($relacionados as $key => $value): ?>

                    <!-- Producto -->
                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--==========================================-->
                        <figure>

                            <a href="<?php echo htmlspecialchars($urlTienda); ?>/<?php echo htmlspecialchars($value['ruta']); ?>"
                                class="pixelProducto">

                                <img src="<?php echo htmlspecialchars($urlServidor.$value["portada"]); ?>" class="img-fluid">

                            </a>

                        </figure>

                        <!--==========================================-->
                        <div class="row">

                            <!--==========================================-->
                            <h4 class="col-12">

                                <small>

                                    <a href="<?php echo htmlspecialchars($urlTienda); ?>/<?php echo htmlspecialchars($value['ruta']); ?>"
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

                                    <button type="button" class="btn btn-outline-secondary btn-xs deseos"
                                        idProducto="<?php echo htmlspecialchars($value['id']); ?>" data-toggle="tooltip"
                                        title="Agregar a mi lista de deseos">

                                        <i class="fa fa-heart" aria-hidden="true"></i>

                                    </button>

                                    <?php if($value['tipo'] == "virtual"): ?>

                                        <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito"
                                            idProducto="<?php echo htmlspecialchars($value['id']); ?>"
                                            imagen="<?php echo htmlspecialchars($urlServidor.$value['portada']); ?>"
                                            titulo="<?php echo htmlspecialchars($value['titulo']); ?>"
                                            <?php if($value['oferta'] != 0): ?>
                                            precio="<?php echo htmlspecialchars($value['precioOferta']); ?>" <?php else: ?>
                                            precio="<?php echo htmlspecialchars($value['precio']); ?>" <?php endif; ?>
                                            tipo="'.$value['tipo'].'" peso="'.$value['peso'].'" data-toggle="tooltip"
                                            title="Agregar a carrito de compras">

                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                        </button>

                                    <?php endif; ?>

                                    <a href="<?php echo htmlspecialchars($urlTienda); ?>/<?php echo htmlspecialchars($value['ruta']); ?>"
                                        class="pixelProducto">

                                        <button type="button" class="btn btn-outline-secondary btn-xs" data-toggle="tooltip"
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

        </div>

    <?php endif; ?>

</div>