<?php

    class ControladorProductos{

        /*=========================================
        CATEGORIAS
        ==========================================*/
        static public function ctrMostrarCategorias($item,$valor){

            $tabla = "categorias";

            $respuesta = ModeloProductos::mdlMostrarCategorias($tabla,$item,$valor);

            return $respuesta;

        }

        /*=========================================
        SUB-CATEGORIAS
        ==========================================*/
        static public function ctrMostrarSubCategorias($item,$valor){

            $tabla = "subcategorias";

            $respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla,$item,$valor);

            return $respuesta;

        }

        /*=========================================
        MOSTRAR PRODUCTOS
        ==========================================*/
        static public function ctrMostrarProductos($ordenar,$item,$valor,$base,$tope,$modo){

            $tabla = "productos";

            $respuesta = ModeloProductos::mdlMostrarProductos($tabla,$ordenar,$item,$valor,$base,$tope,$modo);

            return $respuesta;

        }

        /*=========================================
        MOSTRAR INFO PRODUCTOS
        ==========================================*/
        static public function ctrMostrarInfoProducto($item,$valor){

            $tabla = "productos";

            $respuesta = ModeloProductos::mdlMostrarInfoProducto($tabla,$item,$valor);

            return $respuesta;

        }

        /*=========================================
        LISTAR PRODUCTOS
        ==========================================*/
        static public function ctrListarProductos($ordenar,$item,$valor){

            $tabla = "productos";

            $respuesta = ModeloProductos::mdlListarProducto($tabla,$ordenar,$item,$valor);

            return $respuesta;

        }

        /*=========================================
        LISTAR BANNER
        ==========================================*/
        static public function ctrMostrarBanner($ruta){

            $tabla = "banner";

            $respuesta = ModeloProductos::mdlMostrarBanner($tabla,$ruta);

            return $respuesta;

        }

    }