$('#buscar_estado').change(function (e) { 
    e.preventDefault();
    buscar_alquiler(this.value);
});
function buscar_alquiler(estado){
    $('#tabla_Alquiler').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "ajax":
            {
                url: 'Ajax/Productos.Ajax.php',
                type : "get",
                data: {type:'obtener_alq', estado},
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

buscar_alquiler('1');

function limpiarDetalle(){
    $('#tipo_observacion').prop('disabled', false)
    $('#observacion').prop('disabled', false)
    $('#observacion').val('')
    $('#tipo_observacion').val('correcto').trigger('change')
}
function verDetalle(id,estado){
    if(estado == 2){
        $('#tipo_observacion').prop('disabled', true)
        $('#observacion').prop('disabled', true)
    }
    $.ajax({
        type: "get",
        url: "Ajax/Productos.Ajax.php",
        data: {id,type:'obtener_alq_id'},
        success: function (response) {
            response = JSON.parse(response)
            // console.log(response)

            $("#alq_codigo").html(response[0]['Codigo']);
            $("#alq_cliente").html(response[0]['idCliente']);
            $("#alq_fecha").html(response[0]['FechaRegistro']);
            $("#alq_total").html('S/. '+response[0]['PrecioAlquiler']);
            let estado;
            if (response[0]['Estado'] == '0') {
                estado = 'Cancelado'
            }else if(response[0]['Estado'] == '1'){
                estado = 'Vigente'
            }else if(response[0]['Estado'] == '2'){
                estado = 'Realizado'
            }
            $("#alq_Estado").html(estado);
            buscar_alquiler_detalle(id)
            $("#modal_detalle_alquiler").modal('show');
        }
    });
}

function buscar_alquiler_detalle(id){
    $('#detalle_alquiler_ver').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "ajax":
            {
                url: 'Ajax/Productos.Ajax.php',
                type : "get",
                data: {type:'obtener_alq_det', id},
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

function modificarInfo(id,producto,alquiler){
    let observacion = $('#observacion').val();
    let tipo_observacion = $('#tipo_observacion').val();
    if(observacion != ''){
        $.ajax({
            type: "post",
            url: "Ajax/Productos.Ajax.php",
            data: {type:'modificar_observacion',tipo_observacion,observacion, id,producto,alquiler},
            success: function (response) {
                console.log(response)
                if (response) {
                    $('#observacion').val('');
                    $('#tabla_Alquiler').DataTable().ajax.reload();
                    $("#modal_detalle_alquiler").modal('hide');
                    Swal.fire({

                        icon: "success",
                        title: "Los cambios han sido actualizados correctamente.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
            
                        })
                }else{
                    Swal.fire({

                        icon: "error",
                        title: "Error al registrar la observacion.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
            
                        })
                }
            }
        });
    }else{
        Swal.fire({

            icon: "error",
            title: "Es necesario ingresar una observacion.",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

            })
    }
}

function cancelar(id){
    Swal.fire({
        title: '¿Esta seguro que desea cancelar el alquiler?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Aceptar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "Ajax/Productos.Ajax.php",
                data: {type:'cancelar_alquiler',id},
                success: function (response) {
                    if (response) {
                        $('#observacion').val('');
                        $('#tabla_Alquiler').DataTable().ajax.reload();
                        $("#modal_detalle_alquiler").modal('hide');
                        Swal.fire({
        
                            icon: "success",
                            title: "Los cambios han sido actualizados correctamente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                
                            })
                    }else{
                        Swal.fire({
        
                            icon: "error",
                            title: "Error al registrar la observacion.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                
                            })
                    }
                }
            });
        }
      })
 

}

function verMas(id){
    $.ajax({
        type: "get",
        url: "Ajax/Productos.Ajax.php",
        data: {id, type:'obtener_alq_det_id'},
        success: function (response) {
            response = JSON.parse(response)
            //console.log(response)
            $('#tipo_observacion').val(response['tipoObservacion']).trigger('change')
            $('#observacion').val(response['observacion'])
        }
    });
}