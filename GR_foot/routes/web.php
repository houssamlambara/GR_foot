<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;

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

// Routes principales
Route::get('/index', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/activiter', [PageController::class, 'activiter'])->name('activiter')->middleware('auth');
Route::get('/addterrain', [PageController::class, 'addterrain']);
Route::get('/addtounois', [PageController::class, 'addtounois']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/dashboardReservation', [PageController::class, 'dashboardReservation']);
Route::get('/reservation', [PageController::class, 'reservation'])->middleware("auth");
Route::get('/signin', [PageController::class, 'signin'])->name('signin');
Route::get('/tournois', [PageController::class, 'tournois'])->middleware('auth');
Route::get('/utilisateur', [PageController::class, 'utilisateur']);

// Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Route::get('/login', function () {
//     return view('dashboard');
// })->middleware('auth')->name('dashboard');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
