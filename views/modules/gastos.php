<div class="row">
  <div class="col-xl-12 col-md-12 mb-2 clearfix">
    <h2 class="h3 text-gray-800">GASTOS</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGastoNuevo"><i class="fa fa-plus mr-2"></i>Agregar nuevo gasto</button>
  </div>
  <div class="col-xl-12 col-md-12 clearfix">
    <?php
    echo (isset($_GET["add"]) && $_GET["add"] == "success") ? '<div class="alert alert-success" role="alert"><strong>¡Genial!</strong> el gasto se ingresó de manera satisfactoria</div>':'';
    echo (isset($_GET["add"]) && $_GET["add"] == "error") ? '<div class="alert alert-danger" role="alert"><strong>¡Rayos!</strong> ocurrió un error al registrar el gasto, inténtelo de nuevo.</div>':'';

    echo (isset($_GET["edit"]) && $_GET["edit"] == "success") ? '<div class="alert alert-success" role="alert"><strong>¡Genial!</strong> los datos fueron guardados de manera satisfactoria</div>':'';
    echo (isset($_GET["edit"]) && $_GET["edit"] == "error") ? '<div class="alert alert-danger" role="alert"><strong>¡Rayos!</strong> ocurrió un error al guardar los datos, inténtelo de nuevo.</div>':'';

    echo (isset($_GET["delete"]) && $_GET["delete"] == "success") ? '<div class="alert alert-success" role="alert"><strong>¡Genial!</strong> el gasto fue eliminado de manera satisfactoria</div>':'';
    echo (isset($_GET["delete"]) && $_GET["delete"] == "error") ? '<div class="alert alert-danger" role="alert"><strong>¡Rayos!</strong> ocurrió un error al eliminar el gasto, inténtelo de nuevo.</div>':'';
    ?>
  </div>
  <div class="col-xl-12 col-md-12 mb-4">
    <div class="card">
      <div class="card-body">
        <div class="card-col col-xl-12 col-lg-12 col-md-12 col-12">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
              <i class="mdi mdi-nuke mdi-36px text-danger mr-0 mr-sm-4"></i>
              <div class="wrapper text-center text-sm-left">
                <p class="card-text mb-0">Total de gastos</p>
                <div class="fluid-container">
                  <h3 class="mb-0 font-weight-medium">
                    <?php
                    $gastos = GastosCtrl::sumarGastos($_SESSION["userKey"],"gastos");
                    // print_r($gastos);
                    echo '$<span  class="counter" data-count="'.$gastos[0].'"></span>MX';

                    ?>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-striped display responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Monto</th>
              <th scope="col">Producto/Servicio</th>
              <th scope="col">Forma pago</th>
              <th scope="col">Fecha</th>
              <th scope="col">Tipo</th>
              <th scope="col">Estado</th>
              <th scope="col">Comentario</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $gastos = new GastosCtrl(); $gastos -> mostrarGastos(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include "modals/modal-gasto-nuevo.php"; ?>
<?php include "modals/modal-gasto-editar.php"; ?>
<?php include "modals/modal-gasto-eliminar.php"; ?>
