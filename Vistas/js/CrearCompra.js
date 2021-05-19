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



/*=============================================
 AGREGAR  PRODUCTOS PARA LA COMPRA CON AJAX
 =============================================*/

$("#TablaCompras-ProductosGeneral tbody").on("click", "button.btnAddProductosCompra", function () {

    var idProducto = $(this).attr("idProductoCompra");
    $(this).removeClass("btn-info btnAddProductosCompra");
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
        success: function (respuesta) {
            
            console.log("productos",respuesta);
            var Descripcion = respuesta[0]["NombreProducto"];
            var Stock = respuesta[0]["Stock"];
            var PrecioUnitarioCompra = respuesta[0]["PrecioCompra"];

            var TablaCompras = $('.TablaCompras-Productos').DataTable();
            TablaCompras.row.add(["</tr><td><div class='btn-group'><button type='button'class='btn btn-danger btn-xs btnQuitarProducto'><i class='fa fa-times'></i></button></div></td>",
                "<td><span id='DescripcionProducto'>"+Descripcion+"</span></td>",
                "<td><span id='PrecioCompra'>"+PrecioUnitarioCompra+"</span></td>",
                "<td><input type='number' class='form-control form-control-sm'></td>",
                "<td><span id='PrecioTotal'></span></td></tr>"]).draw(true);
        }
    })
})










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