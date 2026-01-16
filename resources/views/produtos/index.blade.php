<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Produtos</h2>
    </x-slot>

    <div class="p-6">
        <div class="flex justify-end mb-4">
    <input
        type="button"
        value="Adicionar produto"
        onclick="window.location='{{ route('produtos.create') }}'"
        style="
            background-color: #16a34a;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 6px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        "
    />
</div>

        <table class="mt-4 w-full border">
            <thead>
                 <tr>
                      <th class="border p-2 text-left">Nome</th>
                      <th class="border p-2 text-left">Estoque mínimo</th>
                      <th class="border p-2 text-center">Ativo</th>
                      <th class="border p-2 text-center">Ações</th>
                  </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td class="border p-2">{{ $produto->nome }}</td>
                        <td class="border p-2">{{ $produto->estoque_minimo }}</td>
                        <td class="border p-2">
                            {{ $produto->ativo ? 'Sim' : 'Não' }}
                        </td>
                        <td class="border p-2 text-center">
            <td class="border p-2 text-center">
    <input
        type="button"
        value="Editar"
        onclick="window.location='{{ route('produtos.edit', $produto->id) }}'"
        style="
            background-color:#2563eb;
            color:#ffffff;
            padding:6px 12px;
            border:none;
            border-radius:6px;
            font-weight:600;
            cursor:pointer;
        "
    >

    <form method="POST"
          action="{{ route('produtos.destroy', $produto->id) }}"
          style="display:inline"
          onsubmit="return confirm('Tem certeza que deseja excluir este produto?');"
    >
        @csrf
        @method('DELETE')

        <input
            type="submit"
            value="Excluir"
            style="
                background-color:#dc2626;
                color:#ffffff;
                padding:6px 12px;
                border:none;
                border-radius:6px;
                font-weight:600;
                cursor:pointer;
            "
        >
    </form>
</td>

        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
