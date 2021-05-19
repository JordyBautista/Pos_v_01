
/*=============================================
 EDITAR CONTACTO
 =============================================*/

$(".TablaDeDatos").on("click", ".btnEditarCategoria", function () {

    var idCategoria = $(this).attr("idCategoria");

    var datos = new FormData();
    datos.append("idCategoria", idCategoria);

    $.ajax({

        url: "Ajax/Categorias.Ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#EditarCodigo").val(respuesta["Codigo"]);
            $("#EditarCategoria").val(respuesta["Categoria"]);
            $("#EditarEstado").val(respuesta["Estado"]);


        }

    })

})

/*=============================================
 ELIMINAR Categoria
 =============================================*/
$(".TablaDeDatos").on("click", ".btnEliminarCategoria", function () {

    var idCategoria = $(this).attr("idCategoria");

    Swal.fire({
        title: '¿Está seguro de borrar la Categoria?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Categoria!'
    }).then(function (result) {
        if (result.value) {
            var Ruta="index.php?Ruta=Categorias&idCategoria=" + idCategoria;

            window.location = Ruta;
        }

    })

})