<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Solicitare - Editar Ordem
        </h2>
    </x-slot>

<div id="new-order" style="padding: 15px 50px;">
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg bg-white dark:bg-gray-700 p-5">
        <h5 style="margin-bottom:10px;" class="text-xl font-bold text-gray-700">Editar ordem</h5>
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            @foreach ($errors->all() as $error)
                <span class="font-medium"> {{ $error }}</span><br>
            @endforeach
            </div>
        @endif
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @method('PUT')
            @include('orders._partials.form')
        </form>
    </div>
</div>
</x-app-layout>