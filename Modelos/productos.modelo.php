<?php

    require_once "conexion.php";

    class ModeloProductos{

        /*=========================================
        MOSTRAR CATEGORIAS
        ==========================================*/
        static function mdlMostrarCategorias($tabla,$item,$valor){

            if($item != null){

                $stmt = Conexion::conectar()
                    ->prepare("SELECT * FROM $tabla WHERE $item = :$item");

                $stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

                $stmt->execute();

                return $stmt->fetch();

            }else{

                $stmt = Conexion::conectar()
                    ->prepare("SELECT * FROM $tabla");

                $stmt->execute();

                return $stmt->fetchAll();

            }

            $stmt->close();

            /* Anular objeto */
            $stmt = null;

        }

        /*=========================================
        MOSTRAR SUB-CATEGORIAS
        ==========================================*/
        static function mdlMostrarSubCategorias($tabla,$item,$valor){

            $stmt = Conexion::conectar()
                ->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt -> bindParam(":".$item,$valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();

            $stmt->close();

            /* Anular objeto */
            $stmt = null;

        }

    }