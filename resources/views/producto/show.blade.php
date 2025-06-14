{{-- resources/views/producto/show.blade.php --}}
@extends('base.base')

@section('title', 'Detalle del producto')

@section('content')
<div class="card shadow-none border my-5">
  <div class="card-header p-4 border-bottom bg-body">
    <h4 class="text-body mb-0">Detalle del producto</h4>
  </div>

  <div class="card-body p-4">
    <dl class="row">
      <dt class="col-sm-3">Nombre</dt>
      <dd class="col-sm-9">{{ $producto->nombre }}</dd>

      <dt class="col-sm-3">Precio</dt>
      <dd class="col-sm-9">${{ number_format($producto->precio, 2) }}</dd>

      <dt class="col-sm-3">Stock disponible</dt>
      <dd class="col-sm-9">{{ $producto->stock }}</dd>
    </dl>

    <div class="mt-4">
      <a href="{{ route('producto.index') }}" class="btn btn-outline-secondary">← Volver al listado</a>
      <a href="{{ route('producto.edit', $producto) }}" class="btn btn-primary">Editar</a>
    </div>
  </div>
</div>
@endsection
