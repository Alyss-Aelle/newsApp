<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\NewsStandardController;

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
    

/* Route du formulaire d'edition */
    Route::get('admin/news/edit/{id}',[AdminNewsController::class,'formEdit'])->name('news.edit');
    Route::post('admin/news/edit/{id}',[AdminNewsController::class,'edit'])->name('news.edit'); //receptionne informationsedit

/* Route du formulaire d'affichage de news */ 
    Route::get('admin/news/list',[AdminNewsController::class,'index'])->name('news.list');

/* Route du formulaire de suppression*/ 
    Route::get('admin/news/del/{id}',[AdminNewsController::class,'delete'])->name('news.del');





/************** Affichage des news pour le client */
/* Route de News non sécurisée */ 
    Route::get('/news',[NewsController::class,'indexNews']);

/* Route de News non sécurisée */ 
    Route::get('/info/{id}',[NewsController::class,'newsInfo'])->name('news.info');



/* Route de News non sécurisée correction */ 
    Route::get('/newsstandard',[NewsStandardController::class,'index'])->name('news.standard');
/* Route de News non sécurisée correction */ 
    Route::get('/newsstandard/{actu}',[NewsStandardController::class,'detail'])->name('news.standard.detail');

/************** Fin affichage des news pour le client */




    
});
require __DIR__.'/auth.php';
