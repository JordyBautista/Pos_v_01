
$('.TablaSeleccionarCliente').DataTable({
    "ajax": "Ajax/VentasSeleccionarClienteDataTable.Ajax.php",
    "responsive": true,
    "autoWidth": false,
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }

    }

})

function getNewCode(){

    $.ajax({
        type: "get",
        url: "Ajax/Productos.Ajax.php",
        data: {type: 'obtener_cod_alq'},
        success: function (respuesta) {
            console.log(respuesta)
            $('#codigoAlquiler').html(respuesta);
        },
        error:function(e){
            //console.log(e);
        }
    })
}
getNewCode()
var datetimepicker = $('#datetimepicker').datetimepicker({
    minDate: new Date(),
    allowInputToggle: true,
    ignoreReadonly: true,
    widgetParent: '#widget_parent',
    //showClose: true,
    showClear: true,
    showTodayButton: true,
    format: "YY-MM-DD HH:mm:ss",
    icons: {
        time:'fas fa-clock',

        date:'fas fa-calendar-alt',

        up:'fas fa-chevron-up',

        down:'fas fa-chevron-down',

        previous:'fas fa-chevron-left',

        next:'fas fa-chevron-right',

        today:'fas fa-calendar-day',

        clear:'fas fa-trash',

        close:'fas fa-times'
        },

});

$('#buscarMarca').change(function (e) { 
    e.preventDefault();
    let marca = $('#buscarMarca').val();
    let serie = $('#buscarSerie').val();
    buscar_compras(marca,serie);
});
$('#buscarSerie').change(function (e) { 
    e.preventDefault();
    let marca = $('#buscarMarca').val();
    let serie = $('#buscarSerie').val();
    buscar_compras(marca,serie);
});

function buscar_compras(marca, serie){

    $('#productosAlquiler').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "ajax":
            {
                url: 'Ajax/Productos.Ajax.php',
                type : "get",
                data: {type:'obtener_todo_prod_alq', marca, serie},
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

buscar_compras("","");

function escogercliente(id){

    let nombre = $('#cliente_'+id).attr("nombre");
    $('#idCliente').val(id);
    $('#DatosDelCliente').val(nombre);
    $("#ModalSeleccionarCliente").modal('hide');
}


var ArrayProducto = [];
function agregar(id){
    let FECHA = $('#datetimepicker_input').val();
    if(FECHA != ''){
        $.ajax({
            url: "Ajax/Productos.Ajax.php",
            method: "get",
            data: {id, type:'obtener_prod_alq'},
            success: function (response) {
                response = JSON.parse(response)
                //let ID = response[0]['idProductoAlquiler']
                let PLACA = response[0]['Placa']
                let PRECIO = response[0]['PrecioAlquiler']
                //console.log(response)
                $("#btn_producto_"+id).prop("disabled", true)
                let index = ArrayProducto.length + 1
                var TablaAlquiler = $('.TablaProductosAddAlquiler').DataTable()
                TablaAlquiler.row.add(["<tr><td><input value='" + id + "' type='hidden' id='idproducto" + index + "'/><span id='placa" + id + "'>" + PLACA + "</span></td>",
                    "<td><span id='precio" + index + "'>" + PRECIO + "</span></td>",
                    "<td><span id='fecha" + index + "'>" + FECHA + "</span></td>",
                    "<td><button class='remove_btn btn btn-danger' onclick='remover(this,"+id+")'><i class='fas fa-trash'></i></button></td></tr>",
                   ]).draw(true);
                ArrayProducto.push(id)
                $('#datetimepicker').data("DateTimePicker").clear()
                precioTotal()
            }
        });
    }else{
        Swal.fire({

            type: "error",
            title: "Debe seleccionar una fecha.",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

            })
    }
}
var tableAl = $('.TablaProductosAddAlquiler').DataTable();
$('.TablaProductosAddAlquiler tbody').on( 'click', 'button.remove_btn', function () {
    console.log('asd')
    tableAl
        .row( $(this).parents('tr') )
        .remove()
        .draw();
} );
function remover(obj,id){
    $("#btn_producto_"+id).prop("disabled", false)
    let indexArray = ArrayProducto.indexOf(id)
    ArrayProducto.splice(indexArray,1)
    precioTotal()
}

function precioTotal() {
    let total = 0;
    let tblVenta = $('.TablaProductosAddAlquiler').DataTable()

    let cantidadRow = tblVenta.rows().count()
    //console.log(cantidadRow)
    for (var i = 0; i < cantidadRow; i++) {
        total += parseFloat($('#precio' + (i+1)).html())
    }

    $('#total').html(total);
}

function guardar(){
    let tblAlquiler = $('.TablaProductosAddAlquiler').DataTable();
    let codigo = $('#codigoAlquiler').html()
    let cliente = $('#idCliente').val()
    let total = $('#total').html()
    
    let cantidadRow = tblAlquiler.rows().count();
    let items = [];
    for (var i = 0; i < cantidadRow; i++){
        let obj = {
            'idproducto': $('#idproducto'+(i+1)).val(),
            'precio': $('#precio'+(i+1)).html(),
            'fecha': $('#fecha'+(i+1)).html(),
        }
        items.push(obj)
    }
    if (cliente != '' && total != '' && cantidadRow != 0) {
        $.ajax({
            type: "post",
            url: "Ajax/Productos.Ajax.php",
            data: {codigo, cliente, total, items: JSON.stringify(items), type:'guardar_alquiler'},
            success: function (response) {
                console.log(response)
                if (response) {
                    window.location.reload();
                }else{
                    Swal.fire({
    
                        type: "error",
                        title: "No se pudo realizar el alquiler",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
            
                        })
                }
            }
        });
    }else{
        Swal.fire({

            type: "error",
            title: "Es necesario tener items, ingresar el cliente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

            })
    }
}