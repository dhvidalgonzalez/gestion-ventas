<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Marca;
use App\Models\Color;
use App\Models\Talla;
use App\Models\UnidadMedida;
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
        $productos = Producto::with(['marca', 'color', 'talla', 'unidadMedida'])->get();

        $marcas = Marca::all();
        $colores = Color::all();
        $tallas = Talla::all();
        $unidadMedidas = UnidadMedida::all();

        return view('producto.index', compact('productos', 'marcas', 'colores', 'tallas', 'unidadMedidas'));
    }

    public function create()
    {
        $marcas = Marca::all();
        $colores = Color::all();
        $tallas = Talla::all();
        $unidadMedidas = UnidadMedida::all();

        return view('producto.create', compact('marcas', 'colores', 'tallas', 'unidadMedidas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo'             => 'required|string|max:50|unique:productos,codigo',
            'descripcion'        => 'required|string|max:255',
            'costo'              => 'required|numeric|min:0',
            'margen'             => 'required|numeric|min:0',
            'udxcaja'            => 'required|integer|min:1',
            'unidad_medida_id'   => 'required|exists:unidad_medidas,id',
            'marca_id'           => 'required|exists:marcas,id',
            'color_id'           => 'nullable|exists:colores,id',
            'talla_id'           => 'nullable|exists:tallas,id',
            'pasillo'            => 'nullable|integer|min:0',
            'venta_por_mayor'    => 'nullable|integer|min:1',
            'tipo_envase'        => 'nullable|string|max:100',
            'peso_drenado'       => 'nullable|numeric|min:0',
            'factor'             => 'nullable|numeric|min:0',
            'margen2'            => 'nullable|numeric|min:0',
            'margen3'            => 'nullable|numeric|min:0',
            'impuesto_adicional' => 'nullable|string|max:20',
            'cod_cmarke'         => 'nullable|string|max:50',
            'depto'              => 'nullable|string|max:50',
            'grupo'              => 'nullable|string|max:50',
            'subfamilia'         => 'nullable|string|max:50',
            'avance_temporada'   => 'nullable|string|max:50',
            'enviar_a_caja'      => 'nullable|boolean',
        ]);

        try {
            $usuarioNombre = 'admin'; // Asume que se usa un usuario fijo por ahora

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
        $unidadMedidas = UnidadMedida::all();

        return view('producto.edit', compact('producto', 'marcas', 'colores', 'tallas', 'unidadMedidas'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'descripcion'      => 'required|string|max:255',
            'umed'             => 'required|string|max:10',
            'udxcaja'          => 'required|integer|min:1',
            'marca_id'         => 'required|exists:marcas,id',
            'color_id'         => 'nullable|exists:colores,id',
            'talla_id'         => 'nullable|exists:tallas,id',
            'unidad_medida_id' => 'required|exists:unidad_medidas,id',
        ]);

        $producto->update([
            'descripcion'       => $request->descripcion,
            'umed'              => $request->umed,
            'udxcaja'           => $request->udxcaja,
            'marca_id'          => $request->marca_id,
            'color_id'          => $request->color_id,
            'talla_id'          => $request->talla_id,
            'unidad_medida_id'  => $request->unidad_medida_id,
        ]);

        return redirect()->route('producto.index')->with('success', 'Producto actualizado correctamente.');
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
