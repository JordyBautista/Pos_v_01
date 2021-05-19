
/*=============================================
 EDITAR CONTACTO
 =============================================*/


$(".TablaDeDatos").on("click", ".btnEditarContacto", function () {

    var idContacto = $(this).attr("idContacto");
    var datos = new FormData();
    datos.append("idContacto", idContacto);

    $.ajax({

        url: "Ajax/Contactos.Ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#EditarCodigo").val(respuesta["Codigo"]);
            $("#EditarNombres").val(respuesta["Nombres"]);
            $("#EditarApellidos").val(respuesta["Apellidos"]);
            $("#EditarDni").val(respuesta["DNI"]);
            $("#EditarDireccion").val(respuesta["Direccion"]);
            $("#EditarCorreo").val(respuesta["Correo"]);
            $("#EditarTelefono").val(respuesta["Telefono"]);
            $("#EditarCelular").val(respuesta["Celular"]);
            $("#EditarEmpresa").val(respuesta["Empresa"]);


        }

    })

})

/*=============================================
 ELIMINAR CONTACTO
 =============================================*/
$(".TablaDeDatos").on("click", ".btnEliminarContacto", function () {

    var idContacto = $(this).attr("idContacto");

    Swal.fire({
        title: '¿Está seguro de borrar el Contacto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Contacto!'
    }).then(function (result) {
        if (result.value) {
            var Ruta="index.php?Ruta=Contactos&idContacto=" + idContacto;

            window.location = Ruta;
        }

    })

})