<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Color;
use App\Models\Talla;
use App\Services\ProductoService;

class ProductoController extends Controller
{
    protected $productoService;

    public function __construct(ProductoService $productoService)
    {
        $this->productoService = $productoService;
    }

    public function index()
    {
        $productos = Producto::with('marca')->get();

        // Datos para el formulario modal si se usa en index
        $marcas = Marca::all();
        $colores = Color::all();
        $tallas = Talla::all();

        return view('producto.index', compact('productos', 'marcas', 'colores', 'tallas'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $colores = Color::all();
        $tallas = Talla::all();

        return view('producto.create', compact('marcas', 'colores', 'tallas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string',
            'descripcion' => 'required|string',
            'costo' => 'required|numeric',
            'margen' => 'required|numeric',
            'marca' => 'required|string',
            'udxcaja' => 'required|integer',
        ]);

        try {
            $usuarioNombre = 'admin'; // No autenticación aún
            $this->productoService->crearProducto($request->all(), $usuarioNombre);

            return redirect()->route('producto.index')->with('success', 'Producto creado exitosamente.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function show(Producto $producto)
    {
        return view('producto.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $marcas = Marca::all();
        $colores = Color::all();
        $tallas = Talla::all();

        return view('producto.edit', compact('producto', 'marcas', 'colores', 'tallas'));
    }

    public function update(Request $request, Producto $producto)
    {
        // Por ahora sigue usando lógica simple sin servicio
        $request->validate([
            'descripcion' => 'required|string',
            'umed' => 'required|string',
            'udxcaja' => 'required|integer',
        ]);

        $producto->update($request->only(['descripcion', 'umed', 'udxcaja']));

        return redirect()->route('producto.index')->with('success', 'Producto actualizado.');
    }

    public function deleteConfirm(Producto $producto)
    {
        return view('producto.delete', compact('producto'));
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('producto.index')->with('success', 'Producto eliminado.');
    }
}
