<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminNewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/secure', function () {
    return view('secure');
})->middleware(['auth']); //securisé route

Route::get('/notsecure', function () {
    return view('notsecure');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* Route securisée pour la gestion des News */

    Route::middleware(['auth'])->group(function () {

/* Route du formulaire d'ajout */

    Route::get('admin/news/add',[AdminNewsController::class,'formAdd'])->name('news.add');
    Route::post('admin/news/add',[AdminNewsController::class,'add'])->name('news.add'); //receptionne informations
    

/* Route du formulaire d'affichage de news */ 

    Route::get('admin/news/list',[AdminNewsController::class,'index'])->name('news.list');




    
});
require __DIR__.'/auth.php';
