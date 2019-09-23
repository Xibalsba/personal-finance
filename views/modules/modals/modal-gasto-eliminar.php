<div class="modal" tabindex="-1" role="dialog" id="modalGastoEliminar">
  <div class="modal-dialog" role="document">
    <?php $eliminar = new GastosCtrl(); $eliminar -> eliminarGasto(); ?>
    <form method="post" id="formGastoEliminar">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="keyGastoEliminar" id="keyGastoEliminar">
          <h3 class="text-center">¿Esta seguro de eliminar el gasto?</h3>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
