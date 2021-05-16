<form method="post" class="row" enctype="multipart/form-data" autocomplete="off">

    <input type="hidden" value="<?php echo htmlspecialchars($_SESSION['id'])?>" name="idUsuario" id="idUsuario">
    <input type="hidden" value="<?php echo htmlspecialchars($_SESSION['password'])?>" name="passUsuario" id="passUsuario">
    <input type="hidden" value="<?php echo htmlspecialchars($_SESSION['foto'])?>" name="fotoUsuario" id="fotoUsuario">
    <input type="hidden" value="<?php echo htmlspecialchars($_SESSION['modo'])?>" name="modoUsuario" id="modoUsuario">

    <div class="col-md-3 col-sm-4 col-12 text-center">

        <br>
        <figure id="imgPerfil">

            <?php if($_SESSION['modo'] == "DIRECTO"): ?>

            <?php if($_SESSION['foto'] != ''): ?>

            <img src="<?php echo htmlspecialchars($urlTienda.$_SESSION['foto']); ?>" class="img-thumbnail">

            <?php else: ?>

            <img src="<?php echo $urlServidor; ?>Vistas/img/usuarios/default/anonymous.png" class="img-thumbnail">

            <?php endif; ?>

            <?php else: ?>

            <img src="<?php echo htmlspecialchars($_SESSION['foto']); ?>" class="img-fluid img-thumbnail">

            <?php endif; ?>

        </figure>
        <br>

        <?php if($_SESSION['modo'] == 'DIRECTO'): ?>

        <button type="button" class="btn btn-secondary" id="btnCambiarFoto">

            Cambiar Foto de perfil

        </button>

        <?php endif; ?>

        <div id="subirImagen">

            <input type="file" class="form-control" id="datosImagen" name="datosImagen">
            <img id="preVisualizar">

        </div>

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

                <input type="text" class="form-control" name="editarNombre" id="editarNombre"
                    value="<?php echo htmlspecialchars($_SESSION["nombre"]); ?>" <?php echo ($lectura); ?>>

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

                <input type="email" class="form-control" name="editarCorreo" id="editarCorreo"
                    value="<?php echo htmlspecialchars($_SESSION["email"]); ?>" <?php echo ($lectura); ?>>

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

                <input type="<?php echo htmlspecialchars($ultimocampo['tipo']); ?>" class="form-control"
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

    <?php 

        ControladorUsuarios::ctrActualizarPerfil();

    ?>

</form>

<button type="button" class="btn btn-danger btn-md float-right" id="eliminarUsuario">

    Eliminar Cuenta

</button>

<?php 

    ControladorUsuarios::ctrEliminarUsuario();

?>