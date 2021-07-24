<?php

namespace App\Http\Controllers;

use App\Models\Producto;
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

        return view("pages.inventories.index", [
            "productos" => $productos
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
