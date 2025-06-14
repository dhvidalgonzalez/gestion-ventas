@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-hover align-middle">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @forelse($productos as $producto)
      <tr>
        <th scope="row">{{ $producto->id }}</th>
        <td>{{ $producto->nombre }}</td>
        <td>${{ number_format($producto->precio, 2) }}</td>
        <td>{{ $producto->stock }}</td>
        <td>
          <!-- Ver -->
          <a href="{{ route('producto.show', $producto) }}" class="btn btn-sm btn-outline-primary">Ver</a>

          <!-- Editar -->
          <a href="{{ route('producto.edit', $producto) }}" class="btn btn-sm btn-outline-secondary">Editar</a>

          <!-- Eliminar -->
<a href="{{ route('producto.deleteConfirm', $producto) }}" class="btn btn-sm btn-outline-danger">Eliminar</a>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="5" class="text-center">No hay productos registrados.</td>
      </tr>
    @endforelse
  </tbody>
</table>
