<div class="container mt-4">
  <div class="profile-card js-profile-card mt-4">
      <div class="profile-card__img">
        <img src="<?php echo $_SESSION["userFt"]; ?>">
      </div>

      <div class="profile-card__cnt js-profile-cnt">
        <div class="profile-card__name"><?php echo $_SESSION["userNo"]; ?></div>
        <div class="profile-card-loc">
          <span class="profile-card-loc__icon">
            <i class="mdi mdi-email"></i>
          </span>

          <span class="profile-card-loc__txt"><?php echo $_SESSION["userCo"]; ?></span>
        </div>
        <?php
        $presupuestos = PresupuestosCtrl::sumarPresupuestosMes($_SESSION["userKey"],"presupuestos");
        $gastos = GastosCtrl::sumarGastos($_SESSION["userKey"],"gastos");

        $presupuesto = $presupuestos[0];
        $gasto = $gastos[0];

        $porcentaje = ($gasto*100)/$presupuesto;

        echo '<div class="profile-card-inf">
          <div class="profile-card-inf__item">
            <div class="profile-card-inf__title">'."$".number_format($presupuesto,2,'.',',')."MX".'</div>
            <div class="profile-card-inf__txt">Presupuesto Total ('.ControlGastosAppCtrl::cambiarMes(date("m")-1).')</div>
          </div>

          <div class="profile-card-inf__item">
            <div class="profile-card-inf__title">'."$".number_format($gasto,2,'.',',')."MX".'</div>
            <div class="profile-card-inf__txt">Gasto Total ('.ControlGastosAppCtrl::cambiarMes(date("m")-1).')</div>
          </div>
        </div>

        <!-- <div class="profile-card-ctr"> -->
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: '.bcdiv($porcentaje,1,2).'%;" aria-valuenow="'.bcdiv($porcentaje,1,2).'" aria-valuemin="0" aria-valuemax="100">'.bcdiv($porcentaje,1,2).'%</div>
          </div>
        <!-- </div> -->';
        ?>
        <div class="profile-card-ctr">
          <button class="profile-card__button button--blue" data-toggle="modal" data-target="#modalPresupuestoNuevo">Presupuesto</button>
          <button class="profile-card__button button--orange" data-toggle="modal" data-target="#modalGastoNuevo">Gasto</button>
        </div>
      </div>

      <div class="profile-card-message js-message">
        <form class="profile-card-form">
          <div class="profile-card-form__container">
            <textarea placeholder="Say something..."></textarea>
          </div>

          <div class="profile-card-form__bottom">
            <button class="profile-card__button button--blue js-message-close">
              Send
            </button>

            <button class="profile-card__button button--gray js-message-close">
              Cancel
            </button>
          </div>
        </form>

        <div class="profile-card__overlay js-message-close"></div>
      </div>

    </div>
</div>
<?php include "modals/modal-presupuesto-nuevo.php"; ?>
<?php include "modals/modal-gasto-nuevo.php"; ?>
