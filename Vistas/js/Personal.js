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
 EDITAR PERSONAL
 =============================================*/


$(".TablaDeDatos").on("click", ".btnEditarPersonal", function () {

    var idPersonal = $(this).attr("idPersonal");

    var datos = new FormData();
    datos.append("idPersonal", idPersonal);
    $.ajax({

        url: "Ajax/Personal.Ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#EditarCodigo").val(respuesta["idPersonal"]);
            $("#EditarNombres").val(respuesta["Nombres"]);
            $("#EditarApellidos").val(respuesta["Apellidos"]);
            $("#EditarDni").val(respuesta["Dni"]);
            $("#EditarFechaNacimiento").val(respuesta["Fecha_Nacimiento"]);
            $("#EditarDireccion").val(respuesta["Direccion"]);
            $("#EditarCorreo").val(respuesta["Correo"]);
            $("#EditarTelefono").val(respuesta["Telefono"]);
            $("#EditarCelular").val(respuesta["Celular"]);
            $("#fotoActual").val(respuesta["Foto"]);
            $("#EditarEstado").val(respuesta["Estado"]);


            if (respuesta["Foto"] != "") {

                $(".previsualizarEditar").attr("src", respuesta["Foto"]);

            } else {

                $(".previsualizarEditar").attr("src", "Vistas/img/Personal/Default/Usuario.png");

            }









        }

    })

})

/*=============================================
 ELIMINAR CLIENTE
 =============================================*/
$(".TablaDeDatos").on("click", ".btnEliminarPersonal", function () {

    var idPersonal = $(this).attr("idPersonal");
    var fotoPersonal = $(this).attr("fotoPersonal");

    Swal.fire({
        title: '¿Está seguro de borrar el Personal?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Personal!'
    }).then(function (result) {
        if (result.value) {
            var Ruta="index.php?Ruta=Personal&idPersonal=" + idPersonal+"&fotoPersonal="+fotoPersonal;

            window.location = Ruta;
        }

    })

})