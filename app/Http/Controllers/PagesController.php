<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Unidad;
use App\Repositories\EmpresasRepository;
use App\Repositories\ProductosRepository;
use Illuminate\Support\Facades\Auth;

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

    public function profile()
    {
        return view('pages.profile', array('user' => Auth::user()));
    }

    public function sales(ProductosRepository $productos)
    {
        $productos = $productos->getProductsVenta();
        ;
        foreach ($productos as $producto) {

            $inventario = Inventario::query()
                ->where('producto_id', $producto->id)
                ->first();
/*
            //si, cambiar esta wea, son las 7AM y mi mente esta hecha paté, chupenlo
            if ($inventario->tipo_producto_id == 1 || $inventario->tipo_producto_id == 3) {*/
                $unidad = Unidad::query()
                    ->where('id', $producto->unidad_id)
                    ->first('nombre');

                $producto['cantidad'] = $inventario['cantidad'];
                $producto['unidad'] = $unidad['nombre'];
                /*array_push($insumo,$producto);*/
            } 
        


            return view('pages.sales', [
                "productos" => $productos,
            ]);
    }

    public function newsales()
    {
        return view('pages.newsales');
    }

    public function shopping(ProductosRepository $productos)
    {
        $productos = $productos->getProductsInsumo();
        ;
        foreach ($productos as $producto) {

            $inventario = Inventario::query()
                ->where('producto_id', $producto->id)
                ->first();
/*
            //si, cambiar esta wea, son las 7AM y mi mente esta hecha paté, chupenlo
            if ($inventario->tipo_producto_id == 1 || $inventario->tipo_producto_id == 3) {*/
                $unidad = Unidad::query()
                    ->where('id', $producto->unidad_id)
                    ->first('nombre');

                $producto['cantidad'] = $inventario['cantidad'];
                $producto['unidad'] = $unidad['nombre'];
                /*array_push($insumo,$producto);*/
            } 
        


            return view('pages.shopping', [
                "productos" => $productos,
            ]);
        /*
        $productos = Producto::query()->whereHas('inventarios', fn($query) => $query->where('empresa_id', $empresa->id));
        ;
        foreach ($productos as $producto) {

            $inventario = Inventario::query()
                ->where('producto_id', $producto->id)
                ->first();

            //si, cambiar esta wea, son las 7AM y mi mente esta hecha paté, chupenlo
            if ($inventario->tipo_producto_id == 1 || $inventario->tipo_producto_id == 3) {
                $unidad = Unidad::query()
                    ->where('id', $producto->unidad_id)
                    ->first('nombre');

                $producto['cantidad'] = $inventario['cantidad'];
                $producto['unidad'] = $unidad['nombre'];
                array_push($insumo,$producto);
            } 
        


            return view("pages.shopping", [
                "productos" => $insumo,
            ]);
        }
        */
    }

    public function newshop()
    {
        return view('pages.newshop');

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

    public function provider(EmpresasRepository $empresa)
    {
        $empresa = $empresa->getEmpresa();
        $proveedores = Proveedor::query()->whereHas('transacciones', fn($query) => $query->where('empresa_id', $empresa->id))->get();

        return view("pages.providers.index", [
            "proveedores" => $proveedores
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
