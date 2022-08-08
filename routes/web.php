<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;

// use App\Http\Controllers\MensagemController;
// use App\Models\Mensagem;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');

Route::get('/greeting/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'es', 'fr'])) {
        abort(400);
    }
 
    App::setLocale($locale);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/product', function () {
    return view('product.index');
}, [])->middleware(['auth'])->name('product');

Route::get('/product/index', function () {
    return view('product.index');
}, [])->middleware(['auth'])->name('product.index');

Route::get('/product/create', function () {
    return view('product.create');
}, [])->middleware(['auth'])->name('product.create');

Route::any('/product/store', function () {
    return view('product.store');
}, [])->middleware(['auth'])->name('product.store');

require __DIR__.'/auth.php';
