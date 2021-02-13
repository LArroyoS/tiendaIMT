/*=============================================================
VALIDAR EL REGISTRO DE USUARIO
=============================================================*/
$("#Registro").submit('form', function(e){

    var nombre = $("#regUsuario").val();
    var email = $("#regEmail").val();
    var password = $("#regPassword").val();
    var politicas = $("#regTerminos:checked").val();

    var alertas = $('div[alerta]');
    alertas.remove();

    console.log(alertas);

    var error = true;

    /*========================================================
    VALIDAR NOMBRE
    =========================================================*/
    if(nombre != ""){

        var expresion = /^[a-z-A-ZñÑáéíóúÁÉÍÓÚ ]*$/;
        if(!expresion.test(nombre)){

            $("#regUsuario").parent().before(
                '<div alerta=1 class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> No se aceptan números ni caracteres especiales<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            error = false;

        }

    }
    else{

        $("#regUsuario").parent().before(
            '<div alerta="1" class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Este campo es obligatorio<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }
    /*========================================================
    VALIDAR EMAIL
    =========================================================*/
    if(email != ""){

        var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w)*(\.\w{2,4})+$/;
        if(!expresion.test(email)){

            $("#regEmail").parent().before(
                '<div alerta class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> Escriba correctamente el correo electrónico<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            error = false;

        }

    }
    else{

        $("#regEmail").parent().before(
            '<div alerta class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Este campo es obligatorio<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }

    /*========================================================
    VALIDAR PASSWORD
    =========================================================*/
    if(password != ""){

        var expresion = /^[a-z-A-Z0-9]*$/;
        if(!expresion.test(password)){

            $("#regPassword").parent().before(
                '<div alerta class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> No se caracteres especiales<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            error = false;

        }

    }
    else{

        $("#regPassword").parent().before(
            '<div alerta class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Este campo es obligatorio<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }

    /*========================================================
    VALIDAR CONDICIONES Y PRIVACIDAD
    =========================================================*/
    if(politicas != "on"){

        $("#regTerminos").parent().before(
            '<div alerta class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Debe aceptar nuestras condiciones de uso y politicas de privacidad<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }

    return error;

});
