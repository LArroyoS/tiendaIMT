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

                    <?php if(isset($_SESSION['validarSesion']) && $_SESSION['validarSesion'] == 'ok'): ?>

                        <?php if($_SESSION['modo'] == 'DIRECTO'): ?>

                            <?php if($_SESSION['foto'] != ''): ?>

                                <li>

                                    <img class="rounded-circle" src="<?php echo htmlspecialchars($urlServidor.$_SESSION['foto']); ?>" width="10%">

                                </li>

                            <?php else: ?>

                                <li>

                                    <img class="rounded-circle" src="<?php echo htmlspecialchars($urlServidor); ?>Vistas\img\usuarios\default\anonymous.png" width="10%">

                                </li>

                            <?php endif; ?>

                        <?php elseif($_SESSION['modo'] == 'FACEBOOK'): ?>

                            <li>

                                <img class="rounded-circle" src="<?php echo htmlspecialchars($_SESSION['foto']); ?>" width="10%">

                            </li>

                        <?php endif; ?>

                        <li>|</li>
                        <li>

                            <a href="<?php echo htmlspecialchars($urlTienda); ?>perfil">Ver Perfil</a>

                        </li>
                        <li>|</li>
                        <li>

                            <a href="<?php echo htmlspecialchars($urlTienda); ?>salir" class="salir<?php echo htmlspecialchars($_SESSION['modo']); ?>">Salir</a>

                        </li>

                    <?php else: ?>

                        <li>

                            <a href="#modalIngreso" data-toggle="modal" data-target="#Ingresar">Ingresar</a>

                        </li>

                        <li>|</li>

                        <li>

                            <a href="#modalRegistro" data-toggle="modal" data-target="#Registro">Crear una cuenta</a>

                        </li>

                    <?php endif; ?>

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

<!--===========================================================
VENTANA MODAL PARA EL REGISTRO
============================================================-->
<div class="container">

    <!-- The Modal -->
    <div class="modal modalFormulario" id="Registro">
        
        <div class="modal-dialog">
            
            <div class="modal-content">
                
                <!-- Modal body -->
                <div class="modal-body modalTitulo">
                    
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title backColor">Registro</h3>

                    <div class="row">
                        
                        <!--=======================================================
                        REGISTRO FACEBOOK
                        =========================================================-->
                        <div class="col-sm-6 col-xs-12 facebook" id="btnFacebookRegistro">
                        
                            <p>
                            
                                <i class="fab fa-facebook-f"></i>
                                Registro con Facebook

                            </p>

                        </div>
                        
                        <!--=======================================================
                        REGISTRO GOOGLE
                        =========================================================-->
                        <div class="col-sm-6 col-xs-12 google" id="btnGoogleRegistro">
                        
                            <p>
                            
                                <i class="fab fa-google"></i>
                                Registro con Google

                            </p>

                        </div>

                        <!--=======================================================
                        REGISTRO DIRECTO
                        =========================================================-->
                        <form class="col-12" method="post">
                        
                            <hr>

                            <div class="form-group">

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <div class="input-group-text">

                                            <i class="fas fa-user"></i>

                                        </div>

                                    </div>

                                    <input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario"
                                        placeholder="Nombre completo">

                                </div>

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <div class="input-group-text">

                                            <i class="fas fa-envelope"></i>

                                        </div>

                                    </div>

                                    <input type="email" class="form-control" id="regEmail" name="regEmail"
                                        placeholder="CORREO ELECTRONICO">

                                </div>

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <div class="input-group-text">

                                            <i class="fas fa-lock"></i>

                                        </div>

                                    </div>

                                    <input type="password" class="form-control" id="regPassword" name="regPassword"
                                        placeholder="CONTRASEÑA">

                                </div>

                            </div>

                            <!--=======================================================
                            Pendiente
                            HTTPS://WWW.iubenda.com/ CONDICIONES DE USO Y POLITICAS DE PRIVACIDAD
                            =========================================================-->
                            <div class="checkBox">

                                <label>

                                    <input id="regTerminos" type="checkbox">

                                        <small>

                                            Acepta nuestas condiciones de uso y politicas de privacidad

                                            <a href="#"> Leer Más</a>

                                        </small>

                                    </input>

                                </label>

                            </div>

                            <?php 

                                $registro = new ControladorUsuarios();
                                $registro->ctrRegistroUsuario();

                            ?>

                            <input type="submit" class="btn btn-block backColor" value="ENVIAR">

                        </form>

                    </div>

                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">

                    ¿Ya tienes una cuenta registrada? | 
                    <strong>

                        <a href="#modalIngreso" data-dismiss="modal"
                            data-toggle="modal" data-target="#Ingresar">

                            Ingresar

                        </a>

                    </strong>

                </div>
                
            </div>
        
        </div>

    </div>

</div>

<!--===========================================================
VENTANA MODAL PARA EL Ingresar
============================================================-->
<div class="container">

    <!-- The Modal -->
    <div class="modal modalFormulario" id="Ingresar">

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body modalTitulo">

                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title backColor">Ingresar</h3>

                    <div class="row">
                        
                        <!--=======================================================
                        REGISTRO FACEBOOK
                        =========================================================-->
                        <div class="col-sm-6 col-xs-12 facebook" id="btnFacebookRegistro">

                            <p>

                                <i class="fab fa-facebook-f"></i>
                                Ingreso con Facebook

                            </p>

                        </div>

                        <!--=======================================================
                        REGISTRO GOOGLE
                        =========================================================-->
                        <div class="col-sm-6 col-xs-12 google" id="btnGoogleRegistro">

                            <p>

                                <i class="fab fa-google"></i>
                                Ingreso con Google

                            </p>

                        </div>

                        <!--=======================================================
                        REGISTRO DIRECTO
                        =========================================================-->
                        <form class="col-12" method="post">

                            <hr>

                            <div class="form-group">

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <div class="input-group-text">

                                            <i class="fas fa-envelope"></i>

                                        </div>

                                    </div>

                                    <input type="email" class="form-control" id="ingEmail" name="ingEmail"
                                        placeholder="CORREO ELECTRONICO">

                                </div>

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <div class="input-group-text">

                                            <i class="fas fa-lock"></i>

                                        </div>

                                    </div>

                                    <input type="password" class="form-control" id="ingPassword" name="ingPassword"
                                        placeholder="CONTRASEÑA">

                                </div>

                            </div>

                            <?php 

                                $ingreso = new ControladorUsuarios();
                                $ingreso->ctrIngresoUsuario();

                            ?>

                            <input type="submit" class="btn btn-block backColor btnIngreso" value="ENVIAR">

                            <br>

                            <center>

                                <a href="#modalPassword" data-dismiss="modal" 
                                    data-toggle="modal" data-target="#OlvidoPassword">

                                    ¿Olvidaste tu contraseña?

                                </a>

                            </center>

                        </form>

                    </div>

                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">

                    ¿No tienes una cuenta registrada? | 
                    <strong>

                        <a href="#modalRegistro" data-dismiss="modal"
                            data-toggle="modal" data-target="#Registro">

                            Registrarse

                        </a>

                    </strong>

                </div>

            </div>

        </div>

    </div>

</div>


<!--===========================================================
VENTANA MODAL OLVIDASTE CONTRSEÑA
============================================================-->
<div class="container">

    <!-- The Modal -->
    <div class="modal modalFormulario" id="OlvidoPassword">

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- Modal body -->
                <div class="modal-body modalTitulo">

                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title backColor">Solicitud de nueva contraeña</h3>

                    <div class="row">
                        
                        <!--=======================================================
                        Olvido contraseña
                        =========================================================-->
                        <form class="col-12" method="post">

                            <label for="passEmail" class="text-muted">Escribe el correo electrónico con el que estás regirtrado y te enviaremos una nueva contraseña</label>

                            <hr>

                            <div class="form-group">

                                <div class="input-group mb-2">

                                    <div class="input-group-prepend">

                                        <div class="input-group-text">

                                            <i class="fas fa-envelope"></i>

                                        </div>

                                    </div>

                                    <input type="email" class="form-control" id="passEmail" name="passEmail"
                                        placeholder="CORREO ELECTRONICO">

                                </div>

                            </div>

                            <?php 

                                $password = new ControladorUsuarios();
                                $password->ctrOlvidoPassword();

                            ?>

                            <input type="submit" class="btn btn-block backColor btnIngreso" value="ENVIAR">

                            <br>

                            <center>

                                <a href="#modalPassword" data-dismiss="modal" data-toggle="modal">

                                    ¿Olvidaste tu contraseña?

                                </a>

                            </center>

                        </form>

                    </div>

                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">

                    ¿No tienes una cuenta registrada? | 
                    <strong>

                        <a href="#modalRegistro" data-dismiss="modal"
                            data-toggle="modal" data-target="#Registro">

                            Registrarse

                        </a>

                    </strong>

                </div>

            </div>

        </div>

    </div>

</div>