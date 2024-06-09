<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden">
                @if (session('success'))
                <p class="text-green-700 bg-green-300">{{ session('success') }}</p>
                @endif
                <p class="text-white text-2xl mb-5">Bem-vindo ao Dashboard!</p>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-gray-600 rounded-md text-center">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b-2 border-gray-200">Nome</th>
                                    <th class="py-2 px-4 border-b-2 border-gray-200">Preço</th>
                                    <th class="py-2 px-4 border-b-2 border-gray-200">Quantidade</th>
                                    <th class="py-2 px-4 border-b-2 border-gray-200">Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                <tr
                                    class="{{ $loop->last ? '' : 'border-b border-gray-200' }} {{$loop->first ? 'border-t-0' : ''}}">
                                    <td class="py-3 px-6">{{ $product['name'] }}</td>
                                    <td class="py-3 px-6">{{ $product['price'] }}</td>
                                    <td class="py-3 px-6">{{ $product['quantity'] }}</td>
                                    <td class="py-3 px-6">{{ $product->type->name }}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>