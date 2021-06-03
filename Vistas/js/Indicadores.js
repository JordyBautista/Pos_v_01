var meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
var mes = ['Ene','Feb','Mrz','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic']

// $('#anios').change(function (e) { 
//     e.preventDefault();
//    // console.log('hola')
//     if (this.value != '') {
//         $.ajax({
//             type: "get",
//             url: "Ajax/Indicador.Ajax.php",
//             data: {type:'month',year: this.value},
//             success: function (response) {
//                 response = JSON.parse(response)
//                 //console.log(response)
               
//                 response.forEach(element => {
//                     let option = '<option val='+element['month']+'>'+meses[element['month'] - 1]+'</option>'
//                     $('#aniomeses').append(option)
//                     //console.log(option)
//                 });
//             }
//         });        
//     }
    
// });

$('#productoIndicadores').change(function (e) { 
    e.preventDefault();
    //console.log('holaaaa')
    indicadorTres()
    indicadorUno()
    
});

function indicadorUno(){
    let year = $('#anios').val()
    let idProducto = $('#productoIndicadores').val()
    let grupo ='MONTH'
    if (year != '') {
        $.ajax({
            type: "get",
            url: "Ajax/Indicador.Ajax.php",
            data: {type:'uno',year, idProducto, grupo},
            success: function (response) {
                response = JSON.parse(response)
                //console.log(response)
                let data_month_day = [];
                let data_value = [];
                response.map(function(num){
                    data_value.push(num['indicador']);
                    data_month_day.push(num['month_or_day']);
                });
                show_indicador_uno(data_month_day, data_value, 'Indice de rotacion');
            }
        });
    }

}

var ctx = document.getElementById("chartIndicadorUno");
var chartIndicadorUno = new Chart(ctx,null );

function show_indicador_uno(labels, values, description){
    chartIndicadorUno.destroy();
    let data = {
        labels: labels,
        datasets: [{
            label: "Result",
            data: values,
            boderColor: 'rgb(120, 178, 216)',
            backgroundColor:  'rgba(120, 178, 216, 0.3)',
            order: 1
        }, {
            label: "Result Line",
            data: values,
            borderColor: 'rgb(93, 201, 97)',
            backgroundColor: 'rgba(93, 201, 97, 0.3)',
            type: 'line',
            order: 0
        }]
    };
    
    chartIndicadorUno = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: description,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            },
            scales: {
                y: {
                    ticks: {
                        callback: function(val, index){
                            if (Math.floor(val) === val) {
                                return val;
                            }
                        }
                    },
                    beginAtZero: true
                }
            },
            elements: {
                bar: {
                    borderWidth: 1,
                }
            },
            barValueSpacing: 10,
        }
    });    
}


$('#alquilerIndicadores').change(function (e) { 
    e.preventDefault();
    //console.log('holaaaa')
    let year = $('#aniosAlquiler').val()
    let idProducto = $('#alquilerIndicadores').val()
    let grupo = 'MONTH'
    if (year != '') {
        $.ajax({
            type: "get",
            url: "Ajax/Indicador.Ajax.php",
            data: {type:'dates',year, idProducto, grupo},
            success: function (response) {
                response = JSON.parse(response)
                console.log(response)
                indicadorDos(response)
            }
        });
    }
});

var ctx2 = document.getElementById("chartIndicadorDos");
var chartIndicadorDos = new Chart(ctx2,null );
function indicadorDos(response){
    let tiempo_operativo = 0;
    let tiempo_disponible = 0;
    let label_mes = [];
    let disponibilidad = [];
    for (let index = 0; index < response.length; index++) {
        let fecha_salida = moment(response[index]['fechaSalida'])
        let fecha_devolucion = moment(response[index]['fechaDevolucion'])
        tiempo_operativo += fecha_devolucion.diff(fecha_salida, 'days');
        if(response[index + 1] != undefined){
            let fecha_salida_siguiente = moment(response[index + 1]['fechaSalida'])
            tiempo_disponible += fecha_salida_siguiente.diff(fecha_devolucion, 'days');
        }
        let result = (tiempo_disponible == 0) ? 0 : (tiempo_operativo/tiempo_disponible).toFixed(0);
        disponibilidad.push(result)
        label_mes.push(mes[response[index]['MONTH'] - 1])
    }
    show_indicador_dos(label_mes, disponibilidad, 'Disponibilidad');
}
function show_indicador_dos(labels, values, description){
    chartIndicadorDos.destroy();
    let data = {
        labels: labels,
        datasets: [{
            label: "Result",
            data: values,
            boderColor: 'rgb(120, 178, 216)',
            backgroundColor:  'rgba(120, 178, 216, 0.3)',
            order: 1
        }, {
            label: "Result Line",
            data: values,
            borderColor: 'rgb(93, 201, 97)',
            backgroundColor: 'rgba(93, 201, 97, 0.3)',
            type: 'line',
            order: 0
        }]
    };
    
    chartIndicadorDos = new Chart(ctx2, {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: description,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            },
            scales: {
                y: {
                    ticks: {
                        callback: function(val, index){
                            if (Math.floor(val) === val) {
                                return val;
                            }
                        }
                    },
                    beginAtZero: true
                }
            },
            elements: {
                bar: {
                    borderWidth: 1,
                }
            },
            barValueSpacing: 10,
        }
    });    
}

//INDICADOR TRES


var ctx3 = document.getElementById("chartIndicadorTres");
var chartIndicadorTres = new Chart(ctx3,null );
function indicadorTres(){
    let year = $('#anios').val()
    let idProducto = $('#productoIndicadores').val()
    let grupo ='MONTH'
    if (year != '') {
        $.ajax({
            type: "get",
            url: "Ajax/Indicador.Ajax.php",
            data: {type:'inventario',year, idProducto, grupo},
            success: function (response) {
                response = JSON.parse(response)
                //console.log(response)
                let data_month_day = [];
                let data_value = [];
                response.map(function(num){
                    data_value.push(num['indicador']);
                    data_month_day.push(num['month_or_day']);
                });
                show_indicador_tres(data_month_day, data_value, 'Volumen de Compras');
            }
        });
    }
   
}
function show_indicador_tres(labels, values, description){
    chartIndicadorTres.destroy();
    let data = {
        labels: labels,
        datasets: [{
            label: "Result",
            data: values,
            boderColor: 'rgb(120, 178, 216)',
            backgroundColor:  'rgba(120, 178, 216, 0.3)',
            order: 1
        }, {
            label: "Result Line",
            data: values,
            borderColor: 'rgb(93, 201, 97)',
            backgroundColor: 'rgba(93, 201, 97, 0.3)',
            type: 'line',
            order: 0
        }]
    };
    
    chartIndicadorTres = new Chart(ctx3, {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: description,
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            },
            scales: {
                y: {
                    ticks: {
                        callback: function(val, index){
                            if (Math.floor(val) === val) {
                                return val;
                            }
                        }
                    },
                    beginAtZero: true
                }
            },
            elements: {
                bar: {
                    borderWidth: 1,
                }
            },
            barValueSpacing: 10,
        }
    });    
}
