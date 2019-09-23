<h2 class="h3 mb-4 text-gray-800">INICIO</h2>

<div class="row">
  <div class="col-xl-4 col-md-4">
    <div class="cardtext-center shadow">
      <div class="card-body">
        <div class="card-col border-left-secondary col-xl-12 col-lg-12 col-md-12 col-12">
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
                  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalPresupuestoNuevo">Nuevo presupuesto</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="card-col border-left-secondary col-xl-12 col-lg-12 col-md-12 col-12">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
              <i class="mdi mdi-nuke mdi-36px text-danger mr-0 mr-sm-4"></i>
              <div class="wrapper text-center text-sm-left">
                <p class="card-text mb-0">Total de gastos</p>
                <div class="fluid-container">
                  <h3 class="mb-0 font-weight-medium">
                    <?php
                    $gastos = GastosCtrl::sumarGastos($_SESSION["userKey"],"gastos");
                    echo '$<span  class="counter" data-count="'.$gastos[0].'"></span>MX';
                    ?>
                  </h3>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalGastoNuevo">Nuevo gasto</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
    </div>
  </div>
  <div class="col-xl-8 col-md-8 mb-4">
    <div class="row">
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Presupuesto (Banco)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800 presupuesto-banco"><?php
                $ahorro = PresupuestosMdl::sumarPresupuestosItem($_SESSION["userKey"],"CUENTA DE AHORRO","presupuestos");
                echo '$<span  class="counter" data-count="'.$ahorro[0].'"></span>MX';
                ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-piggy-bank fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Presupuesto (Nómina)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                $ahorro = PresupuestosMdl::sumarPresupuestosItem($_SESSION["userKey"],"CUENTA DE NÓMINA","presupuestos");
                echo '$<span  class="counter" data-count="'.$ahorro[0].'"></span>MX';
                ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-orange shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-orange text-uppercase mb-1">Presupuesto (Efectivo)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                $efectivo = PresupuestosMdl::sumarPresupuestosItem($_SESSION["userKey"],"BILLETERA","presupuestos");
                $gasto = GastosMdl::sumarGastosFormaPago($_SESSION["userKey"],"EFECTIVO","gastos");
                $saldo = $efectivo[0]-$gasto[0];
                echo '$<span  class="counter" data-count="'.$saldo.'"></span>MX';
                ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Gastos (Obligatorios)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                $gasto1 = GastosMdl::sumarGastosItem($_SESSION["userKey"],"GASTOS FIJOS","gastos");
                $gasto2 = GastosMdl::sumarGastosItem($_SESSION["userKey"],"GASTOS ESCENCIALES","gastos");
                $gasto3 = GastosMdl::sumarGastosItem($_SESSION["userKey"],"GASTOS VARIABLES","gastos");
                $suma = $gasto1[0]+$gasto2[0]+$gasto3[0];
                echo '$<span  class="counter" data-count="'.$suma.'"></span>MX';

                ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-hand-holding-usd fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Gastos (Otros)</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php
                $gasto1 = GastosMdl::sumarGastosItem($_SESSION["userKey"],"GASTOS OPCIONALES","gastos");
                echo '$<span  class="counter" data-count="'.$gasto1[0].'"></span>MX';
                ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-12 col-md-12 mt-4">
      <div class="card border-left-secondary shadow py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Gastos (Otros)</div>
              <canvas id="myChart2" width="400" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?php include "modals/modal-presupuesto-nuevo.php"; ?>
<?php include "modals/modal-gasto-nuevo.php"; ?>
