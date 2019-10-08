<div class="modal" tabindex="-1" role="dialog" id="modalCategoriaEditar">
  <div class="modal-dialog" role="document">
    <form method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="loadModal mb-4">
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
          </div>
          <div class="form-row modal-content-hide">
            <input type="hidden" id="keyCategoriaUsuarioEditar" name="keyCategoriaUsuarioEditar" value="<?php echo ControlGastosAppCtrl::openCypher("encrypt",$_SESSION["userKey"]); ?>">
            <input type="hidden" id="keyCategoriaEditar" name="keyCategoriaEditar">
            <div class="form-group col-md-12">
              <label for="nombreCategoriaEditar">Nombre de la categoria</label>
              <input type="text" class="form-control" id="nombreCategoriaEditar" name="nombreCategoriaEditar" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-12">
              <label for="tipoCategoriaEditar">Tipo de categoria</label>
              <select id="tipoCategoriaEditar" name="tipoCategoriaEditar" class="form-control">
                <option selected disabled>Elegir...</option>
                <option value="PRESUPUESTO">Presupuesto</option>
                <option value="GASTO">Gasto</option>
              </select>
            </div>
          </div>
          <div class="form-group modal-content-hide">
            <label for="descripcionCategoriaEditar">Descripción (OPCIONAL)</label>
            <textarea class="form-control" id="descripcionCategoriaEditar" name="descripcionCategoriaEditar" rows="3"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
