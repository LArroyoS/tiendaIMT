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
                                        '<p class="precioCarritoCompra text-center">MXN $ <span>'+Number(item.precio).toFixed(2)+'</span></p>'+

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

                                            '<strong>MXN $ <span>'+(Number(item.cantidad)*Number(item.precio)).toFixed(2)+'</span></strong>'+

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
        localStorage.setItem('sumaCesta',sumaCesta.toFixed(2));

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

    $(".subTotal"+idProducto+' span').html(subTotal.toFixed(2));

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
        $(".sumaCesta").html(sumatotal.toFixed(2));

        localStorage.setItem('sumaCesta', sumatotal.toFixed(2));

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

    $(".listaProductos table.tablaProductos tbody").empty();

    var idUsuario = $(this).attr("idUsuario");
    //console.log('idUsuario',idUsuario);
    var peso = $(".cuerpoCarrito button.quitarItemCarrito");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra");
    var cantidad = $(".cuerpoCarrito .cantidadItem");
    var subtotal = $(".cuerpoCarrito .subTotales span");
    var subTotal = $(".sumaSubTotal .sumaCesta").html();
    //console.log("sumaSubTotal", $(sumaCesta).html());
    var tipoArray = [];
    var cantidadPeso = [];

    /*=======================================================================
    Tasas de impuesto
    =======================================================================*/
    var impuestoTotal = Number(subTotal)*($("#tasaImpuesto").val()/100);
    //console.log('impuestoTotal', impuestoTotal);
    $(".valorTotalImpuesto").html(impuestoTotal.toFixed(2));
    $(".valorSubTotal").html(Number(subTotal).toFixed(2));
    sumaTotalCompra();

    /*=======================================================================
    Listado de productos
    =======================================================================*/
    for(var i=0; i < peso.length; i++){

        var pesoArray = $(peso[i]).attr("peso");
        var tituloArray = $(titulo[i]).html();
        var cantidadArray = $(cantidad[i]).val();
        var subtotalArray = $(subtotal[i]).html();
        cantidadPeso[i] = pesoArray*cantidadArray;
        //console.log('peso ',pesoArray);
        //console.log('titulo ',tituloArray);
        //console.log('cantidad ',cantidadArray);
        //console.log('subtotal ',subtotalArray);
        //console.log('cantidadPeso ',cantidadPeso);

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
                        Number(subtotalArray).toFixed(2)+
                    '<span>'+
                '</td>'+
            '</tr>'
        );

        /* ===============================================================
        Seleccionar pais de envio si hay productos fisicos
        ==================================================================*/
        tipoArray.push($(cantidad[i]).attr("tipo"));
        //console.log(tipoArray);

    }

    /*=======================================================================
    Tasas de Envio
    =======================================================================*/
    function sumaArrayPeso(total,numero){

        return total+numero;

    }

    var sumatotalPeso = cantidadPeso.reduce(sumaArrayPeso);
    //console.log('sumatotalpeso', sumatotalPeso);

    var pais = $("#seleccionePais").val();
    actualizarEnvio(pais,sumatotalPeso);

    /*Metodo que nos permite buscar un valor en los indices de un array */
    /* find */

    /*========================================================
    Existen productos fisicos?
    =========================================================*/

    function checkTipo(tipo){

        return tipo ==  "fisico";

    }


    var verificaTipo = tipoArray.find(checkTipo) == "fisico";
    //console.log(verificaTipo);

    if(verificaTipo==true){

        $(".btnPagar").attr("tipo","fisico");

        $(".formEnvio").show();
        $.ajax({
            url: $rutaOculta+"Vistas/js/plugins/countries.json",
            type: "GET",
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){

                //console.log("respuesta ", respuesta);
                respuesta.forEach(seleccionarPais);

                function seleccionarPais(item, index){

                    var pais = item.name;
                    var codPais = item.code;

                    $("#seleccionePais").append('<option value="'+codPais+'"> '+pais+' </opton>');

                }

            }
        });

        /*========================================================
        Evaluar tasas de envio si el producto es fisico
        =========================================================*/
        $("#seleccionePais").on('change',function(){

            var pais = $(this).val();
            actualizarEnvio(pais,sumatotalPeso);
            sumaTotalCompra();
            $(".alert").remove();

        });

    }
    else{

        $(".btnPagar").attr("tipo","virtual");

    }

});

function actualizarEnvio(pais,sumatotalPeso){

    if(pais!=""){

        var tasaPais = $("#tasaPais").val();
        //console.log(tasaPais);

        if(pais == tasaPais){

            var resultadoPeso = sumatotalPeso*$("#envioNacional").val();
            //console.log("resultadoPeso ",resultadoPeso);

            if(resultadoPeso < $("#tasaMinimaNal").val()){

                resultadoPeso = $("#tasaMinimaNal").val();

            }

            $(".valorTotalEnvio").html(Number(resultadoPeso).toFixed(2));

        }
        else{

            var resultadoPeso = sumatotalPeso*$("#envioInternacional").val();
            //console.log("resultadoPeso ",resultadoPeso);

            if(resultadoPeso < $("#tasaMinimaInt").val()){

                resultadoPeso = $("#tasaMinimaInt").val();

            }

            $(".valorTotalEnvio").html(Number(resultadoPeso).toFixed(2));

        }

    }
    else{

        $(".valorTotalEnvio").html("--");

    }

}

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Evaluar tasas de envio si el producto es fisico
=========================================================*/

function sumaTotalCompra(){

    var subtotal = $(".valorSubTotal").html();
    subtotal = $.isNumeric(subtotal)? Number(subtotal):00;

    var impuesto = $(".valorTotalImpuesto").html();
    impuesto = $.isNumeric(impuesto)? Number(impuesto):00;

    var envio = $(".valorTotalEnvio").html();
    envio = $.isNumeric(envio)? Number(envio):00;

    var sumaTotal = subtotal+impuesto+envio;

    $(".valorTotalCompra").html(sumaTotal.toFixed(2));

}

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Metodo de pago para cada cambio de divisa
=========================================================*/
var metodoPago = "paypal";
var radio = $("input[name='pago'][checked='true']")
    .closest('label');

radio.children("img").eq(0).addClass("seleccion");

divisas(metodoPago);

$("input[name='pago']").change(function(){

    $(".formPago figure img").removeClass("seleccion");

    var metodoPago = $(this).val();
    var label = $(this).closest('label');
    label.children("img").eq(0).addClass("seleccion");
    divisas(metodoPago);

});

/*==========================================================
/*==========================================================
/*==========================================================
Funcion de divisa
=========================================================*/
function divisas(metodoPago){

    $("#cambiarDivisa").empty();

    if(metodoPago == 'paypal'){

        $("#cambiarDivisa").append(''+
            '<option value="MXN">MXN</option>'+
            '<option value="USD">USD</option>'+
            '<option value="EUR">EUR</option>'+
            '<option value="GBP">GBP</option>'+
            '<option value="JPY">JPY</option>'+
            '<option value="CAD">CAD</option>'+
            '<option value="BRL">BRL</option>'
        );

    }
    else{

        $("#cambiarDivisa").append(''+
            '<option value="MXN">MXN</option>'+
            '<option value="USD">USD</option>'+
            '<option value="PEN">PEN</option>'+
            '<option value="COP">COP</option>'+
            '<option value="CLP">CLP</option>'+
            '<option value="ARS">ARS</option>'+
            '<option value="BRL">BRL</option>'
        );

    }

}

/*==========================================================
/*==========================================================
/*==========================================================
Funcion cambio de divisa
=========================================================*/
var divisaBase = "MXN";
var apiKey = "9541037788919e4ada5c";

$("#cambiarDivisa").change(function(){

    var divisa = $(this).val();

    $.ajax({

        //https://free.currconv.com/api/v7/convert?q=USD_MXN&compact=ultra&apiKey=9541037788919e4ada5c
        url: "https://free.currconv.com/api/v7/convert?q="+divisaBase+"_"+divisa+"&compact=ultra&apiKey="+apiKey,
        type: "GET",
        caches: false,
        contentType: false,
        processData: false,
        dataType: "jsonp",
        success: function(respuesta){

            console.log('respuesta',respuesta);

        }
    });

});

/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
/*==========================================================
Pagar
=========================================================*/
$(".btnPagar").click(function(){

    var tipo = $(this).attr("tipo");
    if(tipo=="fisico" && $("#seleccionePais").val()==""){

        $(".btnPagar").before(''+
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">'+
                'No ha seleccionado el país de envío.'+
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                    '<span aria-hidden="true">&times;</span>'+
                '</button>'+
            '</div>'
        );

        return false;

    }
    console.log("Pagar");

});