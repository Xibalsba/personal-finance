<div class="modal" tabindex="-1" role="dialog" id="modalCategoriaNuevo">
  <div class="modal-dialog" role="document">
    <form method="post" id="formCategoriaNuevo">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar nueva categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <input type="hidden" id="keyCategoriaNuevo" name="keyCategoriaNuevo" value="<?php echo ControlGastosAppCtrl::openCypher("encrypt",$_SESSION["userKey"]); ?>">
            <div class="form-group col-md-6">
              <label for="nombreCategoriaNuevo">Nombre de la categoria</label>
              <input type="text" class="form-control" id="nombreCategoriaNuevo" name="nombreCategoriaNuevo" onkeyup="this.value = this.value.toUpperCase();">
            </div>
            <div class="form-group col-md-6">
              <label for="tipoCategoriaNuevo">Tipo de categoria</label>
              <select id="tipoCategoriaNuevo" name="tipoCategoriaNuevo" class="form-control">
                <option selected disabled>Elegir...</option>
                <option value="PRESUPUESTO">Presupuesto</option>
                <option value="GASTO">gasto</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="comentariosCategoriaNuevo">Comentarios (OPCIONAL)</label>
            <textarea class="form-control" id="comentariosCategoriaNuevo" name="comentariosCategoriaNuevo" rows="3"></textarea>
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
