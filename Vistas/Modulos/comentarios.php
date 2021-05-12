<?php 

    $datos = array('id_usuario' => '',
                    'id_producto' => $infoproducto['id']);

    $comentarios = ControladorUsuarios::ctrMostrarComentarioPerfil($datos);
    $cantidad = 0;

    foreach($comentarios as $key => $value){

        if($value['comentario']!= ""){

            $cantidad++;

        }

    }

?>

<!--======================================================
COMENTARIOS NAVBAR
========================================================-->

<div class="col-12">

    <ul class="nav nav-tabs">

        <?php if($cantidad==0): ?>

            <li class="nav-item active">

                Este Producto no tiene comentarios

            </li>

        <?php else: ?>

            <?php 

                $sumaCalificacion = 0;
                for($i=0; $i<$cantidad; $i++){

                    $sumaCalificacion += $comentarios[$i]["calificacion"];

                }

                $promedio = round($sumaCalificacion/$cantidad,1);
                //var_dump($promedio);

            ?>
            <li class="nav-item">

                <a class="nav-link active">COMENTARIOS <?php echo htmlspecialchars($cantidad); ?> </a>

            </li>

            <li class="nav-item">

                <a class="nav-link" href="" id="verMas">VER MÁS</a>

            </li>

        <?php endif; ?>

        <li class="mr-auto"></li>

        <li class="float-right">

            <a class="text-muted" href="">

                PROMEDIO DE CALIFICACIÓN <?php echo htmlspecialchars($promedio); ?> |
                <i class="<?php echo ($promedio==0.5)? "fas fa-star-half-alt": "fas fa-star"; ?>" arial-hidden="true"></i>
                <i class="<?php echo ($promedio==1.5)? "fas fa-star-half-alt": (($promedio>=2)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>
                <i class="<?php echo ($promedio==2.5)? "fas fa-star-half-alt": (($promedio>=3)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>
                <i class="<?php echo ($promedio==3.5)? "fas fa-star-half-alt": (($promedio>=4)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>
                <i class="<?php echo ($promedio==5.5)? "fas fa-star-half-alt": (($promedio>=5)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>

            </a>

        </li>

    </ul>

    <br>

</div>

<!--======================================================
COMENTARIOS
========================================================-->

<div class="col-12">

    <div class="row comentarios">

        <?php foreach($comentarios as $key => $value): ?>

            <?php if($value['comentario']!=''): ?>

                <?php

                    $item = 'id';
                    $valor = $value['id_usuario'];
                    $usuario = ControladorUsuarios::ctrMostrarUsuario($item,$valor);

                ?>

            <div class="pt-3 col-md-3 col-sm-6 col-xs-12 alturaComentarios">

                <div class="card">

                    <div class="card-header text-uppercase">

                        <?php echo htmlspecialchars($usuario['nombre']) ?>
                        <span class="text-right">

                            <img class="rounded-circle"
                                src="
                                    <?php 

                                        $foto = $urlServidor.'Vistas/img\usuarios\default/anonymous.png';
                                        switch($usuario['modo']){

                                            case 'FACEBOOK':
                                            case 'GOOGLE':

                                                $foto = htmlspecialchars($usuario['foto']);

                                                break;

                                            case 'DIRECTO':

                                                $foto = ($usuario['foto']=='')? $foto : $urlTienda.htmlspecialchars($usuario['foto']);

                                                break;

                                        }

                                        echo $foto; 

                                    ?>"
                                width="20%">

                        </span>

                    </div>

                    <div class="card-body">

                        <small> <?php echo htmlspecialchars($value['comentario']); ?> </small>

                    </div>

                    <div class="card-footer">

                        <i class="<?php echo ($value['calificacion']==0.5)? "fas fa-star-half-alt": "fas fa-star"; ?>" arial-hidden="true"></i>
                        <i class="<?php echo ($value['calificacion']==1.5)? "fas fa-star-half-alt": (($value['calificacion']>=2)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>
                        <i class="<?php echo ($value['calificacion']==2.5)? "fas fa-star-half-alt": (($value['calificacion']>=3)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>
                        <i class="<?php echo ($value['calificacion']==3.5)? "fas fa-star-half-alt": (($value['calificacion']>=4)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>
                        <i class="<?php echo ($value['calificacion']==5.5)? "fas fa-star-half-alt": (($value['calificacion']>=5)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>

                    </div>

                </div>

            </div>

            <?php endif; ?>

        <?php endforeach;?>

    </div>

</div>