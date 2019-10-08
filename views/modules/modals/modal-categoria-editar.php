<div class="modal" tabindex="-1" role="dialog" id="modalCategoriaEditar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <input type="hidden" id="keyCategoriaUsuarioEditar" name="keyCategoriaUsuarioEditar" value="<?php echo ControlGastosAppCtrl::openCypher("encrypt",$_SESSION["userKey"]); ?>">
          <input type="hidden" id="keyCategoriaEditar" name="keyCategoriaEditar">
          <div class="form-group col-md-6">
            <label for="nombreCategoriaEditar">Nombre de la categoria</label>
            <input type="text" class="form-control" id="nombreCategoriaEditar" name="nombreCategoriaEditar" onkeyup="this.value = this.value.toUpperCase();">
          </div>
          <div class="form-group col-md-6">
            <label for="tipoCategoriaEditar">Tipo de categoria</label>
            <select id="tipoCategoriaEditar" name="tipoCategoriaEditar" class="form-control">
              <option selected disabled>Elegir...</option>
              <option value="PRESUPUESTO">Presupuesto</option>
              <option value="GASTO">gasto</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="descripcionCategoriaEditar">Descripción (OPCIONAL)</label>
          <textarea class="form-control" id="descripcionCategoriaEditar" name="descripcionCategoriaEditar" rows="3"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
