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

//Back
Route::get('/admin/dashboard', [AllController::class, 'admin'])->middleware(['auth'])->name('dashboard');
    //gallerie 
Route::get('/admin/gallerie', [ImageController::class, 'gallerie'])->middleware(['auth'])->name('gallerie.index');
Route::get('/admin/{image}/download', [ImageController::class, 'download'])->middleware(['auth'])->name('gallerie.download');
    //avatar
Route::resource('/admin/avatar', AvatarController::class)->middleware(['auth', 'isAdmin']);
    //image
Route::resource('/admin/image', ImageController::class)->middleware(['auth', 'isAdmin']);
    //categorie
Route::resource('/admin/categorie', CategorieController::class)->middleware(['auth', 'isAdmin']);
    //user
Route::resource('/admin/user', UserController::class)->middleware(['auth', 'isAdmin']);
Route::put('admin/user/{user}/edit', [UserController::class, 'updateMembre'])->middleware(['auth'])->name('membre.update');

require __DIR__.'/auth.php';

