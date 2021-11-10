<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'contatos', 'as' => 'contact.'], function () {

        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/novo', [ContactController::class, 'create'])->name('create');
        Route::get('/search', [ContactController::class, 'search'])->name('search');
        Route::post('/', [ContactController::class, 'store'])->name('store');
        Route::get('/{id}', [ContactController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ContactController::class, 'update'])->name('update');
        Route::delete('/{id}', [ContactController::class, 'delete'])->name('delete');
    });
});
