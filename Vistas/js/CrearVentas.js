///*=============================================
//CARGAR LA TABLA DINÁMICA DE USUARIOS
//=============================================*/
//$.ajax({
//    url: "Ajax/VentasSeleccionarClienteDataTable.Ajax.php",
//    success:function(respuesta){
//     console.log("respuesta", respuesta);
// 
//    }
//
// })
//
/*=============================================
 CARGAR TABLA  CLIENTES CON AJAX
 =============================================*/
$('.TablaSeleccionarCliente').DataTable({
    ajax: "Ajax/VentasSeleccionarClienteDataTable.Ajax.php",
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
 CARGAR LA RAZON SOCIAL DEL PROVEEDOR CON AJAX
 =============================================*/
 var idCliente = null;
$(document).ready(function () {
    $(".TablaSeleccionarCliente tbody").on("click", "button.btnAddCliente", function () {
        $(".ModalSeleccionarCliente").modal('hide');//ocultamos el modal
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
        idCliente = $(this).attr("idCliente");
        var datos = new FormData();
        datos.append("idCliente", idCliente);
        $.ajax({
            url: "Ajax/Clientes.Ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idCliente").val(respuesta["idCliente"]);
                $("#DatosDelCliente").val(respuesta["Nombres"]);
            }
        })



    })
})
