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

Route::get('/test', function () {
    return view('index');
});

*/
Route::get('/', [App\Http\Controllers\IndexController::class, 'ShowIndex'])->name('index');
Route::get('/home', [App\Http\Controllers\ArticleController::class, 'index'])->name('home');
Auth::routes();
Route::resource('article', 'App\Http\Controllers\ArticleController');
Route::get('storage/{filename}', function($filename){
    $path = storage_path('app/uploads/' . $filename);
    $file = File::get($path);

    $response = Response::make($file,200);
    return $response;
});