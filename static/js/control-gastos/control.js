/*----------- Validar ingreso en la plataforma -----------*/
$("#formLogin").validate({
  rules: {
    correoUsuario: {
      required: true
    },
    contraseniaUsuario: {
      required: true
    }
  }
});

/*----------- Validar presupuesto Nuevo -----------*/
$("#formPresupuestoNuevo").validate({
  rules: {
    montoPresupuestoNuevo: {
      required: true,
      digits: true
    },
    formaPagoPresupuestoNuevo: {
      required: true
    },
    estadoPresupuestoNuevo: {
      required: true
    }
  }
});

/*----------- Validar presupuesto Editar -----------*/
$("#formPresupuestoEditar").validate({
  rules: {
    montoPresupuestoEditar: {
      required: true,
      digits: true
    },
    formaPagoPresupuestoEditar: {
      required: true
    },
    estadoPresupuestoEditar: {
      required: true
    }
  }
});

/*----------- Validar presupuesto Eliminar -----------*/
$("#formPresupuestoEliminar").validate({
  rules: {
    keyPresupuestoEliminar: {
      required: true
    }
  }
});

/*----------- Validar gasto nuevo -----------*/
$("#formGastoNuevo").validate({
  rules: {
    keyGastoEditar: {
      required: true
    },
    montoGastoNuevo: {
      required: true,
      digits: true
    },
    formaPagoGastoNuevo: {
      required: true
    },
    productoServicioGastoNuevo: {
      required: true
    },
    tipoGastoNuevo: {
      required: true
    },
    estadoGastoNuevo: {
      required: true
    }
  }
});

/*----------- Validar gasto editar -----------*/
$("#formGastoEditar").validate({
  rules: {
    montoGastoEditar: {
      required: true,
      digits: true
    },
    formaPagoGastoEditar: {
      required: true
    },
    productoServicioGastoEditar: {
      required: true
    },
    tipoGastoEditar: {
      required: true
    },
    estadoGastoEditar: {
      required: true
    }
  }
});

/*----------- Validar gasto Eliminar -----------*/
$("#formGastoEliminar").validate({
  rules: {
    keyGastoEliminar: {
      required: true
    }
  }
});


/*----------- Validar categorias Nuevo -----------*/
$("#formCategoriaNuevo").validate({
  rules: {
    keyCategoriaNuevo: {
      required: true
    },
    nombreCategoriaNuevo: {
      required: true
    },
    tipoCategoriaNuevo: {
      required: true
    }
  }
});
/*=============================================>>>>>
= Bloque de presupuestos =
===============================================>>>>>*/


/*=============================================>>>>>
= Usuarios =
===============================================>>>>>*/

/*----------- Validar registro de usuario -----------*/
$("#formRegistro").validate({
  rules: {
    nombreUsuarioRegistro:{
      required:true
    },
    correoUsuarioRegistro:{
      required:true
    },
    contraseniaUsuarioRegistro:{
      required:true
    },
    imagenUsuarioRegistro:{
      required:true
    }
  }
});

/*= End of Usuarios =*/
/*=============================================<<<<<*/


/*----------- editar presupuesto -----------*/
$(".table").on("click", ".btnEditarPresupuesto", function () {
  $(".modal-content-hide").hide();
  $(".loadModal").show();
  $("#formaPagoPresupuestoEditar option:selected").removeAttr("selected");
  $("#estadoPresupuestoEditar option:selected").removeAttr("selected");
  var key = $(this).attr("keyPresupuesto");

  var datos = new FormData();
  datos.append("keyPresupuesto", key);

  $.ajax({
    url: "ajax/ajax.control.php",
    method: "post",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {

      $.each(respuesta, function (i, o) {
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
$(".table").on("click", ".btnEliminarPresupuesto", function () {
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

$(".table").on("click", ".btnEditarGasto", function () {
  $(".modal-content-hide").hide();
  $(".loadModal").show();
  var key = $(this).attr("keyGasto");

  var datos = new FormData();
  datos.append("keyGasto", key);

  $.ajax({
    url: "ajax/ajax.control.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
      $("#keyGastoEditar").val(key);
      $.each(respuesta, function (i, o) {
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
$(".table").on("click", ".btnEliminarGasto", function (i, o) {
  var key = $(this).attr("keyGasto");

  $("#keyGastoEliminar").val(key);
  $("#modalGastoEliminar").modal("show");
});

/*= Fin de Bloque de gastos =*/
/*=============================================<<<<<*/


/*=============================================>>>>>
= Mostrar graficas de presupuestos y gastos del año =
===============================================>>>>>*/

function graficasAnio(tipo){
  var datos = new FormData();
  datos.append("pgGraficaTipo",tipo);

  $.ajax({
    url:"ajax/ajax.control.php",
    method:"POST",
    data:datos,
    cache:false,
    contentType:false,
    processData:false,
    dataType:"json",
    success:function(respuesta){
      // console.log(respuesta);
      var lineChartData = {
  			labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
  			datasets: [{
  				label: 'Presupuesto',
  				borderColor: "rgba(44,196,99,1)",
  				backgroundColor: "rgba(44,196,99,.5)",
  				fill: true,
  				data: respuesta[0],
  			}, {
  				label: 'Gasto',
  				borderColor: "rgba(245,62,79,1)",
  				backgroundColor: "rgba(245,62,79,.4)",
  				fill: true,
  				data: respuesta[1],
  			}]
  		};
      new Chart(document.getElementById("myChart"), {
        type: 'line',
        data: lineChartData,
        options: {
          title: {
            display: true,
            text: 'Presupuesto y gastos durante el año'
          }
        }
      });
    }
  });
}

$(window).on('load', function() {
  graficasAnio("GRAFICA");
  // graficasAnio("GASTO");
  // setInterval(graficasAnio,1000);
});


/*= End of Mostrar graficas de presupuestos y gastos del año =*/
/*=============================================<<<<<*/


$(".table").on("click",".btnEditarCategoria",function(){
  var key =  $(this).attr("kyCategoria");
  var nombre =  $(this).attr("kyCategoria");
  var tipo =  $(this).attr("kyCategoria");
  console.log(key);

  $("#keyCategoriaEditar").val(key);
  $("#modalCategoriaEditar").modal("show");
});
