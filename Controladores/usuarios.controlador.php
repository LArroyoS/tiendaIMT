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

                    $encriptar = crypt($_POST["regPassword"], '$*/&wy$alvn01qlaxgt44ty00a1g6qJABGfHjjYAGaev$');


                    $datos = array("nombre" => $_POST["regUsuario"],
                    "password" => $encriptar,
                    "email" => $_POST["regEmail"],
                    "modo" => "DIRECTO",
                    "verificacion" => 1);

                    $tabla = "usuarios";

                    $respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla,$datos);

                    if($respuesta == "ok"){

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

    }