
/*=============================================
 EDITAR CONTACTO
 =============================================*/

$(".TablaPerfil").on("click", ".btnEditarPerfil", function () {

    var idPerfil = $(this).attr("idPerfil");

    var datos = new FormData();
    datos.append("idPerfil", idPerfil);
 
    $.ajax({

        url: "Ajax/Perfil.Ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {

            $("#EditaridPerfil").val(respuesta["idPerfil"]);
            $("#EditarPerfil").val(respuesta["Perfil"]);
            $("#EditarDescripcion").val(respuesta["Descripcion"]);



        }

    })

});

/*=============================================
 ELIMINAR Perfil
 =============================================*/
$(".TablaPerfil").on("click", ".btnEliminarPerfil", function () {

    var idPerfil = $(this).attr("idPerfil");

    Swal.fire({
        title: '¿Está seguro de borrar el perfil?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar perfil!'
    }).then(function (result) {
        if (result.value) {
            var Ruta="index.php?Ruta=Perfil&idPerfil=" + idPerfil;

            window.location = Ruta;
        }

    })

});



 $('.TablaPerfil').DataTable( {
    "ajax": "Ajax/Perfil.Ajax.php",
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


/*=============================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
$(".idPerfil").change(function(){
    var idPerfil = $(this).val();
    var Datos = new FormData();
    Datos.append("idPerfil", idPerfil);

    console.log("Datos", Datos);

    $.ajax({

      url:"Ajax/Perfil.Ajax.php",
      method: "POST",
      data: Datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

        if(!respuesta){

            var nuevoCodigo = idPerfil+"001";
            $("#IngresoidPerfil").val(nuevoCodigo);

        }else{

            var nuevoCodigo = Number(respuesta["idPerfil"]) + 1;
            $("#IngresoidPerfil").val(nuevoCodigo);

        }
                
      }

    })
    })

