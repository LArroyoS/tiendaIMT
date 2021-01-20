<h1>PRODUCTOS</h1>
<?php 


    $item = "ruta";
    $valor = $rutas[0];

    $categorias = ControladorProductos::ctrMostrarCategorias($item,$valor);

    //var_dump($categorias['id']);
    $itemP = '';
    $valorP = '';

    if(!$categorias){

        $subCategorias = ControladorProductos::ctrMostrarSubCategorias($item,$valor);
        //var_dump($subCategorias[0]['id']);

        $itemP = 'id_subcategoria';
        $valorP = $subCategorias[0]['id'];

    }else{

        $itemP = 'id_categoria';
        $valorP = $categorias['id'];

    }

    $ordenar = 'id';
    $base = 0;
    $tope = 12;

    $productos = ControladorProductos::ctrMostrarProductos($ordenar,$itemP,$valorP,$base,$tope);

    var_dump(count($productos));

    if(!$productos){

        echo 'Aun no hay productos en esta sección';

    }

?>