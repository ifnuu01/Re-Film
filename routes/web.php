<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\ActorController;

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

Route::middleware('auth')->group(function (){
    Route::resource('genre', GenreController::class)->except(['index', 'show']);
    Route::resource('film', FilmController::class)->except(['index', 'show']);
    Route::post('/review/create', [ReviewController::class, 'store'])->name('review.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('cast', CastController::class)->except(['index', 'show']);
    Route::get('/settings', [AuthController::class, 'changePasswordForm'])->name('settings');
    Route::post('/settings', [AuthController::class, 'changePassword']);
    Route::resource('actor', ActorController::class)->except(['index']);
});

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/guide', function () {
    return view('guide');
})->name('guide');

Route::resource('actor', ActorController::class)->only(['index']);
Route::resource('cast', CastController::class)->only(['index', 'show']);
Route::resource('genre', GenreController::class)->only(['index', 'show']);
Route::resource('film', FilmController::class)->only(['index', 'show']);

Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'regisForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});