<?php

use App\Http\Controllers\ProductCatalogController;
use App\Http\Controllers\AdminProductController;
use Illuminate\Support\Facades\Route;

//  ROL DE ROTAS PÚBLICAS DO CLIENTE
Route::get('/', [ProductCatalogController::class, 'index'])->name('catalog.index');
Route::get('/shop', [ProductCatalogController::class, 'explore'])->name('catalog.explore');
Route::get('/produto/{id}', [ProductCatalogController::class, 'show'])->name('catalog.show');
Route::get('/carrinho', [ProductCatalogController::class, 'cart'])->name('cart.index');


//  ROL DE ROTAS RESTREITAS DO DASHBOARD DO LOJISTA
Route::get('/login', function () { return view('auth.login'); })->name('login');

Route::get('/admin/dashboard', [AdminProductController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/produtos', [AdminProductController::class, 'index'])->name('admin.products.index');
Route::get('/admin/produtos/criar', [AdminProductController::class, 'create'])->name('admin.products.create');
Route::get('/admin/produtos/{id}/editar', [AdminProductController::class, 'edit'])->name('admin.products.edit');
Route::get('/admin/configuracoes', [AdminProductController::class, 'settings'])->name('admin.settings');
Route::get('/checkout', [ProductCatalogController::class, 'checkout'])->name('checkout.index');
Route::post('/admin/produtos/guardar', [AdminProductController::class, 'store'])->name('admin.products.store');

// Adiciona esta linha no bloco público do teu routes/web.php
Route::get('/pedido/{id}/recibo', [ProductCatalogController::class, 'receipt'])->name('catalog.receipt');


