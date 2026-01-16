<x-app-layout>
    <x-slot name="header">
        <h2>Dashboard</h2>
    </x-slot>

    <div class="p-6">

        <div style="display:flex; gap:20px; margin-bottom:20px;">
            <div style="flex:1; padding:20px; background:#e5e7eb; border-radius:8px;">
                <strong>Total de produtos</strong><br>
                {{ $totalProdutos }}
            </div>

            <div style="flex:1; padding:20px; background:#fee2e2; border-radius:8px;">
                <strong>Produtos com estoque baixo</strong><br>
                {{ $produtosCriticos->count() }}
            </div>
        </div>

        <h3>Últimas movimentações</h3>

        <table width="100%" cellpadding="10" cellspacing="0" style="border-collapse:collapse;">
            <thead>
                <tr style="background:#f3f4f6;">
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ultimasMovimentacoes as $mov)
                    <tr>
                        <td>{{ $mov->produto->nome }}</td>
                        <td>{{ $mov->quantidade }}</td>
                        <td>{{ $mov->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
