<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);

    // 検索機能
    Route::get('/index', [App\Http\Controllers\ItemController::class, 'getIndex'])->name('item.index');

    // 編集画面
    Route::get('/edit', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
    Route::post('/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');

    //商品削除
    Route::post('/delete', [App\Http\controllers\ItemController::class, 'delete']);
});
