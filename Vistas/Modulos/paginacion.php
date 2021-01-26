<?php 

    /*==============================================
    LLAMADO A CATEGORIAS, SUBCATEGORIAS Y DESTACADOS
    ===============================================-*/

    //var_dump(count($listaProductos));
    if(count($listaProductos)!=0):

?>

    <?php 

        $pagProductos = ceil(count($listaProductos)/12);
        //var_dump($pagProductos);
        //var_dump($rutas);

    ?>

    <?php if($pagProductos>4): ?>

        <?php 

            /*==============================================
            Primera pagina
            ===============================================-*/
            if($rutas[1]==1):

        ?>

            <ul class="pagination mx-auto">

                <?php for($i=1; $i<= 4; $i++): ?>

                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                        class="page-item">

                        <a class="page-link" 
                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                            <?php echo htmlspecialchars($i); ?>

                        </a>

                    </li>

                <?php endfor; ?>

                <li class="page-item disabled">

                    <a class="page-link">...</a>

                </li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($pagProductos); ?>">

                        <?php echo htmlspecialchars($pagProductos); ?>

                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/2">

                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                    </a>

                </li>

            </ul>

        <?php 

            /*==============================================
            Ultima pagina
            ===============================================-*/
            elseif($rutas[1]==$pagProductos):

        ?>

            <ul class="pagination mx-auto">

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($pagProductos-1); ?>">

                        <i class="fa fa-angle-left" aria-hidden="true"></i>

                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1">

                        1

                    </a>

                </li>

                <li class="page-item disabled">

                    <a class="page-link">...</a>

                </li>

                <?php for($i = ($pagProductos-3); $i<= $pagProductos; $i++): ?>

                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                        class="page-item">

                        <a class="page-link" 
                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                            <?php echo htmlspecialchars($i); ?>

                        </a>

                    </li>

                <?php endfor; ?>

            </ul>

        <?php 

            /*==============================================
            Mitad hacia abajo
            ===============================================-*/
            elseif($rutas[1] != $pagProductos &&
                $rutas[1] != 1 &&
                $rutas[1] < $pagProductos/2 &&
                $rutas[1] < $pagProductos-3):

        ?>

            <?php $numPagActual = $rutas[1] ?>

            <ul class="pagination mx-auto">

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual-1); ?>">

                        <i class="fa fa-angle-left" aria-hidden="true"></i>

                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1">

                        1

                    </a>

                </li>

                <li class="page-item disabled">

                    <a class="page-link">...</a>

                </li>

                <?php for($i = ($numPagActual); $i <= ($numPagActual+3); $i++): ?>

                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                        class="page-item">

                        <a class="page-link" 
                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                            <?php echo htmlspecialchars($i); ?>

                    </a>

                    </li>

                <?php endfor; ?>

                <li class="page-item disabled"><a class="page-link">...</a></li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($pagProductos); ?>">

                        <?php echo htmlspecialchars($pagProductos); ?>

                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual+1); ?>">

                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                    </a>

                </li>

            </ul>

        <?php

            /*==============================================
            Mitad hacia arriba
            ===============================================-*/
            elseif($rutas[1] != $pagProductos &&
                $rutas[1] != 1 &&
                $rutas[1] >= $pagProductos/2 &&
                $rutas[1] < $pagProductos-3):

        ?>

            <?php $numPagActual = $rutas[1]; ?>

            <ul class="pagination mx-auto">

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual-1); ?>">

                        <i class="fa fa-angle-left" aria-hidden="true"></i>

                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1">

                        1

                    </a>

                </li>

                <li class="page-item disabled">

                    <a class="page-link">...</a>

                </li>

                <?php for($i = ($numPagActual); $i <= ($numPagActual+3); $i++): ?>

                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                        class="page-item">

                        <a class="page-link" 
                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                            <?php echo htmlspecialchars($i); ?>

                        </a>

                    </li>

                <?php endfor; ?> 

                <li class="page-item disabled">

                    <a class="page-link">...</a>

                </li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($pagProductos); ?>">

                        <?php echo htmlspecialchars($pagProductos); ?>

                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual+1); ?>">

                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                    </a>

                </li>

            </ul>

        <?php 

            /*==============================================
            ultimas 4 paginas
            ===============================================-*/
            else:

        ?>

            <?php $numPagActual = $rutas[1]; ?>

            <ul class="pagination mx-auto">

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual-1); ?>">

                        <i class="fa fa-angle-left" aria-hidden="true"></i>

                    </a>

                </li>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/1">

                        1

                    </a>

                </li>

                <li class="page-item disabled">

                    <a class="page-link">...</a>

                </li> 

                <?php for($i = ($pagProductos-3); $i <= ($pagProductos); $i++): ?>

                    <li id="item<?php echo htmlspecialchars($i); ?>" 
                        class="page-item">

                        <a class="page-link" 
                            href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                            <?php echo htmlspecialchars($i); ?>

                        </a>

                    </li> 

                <?php endfor; ?>

                <li class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($numPagActual+1); ?>">

                        <i class="fa fa-angle-right" aria-hidden="true"></i>

                    </a>

                </li> 

            </ul>

        <?php endif; ?>

    <?php else: ?>

        <ul class="pagination mx-auto"> 

            <?php for($i=1; $i<= $pagProductos; $i++): ?>

                <li id="item<?php echo htmlspecialchars($i); ?>" 
                    class="page-item">

                    <a class="page-link" 
                        href="<?php echo htmlspecialchars($urlTienda.$rutas[0]); ?>/<?php echo htmlspecialchars($i); ?>">

                        <?php echo htmlspecialchars($i); ?>

                    </a>

                </li>

            <?php endfor; ?>

        </ul>

    <?php endif; ?>

<?php endif; ?>