<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Unidad;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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

    public function sales()
    {
        return view('pages.sales');
    }

    public function newsales()
    {
        return view('pages.newsales');
    }

    public function shopping()
    {
        return view('pages.shopping');
    }

    public function newshop()
    {
        return view('pages.newshop');

    }

    public function inventory()
    {
        $usuario = auth()->user();
        $empresa = $usuario->empresas()->first();
        $productos = Producto::query()->whereHas('inventarios', fn($query) => $query->where('empresa_id', $empresa->id))->get();

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

    public function provider()
    {
        $usuario = auth()->user();
        $empresa = $usuario->empresas()->first();
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
