<?php 

    session_destroy();
    $urlTienda = Ruta::ctrRuta();

    echo 
    '<script>

        window.location = "'.$urlTienda.'";

    </script>';