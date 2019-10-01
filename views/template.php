
<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CONTROL</title>

  <!-- Custom fonts for this template-->
  <link href="static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="static/vendor/datatables/datatables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="static/vendor/datatables/responsive.dataTables.min.css" rel="stylesheet" type="text/css">
  <link href="static/vendor/odometer-master/themes/odometer-theme-default.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="static/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="static/css/icons.css" rel="stylesheet">

</head>

<body id="page-top">
  <div class="loader"></div>
  <?php
   if(!isset($_SESSION["acceso"])){
     if (isset($_GET["action"]) && $_GET["action"] == "registro") {
       include "modules/registro.php";
     }else{
       include "modules/ingreso.php";
     }
   }
  ?>

  <!-- Page Wrapper -->
  <?php if (isset($_SESSION["acceso"])): ?>
    <div id="wrapper">

      <!-- Sidebar -->
      <?php if(isset($_SESSION["acceso"])){include "system/sidebar.php";} ?>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          <!-- Topbar -->
          <?php if(isset($_SESSION["acceso"])){include "system/topbar.php";} ?>
          <!-- End of Topbar -->

          <!-- Begin Page Content -->
          <div class="container-fluid">

            <?php
            $link = new ControlGastosAppCtrl();
            $link -> linkControlGastos();
            ?>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include "system/footer.php"; ?>

      </div>
      <!-- End of Content Wrapper -->

    </div>
  <?php endif; ?>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <?php if(isset($_SESSION["acceso"])){include "modules/modals/modal-cerrar-sesion.php";} ?>
  <script src="static/vendor/jquery/jquery.min.js"></script>
  <script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="static/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="static/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
  <script src="static/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="static/vendor/datatables/datatables.bootstrap4.min.js"></script>
  <script src="static/vendor/datatables/dataTables.responsive.min.js"></script>
  <script src="static/vendor/odometer-master/odometer.min.js"></script>
  <script src="static/vendor/chart.js/Chart.min.js"></script>
  <script src="static/js/settings.min.js"></script>
  <script src="static/js/control-gastos/control.min.js"></script>

</body>

</html>
