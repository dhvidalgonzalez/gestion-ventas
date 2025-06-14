@extends('base.base')

@section('title', 'Listado de productos')

@section('content')
<div class="card shadow-none border my-5" data-component-card="data-component-card">
  <div class="card-header p-4 border-bottom bg-body">
    <div class="row g-3 justify-content-between align-items-end">
      <div class="col-12 col-md">
        <h4 class="text-body mb-0" data-anchor="data-anchor">Productos</h4>
        <p class="mb-0 mt-2 text-body-secondary">Lista de productos registrados en el sistema.</p>
      </div>
      <div class="col col-md-auto">
        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#crearProductoModal">
          <span class="me-2" data-feather="plus"></span>Agregar producto
        </button>
      </div>
    </div>
  </div>
  <div class="card-body p-4">
    @include('producto.list')
  </div>
</div>

<!-- Modal para crear producto -->
    @include('producto.create')
@endsection
