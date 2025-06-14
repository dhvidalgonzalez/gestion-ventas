<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index', compact('productos'));
    }

    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Producto::create($request->all());

        return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        return view('producto.edit', compact('producto'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $producto->update($request->all());

        return redirect()->route('producto.index')->with('success', 'Producto actualizado.');
    }


    public function DeleteConfirm(Producto $producto)
{
    return view('producto.delete', compact('producto'));
}

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('producto.index')->with('success', 'Producto eliminado.');
    }
}
