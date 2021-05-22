
$('#buscar_estado').change(function (e) { 
    e.preventDefault();
    buscar_compras(this.value);
});
function buscar_compras(estado){
    estado = (estado == null) ? '1' : estado;
    $('#tabla_Compras').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "ajax":
            {
                url: 'Ajax/CompraAjax.php',
                type : "get",
                data: {type:'obtener_compras', estado},
                dataType : "json",						
                error: function(e){
                        
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

buscar_compras(null);

function cambiarEstado(id,estado){
    Swal.fire({
        title: 'Escoge una opcion.',
        showDenyButton: true,
        showCancelButton: true,
        denyButtonText: `Cancelar`,
        confirmButtonText: `Realizar`,
      }).then((result) => {
        if (result.isConfirmed) {
          confirm_dialog(id,'2')
        } else if (result.isDenied) {
            confirm_dialog(id,'0')
        }
      })
   
}
function confirm_dialog(id,estado){
    let estado_msg = estado == '2' ? '¿Desea realizar la compra?':'¿Desea cancelar la compra?'
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
                url: "Ajax/CompraAjax.php",
                data: {type:'estado', id, estado},
                success: function (response) {
                    console.log(response)
                    if (response) {
                        $('#tabla_Compras').DataTable().ajax.reload();
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
        url: "Ajax/CompraAjax.php",
        data: {type:'ver_detalle', id},
        success: function (response) {
            response = JSON.parse(response)
            console.log(response)

            $('#prov_codigo').html(response['codigo']);
            $('#prov_proveedor').html(response['proveedor']);
            $('#prov_fecha').html(response['fechaRegistro']);
            $('#prov_estado').html(response['estado']);
            $('#detalle_compra_ver').html(response['detalle']);
            $('#modal_detalle_compra').modal('show');
        }
    });
}