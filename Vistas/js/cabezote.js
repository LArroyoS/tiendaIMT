/*==========================================
CABEZOTE
==========================================*/

$('#btnCategorias').on('click',function(e){

    if(window.matchMedia("(max-width:576px)").matches){

        $('#btnCategorias').after($('#categorias').slideToggle("fast"));

    }
    else{

        $('#encabezado').after($('#categorias').slideToggle("fast"));

    }

});