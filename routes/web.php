<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/novo', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');

    //ROTAS DE EDIÇÃO
    Route::get('/produtos/{produto}/editar', [ProdutoController::class, 'edit'])
        ->name('produtos.edit');

    Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])
        ->name('produtos.update');

    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])
    ->name('produtos.destroy');
});

Route::get('/teste-empresa', function () {
    return [
        'user' => auth()->user()?->email,
        'empresa_id' => app()->has('empresa_id') ? app('empresa_id') : null,
    ];
})->middleware('auth');

require __DIR__.'/auth.php';
