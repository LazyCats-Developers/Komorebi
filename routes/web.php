<?php

use App\Http\Controllers\ColaboradoresController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\TipoProductosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\TransaccionesController;
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
        Route::get('/main', [PagesController::class, 'main'])->name('main');
        Route::get('/ups', [PagesController::class, 'ups']);
        //route de sales y newsales, no borrar pls
        Route::get('/sales', [PagesController::class, 'sales'])->name('sales');
        Route::get('/newsales', [PagesController::class, 'newsales'])->name('newsales');
        Route::get('/searchsales', [VentasController::class, 'search'])->name('ventas.search');
        Route::get('/killsales', [VentasController::class, 'kill'])->name('ventas.kill');
        Route::post('/addsales', [VentasController::class, 'add'])->name('ventas.add');
        Route::post('/delsales', [VentasController::class, 'del'])->name('ventas.del');
        Route::post('/createsales', [VentasController::class, 'create'])->name('ventas.create');
        //termina los route de sales y newsales, no borrar pls
        Route::get('/newshop', [PagesController::class, 'newshop']);
        Route::get('/inventory', [PagesController::class, 'inventory'])->name('inventory.index');
        
        Route::get('/cashflow', [PagesController::class, 'cashflow']);
        Route::get('/modules', [PagesController::class, 'modules']);

        Route::group(['prefix' => 'provider'],function () {
            Route::get('/', [ProveedoresController::class, 'index'])->name('provider.index');
            Route::get('/create', [ProveedoresController::class, 'create'])->name('provider.create');
            Route::post('/edit', [ProveedoresController::class, 'edit'])->name('provider.edit');
        });

        Route::group(['prefix' => 'profile'],function () {
            Route::get('/', [UsuariosController::class, 'index'])->name('profile');
            Route::post('/update', [UsuariosController::class, 'update'])->name('profile.update');
            Route::post('/change-avatar', [UsuariosController::class, 'update_avatar'])->name('profile.change-avatar');
        });

        Route::group(['prefix' => 'shop'],function () {
            Route::get('/', [PagesController::class, 'shop'])->name('shop');
            Route::get('/newshop', [PagesController::class, 'newshop'])->name('newshop');
            Route::get('/searchshop', [TransaccionesController::class, 'search'])->name('transacciones.search');
            Route::get('/killshop', [TransaccionesController::class, 'kill'])->name('transacciones.kill');
            Route::post('/addshop', [TransaccionesController::class, 'add'])->name('transacciones.add');
            Route::post('/delshop', [TransaccionesController::class, 'del'])->name('transacciones.del');
        });

    });

require __DIR__ . '/auth.php';

Route::resource("empresas", EmpresasController::class)->parameters(["empresas" => "empresa"]);
Route::resource("productos", ProductosController::class)->parameters(["productos" => "producto"]);
Route::resource("tipoproductos", TipoProductosController::class)->parameters(["tipoproductos" => "tipoproducto"]);
Route::resource('empresas.colaboradores', ColaboradoresController::class)->parameters(['colaboradores' => 'colaborador']);
Route::resource('proveedores', ProveedoresController::class)->parameters(['proveedores' => 'proveedor']);
Route::resource('transacciones', TransaccionesController::class)->parameters(['transacciones' => 'transaccion']);
Route::resource('ventas', VentasController::class)->parameters(['ventas' => 'venta']);
