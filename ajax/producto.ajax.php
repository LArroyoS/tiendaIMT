<?php

    require_once "../Controladores/productos.controlador.php";
    require_once "../Modelos/productos.modelo.php";

    class AjaxProductos{

        public $valor;
        public $item;
        public $ruta;

        public function ajaxVistaProducto(){

            $datos = array("valor"=>$this->valor,
                            "ruta"=>$this->ruta );

            $item = $this->item;

            $respuesta = ControladorProductos::ctrActualizarVistaProducto($datos,$item);
            /* encode: convierte array en string */
            echo json_encode($respuesta);
            //echo json_encode($datos)

        }

    }

    if(isset($_POST['valor'])){

        $vista = new ajaxProductos();
        $vista->valor = $_POST["valor"]; 
        $vista->item = $_POST["item"]; 
        $vista->ruta = $_POST["ruta"]; 
        $vista->ajaxVistaProducto();

    }

?>