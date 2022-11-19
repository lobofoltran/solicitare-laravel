<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Solicitare - Histório de Ordens
        </h2>
    </x-slot>

    <div style="padding: 15px;">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            ID
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Usuário
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Setor
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Data Inclusão
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Data Expirar
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Tipo
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Descrição
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Aceito por
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Aceito em
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Situação
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $order->id }}
                        </td>
                        <td class="py-4 px-6">
                            {{ DB::table('users')->where('id', '=', $order->user_id)->where('empresa_id', '=', Auth::user()->empresa_id)->first()->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ DB::table('setores')->where('id', '=', $order->setor_id)->where('empresa_id', '=', Auth::user()->empresa_id)->first()->setor }}
                        </td>
                        <td class="py-4 px-6">
                            {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y - H:i') }}
                        </td>
                        <td class="py-4 px-6">
                            {{ \Carbon\Carbon::parse($order->expires_at)->format('d/m/Y') }}
                        </td>
                        <td class="py-4 px-6">
                            {{ DB::table('tipos_solics')->where('id', '=', $order->tipo_id)->where('empresa_id', '=', Auth::user()->empresa_id)->first()->type }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $order->description }}
                        </td>
                        <td class="py-4 px-6">
                            {{ DB::table('users')->where('id', '=', $order->accepted_by)->where('empresa_id', '=', Auth::user()->empresa_id)->first()->name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ Carbon\Carbon::parse($order->accepted_in)->format('d/m/Y - H:i') }}
                        </td>
                        <td class="py-4 px-6">
                            @if ($order->situation == 'R')
                            <span class="text-red-600">Reprovada</span>
                            @else 
                            <span class="text-green-600">Aprovada</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>