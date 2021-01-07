/*=================================================
VARIABLES
================================================= */

var item = 0;
var itemPaginacion = $("#paginacion li");
var interrumpirCiclo = true;
var imgProducto = $("#slide .imgProducto");
var titulo1 = $("#slide h1");
var titulo2 = $("#slide h2");
var titulo3 = $("#slide h3");
var btnVerProducto = $("#slide button");
var detenerIntervalo = false;
var toogle = false;

console.log(imgProducto);
$("#slide ul").css({"width": (100*$("#slide ul li").length)+"%"});
$("#slide ul li").css({"width": (100/$("#slide ul li").length)+"%"});

/*=================================================
ANIMACION INICIAL
================================================= */

$(imgProducto[item]).animate({"top": (-10)+"%", "opacity": 0},100,"easeOutBounce");
$(imgProducto[item]).animate({"top": (15)+"%", "opacity": 1},600,"easeOutBounce");

$(titulo1[item]).animate({"top": (-10)+"%", "opacity": 0.5},100);
$(titulo1[item]).animate({"top": (15)+"%", "opacity": 1},600);

$(titulo3[item]).animate({"top": (-10)+"%", "opacity": 0.5},100);
$(titulo3[item]).animate({"top": (15)+"%", "opacity": 1},600);

$(titulo3[item]).animate({"top": (-10)+"%", "opacity": 0.5},100);
$(titulo3[item]).animate({"top": (15)+"%", "opacity": 1},600);

$(btnVerProducto[item]).animate({"top": (-10)+"%", "opacity": 0.5},100);
$(btnVerProducto[item]).animate({"top": (15)+"%", "opacity": 1},600);

/*=================================================
PAGINACION
================================================= */

$("#paginacion li").on("click",function(){

    item = $(this).attr("item")-1;
    movimientoSlide(item);

});

/*=================================================
AVANZAR
================================================= */

function avanzar(){

    if(item >= $("#slide ul li").length-1){

        item = 0;

    }
    else{

        item++;

    }
    movimientoSlide(item);

}

$("#slide #avanzar").on("click",function(){

    avanzar();

});

/*=================================================
RETROCEDER
================================================= */

$("#slide #retroceder").on("click",function(){

    if(item <= 0){

        item = ($("#slide ul li").length-1);

    }
    else{

        item--;

    }
    movimientoSlide(item);

});

/* ==================================================
MOVIMIENTO SLIDE
=================================================== */

function movimientoSlide(item){

    $("#slide ul").animate({"left": (item * -100)+"%"}, 300, "easeOutQuart");
    $("#paginacion li").css({"opacity": 0.5});
    $(itemPaginacion[item]).css({"opacity": 1});
    interrumpirCiclo = true;

    console.log(item);
    console.log(imgProducto[item]);
    $(imgProducto[item]).animate({"top": (-10)+"%", "opacity": 0},100,"easeOutBounce");
    $(imgProducto[item]).animate({"top": (15)+"%", "opacity": 1},600,"easeOutBounce");

    $(titulo1[item]).animate({"top": (-10)+"%", "opacity": 0.5},100);
    $(titulo1[item]).animate({"top": (15)+"%", "opacity": 1},600);

    $(titulo3[item]).animate({"top": (-10)+"%", "opacity": 0.5},100);
    $(titulo3[item]).animate({"top": (15)+"%", "opacity": 1},600);

    $(titulo3[item]).animate({"top": (-10)+"%", "opacity": 0.5},100);
    $(titulo3[item]).animate({"top": (15)+"%", "opacity": 1},600);

    $(btnVerProducto[item]).animate({"top": (-10)+"%", "opacity": 0.5},100);
    $(btnVerProducto[item]).animate({"top": (15)+"%", "opacity": 1},600);

}

/*=================================================
INTERVALO
================================================= */

setInterval(function(){

    if(interrumpirCiclo){

        interrumpirCiclo = false;

    }
    else{

        if(!detenerIntervalo){

            avanzar();

        }

    }

},3000);

/*=================================================
APARECER FLECHAS
================================================= */

$("#slide").mouseover(function(){

    $("#slide #retroceder").css({"opacity": 1});
    $("#slide #avanzar").css({"opacity": 1});
    detenerIntervalo = true;

});

$("#slide").mouseout(function(){

    $("#slide #retroceder").css({"opacity": 0});
    $("#slide #avanzar").css({"opacity": 0});
    detenerIntervalo = false;

});

/*=================================================
ESCONDER SLIDE
================================================= */

$("#btnSlide").on('click',function(){

    if(!toogle){

        toogle = true;
        $("#slide").slideUp("fast");
        $("#btnSlide").html('<i class="fa fa-angle-down"></i>')

    }
    else{

        toogle = false;
        $("#slide").slideDown("fast");
        $("#btnSlide").html('<i class="fa fa-angle-up"></i>')

    }

});