<!-- Modal para crear producto -->
<div class="modal fade" id="crearProductoModal" tabindex="-1" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <form action="{{ route('producto.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Crear nuevo producto</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body row g-3 px-4 py-3">


        <div class="col-md-4">
          <label class="form-label">Código</label>
          <input type="text" class="form-control" name="codigo" required>
        </div>

      <div class="col-md-8">
        <label class="form-label">Descripción</label>
        <input type="text" class="form-control" name="descripcion" required>
      </div> 
  
        <div class="col-md-4">
          <label class="form-label">Costo</label>
          <input type="number" step="0.01" class="form-control" name="costo" required>
        </div>

        <div class="col-md-4">
          <label class="form-label">Margen (%)</label>
          <input type="number" class="form-control" name="margen" required>
        </div>

        <div class="col-md-4">
          <label class="form-label">Unidades por caja</label>
          <input type="number" class="form-control" name="udxcaja" required>
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

        <div class="col-md-4">
          <label class="form-label">Color</label>
          <select class="form-select" name="color_id">
            <option value="">(Opcional)</option>
            @foreach ($colores as $color)
              <option value="{{ $color->id }}">{{ $color->nombre }}</option>
            @endforeach
          </select>
        </div>

        <div class="col-md-4">
          <label class="form-label">Talla</label>
          <select class="form-select" name="talla_id">
            <option value="">(Opcional)</option>
            @foreach ($tallas as $talla)
              <option value="{{ $talla->id }}">{{ $talla->valor }}</option>
            @endforeach
          </select>
        </div>

          <div class="col-md-4">
            <label class="form-label">Unidad de medida</label>
            <select class="form-select" name="unidad_medida_id" required>
              <option value="">Seleccione unidad de medida</option>
              @foreach ($unidadMedidas as $umedida)
                <option value="{{ $umedida->id }}">{{ $umedida->nombre }} ({{ $umedida->abreviatura }})</option>
              @endforeach
            </select>
          </div>

        <div class="col-md-4">
          <label class="form-label">Pasillo</label>
          <input type="number" class="form-control" name="pasillo" value="0">
        </div>

        <div class="col-md-4">
          <label class="form-label">Código CMARKE</label>
          <input type="text" class="form-control" name="cod_cmarke">
        </div>

        <div class="col-md-4">
          <label class="form-label">Venta por mayor (cantidad)</label>
          <input type="number" class="form-control" name="venta_por_mayor" value="1">
        </div>

        <div class="col-md-4">
          <label class="form-label">Tipo envase</label>
          <input type="text" class="form-control" name="tipo_envase">
        </div>

        <div class="col-md-4">
          <label class="form-label">Peso drenado</label>
          <input type="number" class="form-control" step="0.01" name="peso_drenado">
        </div>

        <div class="col-md-4">
          <label class="form-label">Factor (PPUM)</label>
          <input type="number" class="form-control" step="0.01" name="factor">
        </div>

        <div class="col-md-4">
          <label class="form-label">Impuesto adicional</label>
          <input type="text" class="form-control" name="impuesto_adicional">
        </div>

        <div class="col-md-4">
          <label class="form-label">Margen 2</label>
          <input type="number" class="form-control" name="margen2">
        </div>

        <div class="col-md-4">
          <label class="form-label">Margen 3</label>
          <input type="number" class="form-control" name="margen3">
        </div>

        <div class="col-md-4">
          <label class="form-label">Depto</label>
          <input type="text" class="form-control" name="depto">
        </div>

        <div class="col-md-4">
          <label class="form-label">Grupo</label>
          <input type="text" class="form-control" name="grupo">
        </div>

        <div class="col-md-4">
          <label class="form-label">Subfamilia (cod_items)</label>
          <input type="text" class="form-control" name="subfamilia">
        </div>

        <div class="col-md-4">
          <label class="form-label">Avance de temporada</label>
          <input type="text" class="form-control" name="avance_temporada">
        </div>

        <div class="col-md-4 form-check form-switch mt-4">
          <input class="form-check-input" type="checkbox" id="enviarACaja" name="enviar_a_caja">
          <label class="form-check-label" for="enviarACaja">Enviar a caja registradora</label>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Buscar</button>
      </div>


 


    </form>
  </div>
</div>
