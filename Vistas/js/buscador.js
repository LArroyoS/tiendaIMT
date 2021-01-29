/*=====================================================
BUSCADOR
======================================================*/

$("#buscador input").change(function(){

    var busqueda = $(this).val();
    var espresion = /^[a-zA-Z0-9nÑáéíóúÁÉÍÓÚ ]*$/;
    if(!espresion.test(busqueda)){

        $(this).val("");

    }
    else{

        var direccion = $("#buscador a");
        var evaluarBusqueda = busqueda.replace(/[áéíóúÁÉÍÓÚ ]/g, "-");
        var rutaBuscador = direccion.attr("href");

        if(busqueda != ""){

            direccion.attr("href", rutaBuscador+"/"+evaluarBusqueda);

        }

    }

});

/*=====================================================
BUSCADOR CON ENTER
======================================================*/

$("#buscador input").focus(function(){

    $(document).keyup(function(event){

        event.preventDefault();
        if(event.keyCode == 13 && 
            $("#buscador input").val() != ""){

                var rutaBuscador = $("#buscador a").attr("href");
                window.location.href = rutaBuscador;

            }

    });

});