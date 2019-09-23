<div class="modal" tabindex="-1" role="dialog" id="modalPresupuestoEliminar">
  <div class="modal-dialog" role="document">
    <?php $eliminar = new PresupuestosCtrl(); $eliminar -> eliminarPresupuesto(); ?>
    <form method="post" id="formPresupuestoEliminar">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="keyPresupuestoEliminar" id="keyPresupuestoEliminar">
          <h3 class="text-center">¿Esta seguro de eliminar el presupuesto?</h3>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Estoy seguro</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
