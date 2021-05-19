
/*=============================================
 EDITAR Proveedor
 =============================================*/


$(".TablaDeDatos").on("click", ".btnEditarProveedor", function () {

    var idProveedor = $(this).attr("idProveedor");
   
    var datos = new FormData();
    datos.append("idProveedor", idProveedor);

    $.ajax({

        url: "Ajax/Proveedores.Ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#EditarCodigo").val(respuesta["Codigo"]);
            $("#EditarRazonSocial").val(respuesta["RazonSocial"]);
            $("#EditarRuc").val(respuesta["Ruc"]);
            $("#EditarDireccion").val(respuesta["Direccion"]);
            $("#EditarCorreo").val(respuesta["Correo"]);
            $("#EditarTelefono").val(respuesta["Telefono"]);
            $("#EditarCelular").val(respuesta["Celular"]);
        }

    })

})

/*=============================================
 ELIMINAR Proveedor
 =============================================*/
$(".TablaDeDatos").on("click", ".btnEliminarProveedor", function () {

    var idProveedor = $(this).attr("idProveedor");

    Swal.fire({
        title: '¿Está seguro de borrar el Proveedor?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Proveedor!'
    }).then(function (result) {
        if (result.value) {
            var Ruta = "index.php?Ruta=Proveedores&idProveedor=" + idProveedor;

            window.location = Ruta;
        }

    })

})