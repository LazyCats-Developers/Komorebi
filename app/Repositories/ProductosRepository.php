<?php

namespace App\Repositories;

use App\Models\Producto;
use Faker\Core\Number;

class ProductosRepository
{
    //Get all products of the user business
    public function getProducts()
    {
        $empresa = auth()->user()->empresas()->firstOrFail();
        $productos = Producto::query()->whereHas('inventarios', fn($query) => $query->where('empresa_id', $empresa->id))->get();

        return $productos;
    }

    //Get a specific product of the user business
    public function getProduct(Number $id)
    {
        $producto = Producto::query()->where('id', $id)->firstOrFail();

        return $producto;
    }
}
