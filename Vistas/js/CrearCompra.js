var idProveedor = null;
/*=============================================
 CARGAR LA RAZON SOCIAL DEL PROVEEDOR CON AJAX
 =============================================*/
$(document).ready(function () {
    $(".TablaProveedoresCompra tbody").on("click", "button.btnAddProveedor", function () {
        $(".ModalProveedor").modal('hide');//ocultamos el modal
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        idProveedor = $(this).attr("idProveedor");
        var datos = new FormData();
        datos.append("idProveedor", idProveedor);
        obtenerProductos(idProveedor);
        $.ajax({
            url: "Ajax/Proveedores.Ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                var datosProveedor = new FormData();
                datosProveedor.append("idProveedor", respuesta["Codigo"]);
                $("#idProveedor").val(respuesta["Codigo"]);
                $("#RazonSocial").val(respuesta["RazonSocial"]);
            }
        })



    })
})

function init(){
    getNewCode();
}

function getNewCode(){

    $.ajax({
        type: "Post",
        url: "Ajax/CompraAjax.php",
        data: {type: 'obtener_codigo'},
        success: function (respuesta) {
            let dato = respuesta.substr(0,10);
            $('#codigoCompra').html(respuesta);

        },
        error:function(e){
            //console.log(e);
        }
    });
}

init();
function obtenerProductos(idProveedor) {
    $('#TablaCompras-ProductosGeneral').DataTable({
        ajax:
                {
                    url: 'Ajax/ProductosComprasDataTable.Ajax.php',
                    type: "GET",
                    data: {idProveedor: idProveedor},
                    dataType: "json",
                    error: function (e) {

                    }
                },
        responsive: true,
        autoWidth: false,
        deferRender: true,
        //retrieve: true,
        processing: true,
        bDestroy: true,
        language: {
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

    });
}

/*=============================================
 CARGAR TABLA  VACIA  CON AJAX
 =============================================*/
if (idProveedor == null) {
    $('.TablaCompras-ProductosGeneral').DataTable({
        responsive: true,
        autoWidth: false,
        deferRender: true,
        retrieve: true,
        processing: true,
        language: {
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
}



/*=============================================
 CARGAR TABLA  PROVEEDORES-COMPRAS CON AJAX
 =============================================*/

$('.TablaProveedoresCompra').DataTable({
    ajax: "Ajax/ComprasProveedorDataTable.Ajax.php",
    responsive: true,
    autoWidth: false,
    deferRender: true,
    retrieve: true,
    processing: true,
    language: {
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
/*=============================================
 AGREGAR  PRODUCTOS PARA LA COMPRA CON AJAX
 =============================================*/

$("#TablaCompras-ProductosGeneral tbody").on("click", "button.btnAddProductosCompra", function () {

    var idProducto = $(this).attr("idProductoCompra");
    $(this).removeClass("btn-info btnAddProductosCompra");
    $(this).addClass("btn-default disabled");
    // var datos = new FormData();
    // datos.append("idProducto", idProducto);
    $.ajax({
        url: "Ajax/Productos.Ajax.php",
        method: "POST",
        data: {idProducto, type: 'obtener_producto'},
        success: function (respuesta) {
            respuesta = JSON.parse(respuesta)
            
            //console.log("productos",respuesta);
            var Descripcion = respuesta[0]["NombreProducto"];
            var Stock = respuesta[0]["Stock"];
            var PrecioUnitario = respuesta[0]["PrecioCompra"];
            var Id = respuesta[0]["idProducto"];

            let num = ArrayProducto.length;
            var index = 1;
            if( num > 0){
                index = (ArrayProducto[num - 1]) + 1;
            }

            var TablaCompras = $('.TablaCompras-Productos').DataTable();
            TablaCompras.row.add(["</tr><td><div class='btn-group'><button onclick='eliminarProd("+index+",\""+idProducto+"\")' type='button'class='btn btn-danger btn-xs btnQuitarProducto'><i class='fa fa-times'></i></button></div></td>",
                "<td><span id='DescripcionProducto'>"+Descripcion+"</span></td>",
                "<td><span id='precio" + index + "'>"+PrecioUnitario+"</span></td>",
                "<td><input id='cant" + index + "' type='number'onchange='CalcularPrecioProducto(this," + PrecioUnitario + "," + index + ")' precioUnitario='" + PrecioUnitario + "' class='form-control form-control-sm nuevaCantidadProducto' name='nuevaCantidadProducto' min='1' value='1' stock='" + Stock + " ' nuevoStock='" + Number(Stock - 1) + "' required></td>",
                "<td><p id='Total" + index + "' value='' class='Total'>" + PrecioUnitario + "</p><input value='" + Id + "' type='hidden' id='productoid_" + index + "'/></td></tr>"]).draw(true);

            ArrayProducto.push(index);

            precioTotal();
        }
    })
})


function eliminarProd(ind,id){
    $("#btnAddProductosCompra"+id).removeClass("btn-default disabled");
    $("#btnAddProductosCompra"+id).addClass("btn-info btnAddProductosCompra");
       let indexArray = ArrayProducto.indexOf(ind);
       //console.log(id)
       ArrayProducto.splice(indexArray,1);
       let tabla = $('.TablaCompras-Productos').dataTable();
   
       //tabla.rows(indexArray).delete();
       let row = tabla.find('tr').eq(indexArray + 1);
       tabla.fnDeleteRow( row[0] );
       //console.log(ArrayProducto);   
   
       precioTotal();
}
   
function precioTotal() {
    let sumaSubTotal = 0;
    let tblCompra = $('.TablaCompras-Productos').DataTable();

    let cantidadRow = tblCompra.rows().count();
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

function CalcularPrecioProducto(opj, Precio, index) {
    var cantidad = opj.value;
    var PrecioProducto = cantidad * Precio;
    $("#Total" + index).html(PrecioProducto);
    precioTotal();
}

function  DsctoHabilitar(valor){
    if(valor){
        $("#dscto").removeAttr('disabled');
    }else{
        $("#dscto").attr('disabled','disabled');
    }
}
function isEmpty(data){
    if (data == '') {
        return true;
    }
    return false;
}
function guardarCompra(){
    let tblCompra = $('.TablaCompras-Productos').DataTable();
    let cantidadRow = tblCompra.rows().count();
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
    //let metodoPago = $('#metodoPago').val();
    let subtotal = $('#SubTotal').val();
    let totalfinal =  $('#TotalFinal').val();
    let dscto =  $('#dscto').val(); 
    //let codigoVenta =  $('#codigoVenta').html(); 
    let idProveedor =  $('#idProveedor').val();
    if (!isEmpty(totalfinal) && !isEmpty(idProveedor) && !(cantidadRow == 0)) {        
        $.ajax({
            type: "post",
            url: "Ajax/CompraAjax.php",
            data: {dscto,idProveedor,totalfinal, subtotal,igv, items: JSON.stringify(items), type: 'crear_compra'},
            success: function (response) {
                console.log(response)
                if (response) {
                    window.location.reload();
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: "No se pudo realizar la compra",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
            
                        })
                }
            },
            error: function(response){
                console.log(response)
            }
        });
    }else{
        Swal.fire({

            icon: "error",
            title: "Es necesario ingresar el proveedor, elegir el metodo de Pago",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

            })
    }
}





$(".TablaCompras-Productos").DataTable({
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