<?php

    require_once "conexion.php";

    class ModeloCarrito{

        /*===================================
        Mostrar tarifas
        ====================================*/
        static public function mdlMostrarTarifas($tabla){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();

            return $stmt->fetch();

            $stmt ->close();
            $stmt = null;

        }

    }