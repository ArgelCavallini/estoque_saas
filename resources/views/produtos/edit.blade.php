<x-app-layout>
    <x-slot name="header">
        <h2>Editar Produto</h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto bg-white rounded shadow">
        <form method="POST" action="{{ route('produtos.update', $produto->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Nome</label><br>
                <input
                    type="text"
                    name="nome"
                    value="{{ $produto->nome }}"
                    style="width:100%;padding:8px;"
                >
            </div>

            <div class="mb-4">
                <label>Estoque mínimo</label><br>
                <input
                    type="number"
                    name="estoque_minimo"
                    value="{{ $produto->estoque_minimo }}"
                    style="width:100%;padding:8px;"
                >
            </div>

            <div class="flex justify-end gap-3">
                <input
                    type="button"
                    value="Cancelar"
                    onclick="window.location='{{ route('produtos.index') }}'"
                    style="
                        background-color:#dc2626;
                        color:#ffffff;
                        padding:10px 20px;
                        border:none;
                        border-radius:6px;
                        font-weight:600;
                        cursor:pointer;
                    "
                >

                <input
                    type="submit"
                    value="Salvar alterações"
                    style="
                        background-color:#16a34a;
                        color:#ffffff;
                        padding:10px 20px;
                        border:none;
                        border-radius:6px;
                        font-weight:600;
                        cursor:pointer;
                    "
                >
            </div>
        </form>
    </div>
</x-app-layout>
