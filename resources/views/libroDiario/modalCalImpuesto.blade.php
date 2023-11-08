 <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Calcular impuesto y retenciones</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="valor">Valor Base</label>
                    <input type="text" name="valor" id="valor" oninput="validarNumero(this)" class="form-control" placeholder="Introduce un valor">
                </div>
            </div>

            <script>
                function validarNumero(input) {
                    // Remueve cualquier carácter que no sea un número o un punto decimal
                    input.value = input.value.replace(/[^0-9.]/g, '');

                    // Verifica si ya hay un punto decimal y evita agregar más de uno
                    if (input.value.indexOf('.') !== -1) {
                        var decimalPart = input.value.split('.')[1];
                        if (decimalPart.length > 2) {
                            input.value = input.value.slice(0, -1);
                        }
                    }
                }
               </script>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="valor">Valor Impuesto</label>
                    <input type="text" name="valor" id="valor"  class="form-control" placeholder="Introduce un valor">
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label for="valor">Impuesto</label>
                    <input type="text" name="valor" id="valor"  class="form-control" placeholder="Introduce un valor">
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">OK</button>
        </div>
      </div>
    </div>
  </div>
