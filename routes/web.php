<?php

use App\Http\Controllers\AllController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\GellerieController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserController;
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

//front
Route::get('/', [AllController::class, 'home']);

Route::middleware('auth')->group(function () {
    
    Route::get('/admin/dashboard', [AllController::class, 'admin'])->name('dashboard');
    //gallerie 
    Route::get('/admin/gallerie', [ImageController::class, 'gallerie'])->name('gallerie.index');
    Route::get('/admin/{image}/download', [ImageController::class, 'download'])->name('gallerie.download');
    //image
    Route::resource('/admin/image', ImageController::class);
    //avatar
    Route::resource('/admin/avatar', AvatarController::class)->middleware('isAdmin');
    //categorie
    Route::resource('/admin/categorie', CategorieController::class)->middleware('isAdmin');
    //user
    Route::resource('/admin/user', UserController::class)->middleware('isAdmin');
    Route::put('admin/user/{user}/edit', [UserController::class, 'updateMembre'])->name('membre.update');
});


//Back





require __DIR__.'/auth.php';

