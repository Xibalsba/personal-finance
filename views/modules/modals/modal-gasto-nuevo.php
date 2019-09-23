<div class="modal" tabindex="-1" role="dialog" id="modalGastoNuevo">
  <div class="modal-dialog" role="document">
    <?php $gasto = new GastosCtrl(); $gasto -> nuevoGasto(); ?>
    <form method="post" id="formGastoNuevo">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar nuevo gasto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="montoGastoNuevo">Monto</label>
              <input type="text" class="form-control" id="montoGastoNuevo" name="montoGastoNuevo" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
              <label for="formaPagoGastoNuevo">Forma de pago</label>
              <select id="formaPagoGastoNuevo" name="formaPagoGastoNuevo" class="form-control">
                <option selected disabled>Elegir...</option>
                <option value="EFECTIVO">EFECTIVO</option>
                <option value="DEPÓSITO">DEPÓSITO</option>
                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="productoServicioGastoNuevo">Producto/Servicio</label>
            <textarea class="form-control" id="productoServicioGastoNuevo" name="productoServicioGastoNuevo" rows="3"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tipoGastoNuevo">Tipo de gasto</label>
              <select id="tipoGastoNuevo" name="tipoGastoNuevo" class="form-control">
                <option selected disabled>Elegir...</option>
                <option value="GASTOS FIJOS">GASTOS FIJOS (No se modifican con frecuencia)</option>
                <option value="GASTOS VARIABLES">GASTOS VARIABLES (Los precios pueden alterarse)</option>
                <option value="GASTOS ESENCIALES">GASTOS ESENCIALES (Aquellas necesidades que no se pueden obviar)</option>
                <option value="GASTOS OPCIONALES">GASTOS OPCIONALES (Gastos superfluos, o sea que están de más.)</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="estadoGastoNuevo">Estado gasto</label>
              <select id="estadoGastoNuevo" name="estadoGastoNuevo" class="form-control">
                <option selected disabled>Elegir...</option>
                <option value="LIQUIDADO">LIQUIDADO</option>
                <option value="ABONADO">ABONADO</option>
                <option value="IMPAGADO">IMPAGADO</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="comentarioGastoNuevo">Comentario (OPCIONAL)</label>
            <textarea class="form-control" id="comentarioGastoNuevo" name="comentarioGastoNuevo" rows="3"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Registrar gasto</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </form>
  </div>
</div>
