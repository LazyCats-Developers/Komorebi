<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Venta;
use App\Models\Unidad;
use App\Repositories\ProductosRepository;


use Illuminate\Http\Request;
use PhpParser\ErrorHandler\Collecting;

class PagesController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }

    public function main()
    {
        return view('pages.index');
    }

    public function ups()
    {
        return view('pages.ups');
    }

    public function sales(ProductosRepository $productos)
    {   
        $empresa = auth()->user()->empresas()->firstOrFail();
        $productos = $productos->getProductsVenta();
        $ventas=Venta::query()
            ->where('documento_id',1)
            ->where('numero_documento','LIKE',"{$empresa->id}-00%")
            ->get();
            foreach($ventas as $venta){
                $st=explode('-', $venta['numero_documento']);
                $venta['n_documento']=$st[2];
            }
        foreach ($productos as $producto) {

            $inventario = Inventario::query()
                ->where('producto_id', $producto->id)
                ->first('cantidad');
            $unidad = Unidad::query()
                ->where('id', $producto->unidad_id)
                ->first('nombre');

            $producto['cantidad'] = $inventario['cantidad'];
            $producto['unidad'] = $unidad['nombre'];
        }

        return view('pages.sales', [
            "productos" => $productos,
            "ventas" => $ventas
        ]);
    }

    public function newsales()
    {
        return view('pages.newsales');
    }

    public function shop(ProductosRepository $productos)
    {
        $empresa = auth()->user()->empresas()->firstOrFail();
        $productos = $productos->getProductsInsumo();
        $compras=Venta::query()
            ->where('documento_id',2)
            ->where('numero_documento','LIKE',"{$empresa->id}-00%")
            ->get();
            foreach($compras as $compra){
                $st=explode('-', $compra['numero_documento']);
                $compra['n_documento']=$st[2];
            }
        foreach ($productos as $producto) {

            $inventario = Inventario::query()
                ->where('producto_id', $producto->id)
                ->first('cantidad');

                $unidad = Unidad::query()
                    ->where('id', $producto->unidad_id)
                    ->first('nombre');

                $producto['cantidad'] = $inventario['cantidad'];
                $producto['unidad'] = $unidad['nombre'];
            }

            return view('pages.shop.index', [
                "productos" => $productos,
                "compras" => $compras
            ]);
    }

    public function newshop()
    {
        return view('pages.shop.newshop');

    }

    public function inventory(ProductosRepository $productos)
    {

        $productos = $productos->getProducts();

        foreach ($productos as $producto){
            $inventario = Inventario::query()
            ->where('producto_id', $producto->id)
                ->first('cantidad');

            $unidad = Unidad::query()
            ->where('id', $producto->unidad_id)
                ->first('nombre');

            $producto ['cantidad'] = $inventario['cantidad'];
            $producto ['unidad'] = $unidad['nombre'];
        };

        return view("pages.inventories.index", [
            "productos" => $productos,
        ]);
    }


    public function cashflow()
    {
        return view('pages.cashflow');
    }

    public function modules()
    {
        return view('pages.modules');
    }
}
