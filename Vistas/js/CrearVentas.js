


function init(){
    getNewCode();
}

$('.TablaSeleccionarCliente').DataTable({
    "ajax": "Ajax/VentasSeleccionarClienteDataTable.Ajax.php",
    "responsive": true,
    "autoWidth": false,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

})

function escogercliente(id){

    let nombre = $('#cliente_'+id).attr("nombre");
    $('#idCliente').val(id);
    $('#DatosDelCliente').val(nombre);
    $("#ModalSeleccionarCliente").modal('hide');
}

function getNewCode(){

    $.ajax({
        type: "Post",
        url: "Ajax/Ventas.Ajax.php",
        data: {type: 'obtener_codigo'},
        success: function (respuesta) {
            console.log(respuesta)
            let dato = respuesta.substr(0,10);
            $('#codigoVenta').html(respuesta);
        },
        error:function(e){
            //console.log(e);
        }
    });
}
/*=============================================
 CARGAR TABLA  PRODUCTOS VENTAS CON AJAX
 =============================================*/
$('.TablaDeVentas_001').DataTable({
    "ajax": "Ajax/VentasDataTable.Ajax.php",
    "responsive": true,
    "autoWidth": false,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

})



 $(".TablaProductosAddVentas").DataTable({
    "dom": '',
    "paging": false,
    "ordering": false,
    "info": false,
    "responsive": true,
    "autoWidth": false,
    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }

})






var ArrayProducto = [];


$(".TablaProductosVenta tbody").on("click", "button.btnAddProductos", function() {
   // $('.btnGuardarVenta').removeClass('collapse').addClass('collapse.show');
    var idProducto = $(this).attr("idProducto");
    $(this).removeClass("btn-info btnAddProductos");
    $(this).addClass("btn-default disabled");
    var datos = new FormData();
    datos.append("idProducto", idProducto);
    $.ajax({
        url: "Ajax/Productos.Ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
           // var idProductos = respuesta[0]["idProducto"];
            var Descripcion = respuesta[0]["NombreProducto"];
            var Id = respuesta[0]["idProducto"];
            var Stock = respuesta[0]["Stock"];
            var PrecioUnitario = respuesta[0]["PrecioVenta"];



            /*=============================================
              EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
              =============================================*/

            if (Stock == 0) {

                Swal.fire({
                    title: "No hay stock disponible",
                    type: "error",
                    confirmButtonText: "¡Cerrar!"
                });

                $("button[idProducto='" + idProducto + "']").addClass("btn-info agregarProducto");
                $("button[idProducto='" + idProducto + "']").removeClass("btn-default disabled agregarProducto");

                return;

            }


            var TablaVentas = $('.TablaProductosAddVentas').DataTable();
            //var index = TablaVentas.rows().count() + 1;
            
            let num = ArrayProducto.length;
            var index = 1;
            if( num > 0){
                index = (ArrayProducto[num - 1]) + 1;
            }
            TablaVentas.row.add(["<tr><td><div class='btn-group'><button onclick='eliminarProd("+index+",\""+idProducto+"\")' type='button'class='btn btn-danger btn-xs btnQuitarProducto' idProducto='" + idProducto + "'><i class='fa fa-times'></i></button></div></td>",
                "<td class='nuevaDescripcionProducto' idProducto='" + idProducto + "'name='agregarProducto' value='" + Descripcion + "'>" + Descripcion + "</td>",
                "<td><span id='precio" + index + "'>" + PrecioUnitario + "</span></td>",
                "<td><input id='cant" + index + "' type='number'onchange='CalcularPrecioProducto(this," + PrecioUnitario + "," + index + ")' precioUnitario='" + PrecioUnitario + "' class='form-control form-control-sm nuevaCantidadProducto' name='nuevaCantidadProducto' min='1' value='1' stock='" + Stock + " ' nuevoStock='" + Number(Stock - 1) + "' required></td>",
                "<td><p id='Total" + index + "' value='' class='Total'>" + PrecioUnitario + "</p><input value='" + Id + "' type='hidden' id='productoid_" + index + "'/></td></tr>"
            ]).draw(true);
            ArrayProducto.push(index);
            precioTotal();
        }
    })

})



/*=============================================
QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
=============================================*/
function eliminarProd(ind,id){
 $("#btnAddProductos"+id).removeClass("btn-default disabled");
 $("#btnAddProductos"+id).addClass("btn-info btnAddProductos");
    let indexArray = ArrayProducto.indexOf(ind);
    //console.log(id)
    ArrayProducto.splice(indexArray,1);
    let tabla = $('.TablaProductosAddVentas').dataTable();

    //tabla.rows(indexArray).delete();
    let row = tabla.find('tr').eq(indexArray + 1);
    console.log(row)
    tabla.fnDeleteRow( row[0] );
    //console.log(ArrayProducto);
   
    precioTotal();



}



function CalcularPrecioProducto(opj, Precio, index) {
    //var PrecioProducto= Cantidad*Precio;
    var cantidad = opj.value;
    var PrecioProducto = cantidad * Precio;
    $("#Total" + index).html(PrecioProducto);
    precioTotal();
}

function precioTotal() {
    let sumaSubTotal = 0;
    let tblVenta = $('.TablaProductosAddVentas').DataTable();

    let cantidadRow = tblVenta.rows().count();
    //console.log(cantidadRow)
    for (var i = 0; i < cantidadRow; i++) {

        let valorPrincipio = parseFloat($('#precio' + ArrayProducto[i]).html());
        //console.log(valorPrincipio)
        //let in = ArrayProducto[i];
        let cant = parseInt($('#cant' + ArrayProducto[i]).val());
        
        if (cant < 0) {
            cant = 1;
        }
        let valor = valorPrincipio * cant;
        sumaSubTotal += valor;
    }

    $('#subTotal').html(sumaSubTotal);
    $('#SubTotal').val(sumaSubTotal);
    let igv = (sumaSubTotal * 0.18).toFixed(2);
    $('#igv').html(igv);
    $('#IGV').val(igv);
    igv = parseFloat(igv)
    //console.log(sumaSubTotal + igv);
    let total = (sumaSubTotal + igv).toFixed(2);

    $('#total').html(total);
    $('#Total').val(total);
    $('#totalFinal').html(total);
    $('#TotalFinal').val(total);
     $('#MontoPagar').val(total);
    
    if(sumaSubTotal == 0 || sumaSubTotal == 0.00){
        DsctoHabilitar(false);
    }else{
        DsctoHabilitar(true);
    }
}
//realizar una funcion cuando el valor del input cambie
$( "#dscto" ).change(function() {
let valor = parseInt(this.value);
if(valor >=0 && valor<=100){
   let total = parseFloat($('#total').html());
  let dscto = valor /100;
  let totalMenos = (total * dscto).toFixed(2);
  let totalFinal = (total - totalMenos).toFixed(2);
  $('#totalFinal').html(totalFinal); 
  $('#TotalFinal').val(totalFinal); 
  $('#MontoPagar').val(totalFinal); 
}else{
    this.value=0;
}

});

//habilitar el input number dependiendo si existen productos en la lista de ventas
function  DsctoHabilitar(valor){
    if(valor){
        $("#dscto").removeAttr('disabled');
    }else{
        $("#dscto").attr('disabled','disabled');
    }
}



init();




$("#ModalVenta").on("change", "input.EfectivoRecibido", function(){
    
var MontoTotal=$("#MontoPagar").val();
var MontoRecibido=$("#EfectivoRecibido").val();

//console.log(MontoTotal);
//console.log(MontoRecibido);
var Cambio= Number(MontoRecibido- MontoTotal).toFixed(2);
$("#Cambio").val(Cambio);
})

function isEmpty(data){
    if (data == '') {
        return true;
    }
    return false;
}

function guarar_venta(){
    let tblVenta = $('.TablaProductosAddVentas').DataTable();
    let cantidadRow = tblVenta.rows().count();
    let items = [];
    for (var i = 0; i < cantidadRow; i++){
        let obj = {
            'idProducto': $('#productoid_'+(i+1)).val(),
            'cantidad': $('#cant'+(i+1)).val(),
            'total': $('#Total'+(i+1)).html(),
        }
        items.push(obj)
    }
    let igv = $('#IGV').val();
    let metodoPago = $('#metodoPago').val();
    let subtotal = $('#SubTotal').val();
    let totalfinal =  $('#TotalFinal').val(); 
    let montopagar =  $('#MontoPagar').val(); 
    let dscto =  $('#dscto').val(); 
    let codigoVenta =  $('#codigoVenta').html(); 
    let idCliente =  $('#idCliente').val();
    let tipoVenta =  $('#tipoVenta').val();
    if (!isEmpty(tipoVenta) && !isEmpty(metodoPago) && !isEmpty(totalfinal) && !isEmpty(codigoVenta) && !isEmpty(idCliente) && !(cantidadRow == 0)) {        
        $.ajax({
            type: "post",
            url: "Ajax/Ventas.Ajax.php",
            data: {tipoVenta,metodoPago,dscto,codigoVenta,idCliente,montopagar,totalfinal, subtotal,igv, items: JSON.stringify(items), type: 'crear_venta'},
            success: function (response) {
                if (response) {
                    window.location.reload();
                }else{
                    Swal.fire({

                        type: "error",
                        title: "No se pudo realizar la venta",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
            
                        })
                }
            }
        });
    }else{
        Swal.fire({

            type: "error",
            title: "Es necesario tener items, ingresar el cliente, elegir el metodo de Pago",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

            })
    }
}