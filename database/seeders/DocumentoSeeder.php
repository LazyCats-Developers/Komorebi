<?php

namespace Database\Seeders;
use App\Models\Documento;
use Illuminate\Database\Seeder;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentos = [
            ['nombre' => 'Boleta'],
            ['nombre' => 'Factura'],
           
        ];

        Documento::query()->insert($documentos);
    }
}
