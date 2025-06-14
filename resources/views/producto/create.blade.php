<!-- Modal para crear producto -->
<div class="modal fade" id="crearProductoModal" tabindex="-1" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('producto.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="crearProductoModalLabel">Crear nuevo producto</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>

      <div class="modal-body">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre del producto</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
          <label for="precio" class="form-label">Precio</label>
          <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
        </div>

        <div class="mb-3">
          <label for="stock" class="form-label">Stock disponible</label>
          <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>
