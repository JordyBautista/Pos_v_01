/*=============================================
CARGAR LA TABLA DINÁMICA DE USUARIOS
=============================================*/

// $.ajax({
// 	url: "Ajax/UsuariosDataTable.Ajax.php",
// 	success:function(respuesta){
//	console.log("respuesta", respuesta);
// 	}
//
// })
/*=============================================
 EDITAR CONTACTO
 =============================================*/

$(".TablaUsuarios").on("click", ".btnEditarUsuario", function () {

    var idUsuario = $(this).attr("idUsuario");

    var datos = new FormData();
    datos.append("idUsuario", idUsuario);

    $.ajax({

        url: "Ajax/Usuarios.Ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#EditarCodigo").val(respuesta["idUsuario"]);
            $("#EditarUsuario").val(respuesta["Usuario"]);
            $("#EditarNombreCorto").val(respuesta["Password"]);
            $("#EditarEstado").val(respuesta["Estado"]);


        }

    })

})

/*=============================================
 ELIMINAR Usuario
 =============================================*/
$(".TablaUsuarios").on("click", ".btnEliminarUsuario", function () {

    var idUsuario = $(this).attr("idUsuario");

    Swal.fire({
        title: '¿Está seguro de borrar la Usuario?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Usuario!'
    }).then(function (result) {
        if (result.value) {
            var Ruta="index.php?Ruta=Usuarios&idUsuario=" + idUsuario;

            window.location = Ruta;
        }

    })

})



/*=============================================
 CARGAR TABLA USUARIOS CON AJAX
 =============================================*/
$('.TablaUsuarios').DataTable( {
    "ajax": "Ajax/UsuariosDataTable.Ajax.php",
    "responsive": true,
    "autoWidth": false,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
     "language": {

            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

    }

});

