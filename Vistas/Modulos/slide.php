<?php 

    $urlServidor = Ruta:: ctrRutaServidor();

?>
<!-- ------------------------------------------------
SLIDE
------------------------------------------------- -->

<div class="container-fluid" id="slide">

    <!-- ////////////////////////////////////////////// 
        NOTA:
        En bootstrap 4, a diferencia de la version 3, posee
        un display definido (display: flex), por lo que crear 
        un objeto que sobrepase el tamaño del elemento row no 
        es posible o al menos no sin cancelar el display por 
        defecto que tiene row, es por ello que para cancelarlo 
        use el estilo display: inline, que es el estilo por 
        defecto de un div   
    ///////////////////////////////////////////////// -->
    <div class="row" style="display: inline">

        <!-- -----------------------------------------
        DIAPOSITIVAS
        ------------------------------------------ -->
        <ul>

            <?php 

                $slide = ControladorSlide::ctrMostrarSlide();

            ?>

            <?php foreach($slide as $key => $value): ?>

                <?php

                    $estiloImgProducto = json_decode($value["estiloImgProducto"],true);
                    $estiloTextoSlide = json_decode($value["estiloTextoSlide"],true);
                    $titulo1 = json_decode($value["titulo1"],true);
                    $titulo2 = json_decode($value["titulo2"],true);
                    $titulo3 = json_decode($value["titulo3"],true);

                ?>

                <li>

                    <img src="<?php echo htmlspecialchars($urlServidor.$value['imgFondo']); ?>">

                    <div class="slideOpciones 
                    <?php echo htmlspecialchars($value['tipoSlide']); ?>">

                        <?php if(isset($value['imgProducto']) and $value['imgProducto']==""): ?>

                            <img class="imgProducto d-none">

                        <?php else: ?>

                            <img class="imgProducto" 
                            src="<?php echo htmlspecialchars($urlServidor.$value['imgProducto']); ?>"
                            style="
                            top: <?php echo htmlspecialchars($estiloImgProducto["top"]); ?>; 
                            right: <?php echo htmlspecialchars($estiloImgProducto["right"]); ?>;
                            left: <?php echo htmlspecialchars($estiloImgProducto["left"]); ?>; 
                            width: <?php echo htmlspecialchars($estiloImgProducto["width"]); ?>;
                            ">

                        <?php endif; ?>

                        <div class="textosSlide" 
                        style="
                        top: <?php echo htmlspecialchars($estiloTextoSlide["top"]); ?>; 
                        right: <?php echo htmlspecialchars($estiloTextoSlide["right"]); ?>;
                        left: <?php echo htmlspecialchars($estiloTextoSlide["left"]); ?>; 
                        width: <?php echo htmlspecialchars($estiloTextoSlide["width"]); ?>;
                        ">

                            <h1 style="color: <?php echo htmlspecialchars($titulo1["color"]); ?>;">

                                <?php echo htmlspecialchars($titulo1["texto"]); ?>

                            </h1>

                            <h2 style="color: <?php echo htmlspecialchars($titulo2["color"]); ?>;">

                                <?php echo htmlspecialchars($titulo2["texto"]); ?>

                            </h2>

                            <h3 style="color: <?php echo htmlspecialchars($titulo3["color"]); ?>">

                                <?php echo htmlspecialchars($titulo3["texto"]); ?>

                            </h3>

                            <a href="<?php echo htmlspecialchars($value["url"]); ?>">

                                <?php echo $value["botonVerProducto"]; ?>

                            </a>

                        </div>

                    </div>

                </li>

            <?php endforeach; ?>

        </ul>

        <!-- --------------------------------------
        PAGINACION
        ---------------------------------------- -->
        <ol id="paginacion">

            <?php for($i = 1; $i<=count($slide); $i++): ?>

                <li item="<?php echo htmlspecialchars($i); ?>">

                    <span class="fa fa-circle">

                </li>

            <?php endfor; ?>

        </ol>

        <!-- --------------------------------------
        FLECHAS
        ---------------------------------------- -->
        <div class="flechas" id="retroceder">

            <span class="fa fa-chevron-left"></span>

        </div>

        <div class="flechas" id="avanzar">

            <span class="fa fa-chevron-right"></span>

        </div>

    </div>

</div>

<center>

    <button id="btnSlide" class="backColor">

        <i class="fa fa-angle-up"></i>

    </button>

</center>