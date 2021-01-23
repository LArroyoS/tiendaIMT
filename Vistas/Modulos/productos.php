<?php 

    $urlServidor = Ruta:: ctrRutaServidor();
    $urlTienda = Ruta::ctrRuta();

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

<div class="container-fluid">

    <!--====================================================
    BARRA PRODUCTOS
    ======================================================-->

    <div class="col-12 card card-body bg-light barraProductos">

        <div class="container">

            <div class="row">

                <div class="col-sm-6 col-xs-12">

                    <div class="btn-group">

                        <button type="button" class="btn btn-outline-secondary dropdown-toggle"
                        data-toggle="dropdown">

                            Ordenar Productos <span class="caret"></span>

                        </button>

                        <ul class="dropdown-menu" role="menu">

                            <li><a href="#">Más Reciente</a></li>
                            <li><a href="#">Más Antiguo</a></li>

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

    if(isset($rutas[1])){

        $base = (($rutas[1])-1)*12;

    }
    else{

        $rutas[1] = 1;
        $base = 0;

    }

    /*==============================================
    LLAMADO A CATEGORIAS, SUBCATEGORIAS Y DESTACADOS
    ===============================================-*/


    $ordenar = 'id';
    $itemP = null;
    $valorP = null;

    if($rutas[0] == "articulos-gratis"){

        $itemP = "precio";
        $valorP = 0;
        $ordenar = 'id';

    }else if($rutas[0] == "lo-mas-vendido"){

        $itemP = null;
        $valorP = null;
        $ordenar = 'ventas';

    }
    else if($rutas[0] == "lo-mas-visto"){

        $itemP = null;
        $valorP = null;
        $ordenar = 'vistas';

    }
    else{

        $item = "ruta";
        $valor = $rutas[0];
        $ordenar = 'vistas';

        $categorias = ControladorProductos::ctrMostrarCategorias($item,$valor);

        if(!$categorias){

            $subCategorias = ControladorProductos::ctrMostrarSubCategorias($item,$valor);
            //var_dump($subCategorias[0]['id']);

            $itemP = 'id_subcategoria';
            $valorP = $subCategorias[0]['id'];

        }else{

            $itemP = 'id_categoria';
            $valorP = $categorias['id'];

        }

    }

    $tope = 12;

    $productos = ControladorProductos::ctrMostrarProductos($ordenar,$itemP,$valorP,$base,$tope);
    $listaProductos = ControladorProductos::ctrListarProductos($ordenar,$itemP,$valorP);
    //var_dump(count($productos));

    if(!$productos){

        echo '
                <div class="col-12 error404 text-center">

                    <h1><small>¡Oops!</small></h1>
                    <h2>Aún no hay productos en esta sección</h2>

                </div>';

    }
    else{

        echo '

                <!--==============================================
                VITRINA DE PRODUCTOS EN CUADRICULA
                ===============================================-->
                <ul class="grid0 row col-12">';

                foreach($productos as $key => $value){

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

                                <h2>'.$value['id'].'</h2>
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

                <ul class="list0 row col-12" style="display:none">';

                    foreach($productos as $key => $value){

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

    }

?>

            <?php 

                /*==============================================
                LLAMADO A CATEGORIAS, SUBCATEGORIAS Y DESTACADOS
                ===============================================-*/

                //var_dump(count($listaProductos));
                if(count($listaProductos)!=0){

                    $pagProductos = ceil(count($listaProductos)/12);
                    //var_dump($pagProductos);
                    //var_dump($rutas);

                    if($pagProductos>4){

                        /*==============================================
                        Primera pagina
                        ===============================================-*/

                        if($rutas[1]==1){

                            echo '<ul class="pagination mx-auto">';

                            for($i=1; $i<= 4; $i++){

                                echo '
                                    <li id="item'.$i.'" class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.$i.'">'.$i.'</a>
                                    </li>';

                            }

                            echo '
                                    <li class="page-item disabled"><a class="page-link">...</a></li>
                                    <li class="page-item"><a class="page-link" href="'.$urlTienda.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/2">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>';

                            echo '</ul>';

                        }
                        /*==============================================
                        Ultima pagina
                        ===============================================-*/
                        else if($rutas[1]==$pagProductos){

                            echo '<ul class="pagination mx-auto">';

                            echo '
                                    <li class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.($pagProductos-1).'">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="'.$urlTienda.$rutas[0].'/1">1</a></li>
                                    <li class="page-item disabled"><a class="page-link">...</a></li>';

                            for($i = ($pagProductos-3); $i<= $pagProductos; $i++){

                                echo '
                                    <li id="item'.$i.'" class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.$i.'">'.$i.'</a>
                                    </li>';

                            }

                            echo '</ul>';

                        }
                        /*==============================================
                        Mitad hacia abajo
                        ===============================================-*/
                        else if($rutas[1] != $pagProductos &&
                                $rutas[1] != 1 &&
                                $rutas[1] < $pagProductos/2 &&
                                $rutas[1] < $pagProductos-3){

                            $numPagActual = $rutas[1];

                            echo '<ul class="pagination mx-auto">';

                            echo '
                                    <li class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.($numPagActual-1).'">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="'.$urlTienda.$rutas[0].'/1">1</a></li>
                                    <li class="page-item disabled"><a class="page-link">...</a></li>';

                            for($i = ($numPagActual); $i <= ($numPagActual+3); $i++){

                                echo '
                                    <li id="item'.$i.'" class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.$i.'">'.$i.'</a>
                                    </li>';

                            }

                            echo '
                                    <li class="page-item disabled"><a class="page-link">...</a></li>
                                    <li class="page-item"><a class="page-link" href="'.$urlTienda.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.($numPagActual+1).'">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>';

                            echo '</ul>';

                        }
                        /*==============================================
                        Mitad hacia arriba
                        ===============================================-*/
                        else if($rutas[1] != $pagProductos &&
                                $rutas[1] != 1 &&
                                $rutas[1] >= $pagProductos/2 &&
                                $rutas[1] < $pagProductos-3){

                            $numPagActual = $rutas[1];

                            echo '<ul class="pagination mx-auto">';

                            echo '
                                    <li class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.($numPagActual-1).'">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="'.$urlTienda.$rutas[0].'/1">1</a></li>
                                    <li class="page-item disabled"><a class="page-link">...</a></li>';

                            for($i = ($numPagActual); $i <= ($numPagActual+3); $i++){

                                echo '
                                    <li id="item'.$i.'" class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.$i.'">'.$i.'</a>
                                    </li>';

                            }

                            echo '
                                    <li class="page-item disabled"><a class="page-link">...</a></li>
                                    <li class="page-item"><a class="page-link" href="'.$urlTienda.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.($numPagActual+1).'">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>';

                            echo '</ul>';

                        }
                        /*==============================================
                        ultimas 4 paginas
                        ===============================================-*/
                        else{

                            $numPagActual = $rutas[1];

                            echo '<ul class="pagination mx-auto">';

                            echo '
                                    <li class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.($numPagActual-1).'">
                                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="'.$urlTienda.$rutas[0].'/1">1</a></li>
                                    <li class="page-item disabled"><a class="page-link">...</a></li>';

                            for($i = ($pagProductos-3); $i <= ($pagProductos); $i++){

                                echo '
                                    <li id="item'.$i.'" class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.$i.'">'.$i.'</a>
                                    </li>';

                            }

                            echo '
                                    <li class="page-item">
                                        <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.($numPagActual+1).'">
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>';

                            echo '</ul>';

                        }

                    }
                    else{

                        echo '<ul class="pagination mx-auto">';

                        for($i=1; $i<= $pagProductos; $i++){

                            echo '
                                <li id="item'.$i.'" class="page-item">
                                    <a class="page-link" href="'.$urlTienda.$rutas[0].'/'.$i.'">'.$i.'</a>
                                </li>';

                        }

                        echo '</ul>';

                    }

                }

            ?>

            </div>

        </div>

    </div>

</div>