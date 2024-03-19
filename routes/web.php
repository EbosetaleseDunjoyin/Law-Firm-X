<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home');
});

Route::prefix("client")->group(function(){
    Route::get("/list",[ClientController::class,"index"])->name('client.list');
    Route::get("/create",[ClientController::class,"create"])->name('client.create');
    Route::post("/store",[ClientController::class,"store"])->name('client.store');
    Route::get("/{client}",[ClientController::class,"show"])->name('client.show');
    Route::get("/{client}/edit",[ClientController::class,"edit"])->name('client.edit');
    Route::put("/{client}/update",[ClientController::class,"update"])->name('client.update');
    Route::delete("/{client}/delete",[ClientController::class,"destroy"])->name('client.destroy');
});


