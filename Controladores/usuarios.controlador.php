<?php

    class ControladorUsuarios{

        /*====================================================
        REGISTRO USUARIO
        ====================================================*/
        public function ctrRegistroUsuario(){

            if(isset($_POST["regUsuario"])){

                if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUsuario"]) &&
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){

                    $url = Ruta::ctrRuta();

                    $encriptar = crypt($_POST["regPassword"], '$*/&wy$alvn01qlaxgt44ty00a1g6qJABGfHjjYAGaev$');
                    $encriptarEmail = md5($_POST["regEmail"]);

                    $datos = array("nombre" => $_POST["regUsuario"],
                    "password" => $encriptar,
                    "email" => $_POST["regEmail"],
                    "modo" => "DIRECTO",
                    "verificacion" => 1,
                    "emailEncriptado" => $encriptarEmail);

                    $tabla = "usuarios";

                    $respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla,$datos);

                    if($respuesta == "ok"){


                        /*==========================================================
                        VERIFICACION DE CORREO ELECTRONICO
                        ===========================================================*/

                        date_default_timezone_set("America/Mexico_City");

                        $mail = new PHPMailer;
                        $mail->CharSet = 'UTF-8';
                        $mail->setFrom('lguay7522@gmail.com', 'Refaccionaria IMT');
                        $mail->addAddress($_POST['regEmail'],'Usuario');
                        $mail->Subject = "Por Favor Verifique su Correo Electronico";
                        $mail->msgHTML(

                            '<div style="width:100%; background: #eee; position: relative; font-family:sans-serif; padding-bottom: 40px;">

                                <center>
                    
                                    <img style="padding: 20px; width: 10%;" 
                                        src="https://www.freejpg.com.ar/image-900/70/70d0/F100011941-cultivo_de_soja_en_area_rural.jpg" 
                                        alt="">
                    
                                </center>
                    
                                <div style="position: relative; margin: auto; width: 600px;
                                    background: white; padding: 20px;">
                    
                                    <center>
                    
                                        <img style="padding: 20px; width: 15%;" 
                                            src="https://www.freejpg.com.ar/image-900/3e/3e0c/F100006796-buzon.jpg" 
                                            alt="">
                    
                                        <h3 style="font-weight: 100; color: #999">
                    
                                            VERIFIQUE SU CORREO ELECTRÓNICO
                    
                                        </h3>
                    
                                        <hr style="border: 1px solid #ccc; width: 80%;">
                    
                                        <h4 style="font-weight: 100; color: #999; padding: 0 20px;">
                    
                                            Para comenzar a usar su cuenta de la Tienda Virtual, debe confirmar su correo electrónico
                    
                                        </h4>
                    
                                        <a href="'.$url.'verificar/'.$encriptarEmail.'" target="_blank" 
                                            style="text-decoration: none;">

                                            <div style="line-height: 60px; background: #0aa; width: 60%; color: white;">Verifique su correo electrónico</div>
                    
                                        </a>
                    
                                        <br>
                    
                                        <hr style="border: 1px solid #ccc; width: 80%;">
                    
                                        <h5 style="font-weight: 100; color: #999;">
                    
                                            Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminara
                    
                                        </h5>
                    
                                    </center>
                    
                                </div>
                    
                            </div>'

                        );

                        $envio = $mail->send();

                        if(!$envio){

                            echo '<script>

                                swal(

                                    {

                                        title: "!OK¡",
                                        text: "¡Ha ocurrido un problema enviando verificación de correo electrónico a '.$_POST['regEmail'].' '.$mail->ErrorInfo.'!",
                                        type: "error",
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false,

                                    },
                                    function(isConfirm){

                                        if(isConfirm){

                                            /*Permite regresar a la pagina anterior*/
                                            history.back();

                                        }

                                    }

                                );

                            </script>';

                        }
                        else{

                            echo '<script>

                                swal(

                                    {

                                        title: "!OK¡",
                                        text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electronico '.$_POST["regEmail"].'para verificar su cuenta",
                                        type: "success",
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false,

                                    },
                                    function(isConfirm){

                                        if(isConfirm){

                                            /*Permite regresar a la pagina anterior*/
                                            history.back();

                                        }

                                    }

                                );

                            </script>';

                        }

                    }
                    else{

                        echo '<script>

                            swal(

                                {

                                    title: "!ERROR¡",
                                    text: "Al registrar el usuario, no se permiten caracteres especiales",
                                    type: "error",
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false,

                                },
                                function(isConfirm){

                                    if(isConfirm){

                                        /*Permite regresar a la pagina anterior*/
                                        history.back();

                                    }

                                }

                            );

                        </script>';

                    }

                }
                else{

                    echo '<script>

                        swal({
                            title: "!ERROR¡",
                            text: "Al registrar el usuario, no se permiten caracteres especiales",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,

                        },
                        function(isConfirm){

                            if(isConfirm){

                                /*Permite regresar a la pagina anterior*/
                                history.back();

                            }

                        }
                    );

                    </script>';

                }

            }

        }

        /*====================================================
        MOSTRAR USUARIO
        ====================================================*/
        static public function ctrMostrarUsuario($item,$valor){

            $tabla = "usuarios";
            $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla,$item,$valor);

            return $respuesta;

        }

        /*====================================================
        ACTUALIZAR USUARIO
        ====================================================*/
        static public function ctrActualizarUsuario($id, $item,$valor){

            $tabla = "usuarios";
            $respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla,$id,$item,$valor);

            return $respuesta;

        }

        /*====================================================
        INGRESO USUARIO
        ====================================================*/
        public function ctrIngresoUsuario(){

            if(isset($_POST["ingEmail"])){

                if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

                    $url = Ruta::ctrRuta();

                    $encriptar = crypt($_POST["ingPassword"], '$*/&wy$alvn01qlaxgt44ty00a1g6qJABGfHjjYAGaev$');

                    $tabla = "usuarios";
                    $item = "email";
                    $valor = $_POST["ingEmail"];

                    $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla,$item,$valor);

                    if($respuesta["email"] == $_POST['ingEmail'] &&
                        $respuesta['password'] == $encriptar ){

                        if($respuesta["verificacion"]==1){

                            echo '<script>

                                swal(

                                    {

                                        title: "!NO HA VERIFICADO SU CORREO ELECTRÓNICO¡",
                                        text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electronico '.$respuesta['email'].'para verificar su cuenta,
                                        type: "error",
                                        confirmButtonText: "Cerrar",
                                        closeOnConfirm: false,

                                    },
                                    function(isConfirm){

                                        if(isConfirm){

                                            /*Permite regresar a la pagina anterior*/
                                            history.back();

                                        }

                                    }

                                );

                            </script>';

                        }
                        else{

                            $_SESSION["validarSesion"] = "ok";
                            $_SESSION["id"] = $respuesta['id'];
                            $_SESSION["nombre"] = $respuesta['nombre'];
                            $_SESSION["foto"] = $respuesta['foto'];
                            $_SESSION["email"] = $respuesta['email'];
                            $_SESSION["password"] = $respuesta['password'];
                            $_SESSION["modo"] = $respuesta['modo'];

                            //Redireccionar a al pagina donde se encuentra actualmente
                            echo 
                            '<script>

                                window.location = localStorage.getItem("rutaActual");

                            </script>';

                        }

                    }
                    else{

                        echo '<script>

                            swal(

                                {

                                    title: "!ERROR AL INGRESAR¡",
                                    text: "¡Por favor revise que el usuario exista y que la contraseña sea correcta!",
                                    type: "error",
                                    confirmButtonText: "Cerrar",
                                    closeOnConfirm: false,

                                },
                                function(isConfirm){

                                    if(isConfirm){

                                        /*Permite regresar a la pagina anterior*/
                                        window.location = localStorage.getItem("rutaActual");

                                    }

                                }

                            );

                        </script>';

                    }

                }
                else{

                    echo '<script>

                        swal({
                            title: "!ERROR AL INGRESAR¡",
                            text: "Al ingresar al sistema, no se permiten caracteres especiales",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,

                        },
                        function(isConfirm){

                            if(isConfirm){

                                /*Permite regresar a la pagina anterior*/
                                history.back();

                            }

                        }
                    );

                    </script>';

                }

            }

        }

        /*====================================================
        INGRESO USUARIO
        ====================================================*/
        public function ctrOlvidoPassword(){

            if(isset($_POST["passEmail"])){

                if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])){

                    /*====================================================
                    GENERAR CONTRASEÑA ALEATORIA
                    ====================================================*/

                    function generarPassword($longitud){

                        $key = "";
                        $pattern = "1234567890abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
                        $max = strlen($pattern)-1;
                        for($i=0;$i<$longitud;$i++){

                            $key .= $pattern{mt_rand(0,$max)};

                        }

                        return $key;

                    }

                    $nuevaPassword = generarPassword(11);
                    $encriptar = crypt($nuevaPassword,'$*/&wy$alvn01qlaxgt44ty00a1g6qJABGfHjjYAGaev$');

                    $table = "usuarios";

                    $item1 = "email";
                    $valor1 = $_POST["passEmail"];
                    $respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla,$item1,$valor1);

                    if($respuesta1){

                        $id = $respuesta1['id'];
                        $item2 = "password";
                        $valor2 = $encriptar;

                        $respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla,$id,$item2,$valor2);
                        if($respuest2 == 'ok'){



                        }
                    }
                    else{

                        echo '<script>

                        swal({
                            title: "!ERROR¡",
                            text: "El correo electronico no existe en el sistema",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,

                        },
                        function(isConfirm){

                            if(isConfirm){

                                /*Permite regresar a la pagina anterior*/
                                history.back();

                            }

                        }
                    );

                    </script>';

                    }

                    //var_dump($nuevaPassword);

                }
                else{

                    echo '<script>

                        swal({
                            title: "!ERROR¡",
                            text: "El correo electronico pudo ser enviado, puede que este mal escrito",
                            type: "error",
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,

                        },
                        function(isConfirm){

                            if(isConfirm){

                                /*Permite regresar a la pagina anterior*/
                                history.back();

                            }

                        }
                    );

                    </script>';

                }

            }

        }

    }