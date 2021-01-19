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

                    <hr>';

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

                                            <a href="'.$value['ruta'].'" class="pixelProducto">

                                                '.$value['titulo'].'<br>

                                                <span style="color: white !important;">-</span>';

                                        if($value['nuevo'] !=0){

                                            echo '
                                                <span class="badge badge-warning fontSize">Nuevo</span>';

                                        }

                                        if($value['oferta'] !=0){

                                            echo '

                                                <span class="badge badge-warning fontSize">'.$value['descuentoOferta'].'% Descuento</span>';

                                        }

                        echo '
                                            </a>

                                        </small>

                                    </h4>
                                    <!--==========================================-->
                                    <div class="col-6 precio">';

                        if($value["precio"]==0){

                            echo '
                                        <h2><small>GRATIS</small></h2>';

                        }
                        else{
                            
                            echo '
                                        <h2>';
                            if($value["oferta"] != 0){

                                echo '
                                            <small>

                                                <strong class="oferta">USD $'.$value['precio'].'</strong>

                                            </small>

                                            <small>$'.$value['precioOferta'].'</small>';

                            }
                            else{

                                echo '
                                            <small>USD $'.$value['precio'].'</small>';

                            }

                            echo '
                                        </h2>';

                        }

                        echo '
                                    </div>
                                    <!--==========================================-->
                                    <div class="col-6 enlaces">

                                        <div class="btn-group">

                                            <button type="button" class="btn btn-outline-secondary btn-xs deseos" 
                                            idProducto="'.$value['id'].'"
                                            data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                                <i class="fa fa-heart" aria-hidden="true"></i>

                                            </button>';

                                    if($value['tipo'] == "virtual"){

                                        echo '
                                            <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" 
                                            idProducto="'.$value['id'].'" 
                                            imagen="'.$urlServidor.$value['portada'].'"
                                            titulo="'.$value['titulo'].'"';

                                    
                                        if($value['oferta'] != 0){

                                            echo ' 
                                                precio="'.$value['precioOferta'].'"';

                                        }
                                        else{

                                            echo ' 
                                                precio="'.$value['precio'].'"';

                                        }

                            echo '
                                            tipo="'.$value['tipo'].'"
                                            peso="'.$value['peso'].'"
                                            data-toggle="tooltip" title="Agregar a carrito de compras">

                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                            </button>';

                        }

                        echo '
                                            <a href="'.$value['ruta'].'" class="pixelProducto">

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

            echo '

                <!--==============================================
                VITRINA DE PRODUCTOS EN LISTA
                ===============================================-->

                <ul class="list'.$i.' row" style="display:none">';

                    foreach($modulo[$i] as $key => $value){

                        echo '
                        <!-- PRODUCTO -->

                        <li class="col-12">

                            <div class="row">

                                <!--=========================================-->

                                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                                    <figure>

                                        <a href='.$value['ruta'].' class="pixelProducto">

                                            <img src="'.$urlServidor.$value['portada'].'" class="img-fluid">

                                        </a>

                                    </figure>

                                </div>

                                <!--=========================================-->

                                <div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

                                    <h1>

                                        <small>

                                            <a href="'.$value['ruta'].'" class="pixelProducto">

                                            '.$value['titulo'].'
                                            
                                            </a>';

                                    if($value['nuevo'] !=0){

                                        echo '
                                            <span class="badge badge-warning">Nuevo</span>';

                                    }

                                    if($value['oferta'] !=0){

                                        echo '

                                            <span class="badge badge-warning">'.$value['descuentoOferta'].'% Descuento </span>';

                                    }

                        echo '
                                        </small>

                                    </h1>

                                    <p class="text-muted">'.$value['descripcion'].'</p>';

                                    if($value["precio"]==0){

                                        echo '
                                                    <h2><small>GRATIS</small></h2>';

                                    }
                                    else{

                                        echo '
                                                    <h2>';

                                                if($value["oferta"] != 0){

                                                    echo '
                                                        <small>

                                                            <strong class="oferta">USD $'.$value['precio'].'</strong>

                                                        </small>

                                                        <small>$'.$value['precioOferta'].'</small>';

                                                }
                                                else{

                                                        echo '
                                                        <small>USD $'.$value['precio'].'</small>';

                                                }

                                        echo '
                                                    </h2>';

                                    }

                        echo '

                                    <div class="btn-group float-left enlaces">

                                        <button type="button" class="btn btn-outline-secondary btn-xs deseos"
                                        idProducto="'.$value['id'].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">

                                            <i class="fa fa-heart" aria-hidden="true"></i>

                                        </button>';

                                        if($value['tipo'] == "virtual"){

                                            echo '
                                                <button type="button" class="btn btn-outline-secondary btn-xs agregarCarrito" idProducto="'.$value['id'].'" 
                                                imagen="'.$urlServidor.$value['portada'].'"
                                                titulo="'.$value['titulo'].'"';

                                            if($value['oferta'] != 0){

                                                echo ' 
                                                    precio="'.$value['precioOferta'].'"';

                                            }
                                            else{

                                                echo ' 
                                                    precio="'.$value['precio'].'"';

                                            }

                                            echo '
                                            tipo="'.$value['tipo'].'"
                                            peso="'.$value['peso'].'"
                                            data-toggle="tooltip" title="Agregar a carrito de compras">

                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                                            </button>';

                                        }

                        echo '
                                        <a href="'.$value['ruta'].'" class="pixelProducto">

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

                        </li>';

                    }

            echo '
                    </ul>';

        echo '
                </div>

            </div>';

    }

?>