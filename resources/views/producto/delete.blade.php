@extends('base.base')

@section('title', 'Eliminar producto')

@section('content')
<div class="card shadow-none border my-5">
  <div class="card-header p-4 border-bottom bg-body">
    <div class="row g-3 justify-content-between align-items-end">
      <div class="col-12 col-md">
        <h4 class="text-danger mb-0">Eliminar producto</h4>
        <p class="mb-0 mt-2 text-body-secondary">¿Estás seguro de que deseas eliminar el siguiente producto?</p>
      </div>
      <div class="col col-md-auto">
        <a href="{{ route('producto.index') }}" class="btn btn-sm btn-outline-secondary">
          ← Volver al listado
        </a>
      </div>
    </div>
  </div>

  <div class="card-body p-4">
    <div class="alert alert-warning">
      Esta acción no se puede deshacer. El producto será eliminado permanentemente del sistema.
    </div>

    <ul class="list-group mb-4">
      <li class="list-group-item"><strong>ID:</strong> {{ $producto->id }}</li>
      <li class="list-group-item"><strong>Nombre:</strong> {{ $producto->nombre }}</li>
      <li class="list-group-item"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</li>
      <li class="list-group-item"><strong>Stock:</strong> {{ $producto->stock }}</li>
    </ul>

    <form action="{{ route('producto.destroy', $producto) }}" method="POST" class="d-flex justify-content-end gap-2">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Eliminar</button>
      <a href="{{ route('producto.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    </form>
  </div>
</div>
@endsection
