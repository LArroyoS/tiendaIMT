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

                foreach($slide as $key => $value){

                    $estiloImgProducto = json_decode($value["estiloImgProducto"],true);
                    $estiloTextoSlide = json_decode($value["estiloTextoSlide"],true);
                    $titulo1 = json_decode($value["titulo1"],true);
                    $titulo2 = json_decode($value["titulo2"],true);
                    $titulo3 = json_decode($value["titulo3"],true);

                    $imgProducto = ((isset($value['imgProducto']) and $value['imgProducto']=="")?
                                    '<img class="imgProducto">':
                                    '<img class="imgProducto" src="http://localhost/adminIMT/'.$value['imgProducto'].'"
                                        style="
                                            top: '.$estiloImgProducto["top"].'; 
                                            right: '.$estiloImgProducto["right"].';
                                            left: '.$estiloImgProducto["left"].'; 
                                            width: '.$estiloImgProducto["width"].';
                                    ">'); 

                    echo    '<li>

                                <img src="http://localhost/adminIMT/'.$value['imgFondo'].'">

                                <div class="slideOpciones '.$value['tipoSlide'].'">

                                    '.$imgProducto.'

                                    <div class="textosSlide" 
                                    style="
                                        top: '.$estiloTextoSlide["top"].'; 
                                        right: '.$estiloTextoSlide["right"].';
                                        left: '.$estiloTextoSlide["left"].'; 
                                        width: '.$estiloTextoSlide["width"].';
                                    ">

                                        <h1 style="color: '.$titulo1["color"].';">'.$titulo1["texto"].'</h1>
                                        <h2 style="color: '.$titulo2["color"].';">'.$titulo2["texto"].'</h2>
                                        <h3 style="color: '.$titulo3["color"].';">'.$titulo3["texto"].'</h3>

                                        <a href="'.$value["url"].'">

                                            '.$value["botonVerProducto"].'

                                        </a>

                                    </div>

                                </div>

                            </li>';

                }

            ?>

        </ul>

        <!-- --------------------------------------
        PAGINACION
        ---------------------------------------- -->
        <ol id="paginacion">

            <?php 

                for($i = 1; $i<=count($slide); $i++){

                    echo '<li item='.$i.'><span class="fa fa-circle"></li>';

                }

            ?>

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