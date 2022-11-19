<?php

use App\Http\Controllers\{
    EmpresasController, 
    OrdersController, 
    SetoresController, 
    TiposSolicController, 
    UsersController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function() {
    Route::get('/painel', function() {
        return view('painel');
    })->name('painel.index');

    Route::middleware([
        'func',
    ])->group(function() {
        Route::get('/orders',              [OrdersController::class, 'index'])->name('orders.index');
        Route::get('/orders/create',       [OrdersController::class, 'create'])->name('orders.create');
        Route::post('/orders/create',      [OrdersController::class, 'store'])->name('orders.store');
        Route::get('/orders/{id}/editar',  [OrdersController::class, 'edit'])->name('orders.edit');
        Route::put('/orders/{id}/update',  [OrdersController::class, 'update'])->name('orders.update');
        Route::delete('/orders/{id}',      [OrdersController::class, 'destroy'])->name('orders.destroy');
    });

    Route::middleware([
        'admin',
    ])->group(function() {
        Route::get('/setores',             [SetoresController::class, 'show'])->name('setores.index');
        Route::post('/setores/create',     [SetoresController::class, 'store'])->name('setores.store');
        Route::get('/setores/{id}/edit',   [SetoresController::class, 'edit'])->name('setores.edit');
        Route::put('/setores/{id}/update', [SetoresController::class, 'update'])->name('setores.update');
        Route::delete('/setores/{id}',     [SetoresController::class, 'destroy'])->name('setores.destroy');
    
        Route::get('/tipos',               [TiposSolicController::class, 'show'])->name('tipos.index');
        Route::post('/tipos/create',       [TiposSolicController::class, 'store'])->name('tipos.store');
        Route::get('/tipos/{id}/edit',     [TiposSolicController::class, 'edit'])->name('tipos.edit');
        Route::put('/tipos/{id}/update',   [TiposSolicController::class, 'update'])->name('tipos.update');
        Route::delete('/tipos/{id}',       [TiposSolicController::class, 'destroy'])->name('tipos.destroy');
    
        Route::get('/orders/pendentes',    [OrdersController::class, 'show'])->name('orders.pendentes');
        Route::put('/orders/{id}',         [OrdersController::class, 'approve'])->name('orders.approve');
        Route::get('/orders/history',      [OrdersController::class, 'history'])->name('orders.history');

        Route::get('/usuarios',             [UsersController::class, 'show'])->name('usuarios.index');
        Route::get('/usuarios/create',      [UsersController::class, 'create'])->name('usuarios.create');
        Route::post('/usuarios/create',     [UsersController::class, 'store'])->name('usuarios.store');
        Route::get('/usuarios/{id}/edit',   [UsersController::class, 'edit'])->name('usuarios.edit');
        Route::put('/usuarios/{id}/update', [UsersController::class, 'update'])->name('usuarios.update');
        Route::delete('/usuarios/{id}',     [UsersController::class, 'destroy'])->name('usuarios.destroy');
    });

    Route::middleware([
        'sysadm',
    ])->group(function() {
        Route::get('/empresas',             [EmpresasController::class, 'show'])->name('empresas.index');
        Route::post('/empresas/create',     [EmpresasController::class, 'store'])->name('empresas.store');
        Route::get('/empresas/{id}/edit',   [EmpresasController::class, 'edit'])->name('empresas.edit');
        Route::put('/empresas/{id}/update', [EmpresasController::class, 'update'])->name('empresas.update');
        Route::delete('/empresas/{id}',     [EmpresasController::class, 'destroy'])->name('empresas.destroy');

        Route::get('/usuarios',             [UsersController::class, 'show'])->name('usuarios.index');
        Route::get('/usuarios/create',      [UsersController::class, 'create'])->name('usuarios.create');
        Route::post('/usuarios/create',     [UsersController::class, 'store'])->name('usuarios.store');
        Route::get('/usuarios/{id}/edit',   [UsersController::class, 'edit'])->name('usuarios.edit');
        Route::put('/usuarios/{id}/update', [UsersController::class, 'update'])->name('usuarios.update');
        Route::delete('/usuarios/{id}',     [UsersController::class, 'destroy'])->name('usuarios.destroy');
    });
});

