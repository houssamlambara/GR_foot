<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

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

// MENU

Route::get('/index', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/activiter', [PageController::class, 'activiter']);
Route::get('/addterrain', [PageController::class, 'addterrain']);
Route::get('/addtounois', [PageController::class, 'addtounois']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/dashboard', [PageController::class, 'dashboard']);
Route::get('/dashboardReservation', [PageController::class, 'dashboardReservation']);
Route::get('/reservation', [PageController::class, 'reservation']);
Route::get('/signin', [PageController::class, 'signin']);
Route::get('/tournois', [PageController::class, 'tournois']);
Route::get('/utilisateur', [PageController::class, 'utilisateur']);
