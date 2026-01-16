<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\EstoqueMovimentacao;

class DashboardController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        $totalProdutos = $produtos->count();

        $produtosCriticos = $produtos->filter(function ($produto) {
            return $produto->saldoAtual() <= $produto->estoque_minimo;
        });

        $ultimasMovimentacoes = EstoqueMovimentacao::with('produto')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('dashboard', [
            'totalProdutos'       => $totalProdutos,
            'produtosCriticos'    => $produtosCriticos,
            'ultimasMovimentacoes'=> $ultimasMovimentacoes,
        ]);
    }
}
