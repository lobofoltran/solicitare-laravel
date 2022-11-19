<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Solicitare - Ordens Abertas pelo Usuário
        </h2>
    </x-slot>

    <div id="orders" style="padding: 15px 50px">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            DATA DE INCLUSÃO
                        </th>
                        <th scope="col" class="py-3 px-6">
                            TIPO
                        </th>
                        <th scope="col" class="py-3 px-6">
                            SETOR
                        </th>
                        <th scope="col" class="py-3 px-6">
                            DATA EXPIRAR
                        </th>
                        <th scope="col" class="py-3 px-6">
                            SITUAÇÃO
                        </th>
                        <th scope="col" class="py-3 px-6">
                            ACEITO POR
                        </th>
                        <th scope="col" class="py-3 px-6">
                            ACEITO EM
                        </th>
                        <th scope="col" class="py-3 px-6">
                            EDITAR
                        </th>
                        <th scope="col" class="py-3 px-6">
                            DELETAR
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            #{{ $order->id }} - {{ DB::table('tipos_solics')->where('id', '=', $order->tipo_id)->where('empresa_id', '=', Auth::user()->empresa_id)->first()->type }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ DB::table('setores')->where('id', '=', $order->setor_id)->where('empresa_id', '=', Auth::user()->empresa_id)->first()->setor }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ Carbon\Carbon::parse($order->expires_at)->format('d/m/Y') }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($order->situation == 'R')
                                <span class="text-red-600">Reprovada</span>
                            @elseif ($order->situation == 'P')
                                <span class="text-yellow-600">Pendente</span>
                            @else 
                                <span class="text-green-600">Aprovada</span>
                            @endif
                        </th>
                        <td class="py-4 px-6">
                            {{ DB::table('users')->where('id', '=', $order->accepted_by)->where('empresa_id', '=', Auth::user()->empresa_id)->first()->name ?? '-' }}
                        </td>
                        <td class="py-4 px-6">
                            @if ($order->accepted_by)
                                {{ Carbon\Carbon::parse($order->accepted_in)->format('d/m/Y - H:i') }}
                            @endif
                        </td>        
                        <td class="py-4 px-6">
                            <a href="{{ route('orders.edit', $order->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        </td>
                        <td class="py-4 px-6">
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
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