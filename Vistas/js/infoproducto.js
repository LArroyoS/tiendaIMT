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