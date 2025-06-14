@extends('base.base')

@section('title', 'Editar producto')

@section('content')
<div class="card shadow-none border my-5" data-component-card="data-component-card">
  <div class="card-header p-4 border-bottom bg-body">
    <div class="row g-3 justify-content-between align-items-end">
      <div class="col-12 col-md">
        <h4 class="text-body mb-0" data-anchor="data-anchor">Editar producto</h4>
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
        <label for="nombre" class="form-label">Nombre del producto</label>
        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
               id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
        @error('nombre')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control @error('precio') is-invalid @enderror" 
               id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
        @error('precio')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="stock" class="form-label">Stock disponible</label>
        <input type="number" class="form-control @error('stock') is-invalid @enderror" 
               id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
        @error('stock')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="d-flex justify-content-end gap-2">
        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('producto.index') }}" class="btn btn-outline-secondary">Cancelar</a>
      </div>
    </form>
  </div>
</div>
@endsection
