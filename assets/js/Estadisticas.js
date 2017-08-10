var m_fecha_actual;
var a_fecha_actual;
var ctx = $("#myGrafica");
$(document).ready(function(){

    m_fecha_actual=$("#f_mesActual").val();
    a_fecha_actual =$("#f_anioActual").val();

    $("#ConPor").on('change',function(evento){
        var por =$("#ConPor").val();
        //ctx.clearRect(0, 0, canvas.width, canvas.height);
      //mensajes(por);
        if (por=="genero") {
          graficarPorSexo();
        }else if (por=="grados") {
          estadisticaPorGrado();
        }else if (por=="carrera") {
          estadisticaPorCarrera();
        }
          //javier-anaya_9@hotmail.com
    });

    $("#btn_consultar").click(function(event){

      console.log('dio click-->correcta funcion');
      console.log('mesActual->'+m_fecha_actual);
      var por =$("#ConPor").val();
      //para la validacion para que las fechas no rebasen el mes y año actual
        var inicioMes = $("#inicioMes").val();
        var inicioAnio = $("#anioInicio") .val();
        var finMes = $("#finMes").val();
        var finAnio = $("#anioFin").val();
      if ((inicioMes>m_fecha_actual & inicioAnio==a_fecha_actual) |(finMes>m_fecha_actual & finAnio==a_fecha_actual)| (inicioAnio>finAnio & inicioMes>finMes)) {
        alertify.error("Error de fechas verifica y vuelve a intentarlo");
      }else{
          if (por=="genero") {
            graficarPorSexo();
          }else if (por=="grados") {
            estadisticaPorGrado();
          }else if (por=="carrera") {
            estadisticaPorCarrera();
          } 
      }


      //como captar el evento de un boton en javascript como falso o vedadero
      //termina la validacion



      //mensajes(por);
      
    });



});



function graficarPorSexo(){
  var inicioMes = $("#inicioMes").val();
  var inicioAnio = $("#anioInicio") .val();
  var finMes = $("#finMes").val();
  var finAnio = $("#anioFin").val();
  var fechaInicial =inicioAnio+"-"+inicioMes+"-01";
  var fechaFinal = finAnio+"-"+finMes+"-01";
  $.ajax({
    url:"http://localhost/proyectoCBT/index.php/Estadisticas/obtieneDatosPorSexo",
    type:"POST",
    data:{fechaIni:fechaInicial,fechaFi:fechaFinal},
    success:function(datos){
      if (datos.replace(/^\s|\s+$/g, "") != "error") {        
        var obj = JSON.parse(datos);
        var h=obj.hombres;
        var m =obj.mujeres;
        graficaPorSexo(h,m);
      }else{
        alert("error al realizar la consulta");
      }
    }
  });
}

function estadisticaPorGrado(){
  var inicioMes = $("#inicioMes").val();
  var inicioAnio = $("#anioInicio") .val();
  var finMes = $("#finMes").val();
  var finAnio = $("#anioFin").val();
  var fechaInicial =inicioAnio+"-"+inicioMes+"-01";
  var fechaFinal = finAnio+"-"+finMes+"-01";
  $.ajax({
    url:"http://localhost/proyectoCBT/index.php/Estadisticas/obtieneDatosPorGrado",
    type:"POST",
    data:{fechaIni:fechaInicial,fechaFi:fechaFinal},
    success:function(datos){
      if (datos.replace(/^\s|\s+$/g, "") != "error") {        
        var obj = JSON.parse(datos);
        var p=obj.primero;
        var s =obj.segundo;
        var t =obj.tercero;
        graficaPorGrado(p,s,t);        
      }else{
        alert("error al realizar la consulta");
      }
    }
  });
  
}

function estadisticaPorCarrera(){
  var inicioMes = $("#inicioMes").val();
  var inicioAnio = $("#anioInicio") .val();
  var finMes = $("#finMes").val();
  var finAnio = $("#anioFin").val();
  var fechaInicial =inicioAnio+"-"+inicioMes+"-01";
  var fechaFinal = finAnio+"-"+finMes+"-01";
  $.ajax({
    url:"http://localhost/proyectoCBT/index.php/Estadisticas/obtieneDatosPorCarrera",
    type:"POST",
    data:{fechaIni:fechaInicial,fechaFi:fechaFinal},
    success:function(datos){
      if (datos.replace(/^\s|\s+$/g, "") != "error") {        
        var obj = JSON.parse(datos);
        var i=obj.informatica;
        var d =obj.diseno;
        console.log("in->"+i+" di->"+d);  
        graficaPorCarrera(i,d);
      }else{
        alert("error al realizar la consulta");
      }
    }
  });
}




function mensajes(mensaje){
  alert("estadistica por =) "+mensaje);
}

function graficaPorSexo(hombres,mujeres){
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Hombres", "Mujeres"],
          datasets: [{
              label: 'Numero de Prestamos por mes',
              data: [hombres, mujeres],
              backgroundColor: [
                  'rgba(0, 0, 255, 0.2)', //barra de hombres
                  'rgba(255,0,255, 0.2)',// barra de mujeres
                  'rgba(210,105,30, 0.2)', //para los labels

              ],
              borderColor: [
                  'rgba(30,144,255,1)',
                  'rgba(199,21,133, 1)',
                  'rgba(210,105,30, 1)',
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
}

/*Estadisticas por grado*/

function graficaPorGrado(primero,segundo,tercero){
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Primer grado", "Segundo grado","Tercero grado"],
          datasets: [{
              label: 'Numero de prestamos por grado',
              data: [primero,segundo,tercero],
              backgroundColor: [
                  'rgba(0, 0, 255, 0.2)', //barra de primero
                  'rgba(0, 0, 255, 0.2)', //barra de segundo
                  'rgba(255,0,255, 0.2)',// barra de tercero
                  'rgba(210,105,30, 0.2)', //para los labels

              ],
              borderColor: [
                  'rgba(30,144,255,1)',
                  'rgba(199,21,133, 1)',
                  'rgba(199,21,133, 1)',
                  'rgba(210,105,30, 1)',
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
}

function graficaPorCarrera(informatica,disenio){
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Tecnico en informatica", "Tecnico en diseño asistido"],
          datasets: [{
              label: 'Numero de prestamos por carrera',
              data: [informatica,disenio],
              backgroundColor: [
                  'rgba(0, 0, 255, 0.2)', //barra de informatica
                  'rgba(0, 0, 255, 0.2)', //barra de diseño
                  'rgba(210,105,30, 0.2)', //para los labels

              ],
              borderColor: [
                  'rgba(30,144,255,1)',
                  'rgba(199,21,133, 1)',
                  'rgba(210,105,30, 1)',
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
  });
}



/*
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio"],
        datasets: [{
            label: 'Numero de Prestamos por mes',
            data: [12, 19, 3, 5, 2, 3,6],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(86, 60, 90, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(154, 104, 240, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});*/
