
/*=============================================
 EDITAR CONTACTO
 =============================================*/

$(".TablaDeDatos").on("click", ".btnEditarPresentacion", function () {

    var idPresentacion = $(this).attr("idPresentacion");

    var datos = new FormData();
    datos.append("idPresentacion", idPresentacion);

    $.ajax({

        url: "Ajax/Presentacion.Ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#EditarCodigo").val(respuesta["Codigo"]);
            $("#EditarPresentacion").val(respuesta["Presentacion"]);
            $("#EditarDescripcion").val(respuesta["Descripcion"]);
            $("#EditarEstado").val(respuesta["Estado"]);


        }

    })

})

/*=============================================
 ELIMINAR Presentacion
 =============================================*/
$(".TablaDeDatos").on("click", ".btnEliminarPresentacion", function () {

    var idPresentacion = $(this).attr("idPresentacion");

    Swal.fire({
        title: '¿Está seguro de borrar la Presentacion?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Presentacion!'
    }).then(function (result) {
        if (result.value) {
            var Ruta="index.php?Ruta=Presentacion&idPresentacion=" + idPresentacion;

            window.location = Ruta;
        }

    })

})