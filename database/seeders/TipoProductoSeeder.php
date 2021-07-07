<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoProducto;

class TipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo = [
            ['nombre' => 'Insumo', 'descripcion' => 'Insumo usado en la creacion de productos'],
            ['nombre' => 'Producto', 'descripcion' => 'Producto en venta'],
        ];

        TipoProducto::query()->insert($tipo);
    }
}
