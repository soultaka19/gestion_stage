<?php

use App\Http\Controllers\FiliereController;
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
Route::Controller(FiliereController::class)->group(function(){

    Route::get('/','index');
    Route::get('/filiere/create','create');
    Route::get('/filiere/{id}','show');
    Route::get('/filiere/{id}','edit');

    Route::post('/filiere','store');
    Route::patch('/filiere/{id}','update');
    Route::delete('/filiere/{id}','destroy');

});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
