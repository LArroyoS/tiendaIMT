<?php 

    $urlServidor = Ruta::ctrRutaServidor();
    $urlTienda = Ruta::ctrRuta();

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

                    ?>

                    <?php foreach($jsonRedesSociales as $key => $value): ?>

                        <li>

                            <a href="<?php echo htmlspecialchars($value['url']); ?>" 
                            target="_blank">

                                <i class="fab 
                                <?php echo htmlspecialchars($value['red']); ?> 
                                redSocial 
                                <?php echo htmlspecialchars($value['estilo']); ?>" 
                                arial-hidden="true">
                                </i>

                            </a>

                        </li>

                    <?php endforeach; ?>

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

        <div class="row">

            <div class="col-12" id="encabezado">

                <div class="row" id="cabezote">

                    <!--===================================
                    LOGOTIPO
                    =====================================-->

                    <div class="col-lg-2 col-md-3 col-sm-12 col-xs-12" id="logotipo">

                        <a href="<?php echo htmlspecialchars($urlTienda); ?>">

                            <img src="<?php echo htmlspecialchars($urlServidor.$social['logo']); ?>" 
                            class="img-fluid">

                        </a>

                    </div>

                    <!--===================================
                    BLOQUE CATEGORIAS Y BUSCADOR
                    =====================================-->

                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12" id="bloqueCatBus">

                        <div class="col-12">

                            <div class="row ">
                                <!--===================================
                                BOTON CATEGORIAS
                                =====================================-->
                                <div class="p-0 col-lg-4 col-md-2 col-sm-2 col-xs-12">
                                    
                                    <button class="btn btn-default btn-block backColor hover" id="btnCategorias">

                                        <span class="col-sm-0 col-md-0">CATEGORÍAS</span>

                                        <span class="float-right">

                                            <i class="fa fa-bars" arial-hidden="true"></i>

                                        </span>

                                    </button>

                                </div>

                                <!--===================================
                                BUSCADOR
                                =====================================-->
                                <div class="input-group col-lg-8 col-md-10 col-sm-10 col-xs-12" id="buscador">

                                    <input type="search" name="buscar" class="form-control" placeholder="Buscar...">

                                    <span class="input-group-append">

                                        <a href="<?php echo $urlTienda; ?>buscador/1/recientes">

                                            <button class="btn btn-default backColor" type="submit">

                                                <i class="fa fa-search"></i>

                                            </button>

                                        </a>

                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!--===================================
                    Carrito
                    =====================================-->

                    <div class="p-xs-0 col-lg-3 col-md-3 col-sm-4 col-xs-12">

                        <div class="col-12" id="carrito">
                            
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

            <div class="col-12 backColor" id="categorias">

                <div class="row">

                    <?php 

                        $item = null;
                        $valor = null;

                        $categorias = ControladorProductos::ctrMostrarCategorias($item,$valor);

                    ?>

                    <?php foreach($categorias as $key => $value):?>

                        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                            <h4>

                                <a href="<?php echo htmlspecialchars($urlTienda.$value['ruta']); ?>" 
                                class="pixelCategorias">
                                
                                    <?php echo htmlspecialchars($value['categoria']); ?>

                                </a>

                            </h4>

                            <hr>

                            <ul>

                                <?php

                                    $item = "id_categoria";
                                    $valor = $value['id'];

                                    $subcategorias = ControladorProductos::ctrMostrarSubCategorias($item,$valor);

                                ?>

                                <?php foreach($subcategorias as $key => $value): ?>

                                    <li>

                                        <a href="<?php echo htmlspecialchars($urlTienda.$value['ruta']); ?>" 
                                        class="pixelSubCategorias">

                                            <?php echo htmlspecialchars($value['subcategoria']); ?>

                                        </a>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

    </div>

</header>