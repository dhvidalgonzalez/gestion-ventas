<?php

namespace App\Services;

use App\Models\Producto;
use App\Models\PrecioProducto;
use App\Models\GrupoDepartamento;
use App\Models\PPUM;
use App\Models\CantidadPorMayor;
use App\Models\Impuesto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductoService
{
    public function crearProducto(array $data, string $usuarioNombre): Producto
    {
        return DB::transaction(function () use ($data, $usuarioNombre) {
            // Validación básica
            if (empty($data['codigo'])) {
                throw new \Exception("Debe ingresar el código del producto");
            }

            if (Producto::where('codigo', $data['codigo'])->exists()) {
                throw new \Exception("Ya existe este código, no se puede ingresar nuevamente");
            }

            $data['descripcion'] = Str::upper($data['descripcion']);

            if (Producto::where('descripcion', $data['descripcion'])->exists()) {
                throw new \Exception("Existe esta descripción en el sistema");
            }

            // Validaciones obligatorias
            if (empty($data['marca_id'])) {
                throw new \Exception("Debe seleccionar una marca válida");
            }

            // Validación opcional de claves foráneas
            $unidadMedidaId = $data['unidad_medida_id'] ?? null;
            $tallaId        = $data['talla_id'] ?? null;
            $colorId        = $data['color_id'] ?? null;

            // Cálculo de precios
            $costoNeto     = round($data['costo'] * 1.19);
            $margen        = 1 + ($data['margen'] / 100);
            $precioVenta   = round($costoNeto * $margen);

            // Crear producto
            $producto = Producto::create([
                'codigo'             => $data['codigo'],
                'descripcion'        => $data['descripcion'],
                'unidad_medida_id'   => $unidadMedidaId,
                'talla_id'           => $tallaId,
                'color_id'           => $colorId,
                'marca_id'           => $data['marca_id'],
                'pasillo'            => $data['pasillo'] ?? 0,
                'fecha_ingreso'      => $data['fecha'] ?? now()->toDateString(),
                'unidades_por_caja'  => $data['udxcaja'],
                'codigo_marketing'   => $data['cod_cmarke'] ?? null,
                'precio_base'        => $data['precio_base'] ?? null,
            ]);

            // Relación grupo/departamento/subfamilia
            if (!empty($data['depto']) && !empty($data['grupo']) && !empty($data['subfamilia'])) {
                GrupoDepartamento::create([
                    'producto_id'        => $producto->id,
                    'depto'              => $data['depto'],
                    'grupo'              => $data['grupo'],
                    'cod_items'          => $data['subfamilia'],
                    'avance_temporada'   => $data['avance_temporada'] ?? null,
                ]);
            }

            // Precios del producto
            $producto->precios()->create([
                'precio_costo'  => $data['costo'],
                'precio_venta'  => $precioVenta,
                'margen1'       => $data['margen'],
                'margen2'       => $data['margen2'] ?? 0,
                'margen3'       => $data['margen3'] ?? 0,
                'usuario'       => $usuarioNombre,
            ]);

            // PPUM
            if (!empty($data['ppum'])) {
                PPUM::create([
                    'producto_id'         => $producto->id,
                    'factor_multiplicador'=> $data['factor'] ?? 1,
                    'tipo_envase'         => $data['tipo_envase'] ?? '',
                    'peso_drenado'        => $data['peso_drenado'] ?? 0,
                ]);
            }

            // Cantidad por mayor
            if (!empty($data['venta_por_mayor']) && $data['venta_por_mayor'] > 1) {
                CantidadPorMayor::create([
                    'producto_id' => $producto->id,
                    'cantidad'    => $data['venta_por_mayor'],
                ]);
            }

            // Impuesto adicional
            if (!empty($data['impuesto_adicional'])) {
                Impuesto::create([
                    'producto_id' => $producto->id,
                    'codigo'      => $data['impuesto_adicional'],
                ]);
            }

            // Enviar a caja registradora (si aplica)
            if (!empty($data['enviar_a_caja'])) {
                // Lógica para caja (no implementada aquí)
            }

            return $producto;
        });
    }
}
