<div class="container mt-4">
  <div class="profile-card js-profile-card mt-4">
      <div class="profile-card__img">
        <img src="http://www.adventuresinpoortaste.com/wp-content/uploads/2017/04/batman-vol-2-rebirth-featured.jpg" alt="profile card">
      </div>

      <div class="profile-card__cnt js-profile-cnt">
        <div class="profile-card__name">Julio López</div>
        <div class="profile-card__txt">Desarrollador de software en <strong>Cafeología</strong></div>
        <div class="profile-card-loc">
          <span class="profile-card-loc__icon">
            <i class="mdi mdi-map-marker"></i>
          </span>

          <span class="profile-card-loc__txt">
            Sán Cristóbal de las Casas, Chiapas. México.
          </span>
        </div>

        <div class="profile-card-inf">
          <div class="profile-card-inf__item">
            <div class="profile-card-inf__title"><?php $presupuesto = PresupuestosCtrl::sumarPresupuestosMes($_SESSION["userKey"],"presupuestos");
            echo "$".number_format($presupuesto[0],2,'.',',')."MX"; ?></div>
            <div class="profile-card-inf__txt">Presupuesto Total</div>
          </div>

          <div class="profile-card-inf__item">
            <div class="profile-card-inf__title"><?php $gastos = GastosCtrl::sumarGastos($_SESSION["userKey"],"gastos");
            echo "$".number_format($gastos[0],2,'.',',')."MX"; ?></div>
            <div class="profile-card-inf__txt">Gasto Total</div>
          </div>
        </div>

        <!-- <div class="profile-card-ctr"> -->
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
          </div>
        <!-- </div> -->

        <div class="profile-card-ctr">
          <button class="profile-card__button button--blue js-message-btn">Message</button>
          <button class="profile-card__button button--orange">Follow</button>
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
