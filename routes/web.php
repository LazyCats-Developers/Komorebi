<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@login');

Route::get('/main' , 'PagesController@main');

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
