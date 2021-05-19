
/*=============================================
 SUBIENDO LA FOTO DEL USUARIO
 =============================================*/
$(".nuevoLogo").change(function () {

    var imagen = this.files[0];

    /*=============================================
     VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
     =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevoLogo").val("");

        Swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevoLogo").val("");

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

            $(".previsualizarLogo").attr("src", rutaImagen);

        })

    }
})

/*=============================================
 SUBIENDO LA FOTO DEL USUARIO
 =============================================*/
$(".nuevoLogoCorto").change(function () {

    var imagen = this.files[0];

    /*=============================================
     VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
     =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevoLogoCorto").val("");

        Swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevoLogoCorto").val("");

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

            $(".previsualizarLogoCorto").attr("src", rutaImagen);

        })

    }
})

/*=============================================
 SUBIENDO LA FOTO DEL USUARIO
 =============================================*/
$(".nuevoLogoLogin").change(function () {

    var imagen = this.files[0];

    /*=============================================
     VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
     =============================================*/

    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {

        $(".nuevoLogoLogin").val("");

        Swal.fire({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: "error",
            confirmButtonText: "¡Cerrar!"
        });

    } else if (imagen["size"] > 2000000) {

        $(".nuevoLogoLogin").val("");

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

            $(".previsualizarLogoLogin").attr("src", rutaImagen);

        })

    }
})



$(".FormularioEmpresa").on("click", "button.btnModificarEmpresa", function () {
    $("#EmpRazonSocial").removeAttr('readonly')
    $("#EmpRuc").removeAttr('readonly')
    $("#EmpDireccion").removeAttr('readonly')
    $("#EmpCelular").removeAttr('readonly')
    $("#EmpCorreo").removeAttr('readonly')
    $("#EmpTelefono").removeAttr('readonly')
    $("#EmpIGV").removeAttr('readonly')
    $("#EmpMoneda1").addClass('collapse')
    $(".selectMoneda").removeClass('collapse').addClass('collapse.show')
    $(".btnModificarEmpresa").hide();
    $('.LogoEmpresa').removeClass('collapse').addClass('collapse.show')
    $('.btnGuardarEmpresa').removeClass('collapse').addClass('collapse.show')
    $('.btnCancelarEmpresa').removeClass('collapse').addClass('collapse.show')

    $.ajax({
        url: "Ajax/Empresa.Ajax.php",
        method: "POST",
        // data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $("#idEmpresa").val(respuesta[0]["idEmpresa"]);
            $("#EmpRazonSocial").val(respuesta[0]["RazonSocial"]);
            $("#EmpRuc").val(respuesta[0]["Ruc"]);
            $("#EmpDireccion").val(respuesta[0]["Direccion"]);
            $("#EmpTelefono").val(respuesta[0]["Telefono"]);
            $("#EmpCelular").val(respuesta[0]["Celular"]);
            $("#EmpTelefono").val(respuesta[0]["Telefono"]);
            $("#EmpCorreo").val(respuesta[0]["Correo"]);
            //$("#EmpMoneda").val(respuesta[0]["idMoneda"]);
            //$("#EmpMoneda").html(respuesta[0]["Pais"]);
            $("#EmpIGV").val(respuesta[0]["IGV"]);
            $("#LogoActual").val(respuesta[0]["Logo"]);
            $("#LogoCortoActual").val(respuesta[0]["LogoCorto"]);
            $("#LogoLoginActual").val(respuesta[0]["LogoLogin"]);

            //LOGO
            if (respuesta[0]["Logo"] != "") {
                $(".previsualizarLogo").attr("src", respuesta[0]["Logo"]);
            } else {
                $(".previsualizarLogo").attr("src", "Vistas/img/Empresa/Default/Logo-largo.png");
            }
            //LOGO CORTO
            if (respuesta[0]["LogoCorto"] != "") {
                $(".previsualizarLogoCorto").attr("src", respuesta[0]["LogoCorto"]);
            } else {
                $(".previsualizarLogoCorto").attr("src", "Vistas/img/Empresa/Default/Logo-corto.png");
            }
            //LOGO LOGIN
            if (respuesta[0]["LogoLogin"] != "") {
                $(".previsualizarLogoLogin").attr("src", respuesta[0]["LogoLogin"]);
            } else {
                $(".previsualizarLogoLogin").attr("src", "Vistas/img/Empresa/Default/Logo-largo.png");
            }

            var datosMoneda = new FormData();
            datosMoneda.append("idMoneda", respuesta[0]["idMoneda"]);
            $.ajax({
                url: "Ajax/Moneda.Ajax.php",
                method: "POST",
                data: datosMoneda,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta) {
                   

                    $("#EmpMoneda").val(respuesta[0]["idMoneda"]);
                    var Moneda = respuesta[0]["Simbolo"] + " - " + respuesta[0]["UnidadMonetaria"] + " - " + respuesta[0]["Pais"];
                    $("#EmpMoneda").html(Moneda);
                }


            })




        }

    })


})


$.ajax({
    url: "Ajax/Empresa.Ajax.php",
    method: "POST",
    // data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
        $("#idEmpresa").val(respuesta[0]["idEmpresa"]);
        $("#EmpRazonSocial").val(respuesta[0]["RazonSocial"]);
        $("#EmpRuc").val(respuesta[0]["Ruc"]);
        $("#EmpDireccion").val(respuesta[0]["Direccion"]);
        $("#EmpTelefono").val(respuesta[0]["Telefono"]);
        $("#EmpCelular").val(respuesta[0]["Celular"]);
        $("#EmpTelefono").val(respuesta[0]["Telefono"]);
        $("#EmpCorreo").val(respuesta[0]["Correo"]);
        $("#EmpIGV").val(respuesta[0]["IGV"]);

        $("#LogoActual").val(respuesta[0]["Logo"]);
        $("#LogoCortoActual").val(respuesta[0]["LogoCorto"]);
        $("#LogoLoginActual").val(respuesta[0]["LogoLogin"]);

        //LOGO
        if (respuesta[0]["Logo"] != "") {
            $(".previsualizarLogo").attr("src", respuesta[0]["Logo"]);

        } else {
            $(".previsualizarLogo").attr("src", "Vistas/img/Empresa/Default/Logo-largo.png");
        }

        //LOGO CORTO
        if (respuesta[0]["LogoCorto"] != "") {
            $(".previsualizarLogoCorto").attr("src", respuesta[0]["LogoCorto"]);

        } else {
            $(".previsualizarLogoCorto").attr("src", "Vistas/img/Empresa/Default/Logo-corto.png");
        }

        //LOGO FONDO
        if (respuesta[0]["LogoLogin"] != "") {
            $(".previsualizarLogoLogin").attr("src", respuesta[0]["LogoLogin"]);

        } else {
            $(".previsualizarLogoLogin").attr("src", "Vistas/img/Empresa/Default/Logo-largo.png");
        }


        //var idMoneda = respuesta[0]["idMoneda"];

        var datosMoneda = new FormData();
        datosMoneda.append("idMoneda", respuesta[0]["idMoneda"]);
        $.ajax({
            url: "Ajax/Moneda.Ajax.php",
            method: "POST",
            data: datosMoneda,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
               // console.log("Monedas", respuesta);

                // $("#EmpMoneda").val(respuesta[0]["idMoneda"]);
                var Moneda = respuesta[0]["Simbolo"] + " - " + respuesta[0]["UnidadMonetaria"] + " - " + respuesta[0]["Pais"];
                $("#EmpMoneda1").val(Moneda);
            }


        })
    }
})

