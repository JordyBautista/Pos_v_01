$('#buscar_estado').change(function (e) { 
    e.preventDefault();
    buscar_ventas(this.value);
});

function buscar_ventas(estado){
    estado = (estado == null) ? '1' : estado;
    $('#TablaDeVentas_001').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "ajax":
            {
                url: 'Ajax/Ventas.Ajax.php',
                type : "get",
                data: {type:'obtener_ventas', estado},
                dataType : "json",						
                error: function(e){
                        console.log(e)
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 10,
            "order": [[ 0, "desc" ]],
            
            "language": {
     
                    "sProcessing":     "Procesando...",
                 
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                 
                    "sZeroRecords":    "No se encontraron resultados",
                 
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                 
                    "sInfo":           "Mostrando un total de _TOTAL_ registros",
                 
                    "sInfoEmpty":      "Mostrando un total de 0 registros",
                 
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
               
    }).DataTable();
}

buscar_ventas(null);


function cambiarEstado(id,estado, total){
    Swal.fire({
        title: 'Escoge una opcion.',
        showDenyButton: true,
        showCancelButton: true,
        denyButtonText: `Cancelar`,
        confirmButtonText: `Realizar`,
      }).then((result) => {
        if (result.isConfirmed) {
          //confirm_dialog(id,'2')
          $('#idVenta').val(id)
          $('#MontoPagar').val(total)
          $("#modal_cotizacion").modal('show')
        } else if (result.isDenied) {
            confirm_dialog(id,'0',null)
        }
      })
   
}
function calcularCambio(e){
    let montoPagar = $('#MontoPagar').val()
    let efectivoRecibido = e.value
    let cambio = efectivoRecibido - montoPagar
    $('#Cambio').val(cambio.toFixed(1)) 
}
function realizarVenta(){
    let efectivoRecibido = $('#EfectivoRecibido').val()
    if (efectivoRecibido != '') {        
        let data = {
            efectivoRecibido
        }
        let id = $('#idVenta').val()
        confirm_dialog(id,2,data)
    }else{
        Swal.fire(
            'Error!',
            'Es obligatorio ingresar una fecha y el efectivo recibido.',
            'warning'
        )
    }
    //console.log(data)
}
function limpiarmodal(){
    $('#idVenta').val('')
    $('#MontoPagar').val('')
    $('#EfectivoRecibido').val('')
    $('#Cambio').val('')
}
function confirm_dialog(id,estado,data){
    let estado_msg = estado == '2' ? '¿Desea realizar la venta?':'¿Desea cancelar la venta?'
    Swal.fire({
        title: 'Confirme la accion',
        text: estado_msg,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "Ajax/Ventas.Ajax.php",
                data: {type:'estado', id, estado, data},
                success: function (response) {
                    console.log(response)
                    if (response) {
                        if (estado == 2) {
                            $("#modal_cotizacion").modal('hide')
                        }
                        $('#TablaDeVentas_001').DataTable().ajax.reload();
                        Swal.fire(
                            'Bien hecho!',
                            'El estado se cambio correctamente.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Error!',
                            'Ocurrio un error al actualizar el estado.',
                            'error'
                        )
                    }
                    
                }
            });
        }
      })
}

function verDetalle(id){
    $.ajax({
        type: "get",
        url: "Ajax/Ventas.Ajax.php",
        data: {type:'ver_detalle', id},
        success: function (response) {
            response = JSON.parse(response)
            console.log(response)

            $('#prov_codigo').html(response['codigo']);
            $('#prov_cliente').html(response['cliente']);
            $('#prov_vendedor').html(response['vendedor']);
            $('#prov_fecha').html(response['fecha']);
            $('#prov_estado').html(response['estado']);
            $('#prov_metodo').html(response['metodo']);
            $('#prov_tipo').html(response['tipo']);
            $('#detalle_venta_ver').html(response['detalle']);
            $('#modal_detalle_venta').modal('show');
        }
    });
}

function EnviarCorreo(id){
    Swal.fire({
        title: '¿Desea enviar el correo?',
        showCancelButton: true,
        confirmButtonText: `Enviar`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "get",
                url: "Ajax/Ventas.Ajax.php",
                data: {type:'pdf_ventas',id},
                success: function (response) {
                    console.log(response)
                }
            });
        }
      })

}