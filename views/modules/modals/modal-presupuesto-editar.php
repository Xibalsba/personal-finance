<div class="modal" tabindex="-1" role="dialog" id="modalPresupuestoEditar">
  <div class="modal-dialog" role="document">
    <?php $presupuesto = new PresupuestosCtrl(); $presupuesto -> actualizarDatosPresupuesto(); ?>
    <form method="post" id="formPresupuestoEditar">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar datos presupuesto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="loadModal">
            <div class="d-flex justify-content-center">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
          </div>
          <div class="modal-content-hide">
            <input type="hidden" name="idPresupuestoEditar" id="idPresupuestoEditar">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="montoPresupuestoEditar">Monto presupuesto</label>
                <input type="text" class="form-control" id="montoPresupuestoEditar" name="montoPresupuestoEditar">
              </div>
              <div class="form-group col-md-6">
                <label for="formaPagoPresupuestoEditar">Forma de pago</label>
                <select id="formaPagoPresupuestoEditar" name="formaPagoPresupuestoEditar" class="form-control">
                  <option value="EFECTIVO">EFECTIVO</option>
                  <option value="DEPÓSITO">DEPÓSITO</option>
                  <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="estadoPresupuestoEditar">Estado del presupuesto</label>
              <select id="estadoPresupuestoEditar" name="estadoPresupuestoEditar" class="form-control">
                <?php
                $categorias = CategoriasMdl::mostrarCategoriasTipo($_SESSION["userKey"],"PRESUPUESTO","categorias");
                foreach ($categorias as $key => $categoria) {
                  echo '<option value="'.$categoria["id_categoria"].'">'.$categoria["nom_categoria"].'</option>';
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="comentariosPresupuestoEditar">Comentarios (OPCIONAL)</label>
              <textarea class="form-control" id="comentariosPresupuestoEditar" name="comentariosPresupuestoEditar" rows="3"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer modal-content-hide">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>
