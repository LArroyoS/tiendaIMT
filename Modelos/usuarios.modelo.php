<?php

    class ModeloUsuarios{

        /*=====================================================
        RESGISTRO DE USUARIO
        =====================================================*/
        static public function mdlRegistroUsuario($tabla,$datos){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,password,email,foto,modo,verificacion,emailEncriptado)
            VALUE (:nombre, :password, :email, :foto, :modo, :verificacion,:emailEncriptado)");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
            $stmt->bindParam(":modo", $datos["modo"], PDO::PARAM_STR);
            $stmt->bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_INT);
            $stmt->bindParam(":emailEncriptado", $datos["emailEncriptado"], PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return "ok";

                }
                else{

                    return "error";

                }

            }
            catch(Exception $e){

                return $e->getMessage();

            }

            $stmt->close();
            $stmt = null;

        }

        /*====================================================
        MOSTRAR USUARIO
        ====================================================*/
        static public function mdlMostrarUsuario($tabla,$item,$valor){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla
                WHERE $item = :$item");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return $stmt->fetch();

                }
                else{

                    return false;

                }

            }
            catch(Exception $e){

                return false;

            }

            $stmt->close();
            $stmt = null;

        }

        /*====================================================
        ACTUALIZAR USUARIO
        ====================================================*/
        static public function mdlActualizarUsuario($tabla, $id, $item,$valor){

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                SET $item = :$item
                WHERE id = :id");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return "ok";

                }
                else{

                    return "error";

                }

            }
            catch(Exception $e){

                return "error";

            }

            $stmt->close();
            $stmt = null;

        }

        /*==========================================================
        ACTUALIZAR PERFIL
        ===========================================================*/
        static public function mdlActualizarPerfil($tabla,$datos){

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                SET nombre = :nombre, 
                    email = :email, 
                    password = :password,
                    foto = :foto,
                    modo = :modo
                WHERE id = :id");

            $stmt->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos['email'], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos['password'], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos['foto'], PDO::PARAM_STR);
            $stmt->bindParam(":modo", $datos['modo'], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos['id'], PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return "ok";

                }
                else{

                    return "error";

                }

            }
            catch(Exception $e){

                return $e->getMessage();

            }

            $stmt->close();
            $stmt = null;

        }

        
        /*====================================================
        MOSTRAR COMPRAS
        ====================================================*/
        static public function mdlMostrarCompras($tabla,$item,$valor){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla
                WHERE $item = :$item");

            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return $stmt->fetchAll();

                }
                else{

                    return false;

                }

            }
            catch(Exception $e){

                return false;

            }

            $stmt->close();
            $stmt = null;

        }

        /*====================================================
        MOSTRAR COMPRAS
        ====================================================*/
        static public function mdlMostrarComentarioPerfil($tabla,$datos){

            if($datos['id_usuario']!=''){

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla
                    WHERE id_usuario = :id_usuario AND id_producto = :id_producto");

                $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
                $stmt->bindParam(":id_producto", $datos['id_producto'], PDO::PARAM_INT);

                try{

                    if($stmt->execute()){
    
                        return $stmt->fetch();
    
                    }
                    else{
    
                        return false;
    
                    }
    
                }
                catch(Exception $e){
    
                    return false;
    
                }

            }
            else{

                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla
                    WHERE id_producto = :id_producto ORDER BY Rand()");

                $stmt->bindParam(":id_producto", $datos['id_producto'], PDO::PARAM_INT);

                try{

                    if($stmt->execute()){
    
                        return $stmt->fetchAll();
    
                    }
                    else{
    
                        return false;
    
                    }
    
                }
                catch(Exception $e){
    
                    return false;
    
                }

            }

            $stmt->close();
            $stmt = null;

        }

        /*====================================================
        ACTUALIZAR Comentario
        ====================================================*/
        static public function mdlActualizarComentario($tabla, $datos){

            $stmt = Conexion::conectar()->prepare("UPDATE $tabla 
                SET calificacion = :calificacion, comentario = :comentario
                WHERE id = :id");

            $stmt->bindParam(":comentario", $datos['comentario'], PDO::PARAM_STR);
            $stmt->bindParam(":calificacion", $datos['calificacion'], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos['id'], PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return "ok";

                }
                else{

                    return "error";

                }

            }
            catch(Exception $e){

                return "error";

            }

            $stmt->close();
            $stmt = null;

        }

        /*=====================================================
        RESGISTRO DE comentario
        =====================================================*/
        static public function mdlRegistroComentario($tabla,$datos){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario,id_producto,calificacion,comentario)
            VALUE (:id_usuario,:id_producto,:calificacion,:comentario)");

            $stmt->bindParam(":comentario", $datos['comentario'], PDO::PARAM_STR);
            $stmt->bindParam(":calificacion", $datos['calificacion'], PDO::PARAM_STR);
            $stmt->bindParam(":id_producto", $datos['id_producto'], PDO::PARAM_STR);
            $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return "ok";

                }
                else{

                    return "error";

                }

            }
            catch(Exception $e){

                return $e->getMessage();

            }

            $stmt->close();
            $stmt = null;

        }

    }