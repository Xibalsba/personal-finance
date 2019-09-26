<div class="modal" tabindex="-1" role="dialog" id="modalGastoEditar">
  <div class="modal-dialog" role="document">
    <?php $gasto = new GastosCtrl(); $gasto -> editarGasto(); ?>
    <form method="post" id="formGastoEditar">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="mdi mdi-pencil mr-2"></i>Editar datos gasto</h5>
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
          <div class="modal-content-hide">
            <input type="hidden" name="keyGastoEditar" id="keyGastoEditar">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="montoGastoEditar">Monto</label>
                <input type="text" class="form-control" id="montoGastoEditar" name="montoGastoEditar" autocomplete="off">
              </div>
              <div class="form-group col-md-6">
                <label for="formaPagoGastoEditar">Forma de pago</label>
                <select id="formaPagoGastoEditar" name="formaPagoGastoEditar" class="form-control">
                  <option selected disabled>Elegir...</option>
                  <option value="EFECTIVO">EFECTIVO</option>
                  <option value="DEPÓSITO">DEPÓSITO</option>
                  <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="productoServicioGastoEditar">Producto/Servicio</label>
              <textarea class="form-control" id="productoServicioGastoEditar" name="productoServicioGastoEditar" rows="3"></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="tipoGastoEditar">Tipo de gasto</label>
                <select id="tipoGastoEditar" name="tipoGastoEditar" class="form-control">
                  <option selected disabled>Elegir...</option>
                  <?php
                  $categorias = CategoriasMdl::mostrarCategoriasTipo($_SESSION["userKey"],"GASTO","categorias");
                  foreach ($categorias as $key => $categoria) {
                    echo '<option value="'.$categoria["id_categoria"].'">'.$categoria["nom_categoria"].'</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="estadoGastoEditar">Estado gasto</label>
                <select id="estadoGastoEditar" name="estadoGastoEditar" class="form-control">
                  <option selected disabled>Elegir...</option>
                  <option value="LIQUIDADO">LIQUIDADO</option>
                  <option value="ABONADO">ABONADO</option>
                  <option value="IMPAGADO">IMPAGADO</option>
                </select>
              </div>
              <div class="form-group col-md-12">
                <label for="comentarioGastoEditar">Comentario (OPCIONAL)</label>
              <textarea class="form-control" id="comentarioGastoEditar" name="comentarioGastoEditar" rows="3"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer modal-content-hide">
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
