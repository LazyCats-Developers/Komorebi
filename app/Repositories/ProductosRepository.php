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

    public function getProductsInsumo(){
        $empresa = auth()->user()->empresas()->firstOrFail();
        $productos = Producto::query()->whereHas('inventarios', fn($query) => $query->where('empresa_id', $empresa->id)->where('tipo_producto_id',1))->get();

        return $productos;
    }public function getProductsVenta(){
        $empresa = auth()->user()->empresas()->firstOrFail();
        $productos = Producto::query()->whereHas('inventarios', fn($query) => $query->where('empresa_id', $empresa->id)->where('tipo_producto_id',2))->get();

        return $productos;
    }

    //Get a specific product of the user business
    public function getProduct($codigo)
    {   try{
        $producto = Producto::query()->where('codigo', $codigo)->firstOrFail();
        return $producto;
    }catch(\Exception $exception){
        return null;
    }
        
    }
    
}
