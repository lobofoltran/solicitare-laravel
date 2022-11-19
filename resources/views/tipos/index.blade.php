<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Solicitare - Tipos de Solicitações Cadastrados
        </h2>
    </x-slot>

    <div class="main">
        <div id="new-order" style="padding: 15px 50px;">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg bg-white dark:bg-gray-700 p-5">
                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    @foreach ($errors->all() as $error)
                        <span class="font-medium"> {{ $error }}</span><br>
                    @endforeach
                    </div>
                @endif
                <form method="POST" action="{{ route('tipos.store') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tipo de Solicitação</label>
                        <input type="text" name="tipo" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Criar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="left">
        <div id="orders" style="padding: 15px 50px">
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                TIPO DE SOLICITAÇÃO
                            </th>
                            <th scope="col" class="py-3 px-6">
                            </th>
                            <th scope="col" class="py-3 px-6">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tipos as $tipo)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $tipo->id }}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $tipo->type }}
                            </th>
                            <td class="py-4 px-6">
                                <a href="{{ route('tipos.edit', $tipo->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            </td>
                            <td class="py-4 px-6">
                                <form action="{{ route('tipos.destroy', $tipo->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="font-medium text-red-600 dark:text-red-500 hover:underline" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
</x-app-layout>