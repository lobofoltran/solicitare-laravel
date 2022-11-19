@csrf
<div class="mb-6">
    <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tipo</label>
    <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled value="">Escolha uma opção</option>
    @foreach ($tipos as $tipo)
        <option @if (($order->tipo_id ?? old('type')) == $tipo->id) selected @endif value="{{ $tipo->id }}">{{ $tipo->type }}</option>
    @endforeach
</select>
</div>
<div class="mb-6">
<label for="setor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Setor</label>
<select name="setor" id="setor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected disabled value="">Escolha uma opção</option>
    @foreach ($setores as $setor)
        <option @if (($order->setor_id ?? old('setor')) == $setor->id) selected @endif value="{{ $setor->id }}">{{ $setor->setor }}</option>
    @endforeach
    </select>
</div>
<div class="mb-6">
    <label for="descr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Descrição</label>
    <input type="text" name="description" id="description" value="{{ $order->description ?? old('description') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
</div>
<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
