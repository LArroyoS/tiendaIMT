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

        /*====================================================
        Agregar a lista de deseos
        ====================================================*/
        static public function mdlAgregarDeseo($tabla,$datos){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario,id_producto)
            VALUE (:id_usuario,:id_producto)");

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

        /*====================================================
        mostrar lista de deseos
        ====================================================*/
        static public function mdlMostrarListaDeseos($tabla,$item){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla
                WHERE id_usuario = :id_usuario ORDER BY id_usuario DESC");

            $stmt->bindParam(":id_usuario", $item, PDO::PARAM_STR);

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
        quitar de lista de deseos
        ====================================================*/
        static public function mdlQuitarListaDeseos($tabla,$datos){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla
                WHERE id = :id");

            $stmt->bindParam(":id", $datos, PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return 'ok';

                }
                else{

                    return 'error';

                }

            }
            catch(Exception $e){

                return $e->getMessage();

            }

            $stmt->close();
            $stmt = null;

        }

        /*====================================================
        Eliminar usuario
        ====================================================*/
        static public function mdlEliminarUsuario($tabla,$id){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla
                WHERE id = :id");

            $stmt->bindParam(":id", $id, PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return 'ok';

                }
                else{

                    return 'error';

                }

            }
            catch(Exception $e){

                return $e->getMessage();

            }

            $stmt->close();
            $stmt = null;

        }

        /*====================================================
        Eliminar comentarios usuario
        ====================================================*/
        static public function mdlEliminarComentariosUsuario($tabla,$id){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla
                WHERE id_usuario = :id_usuario");

            $stmt->bindParam(":id_usuario", $id, PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return 'ok';

                }
                else{

                    return 'error';

                }

            }
            catch(Exception $e){

                return $e->getMessage();

            }

            $stmt->close();
            $stmt = null;

        }


        /*====================================================
        Eliminar compras usuario
        ====================================================*/
        static public function mdlEliminarComprasUsuario($tabla,$id){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla
                WHERE id_usuario = :id_usuario");

            $stmt->bindParam(":id_usuario", $id, PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return 'ok';

                }
                else{

                    return 'error';

                }

            }
            catch(Exception $e){

                return $e->getMessage();

            }

            $stmt->close();
            $stmt = null;

        }

        /*====================================================
        Eliminar deseos usuario
        ====================================================*/

        static public function mdlEliminarListaDeseosUsuario($tabla,$id){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla
                WHERE id_usuario = :id_usuario");

            $stmt->bindParam(":id_usuario", $id, PDO::PARAM_STR);

            try{

                if($stmt->execute()){

                    return 'ok';

                }
                else{

                    return 'error';

                }

            }
            catch(Exception $e){

                return $e->getMessage();

            }

            $stmt->close();
            $stmt = null;

        }

    }