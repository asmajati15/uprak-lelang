<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LotController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [LotController::class, 'index'])->name('lot.dashboard');
    Route::get('/dashboard/{$id}', [LotController::class, 'show'])->name('dashboard.show');
    // Route::resource('dashboard', LotController::class);
});
