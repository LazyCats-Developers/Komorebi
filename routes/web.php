<?php

use App\Http\Controllers\ColaboradoresController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\TipoProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProveedoresController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')
    ->group(function () {
        Route::get('/', [PagesController::class, 'login'])->name('login');
        Route::get('/signup', [RegisteredUserController::class, 'create'])->name('signup');
        Route::post('/signup', [RegisteredUserController::class, 'store']);
    });

Route::middleware('auth')
    ->group(function () {
        Route::get('/main', [PagesController::class, 'main']);
        Route::get('/ups', [PagesController::class, 'ups']);
        Route::get('/sales', [PagesController::class, 'sales']);
        Route::get('/newsales', [PagesController::class, 'newsales']);
        Route::get('/shopping', [PagesController::class, 'shopping']);
        Route::get('/newshop', [PagesController::class, 'newshop']);
        Route::get('/inventory', [PagesController::class, 'inventory'])->name('inventory.index');
        Route::get('/provider', [PagesController::class, 'provider'])->name('provider.index');
        Route::get('/cashflow', [PagesController::class, 'cashflow']);
        Route::get('/modules', [PagesController::class, 'modules']);

        Route::get('/profile', [PagesController::class, 'profile'])->name('profile');
        Route::post('/profile/update', [UsuariosController::class, 'update'])->name('profile.update');
        Route::post('/profile/change-avatar', [UsuariosController::class, 'update_avatar'])->name('profile.change-avatar');
    });

require __DIR__ . '/auth.php';

Route::get('main', [PagesController::class, 'main'])->name('main');

Route::resource("empresas", EmpresasController::class)->parameters(["empresas" => "empresa"]);
Route::resource("productos", ProductosController::class)->parameters(["productos" => "producto"]);
Route::resource("tipoproductos", TipoProductosController::class)->parameters(["tipoproductos" => "tipoproducto"]);
Route::resource('empresas.colaboradores', ColaboradoresController::class)->parameters(['colaboradores' => 'colaborador']);
Route::resource('proveedores', ProveedoresController::class)->parameters(['proveedores' => 'proveedor']);
