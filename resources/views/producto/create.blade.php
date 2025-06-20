<!-- Modal con Tabs -->
<div class="modal fade" id="crearProductoModal" tabindex="-1" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <form action="{{ route('producto.store') }}" method="POST" class="modal-content">
      @csrf

      <div class="modal-header">
        <h5 class="modal-title">Crear nuevo producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <!-- Nav tabs -->
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#tab1" role="tab">Datos Básicos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab2" role="tab">Stock y Logística</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab3" role="tab">Atributos Técnicos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab4" role="tab">Finanzas y Ventas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab5" role="tab">Controles Especiales</a>
          </li>
        </ul>


        <div class="tab-content mt-4">
          <!-- Tab 1: Datos Básicos -->
          <div class="tab-pane fade show active" id="tab1">
            <h5 class="mb-4">FICHA ARTÍCULO BÁSICA</h5>

            <div class="row g-3">
              <!-- Primera fila -->
              <div class="col-md-6">
                <label for="codigo" class="form-label">Código</label>
                <input type="text" name="codigo" class="form-control" required>
              </div>
              <div class="col-md-6">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" name="descripcion" class="form-control" required>
              </div>

              <!-- Segunda fila -->
              <div class="col-md-4">
                <label for="costo"  class="form-label">Precio de costo</label>
                <input type="number" id="costo" step="1" name="costo" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label for="margen"  class="form-label">Margen (%)</label>
                <input type="number" id="margen" name="margen" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label for="precioVenta" class="form-label">Precio venta (calculado)</label>
                <input type="text" class="form-control" id="precioVenta" value="$1000">
              </div>

            </div>
          </div>


          <!-- Tab 2: Stock y Logística -->
          <div class="tab-pane fade" id="tab2">
            <div class="row g-3">
              <div class="col-md-4"><label>Unidades por caja</label><input type="number" name="udxcaja" class="form-control" required></div>
              <div class="col-md-4"><label>Unidad de medida</label>
                <select class="form-select" name="unidad_medida_id" required>
                  <option value="">Seleccione unidad</option>
                  @foreach ($unidadMedidas as $umedida)
                  <option value="{{ $umedida->id }}">{{ $umedida->nombre }} ({{ $umedida->abreviatura }})</option>
                  @endforeach
                </select>
              </div>


              <div class="col-md-4">
                <label class="form-label">Marca</label>
                <select class="form-select" name="marca_id" required>
                  <option value="">Seleccione marca</option>
                  @foreach ($marcas as $marca)
                  <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4"><label>Pasillo</label><input type="number" name="pasillo" class="form-control" value="0"></div>
              <div class="col-md-4"><label>Tipo envase</label><input type="text" name="tipo_envase" class="form-control"></div>
              <div class="col-md-4"><label>Peso drenado</label><input type="number" step="0.01" name="peso_drenado" class="form-control"></div>
            </div>
          </div>

          <!-- Tab 3: Atributos Técnicos -->
          <div class="tab-pane fade" id="tab3">
            <div class="row g-3">
              <div class="col-md-4"><label>Depto</label><input type="text" name="depto" class="form-control"></div>
              <div class="col-md-4"><label>Grupo</label><input type="text" name="grupo" class="form-control"></div>
              <div class="col-md-4"><label>Subfamilia (cod_items)</label><input type="text" name="subfamilia" class="form-control"></div>
              <div class="col-md-4"><label>Avance de temporada</label><input type="text" name="avance_temporada" class="form-control"></div>
            </div>
          </div>

          <!-- Tab 4: Finanzas y Ventas -->
          <div class="tab-pane fade" id="tab4">
            <div class="row g-3">

              <div class="col-md-3"><label>Margen 2</label><input type="number" name="margen2" class="form-control"></div>
              <div class="col-md-3"><label>Margen 3</label><input type="number" name="margen3" class="form-control"></div>
              <div class="col-md-3"><label>Venta por mayor</label><input type="number" name="venta_por_mayor" class="form-control" value="1"></div>
              <div class="col-md-3"><label>Código CMarke</label><input type="text" name="cod_cmarke" class="form-control"></div>
            </div>
          </div>

          <!-- Tab 5: Controles Especiales -->
          <div class="tab-pane fade" id="tab5">
            <div class="row g-3">
              <div class="col-md-4"><label>Impuesto adicional</label><input type="text" name="impuesto_adicional" class="form-control"></div>
              <div class="col-md-4"><label>Factor (PPUM)</label><input type="number" step="0.01" name="factor" class="form-control"></div>
              <div class="col-md-4 form-check form-switch mt-4">
                <input type="checkbox" class="form-check-input" name="enviar_a_caja" id="enviarACaja">
                <label for="enviarACaja" class="form-check-label">Enviar a caja</label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const costoInput = document.getElementById('costo');
    const margenInput = document.getElementById('margen');
    const precioVentaInput = document.getElementById('precioVenta');
   
    function calcularPrecioVenta() {
      const costo = parseFloat(costoInput.value) || 0;
      const margen = parseFloat(margenInput.value) || 0;
      const precioVenta = costo + (costo * margen / 100);
      precioVentaInput.value = precioVenta.toFixed(2);
    }

    costoInput.addEventListener('input', calcularPrecioVenta);
    margenInput.addEventListener('input', calcularPrecioVenta);
  });
</script>