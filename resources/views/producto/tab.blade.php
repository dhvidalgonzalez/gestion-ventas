<!-- Modal de Tabs -->
<div class="modal fade" id="modalTabs" tabindex="-1" aria-labelledby="modalTabsLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <form class="modal-content" action="{{ route('producto.store') }}" method="POST">
      @csrf

      <div class="modal-header">
        <h5 class="modal-title">Formulario extendido por categorías</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <ul class="nav nav-tabs" id="tabsFormNav" role="tablist">
          <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1">Datos Básicos</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2">Stock y Categoría</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3">Atributos Técnicos</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab4">Logística y Ventas</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab5">Controles Especiales</button></li>
        </ul>

        <div class="tab-content mt-4">
          <!-- Tab 1: Datos Básicos -->
          <div class="tab-pane fade show active" id="tab1">
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Código</label><input type="text" name="codigo" class="form-control" required></div>
              <div class="col-md-6"><label class="form-label">Descripción</label><input type="text" name="descripcion" class="form-control" required></div>
              <div class="col-md-4"><label class="form-label">Marca</label><input type="text" name="marca" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Color</label><input type="text" name="color" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Talla</label><input type="text" name="talla" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Unidad</label><input type="text" name="unidad" class="form-control" value="UNID"></div>
              <div class="col-md-6"><label class="form-label">Grupo</label><input type="text" name="grupo" class="form-control"></div>
            </div>
          </div>

          <!-- Tab 2: Stock y Categoría -->
          <div class="tab-pane fade" id="tab2">
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Stock Inicial</label><input type="number" name="stock" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Stock Mínimo</label><input type="number" name="stock_minimo" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Categoría</label><input type="text" name="categoria" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Subcategoría</label><input type="text" name="subcategoria" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Depto</label><input type="text" name="depto" class="form-control"></div>
              <div class="col-md-8"><label class="form-label">Avance Temporada</label><input type="text" name="avance_temporada" class="form-control"></div>
            </div>
          </div>

          <!-- Tab 3: Atributos Técnicos -->
          <div class="tab-pane fade" id="tab3">
            <div class="row g-3">
              <div class="col-md-4"><label class="form-label">Peso Bruto (kg)</label><input type="number" name="peso_bruto" step="0.01" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Peso Neto</label><input type="number" name="peso_neto" step="0.01" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Peso Drenado</label><input type="number" name="peso_drenado" step="0.01" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Dimensiones</label><input type="text" name="dimensiones" class="form-control" placeholder="Ej: 30x20x15"></div>
              <div class="col-md-6"><label class="form-label">Tipo Envase</label><input type="text" name="tipo_envase" class="form-control"></div>
            </div>
          </div>

          <!-- Tab 4: Logística y Ventas -->
          <div class="tab-pane fade" id="tab4">
            <div class="row g-3">
              <div class="col-md-4"><label class="form-label">Precio Unitario</label><input type="number" step="0.01" name="precio" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Margen (%)</label><input type="number" name="margen" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Margen 2</label><input type="number" name="margen2" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Margen 3</label><input type="number" name="margen3" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Caja (ud)</label><input type="number" name="udxcaja" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Venta Mayor (mínimo)</label><input type="number" name="venta_por_mayor" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Pasillo</label><input type="number" name="pasillo" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Cód. CMarke</label><input type="text" name="cod_cmarke" class="form-control"></div>
            </div>
          </div>

          <!-- Tab 5: Controles Especiales -->
          <div class="tab-pane fade" id="tab5">
            <div class="row g-3">
              <div class="col-md-6"><label class="form-label">Código Interno</label><input type="text" name="codigo_interno" class="form-control"></div>
              <div class="col-md-6"><label class="form-label">Observaciones</label><textarea name="observaciones" class="form-control" rows="3"></textarea></div>
              <div class="col-md-4 form-check form-switch mt-4">
                <input class="form-check-input" type="checkbox" name="enviar_a_caja" id="enviar_a_caja">
                <label class="form-check-label" for="enviar_a_caja">Enviar a caja registradora</label>
              </div>
              <div class="col-md-4"><label class="form-label">Impuesto Adicional</label><input type="text" name="impuesto_adicional" class="form-control"></div>
              <div class="col-md-4"><label class="form-label">Factor (PPUM)</label><input type="number" step="0.01" name="factor" class="form-control"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </form>
  </div>
</div>
