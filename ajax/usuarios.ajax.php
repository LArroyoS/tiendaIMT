<?php 

require_once '../Controladores/usuarios.controlador.php';
require_once '../Modelos/conexion.php';
require_once '../Modelos/usuarios.modelo.php';

class AjaxUsuarios{

    /*===========================================================
    VALIDAR EMAIL EXISTENTE
    ============================================================*/
    public $validarEmail;

    public function ajaxValidarEmail(){

        $datos = $this->validarEmail;
        $respuesta = ControladorUsuarios::ctrMostrarUsuario("email",$datos);

        echo json_encode($respuesta);

    }

}

/*===========================================================
VALIDAR EMAIL EXISTENTE
============================================================*/
if(isset($_POST["validarEmail"])){

    $validarEmail = new AjaxUsuarios();
    $validarEmail->validarEmail = $_POST["validarEmail"];
    $validarEmail->ajaxValidarEmail();

}