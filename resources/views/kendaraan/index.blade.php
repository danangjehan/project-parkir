<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kendaraan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 p-b-3 text-gray-900">
                    {{ __("Daftar Kendaraan") }}
                </div>

                <div class="px-6 pt-4 pb-2">

                <a href="{{route('kendaraan.create')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"> + Buat Data Kendaraan</a>

                </div>
                <div class="p-6">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Kendaraan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tarif
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Edit
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $dt)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$dt->name}}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Rp {{number_format($dt->tarif, 2, ',', '.')}}
                                    </th>
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                        <a href="{{route('kendaraan.preview',['id' => $dt->id])}}"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            Ubah</a>

                                    </th>
                                </tr>
                                @empty
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th colspan="3" scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                       <h2>Data belum ada !!!</h2>
                                    </th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>