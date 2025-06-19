@extends('base.base')

@section('title', 'Editar producto')

@section('content')
<div class="card shadow-none border my-5">
  <div class="card-header p-4 border-bottom bg-body">
    <div class="row g-3 justify-content-between align-items-end">
      <div class="col-12 col-md">
        <h4 class="text-body mb-0">Editar producto</h4>
        <p class="mb-0 mt-2 text-body-secondary">Modifica los datos del producto seleccionado.</p>
      </div>
      <div class="col col-md-auto">
        <a href="{{ route('producto.index') }}" class="btn btn-sm btn-outline-secondary">
          ← Volver al listado
        </a>
      </div>
    </div>
  </div>

  <div class="card-body p-4">
    <form action="{{ route('producto.update', $producto) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" class="form-control @error('codigo') is-invalid @enderror"
               id="codigo" name="codigo" value="{{ old('codigo', $producto->codigo) }}" required>
        @error('codigo') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text" class="form-control @error('descripcion') is-invalid @enderror"
               id="descripcion" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}" required>
        @error('descripcion') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="unidad_medida" class="form-label">Unidad de medida</label>
        <input type="text" class="form-control @error('unidad_medida') is-invalid @enderror"
               id="unidad_medida" name="unidad_medida" value="{{ old('unidad_medida', $producto->unidad_medida) }}">
        @error('unidad_medida') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="marca_id" class="form-label">Marca</label>
        <select class="form-select @error('marca_id') is-invalid @enderror" name="marca_id" id="marca_id" required>
          <option value="">Seleccione una marca</option>
          @foreach($marcas as $marca)
            <option value="{{ $marca->id }}" @selected(old('marca_id', $producto->marca_id) == $marca->id)>
              {{ $marca->nombre }}
            </option>
          @endforeach
        </select>
        @error('marca_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="pasillo" class="form-label">Pasillo</label>
        <input type="number" class="form-control @error('pasillo') is-invalid @enderror"
               id="pasillo" name="pasillo" value="{{ old('pasillo', $producto->pasillo) }}">
        @error('pasillo') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
        <input type="date" class="form-control @error('fecha_ingreso') is-invalid @enderror"
               id="fecha_ingreso" name="fecha_ingreso" value="{{ old('fecha_ingreso', $producto->fecha_ingreso) }}">
        @error('fecha_ingreso') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="unidades_por_caja" class="form-label">Unidades por caja</label>
        <input type="number" class="form-control @error('unidades_por_caja') is-invalid @enderror"
               id="unidades_por_caja" name="unidades_por_caja" value="{{ old('unidades_por_caja', $producto->unidades_por_caja) }}">
        @error('unidades_por_caja') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="codigo_marketing" class="form-label">Código marketing</label>
        <input type="text" class="form-control @error('codigo_marketing') is-invalid @enderror"
               id="codigo_marketing" name="codigo_marketing" value="{{ old('codigo_marketing', $producto->codigo_marketing) }}">
        @error('codigo_marketing') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="mb-3">
        <label for="precio_base" class="form-label">Precio base</label>
        <input type="number" step="0.01" class="form-control @error('precio_base') is-invalid @enderror"
               id="precio_base" name="precio_base" value="{{ old('precio_base', $producto->precio_base) }}">
        @error('precio_base') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="d-flex justify-content-end gap-2">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('producto.index') }}" class="btn btn-outline-secondary">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@endsection
