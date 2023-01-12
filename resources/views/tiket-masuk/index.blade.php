<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tiket Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex h-screen">
                    <div class="m-auto">
                    <a href="{{ route('tiket-masuk.generate') }}" target="_blank" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-20 px-40 rounded inline-flex items-center text-2xl"> TIKET</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>