<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\TipoMovimentacao;
use App\Models\EstoqueMovimentacao;
use Illuminate\Http\Request;

class EstoqueMovimentacaoController extends Controller
{
    public function index()
    {
        $movimentacoes = EstoqueMovimentacao::with(['produto', 'tipo'])
            ->orderByDesc('created_at')
            ->get();

        return view('estoque.index', compact('movimentacoes'));
    }

    public function create()
    {
        $produtos = Produto::orderBy('nome')->get();
        $tipos = TipoMovimentacao::all();

        return view('estoque.create', compact('produtos', 'tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo_id' => 'required|exists:tipos_movimentacao,id',
            'quantidade' => 'required|integer|min:1',
            'observacao' => 'nullable|string|max:255',
        ]);

        EstoqueMovimentacao::create([
            'empresa_id' => auth()->user()->empresa_id,
            'produto_id' => $request->produto_id,
            'tipo_id' => $request->tipo_id,
            'quantidade' => $request->quantidade,
            'observacao' => $request->observacao,
        ]);

        return redirect()->route('estoque.index')
            ->with('success', 'Movimentação registrada com sucesso.');
    }

    public function edit(EstoqueMovimentacao $movimentacao)
    {
        $produtos = Produto::orderBy('nome')->get();
        $tipos = TipoMovimentacao::all();

        return view('estoque.edit', compact('movimentacao', 'produtos', 'tipos'));
    }

    public function update(Request $request, EstoqueMovimentacao $movimentacao)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo_id' => 'required|exists:tipos_movimentacao,id',
            'quantidade' => 'required|integer|min:1',
            'observacao' => 'nullable|string|max:255',
        ]);

        $movimentacao->update([
            'produto_id' => $request->produto_id,
            'tipo_id' => $request->tipo_id,
            'quantidade' => $request->quantidade,
            'observacao' => $request->observacao,
        ]);

        return redirect()->route('estoque.index')
            ->with('success', 'Movimentação atualizada com sucesso.');
    }

    public function destroy(EstoqueMovimentacao $movimentacao)
    {
        $movimentacao->delete();

        return redirect()->route('estoque.index')
            ->with('success', 'Movimentação excluída com sucesso.');
    }
}
