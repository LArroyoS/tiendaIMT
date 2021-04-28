<!--=========================================================
Validar sesion
===========================================================-->
<?php 

    $url = Ruta::ctrRuta();
    $urlServidor = Ruta::ctrRutaServidor();

    if(!isset($_SESSION["validarSesion"])){

        echo '
        <script>

            window.location = "'.$url.'";

        </script>';

        exit();

    }

?>

<!--======================================================
BREADCRUB INFOPRODUCTOS
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
sesion perfil
========================================================-->
<div class="container-fluid pt-4">

    <div class="container">

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#compras">
                    <i class="fa fa-list-ul"></i>
                    &nbsp;MIS COMPRAS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#deseos">
                    <i class="fa fa-gift"></i>
                    &nbsp;MI LISTA DE DESEOS
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#perfil">
                    <i class="fa fa-user"></i>
                    &nbsp;EDITAR PERFIL
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo htmlspecialchars($url); ?>/ofertas">
                    <i class="fa fa-star"></i>
                    &nbsp;VER OFERTAS
                </a>
            </li>
        </ul>

        <div class="tab-content">

            <!--======================================================
            pestaña compras
            ========================================================-->
            <div class="tab-pane container active" id="compras">

                <h3>Compras</h3>
                <p><p>

            </div>
            <!--======================================================
            pestaña deseos
            ========================================================-->
            <div class="tab-pane container fade" id="deseos">

                <h3>Deseos</h3>
                <p><p>

            </div>
            <!--======================================================
            pestaña perfil
            ========================================================-->
            <div class="tab-pane container fade" id="perfil">

                <form method="post" class="row" enctype="multipart/form-data">

                    <div class="col-md-3 col-sm-4 col-12 text-center">

                        <br>
                        <figure id="imgPerfil">

                            <?php if($_SESSION['modo'] == "DIRECTO"): ?>

                                <?php if($_SESSION['foto'] != ''): ?>

                                    <img src="<?php echo htmlspecialchars($urlServidor.$_SESSION['foto']); ?>" class="img-thumbnail">

                                <?php else: ?>

                                    <img src="<?php echo $urlServidor; ?>Vistas/img/usuarios/default/anonymous.png" class="img-thumbnail">

                                <?php endif; ?>

                            <?php else: ?>

                                <img src="<?php echo htmlspecialchars($_SESSION['foto']); ?>" class="img-fluid img-thumbnail">

                            <?php endif; ?>

                        </figure>
                        <br>

                        <?php if($_SESSION['modo'] == 'DIRECTO'): ?>

                            <button class="btn btn-secondary" id="btnCambiarFoto">

                                Cambiar Foto de perfil 

                            </button>

                        <?php endif; ?>

                    </div>

                    <div class="col-md-9 col-sm-8 col-12">

                        <?php 

                            if(($_SESSION['modo'] == 'DIRECTO')){

                                $lectura = "";
                                $cambiar = 'Cambiar';
                                $ultimocampo = array('nombre'=>'contraseña',
                                                    'id'=>'editarClave',
                                                    'tipo'=>'password',
                                                    'icono'=>'fas fa-lock',
                                                    'valor' => '',
                                                    'placeholder'=>'Escribe contraseña');
                            }
                            else{

                                $lectura = 'readonly';
                                $cambiar = '';
                                $icono = strtolower($_SESSION['modo']).(($_SESSION['modo']=='FACEBOOK')? '-f':'');
                                $ultimocampo = array('nombre'=>'ModoDeRegistro',
                                                'id'=>'editarRegistro',
                                                'tipo'=>'text',
                                                'valor' => $_SESSION['modo'],
                                                'icono'=> 'fab fa-'.$icono,
                                                'placeholder'=>'');

                            }

                        ?>

                        <br>
                        <label class="text-muted text-uppercase">

                            <?php echo $cambiar; ?> Nombre:

                        </label>

                        <div class="form-group">

                            <div class="input-group mb-2">

                                <div class="input-group-prepend">

                                    <div class="input-group-text">

                                        <i class="fas fa-user"></i>

                                    </div>

                                </div>

                                <input type="text" class="form-control" id="editarNombre"                                         value="<?php echo htmlspecialchars($_SESSION["nombre"]); ?>"
                                    <?php echo ($lectura); ?>>

                            </div>

                        </div>

                        <label class="text-muted text-uppercase">

                            <?php echo $cambiar; ?> Correo electrónico:

                        </label>

                        <div class="form-group">

                            <div class="input-group mb-2">

                                <div class="input-group-prepend">

                                    <div class="input-group-text">

                                        <i class="fas fa-envelope"></i>

                                    </div>

                                </div>

                                <input type="email" class="form-control" id="editarCorreo" 
                                    value="<?php echo htmlspecialchars($_SESSION["email"]); ?>"
                                    <?php echo ($lectura); ?>>

                            </div>

                        </div>

                        <label class="text-muted text-uppercase">

                            <?php echo htmlspecialchars($cambiar." ".$ultimocampo['nombre']); ?>:

                        </label>

                        <div class="form-group">

                            <div class="input-group mb-2">

                                <div class="input-group-prepend">

                                    <div class="input-group-text">

                                        <i class="<?php echo htmlspecialchars($ultimocampo['icono']); ?>"></i>

                                    </div>

                                </div>

                                <input type="<?php echo htmlspecialchars($ultimocampo['tipo']); ?>" 
                                    class="form-control" 
                                    name="<?php echo htmlspecialchars($ultimocampo['id']); ?>" 
                                    id="<?php echo htmlspecialchars($ultimocampo['id']); ?>"
                                    value="<?php echo htmlspecialchars($ultimocampo['valor']); ?>"
                                    placeholder="<?php echo htmlspecialchars($ultimocampo['placeholder']); ?>">

                            </div>

                        </div>

                        <?php if($cambiar=='Cambiar'): ?>

                            <button type="submit" class="btn btn-info btn-md float-left">

                                Actualizar Datos

                            </button>

                        <?php endif; ?>

                    </div>

                </form>

                <button type="button" class="btn btn-danger btn-md float-right" id="eliminarUsuario">

                    Eliminar Cuenta

                </button>

            </div>

        </div>

    </div>

</div>