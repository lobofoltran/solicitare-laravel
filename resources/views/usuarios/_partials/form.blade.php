@csrf

<div class="mb-6">
    <label for="empresa_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Empresa</label>
    <select name="empresa_id" id="empresa_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected disabled value="">Escolha uma opção</option>
        @foreach ($empresas as $empresa)
            <option @if ($user->empresa_id ?? old('empresa_id')) selected @endif value="{{ $empresa->id }}">{{ $empresa->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-6">
    <label for="matricula" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Matrícula</label>
    <input type="text" name="matricula" id="matricula" value="{{ $user->matricula ?? old('matricula') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
</div>

<div class="mb-6">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nome</label>
    <input type="text" name="name" id="name" value="{{ $user->name ?? old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
</div>

<div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">E-mail</label>
    <input type="email" name="email" id="email" value="{{ $user->email ?? old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
</div>

<div class="flex items-center mb-4">
    <input @if ($user->sysadm ?? old('sysadm')) checked @endif id="sysadm" name="sysadm" type="checkbox" value="sysadm" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="sysadm" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin do Sistema</label>
</div>

<div class="flex items-center mb-4">
    <input @if ($user->admin ?? old('admin')) checked @endif id="admin" name="admin" type="checkbox" value="admin" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="admin" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Admin de Empresa</label>
</div>
<div class="flex items-center mb-4">
    <input @if ($user->func ?? old('func')) checked  @endif id="func" name="func" type="checkbox" value="func" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="func"  class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Funcionário</label>
</div>

<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
