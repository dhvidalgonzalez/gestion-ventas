<?php

namespace App\Services;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Color;
use App\Models\Talla;
use App\Models\Usuario;
use App\Models\PPUM;
use App\Models\GrupoDepartamento;
use App\Models\Impuesto;
use App\Models\PrecioProducto;
use App\Models\CantidadPorMayor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductoService
{
    public function crearProducto(array $data, string $usuarioNombre): Producto
    {
        return DB::transaction(function () use ($data, $usuarioNombre) {

            // Validaciones iniciales
            if (empty($data['codigo'])) {
                throw new \Exception("Debe ingresar el código del producto");
            }

            if (Producto::where('codigo', $data['codigo'])->exists()) {
                throw new \Exception("Ya existe este código, no se puede ingresar nuevamente");
            }

            // Redondeo del precio y cálculo de margen
            $costoNeto = round($data['costo'] * 1.19);
            $margen = 1 + ($data['margen'] / 100);
            $precioVenta = round($costoNeto * $margen);

            // Registro de marca si no existe
            $marca = Marca::firstOrCreate(['nombre' => $data['marca']]);

            // Registro de color si no existe
            if (!empty($data['color'])) {
                Color::firstOrCreate(['nombre' => $data['color']]);
            }

            // Registro de talla si no existe
            if (!empty($data['talla'])) {
                Talla::firstOrCreate(['talla' => $data['talla']]);
            }

            // Validación de usuario
            /*$usuario = Usuario::where('nombre', $usuarioNombre)->first();
            if (!$usuario || $usuario->ficha_art === 'N') {
                throw new \Exception("El usuario no está autorizado para hacer cambios");
            }*/

            // Validaciones por defecto
            $data['venta_por_mayor'] ??= 1;
            $data['iva'] ??= 19;
            $data['umed'] ??= 'UNID';
            $data['pasillo'] ??= 0;
            $data['fecha'] ??= now()->toDateString();
            $data['descripcion'] = Str::upper($data['descripcion']);

            // Validar descripción repetida
            if (Producto::where('descripcion', $data['descripcion'])->exists()) {
                throw new \Exception("Existe esta descripción en el sistema");
            }

            // Crear producto principal
            $producto = Producto::create([
                'codigo'       => $data['codigo'],
                'descripcion'  => $data['descripcion'],
                'umed'         => $data['umed'],
                'marca_id'     => $marca->id,
                'pasillo'      => $data['pasillo'],
                'fecha'        => $data['fecha'],
                'udxcaja'      => $data['udxcaja'],
                'cod_cmarke'   => $data['cod_cmarke'] ?? null,
            ]);

            // Grupo departamento
            if (!empty($data['depto']) && !empty($data['grupo']) && !empty($data['subfamilia'])) {
                GrupoDepartamento::create([
                    'producto_id' => $producto->id,
                    'depto'       => $data['depto'],
                    'grupo'       => $data['grupo'],
                    'cod_items'   => $data['subfamilia'],
                    'avance_temporada' => $data['avance_temporada'] ?? null,
                ]);
            }

            // Insertar margen por local
            $producto->precios()->create([
                'precio_costo'  => $data['costo'],
                'precio_venta'  => $precioVenta,
                'margen1'       => $data['margen'],
                'margen2'       => $data['margen2'] ?? 0,
                'margen3'       => $data['margen3'] ?? 0,
                'usuario'       => $usuarioNombre,
            ]);

            // Insertar en PPUM si corresponde
            if ($data['ppum'] ?? false) {
                PPUM::create([
                    'producto_id'         => $producto->id,
                    'factor_multiplicador' => $data['factor'] ?? 1,
                    'tipo_envase'         => $data['tipo_envase'] ?? '',
                    'peso_drenado'        => $data['peso_drenado'] ?? 0,
                ]);
            }

            // Cantidad por mayor
            if ($data['venta_por_mayor'] > 1) {
                CantidadPorMayor::create([
                    'producto_id'  => $producto->id,
                    'cantidad'     => $data['venta_por_mayor'],
                ]);
            }

            // Impuesto adicional
            if (!empty($data['impuesto_adicional'])) {
                Impuesto::create([
                    'producto_id' => $producto->id,
                    'codigo'      => $data['impuesto_adicional'],
                ]);
            }

            // Marcar para caja registradora
            if ($data['enviar_a_caja'] ?? false) {
                // lógica especial según tu sistema, como generar código UX60 o insertar en una tabla externa
            }

            return $producto;
        });
    }
}
