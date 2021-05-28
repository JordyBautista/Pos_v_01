
/*=============================================
 SUBIENDO LA FOTO DEL USUARIO
 =============================================*/

$(".nuevaFoto").change(function () {

    var imagen = this.files[0];

    /*=============================================
     VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
     =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevaFoto").val("");

        Swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevaFoto").val("");

        Swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else {

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function (event) {

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })

    }
})



/*=============================================
 EDITAR PRODUCTO
 =============================================*/


$(".TablaProductos").on("click", ".btnEditarProducto", function () {
 
    var idProducto = $(this).attr("idProducto");

    console.log('asdsadasd')
    $.ajax({
        url: "Ajax/Productos.Ajax.php",
        method: "POST",
        data: {idProducto, type:'obtener_producto'},
        success: function (respuesta) {
            respuesta = JSON.parse(respuesta)
            console.log(respuesta)
            
            $("#EditarProveedor").val(respuesta[0]["CodigoProveedor"]).trigger('change');
            $("#EditarCategoria").val(respuesta[0]["CodigoCategoria"]).trigger('change');
            $("#EditarMarca").val(respuesta[0]["CodigoMarca"]).trigger('change');
            $("#EditarPresentacion").val(respuesta[0]["CodigoPresentacion"]).trigger('change');
            
            
            $("#EditarCodigo").val(respuesta[0]["idProducto"]);
            $("#EditarProducto").val(respuesta[0]["NombreProducto"]);
            $("#EditarDescripcion").val(respuesta[0]["Descripcion"]);
            $("#fotoActual").val(respuesta[0]["Fotografia"]);
            if (respuesta[0]["Fotografia"] != "") {
                
                $(".previsualizarEditar").attr("src", respuesta[0]["Fotografia"]);
                
            } else {
                
                $(".previsualizarEditar").attr("src", "Vistas/img/Producto/Default/DefaultProducto.png");
                
            }
            $("#ModalEditarProducto").modal('show')



        }

    })

})

/*=============================================
 ELIMINAR CLIENTE
 =============================================*/
$(".TablaProductos").on("click", ".btnEliminarProducto", function () {

    var idProducto = $(this).attr("idProducto");
    var fotoProducto = $(this).attr("fotoProducto");

    Swal.fire({
        title: '¿Está seguro de borrar el Producto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Producto!'
    }).then(function (result) {
        if (result.value) {
            var Ruta = "index.php?Ruta=Productos&idProducto=" + idProducto + "&fotoProducto=" + fotoProducto;

            window.location = Ruta;
        }

    })

})


/*=============================================
 CARGAR TABLA  PRODUCTOS CON AJAX
 =============================================*/
 var tablaProductos= $('.TablaProductos').DataTable({
    "ajax": "Ajax/ProductosDataTable.Ajax.php",
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

/*=============================================
 CARGAR TABLA STOCK PRODUCTOS CON AJAX
 =============================================*/
$('.TablaStockProductos').DataTable({
    "ajax": "Ajax/StockProductosDataTable.Ajax.php",
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





/*=============================================
 STOCK PRODUCTO
 =============================================*/


$(".TablaStockProductos").on("click", ".btnEditarStockProducto", function () {

    var idProducto = $(this).attr("idProducto");

    // var datos = new FormData();
    // datos.append("idProducto", idProducto);

    $.ajax({
        url: "Ajax/Productos.Ajax.php",
        method: "POST",
        data: {idProducto, type:'obtener_producto'},
        success: function (respuesta) {
            respuesta = JSON.parse(respuesta)
            console.log(respuesta)

            $("#StockCodigo").val(respuesta[0]["idProducto"]);
            $("#StockNombreProducto").val(respuesta[0]["NombreProducto"]);
            $("#StockProducto").val(respuesta[0]["Stock"]);
            $("#StockMinimo").val(respuesta[0]["StockMinimo"]);
            $("#StockMaximo").val(respuesta[0]["StockMaximo"]);
            $("#StockPrecioCompra").val(respuesta[0]["PrecioCompra"]);
            $("#StockPrecioVenta").val(respuesta[0]["PrecioVenta"]);
            $("#ModalEditarStockProducto").modal('show')
        }

    })

})

/*=============================================
 CARGAR TABLA  PRODUCTOS VENTAS CON AJAX
 =============================================*/
$('.TablaProductosVenta').DataTable({
    "ajax": "Ajax/ProductosVentasDataTable.Ajax.php",
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


