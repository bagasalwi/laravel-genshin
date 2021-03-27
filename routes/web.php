<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::prefix('/genshin')->group(function (){
    Route::get('/', [MainController::class, 'index']);
    Route::get('/characters', [MainController::class, 'characters'])->name('genshin.characters');
    Route::get('/characters/{name}', [MainController::class, 'characters'])->name('genshin.characters.detail');
    Route::get('/artifacts', [MainController::class, 'artifacts'])->name('genshin.artifacts');
});

Route::get('/convert/{type}', [MainController::class, 'convert_file_to_png']);