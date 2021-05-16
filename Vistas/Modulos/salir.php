<?php 

    session_destroy();
    $urlTienda = Ruta::ctrRuta();

    if(!empty($_SESSION['id_token_google'])){

        unset($_SESSION['id_token_google']);

    }

    echo 
    '<script>

        localStorage.removeItem("usuario");
        localStorage.clear();
        window.location = "'.$urlTienda.'";

    </script>';