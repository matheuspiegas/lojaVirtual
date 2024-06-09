<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (session('success'))
                <p class="text-green-700 bg-green-300">{{ session('success') }}</p>
                @endif
                <p>Bem-vindo ao Dashboard!</p>
            </div>
        </div>
    </div>
</x-app-layout>