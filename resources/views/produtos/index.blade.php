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

        <table
    width="100%"
    cellpadding="10"
    cellspacing="0"
    style="
        border-collapse: collapse;
        background-color:#ffffff;
        font-size:14px;
        line-height:1.4;
    "
>
    <thead>
        <tr style="background-color:#f3f4f6;">
            <th style="border:1px solid #e5e7eb; text-align:left;">Nome</th>
            <th style="border:1px solid #e5e7eb; text-align:right;">Estoque mínimo</th>
            <th style="border:1px solid #e5e7eb; text-align:center;">Ativo</th>
            <th style="border:1px solid #e5e7eb; text-align:center;">Ações</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($produtos as $index => $produto)
            <tr style="background-color: {{ $index % 2 === 0 ? '#ffffff' : '#f9fafb' }};">
                <td style="border:1px solid #e5e7eb;">
                    {{ $produto->nome }}
                </td>

                <td style="border:1px solid #e5e7eb; text-align:right;">
                    {{ $produto->estoque_minimo }}
                </td>

                <td style="border:1px solid #e5e7eb; text-align:center;">
                    {{ $produto->ativo ? 'Sim' : 'Não' }}
                </td>

                <td style="border:1px solid #e5e7eb; text-align:center;">
                    <input
                        type="button"
                        value="Editar"
                        onclick="window.location='{{ route('produtos.edit', $produto->id) }}'"
                        style="
                            background:#2563eb;
                            color:#fff;
                            padding:6px 10px;
                            border:none;
                            border-radius:6px;
                            font-weight:600;
                            cursor:pointer;
                            margin-right:6px;
                        "
                    >

                    <form method="POST"
                          action="{{ route('produtos.destroy', $produto->id) }}"
                          style="display:inline"
                          onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                        @csrf
                        @method('DELETE')

                        <input
                            type="submit"
                            value="Excluir"
                            style="
                                background:#dc2626;
                                color:#fff;
                                padding:6px 10px;
                                border:none;
                                border-radius:6px;
                                font-weight:600;
                                cursor:pointer;
                            "
                        >
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

    </div>
</x-app-layout>
