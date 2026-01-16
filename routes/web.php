<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EstoqueMovimentacaoController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'permissao:ver_dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'permissao:gerenciar_produtos'])->group(function () {
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/novo', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{produto}/editar', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
    Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
});

Route::middleware(['auth', 'permissao:movimentar_estoque'])->group(function () {
    Route::get('/estoque', [EstoqueMovimentacaoController::class, 'index'])->name('estoque.index');
    Route::get('/estoque/movimentar', [EstoqueMovimentacaoController::class, 'create'])->name('estoque.create');
    Route::post('/estoque/movimentar', [EstoqueMovimentacaoController::class, 'store'])->name('estoque.store');
    Route::get('/estoque/{movimentacao}/editar', [EstoqueMovimentacaoController::class, 'edit'])->name('estoque.edit');
    Route::put('/estoque/{movimentacao}', [EstoqueMovimentacaoController::class, 'update'])->name('estoque.update');
    Route::delete('/estoque/{movimentacao}', [EstoqueMovimentacaoController::class, 'destroy'])->name('estoque.destroy');
});


Route::get('/teste-empresa', function () {
    return [
        'user' => auth()->user()?->email,
        'empresa_id' => app()->has('empresa_id') ? app('empresa_id') : null,
    ];
})->middleware('auth');

require __DIR__.'/auth.php';
