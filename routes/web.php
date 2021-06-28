<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisteredUserController;


/* use App\Http\Controllers
routes yweas get([PagesController::class , 'login']);
*/
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

Route::get('/', 'PagesController@login')
    ->middleware('guest');

Route::get('/signup', 'PagesController@signup')
    ->middleware('guest');

Route::post('/signup', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/main' , 'PagesController@main')->middleware(['auth']);

Route::get('/sales' , 'PagesController@sales')->middleware(['auth']);

//Route::get('/newsales' , 'PagesController@newsales')->middleware(['auth']);

Route::get('/shopping' , 'PagesController@shopping')->middleware(['auth']);

//Route::get('/newshop' , 'PagesController@newshop')->middleware(['auth']);

Route::get('/inventory' , 'PagesController@inventory')->middleware(['auth']);

Route::get('/cashflow' , 'PagesController@cashflow')->middleware(['auth']);

Route::get('/modules' , 'PagesController@modules')->middleware(['auth']);

require __DIR__.'/auth.php';

Route::get('main',['uses' => 'PagesController@main']);

Route::resource("empresas","EmpresasController")->parameters(["empresas"=>"empresa"]);
Route::resource("productos","ProductosController")->parameters(["productos"=>"producto"]);
Route::resource("tipoproductos","TipoProductosController")->parameters(["tipoproductos"=>"tipoproducto"]);