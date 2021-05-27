/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Visualizar cesta carrito de compras
===========================================================*/
var sumaCesta = 0;
var cantidadCesta = 0;

if(localStorage.getItem('cantidadCesta') != null &&
    localStorage.getItem('sumaCesta') != null){

    sumaCesta = localStorage.getItem('sumaCesta');
    cantidadCesta = localStorage.getItem('cantidadCesta');

}

actualizarCesta(cantidadCesta,sumaCesta);

function actualizarCesta(cantidadCesta,sumaCesta){

    $(".cantidadCesta").html(cantidadCesta);
    $(".sumaCesta").html(sumaCesta);

}

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Visualizar los productos en la pagina de compras
===========================================================*/
if(localStorage.getItem('listaProductos') != null){

    listaCarrito = JSON.parse(localStorage.getItem('listaProductos'));
    //console.log(listaCarrito);
    listaCarrito.forEach(funcionForEach);

    function funcionForEach(item,index){

        //console.log('item', item);
        $(".cuerpoCarrito").append(''+
                                '<div class="row itemCarrito">'+

                                    '<div class="col-sm-1 col-12 text-center">'+

                                        '<br>'+
                                        '<center>'+

                                            '<button class="btn backColor quitarItemCarrito"'+
                                                'idProducto="'+item.idProducto+'"'+
                                                'tipo="'+item.tipo+'"'+
                                                'peso="'+item.peso+'">'+

                                                '<i class="fas fa-times"></i>'+

                                            '</button>'+

                                        '</center>'+

                                    '</div>'+

                                    '<div class="col-sm-1 col-12">'+

                                        '<figure>'+

                                            '<img src="'+item.imagen+'"'+
                                                'class="img-thumbnail" >'+

                                        '</figure>'+

                                    '</div>'+

                                    '<div class="col-sm-4 col-12 text-center">'+

                                        '<br>'+
                                        '<p class="tituloCarritoCompra text-left">'+item.titulo+'</p>'+

                                    '</div>'+

                                    '<div class="col-md-2 col-sm-1 col-12 text-center">'+

                                        '<br>'+
                                        '<p class="precioCarritoCompra text-center">USD $ <span>'+item.precio+'</span></p>'+

                                    '</div>'+

                                    '<div class="col-md-2 col-sm-3 col-8 text-center">'+

                                        '<br>'+

                                        '<div class="col-8">'+

                                            '<center>'+

                                                '<input type="number" class="form-control text-center cantidadItem" min="1" value="'+item.cantidad+'"'+
                                                    'tipo="'+item.tipo+'" precio="'+item.precio+'" idProducto="'+item.idProducto+'">'+

                                            '</center>'+

                                        '</div>'+

                                    '</div>'+

                                    '<div class="col-md-2 col-sm-1 col-4 text-center">'+

                                        '<br>'+

                                        '<p class="subTotal'+item.idProducto+' subTotales">'+

                                            '<strong>USD $ <span>'+(Number(item.cantidad)*Number(item.precio))+'</span></strong>'+

                                        '</p>'+

                                    '</div>'+

                                '</div>'+

                                '<div class="clearfix"></div>'+
                                '<hr></hr>'
                            );

    }

    /*==========================================================
    evitar manipular la cantidad de productos virtuales
    /*==========================================================*/
    $("input.cantidadItem[tipo='virtual']").attr('readonly',true);

}
else{

    listaCarrito = [];
    resetaerCuerpoSumaCarrito();

}

function resetaerCuerpoSumaCarrito(){

    $(".cuerpoCarrito").html(''+
                        '<div class="card card-body bg-light">'+
                            'Aún no hay productos en el carrito de compras.'+
                        '</div>');
    $(".sumaCarrito").hide();
    $(".cabeceraCheckout").hide();

}

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Agregar al carrito
===========================================================*/

$(".agregarCarrito").click(function(){

    var idProducto = $(this).attr('idProducto');
    var imagen = $(this).attr('imagen');
    var titulo = $(this).attr('titulo');
    var precio = $(this).attr('precio');
    var tipo = $(this).attr('tipo');
    var peso = $(this).attr('peso');
    var agregarAlCarrito = true;

    /*=======================================================
    Capturar detalles
    =======================================================*/
    if(tipo == 'fisico'){

        var seleccionarDetalle = $('.seleccionarDetalle');
        for(var i = 0; i< seleccionarDetalle.length; i++){

            if($(seleccionarDetalle[i]).val() == ""){

                agregarAlCarrito = false;
                swal({

                    title: "Debe seleccionar "+$(seleccionarDetalle[i]).attr('detalle'),
                    text: "",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "¡Seleccionar!",
                    closeOnConfirm: false,

                });

            }else{

                titulo = titulo+"-"+$(seleccionarDetalle[i]).val();

            }

        }

    }

    /*========================================================
    almacenar en local storage los productos agregados al carrito
    =========================================================*/
    if(agregarAlCarrito){

        var salir = false;
        if(localStorage.getItem("listaProductos") != null){

            var listaProductos = JSON.parse(localStorage.getItem("listaProductos"));
            for(var i = 0; i<listaProductos.length && salir==false; i++){

                //console.log(listaProductos[i].idProducto+" "+listaProductos[i].titulo);
                //console.log(idProducto+" "+titulo);
                //console.log(listaProductos[i].tipo);
                if(listaProductos[i].idProducto == idProducto && 
                    listaProductos[i].titulo == titulo &&
                    tipo != 'virtual'){

                    listaProductos[i].cantidad = Number(listaProductos[i].cantidad)+1; 
                    //console.log(listaProductos);
                    listaCarrito = listaProductos;
                    //console.log(listaCarrito);
                    salir = true;

                }
                else if(listaProductos[i].idProducto == idProducto && 
                    tipo == 'virtual'){

                    /*========================================================
                    alerta producto agregado
                    =========================================================*/
                    swal({

                        title: "",
                        text: "¡El producto ya esta agregado al carrito de compras!",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "¡Volver!",
                        closeOnConfirm: false,

                    });
                    return;

                }

            }

        }

        var cantidadCesta = Number($('.cantidadCesta').html());
        var sumaCesta = Number($('.sumaCesta').html());

        //console.log(salir);
        if(!salir){

            listaCarrito.push({
                'idProducto':idProducto,
                'imagen':imagen,
                'titulo':titulo,
                'precio':precio,
                'tipo':tipo,
                'peso':peso,
                'cantidad':1,
            });

        }

        //console.log(listaCarrito);
        localStorage.setItem('listaProductos',JSON.stringify(listaCarrito));

        /*========================================================
        Actualizar Cesta
        =========================================================*/
        cantidadCesta++;
        sumaCesta += (Number(precio));

        actualizarCesta(cantidadCesta,sumaCesta);

        localStorage.setItem('cantidadCesta',cantidadCesta);
        localStorage.setItem('sumaCesta',sumaCesta);

        /*========================================================
        alerta producto agregado
        =========================================================*/
        swal({

            title: "",
            text: "¡Se ha agregado un nuevo producto al carrito de compras!",
            type: "success",
            showCancelButton: true,
            cancelButtonColor: "#000000",
            confirmButtonColor: "#DD6B55",
            cancelButtonText: "¡Continuar Comprando!",
            confirmButtonText: "¡Ir a mi carrito de compras!",
            closeOnConfirm: false,

        },
        function(isConfirm){

            if(isConfirm){

                window.location = $rutaOculta+"carrito-de-compras";

            }

        });

    }

});

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Quitar productos del carrito
===========================================================*/
$('.quitarItemCarrito').click(function(){

    $(this).parent().parent().parent().remove();
    
    actualizarLocalStotage();

});

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Generar subtotal despues de cambiar cantidad
===========================================================*/
$(".cantidadItem").change(function(){

    var cantidad = $(this).val();
    var precio = $(this).attr('precio');
    var idProducto = $(this).attr('idProducto');
    var cantidadItem= $(".cantidadItem");

    var subTotal = (Number(cantidad)*Number(precio));

    $(".subTotal"+idProducto+' span').html(subTotal);

    /*==============================================================
    Actualizar cantidad local storage
    ==============================================================*/
    actualizarLocalStotage();

});

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Actualizar localstorage
===========================================================*/
function actualizarLocalStotage(){

    var idProducto = $(".cuerpoCarrito button");
    //console.log(idProducto);
    var imagen = $(".cuerpoCarrito img");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
    var precio = $(".cuerpoCarrito .precioCarritoCompra span");
    var cantidad = $(".cuerpoCarrito .cantidadItem");

    /*======================================================
    Si aun quedan productos volverlos a agregar al carrito (localstorage) 
    ==========================================================*/
    listaCarrito = [];

    if(idProducto.length != 0){

        for(var i=0; i<idProducto.length; i++){

            var idProductoArray = $(idProducto[i]).attr('idProducto');
            var imagenArray = $(imagen[i]).attr('src');
            var pesoArray = $(idProducto[i]).attr('peso');
            var tituloArray = $(titulo[i]).html();
            var tipoArray = $(idProducto[i]).attr('tipo');
            var precioArray = $(precio[i]).html();
            var cantidadArray = $(cantidad[i]).val();

            listaCarrito.push({
                'idProducto':idProductoArray,
                'imagen':imagenArray,
                'titulo':tituloArray,
                'precio':precioArray,
                'tipo':tipoArray,
                'peso':pesoArray,
                'cantidad':cantidadArray,
            });

        }

        localStorage.setItem('listaProductos',JSON.stringify(listaCarrito));
        var cantidadProductos = idProducto.length;

        sumaSubTotales();
        cestaCarrito(cantidadProductos);

    }
    else{

        /*==============================================================
        Si ya bp quedan productos hay que remover todo
        ==============================================================*/
        localStorage.removeItem("listaProductos");
        localStorage.removeItem("cantidadCesta",0);
        localStorage.removeItem("sumaCesta",0);

        actualizarCesta(0,0);
        resetaerCuerpoSumaCarrito();

    }

}

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Suma de todos los subtotales
===========================================================*/
sumaSubTotales();

function sumaSubTotales(){

    var subtotales = $(".subTotales span");
    var arraySumaSubtotales = [];
    //console.log("subtotales", subtotales);
    for(var i = 0; i < subtotales.length; i++){

        var subtotalesArray = $(subtotales[i]).html();
        arraySumaSubtotales.push(Number(subtotalesArray));

    }

    function sumaArraySubtotales(total,numero){

        return total+numero;

    }

    if(arraySumaSubtotales.length){

        var sumatotal = arraySumaSubtotales.reduce(sumaArraySubtotales);
        //console.log(sumatotal);
        $(".sumaCesta").html(sumatotal);

        localStorage.setItem('sumaCesta', sumatotal);

    }

}

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Actualizar cewsta al cambier cantidad
===========================================================*/
function cestaCarrito(cantidadProductos){

    /*Si hay productos en el carrito */
    if(cantidadProductos != 0){

        var cantidadItem = $(".cuerpoCarrito .cantidadItem");
        var arraySumaCantidades = [];

        for(var i = 0; i < cantidadItem.length; i++){

            var cantidadItemArray = $(cantidadItem[i]).val();
            arraySumaCantidades.push(Number(cantidadItemArray));

        }

        function sumaArrayCantidades(total,numero){

            return total+numero;

        }

        if(arraySumaCantidades.length){

            var sumatotalCantidades = arraySumaCantidades.reduce(sumaArrayCantidades);
            //console.log(sumatotalCantidades);

            $(".cantidadCesta").html(sumatotalCantidades);

            localStorage.setItem('cantidadCesta', sumatotalCantidades);

        }

    }

}

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
chehkout
===========================================================*/
$("#btnCheckout").click(function(){

    var idUsuario = $(this).attr("idUsuario");
    //console.log('idUsuario',idUsuario);
    var peso = $(".cuerpoCarrito button.quitarItemCarrito");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
    var cantidad = $(".cuerpoCarrito .cantidadItem");
    var subtotal = $(".cuerpoCarrito .subTotales span");

    for(var i=0; i < peso.length; i++){

        var pesoArray = $(peso[i]).attr("peso");
        var tituloArray = $(titulo[i]).html();
        var cantidadArray = $(cantidad[i]).val();
        var subtotalArray = $(subtotal[i]).html();
        //console.log('peso ',pesoArray);
        //console.log('titulo ',tituloArray);
        //console.log('cantidad ',cantidadArray);
        //console.log('subtotal ',subtotalArray);

        /* ===============================================================
        Mostrar productos definitivos
        ==================================================================*/

        $(".listaProductos table.tablaProductos tbody").append(''+
            '<tr>'+
                '<td>'+
                    tituloArray+
                '</td>'+
                '<td>'+
                    cantidadArray+
                '</td>'+
                '<td>'+
                    '$'+
                    '<span>'+
                        subtotalArray+
                    '<span>'+
                '</td>'+
            '</tr>'
        );

    }

});