<div class="row">
  <div class="col-xl-12 col-md-12 mb-2 clearfix">
    <h2 class="h3 text-gray-800">PRESUPUESTOS</h2>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPresupuestoNuevo"><i class="fa fa-plus mr-2"></i>Agregar nuevo presupuesto</button>
  </div>
  <div class="col-xl-12 col-md-12 clearfix">
    <?php
    echo (isset($_GET["add"]) && $_GET["add"] == "success") ? '<div class="alert alert-success" role="alert"><strong>¡Genial!</strong> el presupuesto se ingresó de manera satisfactoria</div>':'';
    echo (isset($_GET["add"]) && $_GET["add"] == "error") ? '<div class="alert alert-danger" role="alert"><strong>¡Rayos!</strong> ocurrió un error al registrar el presupuesto, inténtelo de nuevo.</div>':'';

    echo (isset($_GET["edit"]) && $_GET["edit"] == "success") ? '<div class="alert alert-success" role="alert"><strong>¡Genial!</strong> los datos fueron guardados de manera satisfactoria</div>':'';
    echo (isset($_GET["edit"]) && $_GET["edit"] == "error") ? '<div class="alert alert-danger" role="alert"><strong>¡Rayos!</strong> ocurrió un error al guardar los datos, inténtelo de nuevo.</div>':'';

    echo (isset($_GET["delete"]) && $_GET["delete"] == "success") ? '<div class="alert alert-success" role="alert"><strong>¡Genial!</strong> el presupuesto fue eliminado de manera satisfactoria</div>':'';
    echo (isset($_GET["delete"]) && $_GET["delete"] == "error") ? '<div class="alert alert-danger" role="alert"><strong>¡Rayos!</strong> ocurrió un error al eliminar el presupuesto, inténtelo de nuevo.</div>':'';
    ?>
  </div>
  <div class="col-xl-12 col-md-12 mb-4">
    <div class="card shadow h-100">
      <div class="card-body">
        <div class="card-col col-xl-12 col-lg-12 col-md-12 col-12">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
              <i class="mdi mdi-square-inc-cash mdi-36px text-success mr-0 mr-sm-4"></i>
              <div class="wrapper text-center text-sm-left">
                <p class="card-text mb-0">Total de presupuestos</p>
                <div class="fluid-container">
                  <h3 class="mb-0 font-weight-medium">
                    <?php
                    $presupuesto = PresupuestosCtrl::sumarPresupuestos($_SESSION["userKey"],"presupuestos");
                    echo '$<span  class="counter" data-count="'.$presupuesto[0].'"></span>MX';

                    ?>
                  </h3>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 10%;background:#8A3AFC" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="COMIDA: $100">10%</div>

              <div class="progress-bar" role="progressbar" style="width: 60%;background:#4DB964" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="ROPA: $600">60%</div>

                <div class="progress-bar" role="progressbar" style="width: 20%;background:#EAA143" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="ROPA: $200">20%</div>
            </div>
          </div>
        </div>
        <table class="table table-striped display responsive nowrap" style="width:100%">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Monto</th>
              <th scope="col">Forma pago</th>
              <th scope="col">Fecha</th>
              <th scope="col">Estado</th>
              <th scope="col">Comentario</th>
              <th scope="col">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $presupuestos = new PresupuestosCtrl(); $presupuestos -> mostrarPresupuestos(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include "modals/modal-presupuesto-nuevo.php"; ?>
<?php include "modals/modal-presupuesto-editar.php"; ?>
<?php include "modals/modal-presupuesto-Eliminar.php"; ?>
