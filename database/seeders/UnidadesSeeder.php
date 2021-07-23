<?php

namespace Database\Seeders;

use App\Models\Unidad;
use Illuminate\Database\Seeder;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = [
            ['nombre' => 'Kilogramo(s)', 'descripcion' => ''],
            ['nombre' => 'Unidad(es)', 'descripcion' => ''],
            ['nombre' => 'Gramo(s)', 'descripcion' => ''],
            ['nombre' => 'Litro(s)', 'descripcion' => ''],
            ['nombre' => 'Mililitro(s)', 'descripcion' => ''],
            ['nombre' => 'Onsa(s)', 'descripcion' => ''],
            ['nombre' => 'Docena(s)', 'descripcion' => ''],
        ];

        Unidad::query()->insert($unidades);
    }
}
