@if ($errors->any())
<div class="alert alert-danger">
  <ul class="mb-0">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

<table class="table table-hover align-middle">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Código</th>
      <th scope="col">Descripción</th>
      <th scope="col">Marca</th>
      <th scope="col">U. Medida</th>
      <th scope="col">U. x Caja</th>
      <th scope="col">Creado</th> <!-- Nueva columna -->
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @forelse($productos as $producto)
    <tr>
      <th scope="row">{{ $producto->id }}</th>
      <td>{{ $producto->codigo }}</td>
      <td>{{ $producto->descripcion }}</td>
      <td>{{ $producto->marca->nombre ?? '-' }}</td>
      <td>{{ $producto->umed }}</td>
      <td>{{ $producto->udxcaja }}</td>
      <td>{{ $producto->created_at ? $producto->created_at->format('d/m/Y H:i') : '-' }}</td> <!-- Fecha formateada -->
      <td>
        <a href="{{ route('producto.show', $producto) }}" class="btn btn-sm btn-outline-primary">Ver</a>
        <a href="{{ route('producto.edit', $producto) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
        <a href="{{ route('producto.deleteConfirm', $producto) }}" class="btn btn-sm btn-outline-danger">Eliminar</a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="8" class="text-center">No hay productos registrados.</td>
    </tr>
    @endforelse
  </tbody>
</table>
