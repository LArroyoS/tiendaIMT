<?php

    class ControladorCarrito{

        /*===================================
        Mostrar tarifas
        ====================================*/
        public function ctrMostrarTarifas(){

            $tabla = 'comercio';
            $respuesta = ModeloCarrito::mdlMostrarTarifas($tabla);

            return $respuesta;

        }

    }