<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['nombre' => 'Administrador', 'descripcion' => 'ADMIN'],
            ['nombre' => 'Vendedor', 'descripcion' => 'Vendedor'],
        ];

        Rol::query()->insert($roles);
    }
}
