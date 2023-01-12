<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Pegawai') }}
        </h2>
    </x-slot>
    <div class=" flex flex-col sm:justify-center items-center  sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="post" action="{{ route('pegawai.update',['id'=>$data->id]) }}">
                @csrf
                @method('put')

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$data->name}}"
                        required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$data->email}}"
                        required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{route('pegawai.index')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Kembali</a>
                    <x-primary-button class="ml-4">
                        {{ __('Ubah') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>