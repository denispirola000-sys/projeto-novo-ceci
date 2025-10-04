<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController; 
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- ROTAS PÚBLICAS ---
// Página Inicial
Route::get('/', function () {
    return view('home');
});

// Página da Loja (Vitrine de Produtos)
Route::get('/produtos', [ShopController::class, 'index'])->name('shop.index');


// --- ROTAS DO CARRINHO ---  //
Route::get('/carrinho', [CartController::class, 'index'])->name('cart.index');
Route::post('/carrinho/adicionar', [CartController::class, 'add'])->name('cart.add');
Route::post('/carrinho/atualizar', [CartController::class, 'update'])->name('cart.update');
Route::post('/carrinho/remover', [CartController::class, 'remove'])->name('cart.remove');


// --- ROTAS DE CLIENTE AUTENTICADO (BREEZE) ---
// Painel do cliente após o login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Editar o perfil do cliente
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// --- ROTAS DO PAINEL DE ADMIN ---
Route::prefix('admin')->name('admin.')->group(function () {
    // CRUD de Produtos
    Route::resource('products', ProductController::class);
});


// --- ARQUIVO DE ROTAS DE AUTENTICAÇÃO DO BREEZE ---
require __DIR__.'/auth.php';


// --- ROTAS DE CHECKOUT ---
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('auth');
Route::get('/checkout/sucesso/{order}', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('auth');