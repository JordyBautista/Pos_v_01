
/*=============================================
 CARGAR TABLA  ClienteS CON AJAX
 =============================================*/
$('.TablaClientes').DataTable({
    "ajax": "Ajax/ClientesDataTable.Ajax.php",
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
 EDITAR PRODUCTO
 =============================================*/


$(".TablaClientes").on("click", ".btnEditarCliente", function () {

    var idCliente = $(this).attr("idCliente");

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
            console.log("respuesta", respuesta);

            $("#EditarCodigo").val(respuesta["idCliente"]);
            $("#EditarNombre").val(respuesta["Nombres"]);
            $("#EditarDni").val(respuesta["Dni"]);
            $("#EditarFechaNacimiento").val(respuesta["FechaNacimiento"]);
            $("#EditarCorreo").val(respuesta["Correo"]);
            $("#EditarDireccion").val(respuesta["Direccion"]);
            $("#EditarCelular").val(respuesta["Celular"]);
            $("#EditarTelefono").val(respuesta["Telefono"]);
                     
           

    }
   } )


       })


/*=============================================
 ELIMINAR CLIENTE
 =============================================*/
$(".TablaClientes").on("click", ".btnEliminarCliente", function () {

    var idCliente = $(this).attr("idCliente");
   
    Swal.fire({
        title: '¿Está seguro de borrar el Cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Cliente!'
    }).then(function (result) {
        if (result.value) {
            var Ruta = "index.php?Ruta=Clientes&idCliente=" + idCliente ;

            window.location = Ruta;
        }

    })

})







