

/*=============================================
 CARGAR TABLA  PRODUCTOS CON AJAX
 =============================================*/
$('.TablaProductosAlquiler').DataTable({
    "ajax": "Ajax/ProductosAlquilerDataTable.Ajax.php",
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

// $("#prod_alg_reg").on("submit",function(e)
// {
//     e.preventDefault()
//     console.log('hola')
// });
function editarProductoAlguiler(id){
    $.ajax({
        url: "Ajax/Productos.Ajax.php",
        method: "get",
        data: {id, type:'obtener_prod_alq'},
        success: function (response) {
            response = JSON.parse(response)
            console.log(response)
            $('#EditarId').val(response[0]['idProductoAlquiler'])
            $('#EditarDescripcion').val(response[0]['Descripcion'])
            $('#EditarPlaca').val(response[0]['Placa'])
            $('#EditarUbicacion').val(response[0]['Ubicacion'])
            $('#EditarMarca').val(response[0]['idMarca']).trigger('change')
            $('#EditarPrecioAlquiler').val(response[0]['PrecioAlquiler'])
            $('#EditarEstado').val(response[0]['Estado']).trigger('change')
            $('#EditarObservacion').val(response[0]['Observaciones'])
            $('#EditarSerie').val(response[0]['Serie']).trigger('change')
            $("#fotoActual").val(response[0]["Fotografia"])
            if (response[0]["Fotografia"] != "") {
                
                $(".previsualizarEditar").attr("src", response[0]["Fotografia"]);
                
            } else {
                
                $(".previsualizarEditar").attr("src", "Vistas/img/Producto/Default/DefaultProducto.png");
                
            }
            $("#ModalModificarProductosAlquiler").modal('show')
        }
    });
}
