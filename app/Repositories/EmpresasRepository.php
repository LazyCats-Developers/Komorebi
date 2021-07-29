<?php

namespace App\Repositories;

use App\Models\Empresa;

class EmpresasRepository
{
    //Get the user business
    public function getEmpresa()
    {
        $empresa = auth()->user()->empresas()->firstOrFail();
        return $empresa;
    }
}
