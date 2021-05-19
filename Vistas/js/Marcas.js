
/*=============================================
 EDITAR CONTACTO
 =============================================*/

$(".TablaDeDatos").on("click", ".btnEditarMarca", function () {

    var idMarca = $(this).attr("idMarca");

    var datos = new FormData();
    datos.append("idMarca", idMarca);

    $.ajax({

        url: "Ajax/Marcas.Ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#EditarCodigo").val(respuesta["Codigo"]);
            $("#EditarMarca").val(respuesta["Marca"]);
            $("#EditarNombreCorto").val(respuesta["Marca_Corto"]);
            $("#EditarEstado").val(respuesta["Estado"]);


        }

    })

})

/*=============================================
 ELIMINAR Marca
 =============================================*/
$(".TablaDeDatos").on("click", ".btnEliminarMarca", function () {

    var idMarca = $(this).attr("idMarca");

    Swal.fire({
        title: '¿Está seguro de borrar la Marca?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Marca!'
    }).then(function (result) {
        if (result.value) {
            var Ruta="index.php?Ruta=Marcas&idMarca=" + idMarca;

            window.location = Ruta;
        }

    })

})