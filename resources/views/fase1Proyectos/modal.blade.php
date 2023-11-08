
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Banco</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{ route('fase1Proyectos.envioDatosBanco')}}" method="POST">
            {{ csrf_field() }}
        <div class="modal-body">
            <div class="form-group">
                <label for="nombre_banco">Nombre del Banco</label>
                <input type="text" name="nombre_banco" id="nombre_banco" value="{{ old('nombre_banco') }}" class="form-control" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}"   maxlength="25">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
      </div>
    </div>
  </div>




