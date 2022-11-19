<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Solicitare - Usuários do Sistema
        </h2>
    </x-slot>

    <div class="text-center" style="padding-top: 15px">
        <button onclick="window.location = '{{ URL::route('usuarios.create') }}'" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Incluir novo Usuário</button>
    </div>
    <div id="orders" style="padding: 15px 50px">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            EMPRESA
                        </th>
                        <th scope="col" class="py-3 px-6">
                            MATRÍCULA
                        </th>
                        <th scope="col" class="py-3 px-6">
                            NOME
                        </th>
                        <th scope="col" class="py-3 px-6">
                            E-MAIL
                        </th>
                        <th scope="col" class="py-3 px-6">
                            ADMIN SISTEMA
                        </th>
                        <th scope="col" class="py-3 px-6">
                            ADMIN EMPRESA
                        </th>
                        <th scope="col" class="py-3 px-6">
                            FUNCIONÁRIO
                        </th>
                        <th scope="col" class="py-3 px-6">
                            CRIADO EM
                        </th>
                        <th scope="col" class="py-3 px-6">
                        </th>
                        <th scope="col" class="py-3 px-6">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->id }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ DB::table('empresas')->where('id', '=', $user->empresa_id)->first()->name }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->matricula ?? '-' }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->email }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->sysadm ?? 0 }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->admin ?? 0 }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->func ?? 0 }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}

                        </th>
                        <td class="py-4 px-6">
                            <a href="{{ route('usuarios.edit', $user->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        </td>
                        <td class="py-4 px-6">
                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
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
</x-app-layout>