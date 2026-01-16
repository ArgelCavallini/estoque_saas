<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Novo Produto
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                <form method="POST" action="{{ route('produtos.store') }}" class="space-y-6">
                    @csrf

                    {{-- Nome --}}
                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nome do produto
                        </label>
                        <input
                            id="nome"
                            name="nome"
                            type="text"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700
                                   dark:bg-gray-900 dark:text-gray-100
                                   focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- Estoque mínimo --}}
                    <div>
                        <label for="estoque_minimo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Estoque mínimo
                        </label>
                        <input
                            id="estoque_minimo"
                            name="estoque_minimo"
                            type="number"
                            min="0"
                            value="0"
                            class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700
                                   dark:bg-gray-900 dark:text-gray-100
                                   focus:border-indigo-500 focus:ring-indigo-500"
                        >
                    </div>

                    {{-- Ações --}}
                    <div class="flex justify-end gap-3 pt-4">
                      <a href="{{ route('produtos.index') }}">
                          <x-button-danger>
                              Cancelar
                          </x-button-danger>
                      </a>
                      <x-button-success>
                          Salvar produto
                      </x-button-success>
                  </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
