<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl">Movimentações de Estoque</h2>
    </x-slot>

    <div class="p-6">

        <div style="text-align:right; margin-bottom:15px;">
            <div style="text-align:right; margin-bottom:15px;">
    <input
        type="button"
        value="Nova movimentação"
        onclick="window.location='{{ route('estoque.create') }}'"
        style="
            background:#16a34a;
            color:#fff;
            padding:10px 20px;
            border:none;
            border-radius:6px;
            font-weight:600;
            cursor:pointer;
        "
    >
</div>
        </div>

        <table width="100%" border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr style="background-color:#f3f4f6;">
                    <th style="border:1px solid #e5e7eb; text-align:left;">Data</th>
                    <th style="border:1px solid #e5e7eb; text-align:left;">Produto</th>
                    <th style="border:1px solid #e5e7eb; text-align:left;">Tipo</th>
                    <th style="border:1px solid #e5e7eb; text-align:right;">Quantidade</th>
                    <th style="border:1px solid #e5e7eb; text-align:left;">Observação</th>
                    <th style="border:1px solid #e5e7eb; text-align:center;">Ações</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($movimentacoes as $index => $mov)
                  <tr style="background-color: {{ $index % 2 === 0 ? '#ffffff' : '#f9fafb' }};">
                      <td style="border:1px solid #e5e7eb;">
                          {{ $mov->created_at->format('d/m/Y H:i') }}
                      </td>

                      <td style="border:1px solid #e5e7eb;">
                          {{ $mov->produto->nome }}
                      </td>

                      <td style="border:1px solid #e5e7eb;">
                          {{ $mov->tipo->nome }}
                      </td>

                      <td style="border:1px solid #e5e7eb; text-align:right;">
                          {{ $mov->quantidade }}
                      </td>

                      <td style="border:1px solid #e5e7eb;">
                          {{ $mov->observacao }}
                      </td>

                      <td style="border:1px solid #e5e7eb; text-align:center;">
                          <input
                                type="button"
                                value="Editar"
                                onclick="window.location='{{ route('estoque.edit', $mov->id) }}'"
                                style="
                                    background:#2563eb;
                                    color:#fff;
                                    padding:6px 10px;
                                    border:none;
                                    border-radius:6px;
                                    font-weight:600;
                                    cursor:pointer;
                                    margin-right:5px;
                                "
                            >

                            <form method="POST"
                                  action="{{ route('estoque.destroy', $mov->id) }}"
                                  style="display:inline"
                                  onsubmit="return confirm('Excluir esta movimentação?');">
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
