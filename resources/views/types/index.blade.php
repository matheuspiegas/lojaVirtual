<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">

        <!--        <div class="row"> substituir para tailwind
            <div class="col">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <div>{{ $message }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
-->
        @if (session('success'))
        <p class="text-green-700 bg-green-300">{{session('success')}}</p>
        @endif
        <br>
        <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
            href="{{ url('/dashboard') }}">Voltar</a>
        <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-100 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-900 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
            href="{{ url('/types/new') }}">Cadastrar</a>

        <br><br>

        <table class="min-w-full bg-white text-center">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Nome</th>
                    <th class="py-2 px-4 border-b-2 border-gray-200">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($types as $type)
                <tr>
                    <td class="py-2 px-4 border-b border-gray-200">{{ $type['name'] }}</td>
                    <td class="py-2 px-4 border-b border-gray-200">
                        <a class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"
                            href="{{ url('/types/update', ['id' => $type['id']]) }}">Editar</a>
                        <form action="{{ url('/types/delete', ['id' => $type['id']]) }}" method="POST"
                            onsubmit="return confirm('Tem certeza que deseja deletar este item?');"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Deletar
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>



<script>
    function confirma(element) {
        // Exibe o diálogo de confirmação
        if (confirm("Tem certeza de que deseja excluir este produto?")) {
            return true;
        }
        return false;

    }
</script>