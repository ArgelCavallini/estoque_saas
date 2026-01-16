<x-app-layout>
    <x-slot name="header">
        <h2>Editar Movimentação</h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto bg-white rounded shadow">

        <form method="POST" action="{{ route('estoque.update', $movimentacao->id) }}">
            @csrf
            @method('PUT')

            <div style="margin-bottom:12px;">
                <label>Produto</label><br>
                <select name="produto_id" style="width:100%;padding:8px;">
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}"
                            @selected($produto->id == $movimentacao->produto_id)>
                            {{ $produto->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom:12px;">
                <label>Tipo</label><br>
                <select name="tipo_id" style="width:100%;padding:8px;">
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}"
                            @selected($tipo->id == $movimentacao->tipo_id)>
                            {{ $tipo->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom:12px;">
                <label>Quantidade</label><br>
                <input type="number" name="quantidade"
                       value="{{ $movimentacao->quantidade }}"
                       style="width:100%;padding:8px;">
            </div>

            <div style="margin-bottom:12px;">
                <label>Observação</label><br>
                <input type="text" name="observacao"
                       value="{{ $movimentacao->observacao }}"
                       style="width:100%;padding:8px;">
            </div>

            <div style="text-align:right;">
                <input
                    type="button"
                    value="Cancelar"
                    onclick="window.location='{{ route('estoque.index') }}'"
                    style="background:#dc2626;color:#fff;padding:10px 20px;border:none;border-radius:6px;cursor:pointer;"
                >

                <input
                    type="submit"
                    value="Salvar alterações"
                    style="background:#16a34a;color:#fff;padding:10px 20px;border:none;border-radius:6px;cursor:pointer;"
                >
            </div>

        </form>
    </div>
</x-app-layout>
