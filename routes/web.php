<?php

use function Pest\Laravel\get;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WahanaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\kirimEmailController;
use App\Http\Controllers\DokumentasiController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
Route::get('all_dok', [WelcomeController::class, 'all'])->name('all');
Route::get('welcome/{welcome}', [WelcomeController::class, 'show'])->name('welcome.show');
Route::get('all_wahana', [WahanaController::class, 'wahana'])->name('wahana');
Route::post('kirim', [kirimEmailController::class, 'kirim'])->name('kirim');
Route::get('pembeli', [OrderController::class, 'pembeli']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth', 'verified')->name('dashboard');

Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/invoice/{id}', [OrderController::class, 'invoice']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('dokumentasi', DokumentasiController::class);
    Route::resource('struktur', StrukturController::class);
    Route::resource('testi', TestimoniController::class);
    Route::resource('wahana', WahanaController::class);

    Route::put('welcome/{welcome}', [WelcomeController::class, 'update'])->name('welcome.update');
    Route::get('page', [WelcomeController::class, 'page'])->name('page');
    Route::get('datapembeli', [OrderController::class, 'index'])->name('datapembeli');
});

require __DIR__ . '/auth.php';
