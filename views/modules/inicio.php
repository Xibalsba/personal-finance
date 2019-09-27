<h2 class="h3 mb-4 text-gray-800">INICIO</h2>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success" role="alert">
      <i class="mdi mdi-human-greeting mr-2"></i>
      Es bueno verte por aquí, <strong>Julio</strong>
    </div>
  </div>
  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Presupuesto (Totales)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800 presupuesto-banco"><?php
            $presupuesto = PresupuestosCtrl::sumarPresupuestos($_SESSION["userKey"],"presupuestos");
            echo '$<span  class="counter" data-count="'.$presupuesto[0].'"></span>MX';
            ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-piggy-bank fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Gastos (Totales)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
            $gastos = GastosCtrl::sumarGastos($_SESSION["userKey"],"gastos");
            echo '$<span  class="counter" data-count="'.$gastos[0].'"></span>MX';
            ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-orange shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">Presupuesto (Mes)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
            $efectivo = PresupuestosMdl::sumarPresupuestosMes($_SESSION["userKey"],date("m"),date("Y"),"presupuestos");
            echo '$<span  class="counter" data-count="'.$efectivo[0].'"></span>MX';
            ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-3 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Gastos (Mes)</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
            $gasto = GastosMdl::sumarGastosMes($_SESSION["userKey"],date("m"),date("Y"),"gastos");
            echo '$<span  class="counter" data-count="'.$gasto[0].'"></span>MX';
            ?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <canvas id="myChart" width="400" height="400"></canvas>
  </div>
</div>
<?php include "modals/modal-presupuesto-nuevo.php"; ?>
<?php include "modals/modal-gasto-nuevo.php"; ?>
