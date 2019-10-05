<div class="modal" tabindex="-1" role="dialog" id="modalPresupuestoNuevo">
  <div class="modal-dialog" role="document">
    <?php $presupuesto = new PresupuestosCtrl(); $presupuesto -> nuevoPresupuesto(); ?>
    <form method="post" id="formPresupuestoNuevo">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar nuevo presupuesto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="montoPresupuestoNuevo">Monto presupuesto</label>
              <input type="text" class="form-control" id="montoPresupuestoNuevo" name="montoPresupuestoNuevo">
            </div>
            <div class="form-group col-md-6">
              <label for="formaPagoPresupuestoNuevo">Forma de pago</label>
              <select id="formaPagoPresupuestoNuevo" name="formaPagoPresupuestoNuevo" class="form-control">
                <option selected disabled>Elegir...</option>
                <option value="EFECTIVO">EFECTIVO</option>
                <option value="DEPÓSITO">DEPÓSITO</option>
                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="estadoPresupuestoNuevo">Estado del presupuesto</label>
            <select id="estadoPresupuestoNuevo" name="estadoPresupuestoNuevo" class="form-control">
              <option selected disabled>Elegir...</option>
              <?php
              $categorias = CategoriasMdl::mostrarCategoriasTipo($_SESSION["userKey"],"PRESUPUESTO","categorias");
              foreach ($categorias as $key => $categoria) {
                echo '<option value="'.$categoria["id_categoria"].'">'.$categoria["nom_categoria"].'</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="comentariosPresupuestoNuevo">Comentarios (OPCIONAL)</label>
            <textarea class="form-control" id="comentariosPresupuestoNuevo" name="comentariosPresupuestoNuevo" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
