/*=======================================================
CARRUCEL
========================================================*/

$('#carousel').flexslider({
    animation: "slide",
    animationLoop: false,
    touch: true, 
    itemWidth: 100,
    itemMargin: 5,
    asNavFor: '#slider'
});

$('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    directionNav: false, 
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
});

/*=======================================================
LUPA
========================================================*/
$(".infoproducto .visor img").mouseover(function(e){

    var capturaImg = $(this).attr("src");
    $(".lupa img").attr("src", capturaImg);
    $(".lupa").fadeIn("fast");
    $(".lupa").css({

        "height": $(".visorImg").height()+"px",
        "backgroud": "#eee",
        "width": "100%",

    });

});

$(".infoproducto .visor img").mousemove(function(e){

    var posX = e.offsetX;
    var posY = e.offsetY;
    $(".lupa img").css({

        "margin-left": (-posX)+"px",
        "margin-top": (-posY)+"px",

    });

});

$(".infoproducto .visor img").mouseout(function(e){

    $(".lupa").fadeOut("fast");

});

/*=======================================================
CONTADOR DE VISTAS
========================================================*/
var contador = 0;
$rutaOculta = $("#rutaOculta").val();

$(window ).on('load',function(){

    var item = "vistas";

    var vistas = $("span.vistas").html();
    var precio = $("span.vistas").attr('precio');

    contador = Number(vistas)+1;
    //console.log("vistas", contador);

    $("span.vistas").html(contador);

    if(precio == 0){

        var item = "vistasGratis";

    }

    var urlActual = location.pathname;
    var ruta = urlActual.split("/");

    //console.log("ruta", ruta.pop());

    var datos = new FormData();

    datos.append('valor', contador);
    datos.append('item',item);
    datos.append("ruta", ruta.pop());

    $.ajax({

        url: $rutaOculta+"ajax/producto.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){

            //console.log('respuesta', respuesta);

        }

    });

});