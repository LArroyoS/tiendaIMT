<?php

    $rutaBanner = (!empty($rutas))? $rutas[0]: 'sin-categoria';
    $banner = ControladorProductos::ctrMostrarBanner($rutaBanner);
    $banner = ($banner==false)? null: $banner;
    //var_dump($banner);

?>

<!--====================================================
BANNER
======================================================-->
<?php if($banner!=null): ?>

    <figure class="banner">

        <img width="150%" 
        src="<?php echo htmlspecialchars($urlServidor.$banner['img']); ?>">

        <div class="textoBanner 
            <?php echo htmlspecialchars($banner['estilo']); ?>">

            <?php  

                $titulo1 = json_decode($banner['titulo1'],true);
                $titulo2 = json_decode($banner['titulo2'],true);
                $titulo3 = json_decode($banner['titulo3'],true);

            ?>
            <h1 style="color: <?php echo htmlspecialchars($titulo1['color']); ?>">

                <?php echo htmlspecialchars($titulo1['texto']); ?>

            </h1>

            <h2 style="color: <?php echo htmlspecialchars($titulo2['color']); ?>">

                <strong>

                    <?php echo htmlspecialchars($titulo2['texto']); ?>

                </strong>

            </h2>

            <h3 style="color: <?php echo htmlspecialchars($titulo2['color']); ?>" >

                <?php echo htmlspecialchars($titulo3['texto']); ?>

            </h3>

        </div>

    </figure>

<?php endif; ?>