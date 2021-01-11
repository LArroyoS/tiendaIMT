<?php 

    $urlServidor = Ruta:: ctrRutaServidor();

?>

<!--=============================================
TOP
===============================================-->
<div class="container-fluid barraSuperior" id="top">

    <div class="container">

        <div class="row">

            <!--======================================
            SOCIAL
            =======================================-->

            <div class="col-gl-9 col-md-9 col-sm-8 col-xs-12 socal">

                <ul>

                    <?php 

                        $social = ControladorPlantilla::ctrEstiloPlantilla();
                        $jsonRedesSociales = json_decode($social['redesSociales'],true);

                        foreach($jsonRedesSociales as $key => $value){

                            echo    '<li>

                                        <a href="'.$value['url'].'" target="_blank">

                                            <i class="fab '.$value['red'].' redSocial '.$value['estilo'].'" arial-hidden="true"></i>

                                        </a>

                                    </li>';

                        }

                    ?>

                </ul>

            </div>

            <!--======================================
            REGISTRO
            =======================================-->

            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">

                <ul>

                    <li>

                        <a href="#modalIngreso" data-toggle="modal">Ingresar</a>

                    </li>

                    <li>|</li>

                    <li>

                        <a href="#modalRegistro" data-toggle="modal">Crear una cuenta</a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>

<!--=============================================
HEADER
===============================================-->
<header class="container-fluid">

    <div class="container">

        <div class="row" id="cabezote">

            <!--===================================
            LOGOTIPO
            =====================================-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="logotipo">

                <a href="#">

                    <img src="<?php echo $urlServidor.$social['logo']; ?>" class="img-fluid">

                </a>

            </div>

            <!--===================================
            BLOQUE CATEGORIAS Y BUSCADOR
            =====================================-->

            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 vertical" id="bloqueCatBus">

                <div class="row container-fluid">

                    <!--===================================
                    BOTON CATEGORIAS
                    =====================================-->
                    <div class="col-lg-4 col-md-2 col-sm-2 col-xs-12 backColor hover" id="btnCategorias">

                        <p>

                            <span class="col-sm-0 col-md-0">CATEGORÍAS</span>

                            <span class="float-right">

                                <i class="fa fa-bars" arial-hidden="true"></i>

                            </span>

                        </p>

                    </div>

                    <!--===================================
                    BUSCADOR
                    =====================================-->
                    <div class="input-group mb-3 col-lg-8 col-md-10 col-sm-10 col-xs-12" id="buscador">

                        <input type="search" name="buscar" class="form-control" placeholder="Buscar...">

                        <span class="input-group-append">

                            <a href="#">

                                <button class="btn btn-default backColor" type="submit">

                                    <i class="fa fa-search"></i>

                                </button>

                            </a>

                        </span>

                    </div>

                </div>

            </div>

            <!--===================================
            Carrito
            =====================================-->

            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 vertical" id="carrito">

                <div class="row container-fluid">

                    <div id="carrito">
                
                        <a href="#">

                            <button class="btn btn-default float-left backColor">

                                <i class="fa fa-shopping-cart" arial-hidden="true"></i>

                            </button>

                        </a>

                        <p>

                            TU CESTA 
                            <span class="cantidadCesta"></span>
                            <br>
                            MXN $ 
                            <span class="sumaCesta"><span>

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!--=========================================
        CATEGORIAS
        ===========================================-->

        <div class="col-xs-12 backColor" id="categorias">

            <div class="row">

                <?php 

                    $item = null;
                    $valor = null;

                    $categorias = ControladorProductos::ctrMostrarCategorias($item,$valor);

                    foreach($categorias as $key => $value){

                        echo    '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                                    <h4>

                                        <a href="'.$value['ruta'].'" class="pixelCategorias">'.$value['categoria'].'</a>

                                    </h4>

                                    <hr>

                                    <ul>';

                                        $item = "id_categoria";
                                        $valor = $value['id'];

                                        $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item,$valor);

                                        foreach($subcategorias as $key => $value){

                                            echo    '<li>

                                                        <a href="'.$value['ruta'].'" class="pixelSubCategorias">'.$value['subcategoria'].'</a>

                                                    </li>';

                                        }

                                echo '</ul>

                                </div>';

                    }

                ?>

            </div>

        </div>

    </div>

</header>