<div class="container">

    <?php 

        $item = 'id_usuario';
        $valor = $_SESSION['id'];

        $compras = ControladorUsuarios::ctrMostrarCompras($item,$valor);
        //var_dump($compras);

    ?>
    <?php if(!$compras): ?>

    <div class="container">

        <div class="row">

            <div class="col-12 text-center error404">

                <h1><small>¡Oops!</small></h1>
                <h2>Aún no tienes compras realizadas en esta tienda</h2>

            </div>

        </div>

    </div>

    <?php else: ?>

        <?php foreach($compras as $key => $value): ?>

            <?php 

                $ordedar = 'id';
                $item = 'id';
                $valor = $value['id_producto'];
                $productos = ControladorProductos::ctrListarProductos($item,$item,$valor);
                //var_dump($productos);

            ?>

            <?php foreach($productos as $key2 => $value2): ?>

                <div class="card">

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-2 col-sm-6 col-12">

                                <figure>

                                    <img class="img-thumbnail" src="<?php echo htmlspecialchars($urlServidor.$value2['portada']); ?>">

                                </figure>

                            </div>

                            <div class="col-md-6 col-12">

                                <h2>

                                    <small>

                                        <?php echo htmlspecialchars($value2['titulo']); ?>

                                    </small>

                                </h2>
                                <p>

                                    <?php echo htmlspecialchars($value2['descripcion']); ?>

                                </p>

                                <?php if($value2['tipo'] == 'virtual'): ?>

                                    <a href="<?php echo htmlspecialchars($url); ?>/curso">

                                        <button class="btn btn-outline-primary float-left"> Ir al curso</button>

                                    </a>

                                <?php else: ?>

                                    <h6>

                                        Proceso de Entrega: <?php echo htmlspecialchars($value2['entrega']); ?> dias hábiles 

                                    </h6>

                                    <?php 

                                        $fases = array(
                                                        array('nombre'=>'despachado', 'color' => 'bg-info'),
                                                        array('nombre'=>'Enviado', 'color' => 'bg-primary'),
                                                        array('nombre'=>'Entregado', 'color' => 'bg-success')
                                                );

                                        $NoFases = count($fases);
                                        $anchoBarra = 100/$NoFases;

                                    ?>

                                    <div class="progress" style="height:20px">

                                        <?php foreach($fases as $i => $fase): ?>

                                            <?php 

                                                $icono = 'fa fa-clock';
                                                $animacion = 'progress-bar-striped progress-bar-animated';
                                                if($value['envio']>$i){

                                                    $icono = 'fa fa-check';
                                                    $animacion = '';

                                                }

                                            ?>
                                            <div class="progress-bar <?php echo $fase['color'].' '.$animacion; ?>" style="width: <?php echo $anchoBarra; ?>%">

                                                <i class="<?php echo $icono; ?>"></i> <?php echo $fase['nombre']; ?>

                                            </div>

                                        <?php endforeach; ?>

                                    </div>

                                <?php endif; ?>

                            </div>

                            <!-- ======================================================================
                            COMENTARIOS
                            ========================================================================== -->
                            <div class="col-md-4 col-12">

                                <?php 

                                    $datos = array('id_usuario' => $_SESSION['id'],
                                                    'id_producto' => $value2['id']);

                                    $comentario = ControladorUsuarios::ctrMostrarComentarioPerfil($datos);
                                    //var_dump($comentario);

                                ?>

                                <div class="float-right">

                                    <a class="calificarProducto" href="#modalComentario" data-toggle="modal" idComentario="<?php echo ($comentario)? htmlspecialchars($comentario['id']): ''; ?>"
                                        datoCalificacion="<?php echo htmlspecialchars($comentario['calificacion']); ?>"
                                        datoComentario="<?php echo htmlspecialchars($comentario['comentario']); ?>"
                                        idProducto="<?php echo htmlspecialchars($value2['id']); ?>">

                                        <button type="button" class="btn btn-primary backColor">Calificar Producto</button>

                                    </a>

                                </div>
                                <br><br>
                                <div class="float-right">

                                    <h3 class="text-right">

                                        <?php if(!$comentario || $comentario['calificacion']==0): ?>

                                            <i class="far fa-star" arial-hidden="true"></i>
                                            <i class="far fa-star" arial-hidden="true"></i>
                                            <i class="far fa-star" arial-hidden="true"></i>
                                            <i class="far fa-star" arial-hidden="true"></i>
                                            <i class="far fa-star" arial-hidden="true"></i>

                                        <?php else: ?>

                                            <i class="<?php echo ($comentario['calificacion']==0.5)? "fas fa-star-half-alt": "fas fa-star"; ?>" arial-hidden="true"></i>
                                            <i class="<?php echo ($comentario['calificacion']==1.5)? "fas fa-star-half-alt": (($comentario['calificacion']>=2)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>
                                            <i class="<?php echo ($comentario['calificacion']==2.5)? "fas fa-star-half-alt": (($comentario['calificacion']>=3)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>
                                            <i class="<?php echo ($comentario['calificacion']==3.5)? "fas fa-star-half-alt": (($comentario['calificacion']>=4)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>
                                            <i class="<?php echo ($comentario['calificacion']==5.5)? "fas fa-star-half-alt": (($comentario['calificacion']>=5)? "fas fa-star" : "far fa-star"); ?>" arial-hidden="true"></i>

                                        <?php endif; ?>

                                    </h3>

                                    <?php if($comentario && $comentario['comentario']!=""): ?>

                                        <p class="card" style="padding:5px;overflow:auto;height:150px">

                                            <small>

                                                <?php echo htmlspecialchars($comentario['comentario'])?>

                                            </small>

                                        </p>

                                    <?php endif; ?>

                                </div>


                            </div>

                        </div>

                        <?php 

                            $fecha = new DateTime($value['fecha']);
                            $formatoFecha = $fecha->format('d-m-Y');

                        ?>
                        <h4 class="float-right"><small>Comprado el <?php echo $formatoFecha; ?></small></h4>

                    </div>

                </div>

            <?php endforeach; ?>
            <br>

        <?php endforeach; ?>

    <?php endif; ?>

</div>

<!-- =================================================================
Ventana modal Comentario
====================================================================-->
<div class="modal fade modalFormulario" tabindex="-1" role="dialog" id="modalComentario">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Calificar este producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <form method="post" id="calificar">

                    <input type="hidden" value="" id="idComentario" name="idComentario">
                    <input type="hidden" value="" id="idProducto" name="idProducto">

                    <h1 class="text-center" id="estrellas">

                        <i class="far fa-star" arial-hidden="true"></i>
                        <i class="far fa-star" arial-hidden="true"></i>
                        <i class="far fa-star" arial-hidden="true"></i>
                        <i class="far fa-star" arial-hidden="true"></i>
                        <i class="far fa-star" arial-hidden="true"></i>

                    </h1>

                    <div class="form-group text-center" id="radioCalificacion">

                        <label class="radio-inline"><input type="radio" name="puntaje" value="0.5">0.5</label>
                        <label class="radio-inline"><input type="radio" name="puntaje" value="1.0">1.0</label>
                        <label class="radio-inline"><input type="radio" name="puntaje" value="1.5">1.5</label>
                        <label class="radio-inline"><input type="radio" name="puntaje" value="2.0">2.0</label>
                        <label class="radio-inline"><input type="radio" name="puntaje" value="2.5">2.5</label>
                        <label class="radio-inline"><input type="radio" name="puntaje" value="3.0">3.0</label>
                        <label class="radio-inline"><input type="radio" name="puntaje" value="3.5">3.5</label>
                        <label class="radio-inline"><input type="radio" name="puntaje" value="4.0">4.0</label>
                        <label class="radio-inline"><input type="radio" name="puntaje" value="4.5">4.5</label>
                        <label class="radio-inline"><input type="radio" name="puntaje" value="5.0" checked required>5.0</label>

                    </div>

                    <div class="form-group">

                        <label for="comment" class="text-muted">Tu opinión acerca de este producto: <span><small>(máximo 300 caracteres)</small></span></label>
                        <textarea class="form-control" row=5 id="comentario" name="comentario" maxlength="300" required></textarea>

                    </div>

                    <input type="submit" class="btn btn-primary backColor btn-block" value="ENVIAR">

                </form>

                <?php 

                    $actualizarComentario = ControladorUsuarios::ctrActualizarComentario();

                ?>

            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>