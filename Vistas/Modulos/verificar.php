<!--====================================================
VERIFICAR
======================================================-->
<?php 

    $urlTienda = Ruta::ctrRuta();

    $item = "emailEncriptado";
    $valor = $rutas[1];
    //var_dump($valor);

    $respuesta = ControladorUsuarios::ctrMostrarUsuario($item,$valor);
    //var_dump($respuesta);

    $usuarioVerificado = false;
    $id = null;
    $respuestaV = null;

    if($valor == $respuesta['emailEncriptado']){ 

        $id = $respuesta['id'];
        $itemV = "verificacion";
        $valorV = 0;

        $respuestaV = ControladorUsuarios::ctrActualizarUsuario($id, $itemV,$valorV);
        //var_dump($respuestaV);

        if($respuestaV == "ok"){

            $usuarioVerificado = true;
    
        }

    }

?>

<div class="container">

    <div class="row">

        <div class="col-12 text-center verificar">

            <?php if($usuarioVerificado): ?>

                <h3>Gracias</h3>
                <h2>

                    <small>

                        ¡Hemos verificado su correo electronico, ya puede ingresar al sistema!

                    </small>

                </h2>

                <br>

                <a href="#modalIngreso" data-toggle="modal" data-target="#Ingresar" >

                    <button class="btn btn-secondary backColor btn-lg">

                        INGRESAR

                    </button>

                </a>

            <?php else: ?>

                <h3>Error</h3>
                <h2>

                    <small>

                        ¡No hemos podido verificar su correo electronico, vuelva a registrarse!

                    </small>

                </h2>

                <br>

                <a href="#modalRegistro" data-toggle="modal" data-target="#Registro">

                    <button class="btn btn-secondary backColor btn-lg">

                        REGISTRO

                    </button>

                </a>

            <?php endif; ?>

        </div>

    </div>

</div>