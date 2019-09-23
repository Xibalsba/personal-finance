/*----------- Validar ingreso en la plataforma -----------*/
$("#formLogin").validate({
  rules: {
    correoUsuario: {
      required: true
    },
    contraseniaUsuario:{
      required:true
    }
  }
});

/*----------- Validar presupuesto Nuevo -----------*/
$("#formPresupuestoNuevo").validate({
  rules:{
    montoPresupuestoNuevo:{
      required:true,
      digits: true
    },
    formaPagoPresupuestoNuevo:{
      required:true
    },
    estadoPresupuestoNuevo:{
      required:true
    }
  }
});

/*----------- Validar presupuesto Editar -----------*/
$("#formPresupuestoEditar").validate({
  rules:{
    montoPresupuestoEditar:{
      required:true,
      digits: true
    },
    formaPagoPresupuestoEditar:{
      required:true
    },
    estadoPresupuestoEditar:{
      required:true
    }
  }
});

/*----------- Validar presupuesto Eliminar -----------*/
$("#formPresupuestoEliminar").validate({
  rules:{
    keyPresupuestoEliminar:{
      required:true
    }
  }
});

/*----------- Validar gasto nuevo -----------*/
$("#formGastoNuevo").validate({
  rules:{
    keyGastoEditar:{
      required:true
    },
    montoGastoNuevo:{
      required:true,
      digits: true
    },
    formaPagoGastoNuevo:{
      required:true
    },
    productoServicioGastoNuevo:{
      required:true
    },
    tipoGastoNuevo:{
      required:true
    },
    estadoGastoNuevo:{
      required:true
    }
  }
});

/*----------- Validar gasto editar -----------*/
$("#formGastoEditar").validate({
  rules:{
    montoGastoEditar:{
      required:true,
      digits: true
    },
    formaPagoGastoEditar:{
      required:true
    },
    productoServicioGastoEditar:{
      required:true
    },
    tipoGastoEditar:{
      required:true
    },
    estadoGastoEditar:{
      required:true
    }
  }
});

/*----------- Validar gasto Eliminar -----------*/
$("#formGastoEliminar").validate({
  rules:{
    keyGastoEliminar:{
      required:true
    }
  }
});

/*=============================================>>>>>
= Bloque de presupuestos =
===============================================>>>>>*/

/*----------- editar presupuesto -----------*/
$(".table").on("click",".btnEditarPresupuesto",function(){
  $(".modal-content-hide").hide();
  $(".loadModal").show();
  $("#formaPagoPresupuestoEditar option:selected").removeAttr("selected");
  $("#estadoPresupuestoEditar option:selected").removeAttr("selected");
  var key = $(this).attr("keyPresupuesto");

  var datos = new FormData();
  datos.append("keyPresupuesto",key);

  $.ajax({
    url:"ajax/ajax.control.php",
    method:"post",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,
    dataType:"json",
    success:function(respuesta){

      $.each(respuesta,function(i,o){
        $("#idPresupuestoEditar").val(key);
        $("#montoPresupuestoEditar").val(o.monto_presupuesto);
        $('#formaPagoPresupuestoEditar option[value="' + o.forma_pago_presupuesto + '"]').attr("selected", true);
        $('#estadoPresupuestoEditar option[value="' + o.estado_presupuesto + '"]').attr("selected", true);
        $("#comentariosPresupuestoEditar").val(o.comentario_presupuesto);
      });

      $(".loadModal").delay(2000).fadeOut(1000);
      $(".modal-content-hide").delay(3000).show(2000);
    }
  });

  $("#modalPresupuestoEditar").modal("show");
});

/*----------- eliminar presupuesto -----------*/
$(".table").on("click",".btnEliminarPresupuesto",function(){
  var key = $(this).attr("keyPresupuesto");

  $("#keyPresupuestoEliminar").val(key);
  $("#modalPresupuestoEliminar").modal("show");
});

/*= fin de Bloque de presupuestos =*/
/*=============================================<<<<<*/


/*=============================================>>>>>
= Bloque de gastos =
===============================================>>>>>*/

/*----------- Editar gasto -----------*/

$(".table").on("click",".btnEditarGasto",function(){
  $(".modal-content-hide").hide();
  $(".loadModal").show();
  var key = $(this).attr("keyGasto");

  var datos = new FormData();
  datos.append("keyGasto",key);

  $.ajax({
    url:"ajax/ajax.control.php",
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,
    dataType:"json",
    success:function(respuesta){
      console.log(respuesta);
      $("#keyGastoEditar").val(key);
      $.each(respuesta,function(i,o){
        $("#montoGastoEditar").val(o.monto_gasto);
        $('#formaPagoGastoEditar option[value="' + o.forma_pago_gasto + '"]').attr("selected", true);
        $('#productoServicioGastoEditar').val(o.producto_servicio_gasto);
        $('#tipoGastoEditar option[value="' + o.tipo_gasto + '"]').attr("selected", true);
        $('#estadoGastoEditar option[value="' + o.estado_gasto + '"]').attr("selected", true);
        $('#comentarioGastoEditar').val(o.comentario_gasto);
      });
      $(".loadModal").delay(2000).fadeOut(1000);
      $(".modal-content-hide").delay(3000).show(2000);
    }
  });

  $("#modalGastoEditar").modal("show");
});

/*----------- Eliminar gasto -----------*/
$(".table").on("click",".btnEliminarGasto",function(i,o){
  var key = $(this).attr("keyGasto");

  $("#keyGastoEliminar").val(key);
  $("#modalGastoEliminar").modal("show");
});

/*= Fin de Bloque de gastos =*/
/*=============================================<<<<<*/


/*=============================================>>>>>
= Bloque de inicio =
===============================================>>>>>*/

$(document).ready(function () {
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: ['Presupuesto', 'Gastos'],
          datasets: [{
              label: '# of Votes',
              data: [2000, 700],
              backgroundColor: [
                  'rgba(28, 200, 138, 0.5)',
                  'rgba(231, 74, 59, 0.5)',
              ],
              borderColor: [
                  'rgba(28, 200, 138, 1)',
                  'rgba(231, 74, 59, 1)',
              ],
              borderWidth: 1
          }]
      },
      options: {
      }
  });

  var ctt = document.getElementById('myChart2').getContext('2d');
  var mixedChart = new Chart(ctt, {
    type: 'bar',
    data: {
        datasets: [{
            label: 'Presupuestos por mes',
            data: [10, 95, 30, 40],
            backgroundColor: [
                'rgba(28, 200, 138, 0.5)',
            ],
            borderColor: [
                'rgba(28, 200, 138, 1)',
            ],
            type: 'line'
        }, {
            label: 'Gastos por mes',
            data: [15, 59, 50, 50],
            backgroundColor: [
                'rgba(231, 74, 59, 0.5)',
            ],
            borderColor: [
                'rgba(231, 74, 59, 1)',
            ],

            // Changes this dataset to become a line
            type: 'line'
        }],
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio' , 'Julio' , 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']
    },
    options: {

    }
});
});

/*= End of Bloque de inicio =*/
/*=============================================<<<<<*/
