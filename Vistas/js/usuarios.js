/*=============================================================
CAPTURA DE RUTA
=============================================================*/
var rutaActual = location.href;
$("#Ingresar").submit('form',function(){

    localStorage.setItem("rutaActual",rutaActual);
    //console.log(rutaActual);
    var email = $("#ingEmail").val();
    var password = $("#ingPassword").val();

    var alertas = $('div[alerta]');
    alertas.remove();

    console.log(alertas);

    var error = true;

    /*========================================================
    VALIDAR EMAIL
    =========================================================*/
    if(email != ""){

        var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w)*(\.\w{2,4})+$/;
        if(!expresion.test(email)){

            $("#ingEmail").parent().after(
                '<div alerta="ingEmail" class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> Escriba correctamente el correo electrónico<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            error = false;

        }

    }
    else{

        $("#ingEmail").parent().after(
            '<div alerta="ingEmail" class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Este campo es obligatorio<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }

    /*========================================================
    VALIDAR PASSWORD
    =========================================================*/
    if(password != ""){

        var expresion = /^[a-z-A-Z0-9]*$/;
        if(!expresion.test(password)){

            $("#ingPassword").parent().after(
                '<div alerta="ingPassword" class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> No se caracteres especiales<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            error = false;

        }

    }
    else{

        $("#ingPassword").parent().after(
            '<div alerta="ingPassword" class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Este campo es obligatorio<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }

    return error;

});

/*=============================================================
VALIDAR EL REGISTRO DE USUARIO
=============================================================*/
/*
    $("input").focus(function(){

    var id = $(this).attr('id');
    var alertas = $('div[alerta="'+id+'"]');
    alertas.remove();

});
*/

/*=============================================================
VALIDAR EL REGISTRO DE USUARIO
=============================================================*/
$("#Registro").submit('form', function /*validar*/(e){

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

            $("#regUsuario").parent().after(
                '<div alerta=regUsuario class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> No se aceptan números ni caracteres especiales<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            error = false;

        }

    }
    else{

        $("#regUsuario").parent().after(
            '<div alerta="regUsuario" class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Este campo es obligatorio<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }
    
    /*========================================================
    VALIDAR EMAIL
    =========================================================*/
    if(email != ""){

        var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w)*(\.\w{2,4})+$/;
        if(!expresion.test(email)){

            $("#regEmail").parent().after(
                '<div alerta="regEmail" class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> Escriba correctamente el correo electrónico<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            error = false;

        }
        if(!validarEmailRepetido){

            console.log("repetido");
            $("#regEmail").parent().after(
                '<div alerta="regEmail" class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> El correo electronico ya existe en la base de datos, por favor ingrese otro diferente <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            error = false;

        }

    }
    else{

        $("#regEmail").parent().after(
            '<div alerta="regEmail" class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Este campo es obligatorio<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }

    /*========================================================
    VALIDAR PASSWORD
    =========================================================*/
    if(password != ""){

        var expresion = /^[a-z-A-Z0-9]*$/;
        if(!expresion.test(password)){

            $("#regPassword").parent().after(
                '<div alerta="regPassword" class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> No se caracteres especiales<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            error = false;

        }

    }
    else{

        $("#regPassword").parent().after(
            '<div alerta="regPassword" class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Este campo es obligatorio<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }

    /*========================================================
    VALIDAR CONDICIONES Y PRIVACIDAD
    =========================================================*/
    if(politicas != "on"){

        $("#regTerminos").parent().after(
            '<div alerta="regTerminos" class="alert alert-warning" alert-dismissible fade show" role="alert"><strong>ATENCIÓN: </strong> Debe aceptar nuestras condiciones de uso y politicas de privacidad<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        error = false;

    }

    return error;

});

/*=============================================================
VALIDAR EMAIL REPETIDO
=============================================================*/
var validarEmailRepetido = false;

$("#regEmail").change(function(){

    var email = $("#regEmail").val();
    var datos = new FormData();
    datos.append("validarEmail",email);
    //console.log($rutaOculta+'ajax/usuarios.ajax.php')

    $.ajax({

        url: $rutaOculta+'ajax/usuarios.ajax.php',
        method: "POST",
        data: datos,
        cahce: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

            if(respuesta=='false'){

                var alertas = $('div[dinamico="1"]');
                alertas.remove();
                validarEmailRepetido = true;

            }
            else{

                var modo = JSON.parse(respuesta).modo;
                console.log(modo);

                if(modo=='DIRECTO'){

                    modo = "esta página";

                }

                $("#regEmail").parent().after(
                    '<div alerta="regEmail" dinamico="1" class="alert alert-danger" alert-dismissible fade show" role="alert"><strong>ERROR: </strong> El correo electronico ya existe en la base de datos, fue registrado a través de '+modo+', por favor ingrese otro diferente <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                validarEmailRepetido = false;

            }

            console.log(validarEmailRepetido);

        }

    });

});

/*=============================================================
CAMBIAR FOTO
=============================================================*/
$("#btnCambiarFoto").click(function (){

    $("#datosImagen").val("");
    $("#preVisualizar").removeAttr('src');
    $("#imgPerfil").toggle();
    $("#subirImagen").toggle();

});

$("#datosImagen").change(function (){

    var imagen = this.files[0];
    //console.log("imagen", imagen);
    /*========================================
    Validar formato imagen
    =========================================*/
    if(imagen['type']!= "image/jpeg" && imagen['type']!= "image/png"){

        $("#datosImagen").val("");
        swal({

            title: "¡ERROR!",
            text: "!La imagen debe estar en formato JPG o PNG¡",
            type: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false,

        });

    }
    else if(Number(imagen['size']) > 2000000){

        $("#datosImagen").val("");

        swal({

            title: "¡ERROR!",
            text: "!La imagen no debe pesar mas de 2 MB¡",
            type: "error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false,

        });

    }
    else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load",function(e){

            var rutaImagen = e.target.result;
            $("#preVisualizar").attr('src', rutaImagen);

        });

    }

});

/*=============================================================
COMENTARIOS
=============================================================*/
$(".calificarProducto").click(function (){

    var idComentario = $(this).attr('idComentario');
    var idProducto = $(this).attr('idProducto');

    if(idComentario!=''){

        var comentario = $(this).attr('datoComentario');
        var calificacion = $(this).attr('datoCalificacion');

        $("#idComentario").val(idComentario);
        $("#comentario").val(comentario);

        $("#radioCalificacion input[value='"+calificacion+"']").removeAttr('checked',true);
        $("#radioCalificacion input[value='"+calificacion+"']").attr('checked',true);

    }

    $("#idProducto").val(idProducto);

    var puntaje = $("#radioCalificacion input[name='puntaje']:checked").val();
    var puntaje = (puntaje=='')? 5: puntaje;
    actualizarEstrellas(puntaje);

});

/*=============================================================
COMENTARIOS ACTUALIZA ESTRELLA
=============================================================*/
$("input[name='puntaje']").change(function (){

    var puntaje = $(this).val();
    actualizarEstrellas(puntaje)

});

function actualizarEstrellas(puntaje){

    var estrellas = $('#estrellas').children('svg');
    estrellas.eq(0).attr('class', (puntaje==0.5)? "fas fa-star-half-alt": "fas fa-star");
    estrellas.eq(1).attr('class', (puntaje==1.5)? "fas fa-star-half-alt": ((puntaje>=2)? "fas fa-star" : "far fa-star"));
    estrellas.eq(2).attr('class', (puntaje==2.5)? "fas fa-star-half-alt": ((puntaje>=3)? "fas fa-star" : "far fa-star"));
    estrellas.eq(3).attr('class', (puntaje==3.5)? "fas fa-star-half-alt": ((puntaje>=4)? "fas fa-star" : "far fa-star"));
    estrellas.eq(4).attr('class', (puntaje==4.5)? "fas fa-star-half-alt": ((puntaje>=5)? "fas fa-star" : "far fa-star"));

}

/*=============================================================
COMENTARIOS VALIDAR
=============================================================*/
$('#calificar').submit(function(){

    var alerta = "";

    var comentario = $("#comentario").val();
    var calificacion = $("#radioCalificacion input[name='puntaje']:checked").val();
    if(comentario != ""){

        var expresion = /^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ!¡ ]*$/;
        if(!expresion.test(comentario)){

            alerta += '<div class="alert alert-danger" role="alert">';
            alerta += '<strong>¡ERROR!: </strong>';
            alerta += 'No se permiten caracteres especiales ( como por ejemplo: ¿ , ? , + , - , * , _ , etc.. )';
            alerta += '</div>';
            $("#comentario").parent().after(alerta);

        }

    }
    else{

        alerta += '<div class="alert alert-danger" role="alert">';
        alerta += '<strong>¡ERROR!: </strong>';
        alerta += 'Campo obligatorio';
        alerta += '</div>';
        $("#comentario").parent().after(alerta);

    }
    if(calificacion != ""){

        var expresion = /^[.0-9]*$/;
        if(!expresion.test(calificacion)){

            alerta += '<div class="alert alert-danger" role="alert">';
            alerta += '<strong>¡ERROR!: </strong>';
            alerta += 'Solo se permiten numeros reales';
            alerta += '</div>';
            $("#radioCalificacion").parent().after(alerta);


        }

    }
    else{

        alerta += '<div class="alert alert-danger" role="alert">';
        alerta += '<strong>¡ERROR!: </strong>';
        alerta += 'Campo obligatorio';
        alerta += '</div>';
        $("#radioCalificacion").parent().after(alerta);

    }

    return (alerta=="")? true: false;

});

/*=============================================================
Lista de deseos
=============================================================*/
$(".deseos").click(function(){

    var idProducto = $(this).attr('idProducto');
    //console.log('producto',idProducto);
    var idUsuario = localStorage.getItem('usuario');
    //console.log('usuario',idUsuario);

    if(idUsuario==null){

        swal({

            title: "Debe ingresar al sistema",
            text: "¡Para agregar un producto a la lista de deseos 'debe primero ingresar al sistema' !",
            type: "warning",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false,

        },
        function(isConfirm){

            if(isConfirm){

                window.location = $rutaOculta;

            }

        });

    }else{

        $(this).addClass("btn btn-danger");
        var datos = new FormData();
        datos.append('id_usuario',idUsuario);
        datos.append('id_producto',idProducto);

        $.ajax({

            url: $rutaOculta+"ajax/usuarios.ajax.php",
            method: "POST",
            data: datos,
            cahce: false,
            contentType: false,
            processData: false,
            success: function(respuesta){

                console.log('respuesta',respuesta);

            }

        });

    }

});

/*=============================================================
borrar producto de Lista de deseos
=============================================================*/
$(".quitarDeseo").click(function(){

    var idDeseo = $(this).attr('idDeseo');
    $(this).parent().parent().parent().parent().remove();

    var datos = new FormData();
    datos.append('id_deseo',idDeseo);

    $.ajax({

        url: $rutaOculta+"ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cahce: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

            console.log('respuesta',respuesta);

        }

    });

});