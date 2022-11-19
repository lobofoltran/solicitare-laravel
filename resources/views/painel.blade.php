<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Solicitare - Painel
        </h2>
    </x-slot>

    <div style="padding: 30px;">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg bg-white dark:bg-gray-700 p-5">
            Seja bem-vindo, {{ Auth::user()->name }}! 
        </div>
    </div>
</x-app-layout>