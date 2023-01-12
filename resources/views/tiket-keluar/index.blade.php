<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tiket Keluar') }}
        </h2>
    </x-slot>
    <div class=" flex flex-col sm:justify-center items-center  sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

        @if (session()->has('failure'))
            <div class="flex justify-between text-red-200 shadow-inner rounded p-3 bg-red-600">
                <p class="self-center"><strong> Danger </strong> {{ session('failure') }}</p>
                <strong class="text-xl align-center cursor-pointer alert-del">&times;</strong>
            </div>
        @endif

            <form method="POST" class="mt-4" action="{{ route('tiket-keluar.cari') }}">
                @csrf

                <div>
                    <x-input-label for="tiket" :value="__('tiket')" />
                    <x-text-input id="tiket" class="block mt-1 w-full" type="text" name="tiket" :value="old('tiket')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('tiket')" class="mt-2" />
                </div>

                <div class="flex items-center justify-center mt-4">
                    <x-primary-button class="ml-4">
                        {{ __('Cari') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
    <script>
    var alert_del = document.querySelectorAll('.alert-del');
    alert_del.forEach((x) =>
        x.addEventListener('click', function() {
            x.parentElement.classList.add('hidden');
        })
    );
    </script>

</x-app-layout>