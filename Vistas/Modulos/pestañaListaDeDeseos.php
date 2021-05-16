<?php 

    $item = $_SESSION['id'];
    $deseos = ControladorUsuarios::ctrMostrarListaDeseos($item,$valor);
    //var_dump($deseos);

?>

<div class="container productos">

    <?php if(!$deseos): ?>

        <div class="container">

            <div class="row">

                <div class="col-12 text-center error404">

                    <h1><small>¡Oops!</small></h1>
                    <h2>Aún no tiene productos en su lista de deseos</h2>

                </div>

            </div>

        </div>

    <?php else: ?>

        <!--==============================================
        VITRINA DE PRODUCTOS EN CUADRICULA
        ===============================================-->
        <ul class="grid0 row pt-3">

            <?php foreach($deseos as $key => $value): ?>

                <?php 

                    $ordedar = 'id';
                    $item = 'id';
                    $valor = $value['id_producto'];
                    $productos = ControladorProductos::ctrListarProductos($item,$item,$valor);
                    //var_dump($productos);

                ?>

                <!--==============================================
                VITRINA DE PRODUCTOS EN CUADRICULA
                ===============================================-->

                <?php foreach($productos as $key2 => $value2): ?>

                    <!-- Producto -->
                    <li class="col-md-3 col-sm-6 col-xs-12">

                        <!--==========================================-->
                        <figure>

                            <a href="<?php echo htmlspecialchars($urlTienda); ?>/<?php echo htmlspecialchars($value['ruta']); ?>"
                                class="pixelProducto">

                                <img src="<?php echo htmlspecialchars($urlServidor.$value2["portada"]); ?>" class="img-fluid">

                            </a>

                        </figure>

                        <!--==========================================-->
                        <div class="row">

                            <!--==========================================-->
                            <h4 class="col-12">

                                <small>

                                    <a href="<?php echo htmlspecialchars($urlTienda); ?>/<?php echo htmlspecialchars($value2['ruta']); ?>"
                                        class="pixelProducto">

                                        <?php echo htmlspecialchars($value2['titulo']); ?>

                                        <br>

                                        <span style="color: white !important;">-</span>

                                        <?php if($value2['nuevo'] !=0): ?>

                                            <span class="badge badge-warning fontSize">

                                                Nuevo

                                            </span>

                                        <?php endif; ?>

                                        <?php if($value2['oferta'] !=0): ?>

                                            <span class="badge badge-warning fontSize">

                                                <?php echo htmlspecialchars($value2['descuentoOferta']); ?>% Descuento

                                            </span>

                                        <?php endif; ?>

                                    </a>

                                </small>

                            </h4>

                            <!--==========================================-->

                            <div class="col-6 precio">

                                <?php if($value2["precio"]==0): ?>

                                    <h2>

                                        <small>

                                            GRATIS

                                        </small>

                                    </h2>

                                <?php else: ?>

                                    <h2>

                                        <?php if($value2["oferta"] != 0): ?>

                                            <small>

                                                <strong class="oferta">

                                                    USD $<?php echo htmlspecialchars($value2['precio']); ?>

                                                </strong>

                                            </small>

                                            <small>

                                                $<?php echo htmlspecialchars($value2['precioOferta']); ?>

                                            </small>

                                        <?php else: ?>

                                            <small>

                                                USD $<?php echo htmlspecialchars($value2['precio']); ?>

                                            </small>

                                        <?php endif; ?>

                                    </h2>

                                <?php endif; ?>

                            </div>

                            <!--==========================================-->
                            <div class="col-6 enlaces">

                                <div class="btn-group">

                                    <button type="button" class="btn btn-danger btn-xs quitarDeseo"
                                        idDeseo="<?php echo htmlspecialchars($value['id']); ?>" data-toggle="tooltip"
                                        title="Quitar de mi lista de deseos">

                                        <i class="fa fa-heart" aria-hidden="true"></i>

                                    </button>

                                    <?php if($value2['tipo'] == "virtual"): ?>

                                        <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito"
                                            idProducto="<?php echo htmlspecialchars($value2['id']); ?>"
                                            imagen="<?php echo htmlspecialchars($urlServidor.$value2['portada']); ?>"
                                            titulo="<?php echo htmlspecialchars($value2['titulo']); ?>"
                                            <?php if($value2['oferta'] != 0): ?>
                                            precio="<?php echo htmlspecialchars($value2['precioOferta']); ?>" <?php else: ?>
                                            precio="<?php echo htmlspecialchars($value2['precio']); ?>" <?php endif; ?>
                                            tipo="'.$value2['tipo'].'" peso="'.$value2['peso'].'" data-toggle="tooltip"
                                            title="Agregar a carrito de compras">

                                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                        </button>

                                    <?php endif; ?>

                                    <a href="<?php echo htmlspecialchars($urlTienda); ?>/<?php echo htmlspecialchars($value2['ruta']); ?>"
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

            <?php endforeach; ?>

        </ul>

    <?php endif; ?>

</div>