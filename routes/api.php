<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\PhotoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('commandes/list', [commandeController::class, 'list'])->name('commandes-list');
Route::post('commandes/commande/add', [commandeController::class, 'add'])->name('commande-add');
Route::post('commandes/commande/update/{id}', [commandeController::class, 'update'])->name('commande-update');
Route::post('commandes/commande/delete/{id}', [commandeController::class, 'delete'])->name('commande-delete');

Route::get('commandes/calculateTotal/{quantity}/{price}', [commandeController::class, 'calculateTotal'])->name('calculateTotal');


Route::get('services/list', [serviceController::class, 'list'])->name('services-list');
Route::post('services/service/add', [serviceController::class, 'add'])->name('service-add');
Route::post('services/service/update/{id}', [serviceController::class, 'update'])->name('service-update');
Route::post('services/service/delete/{id}', [serviceController::class, 'delete'])->name('service-delete');



Route::post('/upload', [PhotoController::class, 'upload'])->name('upload');