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
      <li class="list-group-item"><strong>Código:</strong> {{ $producto->codigo }}</li>
      <li class="list-group-item"><strong>Descripción:</strong> {{ $producto->descripcion }}</li>
      <li class="list-group-item"><strong>Precio de costo:</strong> ${{ number_format($producto->costo, 2) }}</li>
      <li class="list-group-item"><strong>Margen:</strong> {{ $producto->margen }}%</li>
      <li class="list-group-item"><strong>Precio de venta:</strong> ${{ number_format($producto->precio_venta, 2) }}</li>
      <li class="list-group-item"><strong>Unidades por caja:</strong> {{ $producto->udxcaja }}</li>
      <li class="list-group-item"><strong>Unidad de medida:</strong> {{ optional($producto->unidadMedida)->nombre }}</li>
      <li class="list-group-item"><strong>Marca:</strong> {{ optional($producto->marca)->nombre }}</li>
      <li class="list-group-item"><strong>Pasillo:</strong> {{ $producto->pasillo }}</li>
      <li class="list-group-item"><strong>Tipo envase:</strong> {{ $producto->tipo_envase }}</li>
      <li class="list-group-item"><strong>Peso drenado:</strong> {{ $producto->peso_drenado }}</li>
      <li class="list-group-item"><strong>Depto:</strong> {{ $producto->depto }}</li>
      <li class="list-group-item"><strong>Grupo:</strong> {{ $producto->grupo }}</li>
      <li class="list-group-item"><strong>Subfamilia:</strong> {{ $producto->subfamilia }}</li>
      <li class="list-group-item"><strong>Avance de temporada:</strong> {{ $producto->avance_temporada }}</li>
      <li class="list-group-item"><strong>Margen 2:</strong> {{ $producto->margen2 }}%</li>
      <li class="list-group-item"><strong>Margen 3:</strong> {{ $producto->margen3 }}%</li>
      <li class="list-group-item"><strong>Venta por mayor:</strong> {{ $producto->venta_por_mayor ? 'Sí' : 'No' }}</li>
      <li class="list-group-item"><strong>Código CMarke:</strong> {{ $producto->cod_cmarke }}</li>
      <li class="list-group-item"><strong>Impuesto adicional:</strong> {{ $producto->impuesto_adicional }}</li>
      <li class="list-group-item"><strong>Factor (PPUM):</strong> {{ $producto->factor }}</li>
      <li class="list-group-item"><strong>Enviar a caja:</strong> {{ $producto->enviar_a_caja ? 'Sí' : 'No' }}</li>
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
