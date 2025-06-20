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
      <dt class="col-sm-3">Código</dt>
      <dd class="col-sm-9">{{ $producto->codigo }}</dd>

      <dt class="col-sm-3">Descripción</dt>
      <dd class="col-sm-9">{{ $producto->descripcion }}</dd>

      <dt class="col-sm-3">Precio de costo</dt>
      <dd class="col-sm-9">${{ number_format($producto->costo, 2) }}</dd>

      <dt class="col-sm-3">Margen (%)</dt>
      <dd class="col-sm-9">{{ $producto->margen }}%</dd>

      <dt class="col-sm-3">Precio de venta</dt>
      <dd class="col-sm-9">${{ number_format($producto->precio_venta, 2) }}</dd>

      <dt class="col-sm-3">Unidades por caja</dt>
      <dd class="col-sm-9">{{ $producto->udxcaja }}</dd>

      <dt class="col-sm-3">Unidad de medida</dt>
      <dd class="col-sm-9">{{ optional($producto->unidadMedida)->nombre }}</dd>

      <dt class="col-sm-3">Marca</dt>
      <dd class="col-sm-9">{{ optional($producto->marca)->nombre }}</dd>

      <dt class="col-sm-3">Pasillo</dt>
      <dd class="col-sm-9">{{ $producto->pasillo }}</dd>

      <dt class="col-sm-3">Tipo envase</dt>
      <dd class="col-sm-9">{{ $producto->tipo_envase }}</dd>

      <dt class="col-sm-3">Peso drenado</dt>
      <dd class="col-sm-9">{{ $producto->peso_drenado }} kg</dd>

      <dt class="col-sm-3">Depto</dt>
      <dd class="col-sm-9">{{ $producto->depto }}</dd>

      <dt class="col-sm-3">Grupo</dt>
      <dd class="col-sm-9">{{ $producto->grupo }}</dd>

      <dt class="col-sm-3">Subfamilia</dt>
      <dd class="col-sm-9">{{ $producto->subfamilia }}</dd>

      <dt class="col-sm-3">Avance de temporada</dt>
      <dd class="col-sm-9">{{ $producto->avance_temporada }}</dd>

      <dt class="col-sm-3">Margen 2</dt>
      <dd class="col-sm-9">{{ $producto->margen2 }}%</dd>

      <dt class="col-sm-3">Margen 3</dt>
      <dd class="col-sm-9">{{ $producto->margen3 }}%</dd>

      <dt class="col-sm-3">Venta por mayor</dt>
      <dd class="col-sm-9">{{ $producto->venta_por_mayor ? 'Sí' : 'No' }}</dd>

      <dt class="col-sm-3">Código CMarke</dt>
      <dd class="col-sm-9">{{ $producto->cod_cmarke }}</dd>

      <dt class="col-sm-3">Impuesto adicional</dt>
      <dd class="col-sm-9">{{ $producto->impuesto_adicional }}</dd>

      <dt class="col-sm-3">Factor (PPUM)</dt>
      <dd class="col-sm-9">{{ $producto->factor }}</dd>

      <dt class="col-sm-3">Enviar a caja</dt>
      <dd class="col-sm-9">{{ $producto->enviar_a_caja ? 'Sí' : 'No' }}</dd>
    </dl>

    <div class="mt-4">
      <a href="{{ route('producto.index') }}" class="btn btn-outline-secondary">← Volver al listado</a>
      <a href="{{ route('producto.edit', $producto) }}" class="btn btn-primary">Editar</a>
    </div>
  </div>
</div>
@endsection
