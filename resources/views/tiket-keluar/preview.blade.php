<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Tiket') }}
        </h2>
    </x-slot>
    <div class=" flex flex-col sm:justify-center items-center  sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="post" action="{{ route('tiket-keluar.store') }}">
                @csrf

                <!-- tiket -->
                <div>
                    <x-input-label for="tiket" :value="__('tiket')" />
                    <x-text-input id="tiket" class="block mt-1 w-full" type="text" name="tiket"
                        value="{{$data->unique_character}}" readOnly />
                    <x-input-error :messages="$errors->get('tiket')" class="mt-2" />
                </div>

                <!-- Waktu -->
                <div class="mt-2">
                    <x-input-label for="waktu" :value="__('Waktu Masuk')" />
                    <x-text-input id="waktu" class="block mt-1 w-full" type="text" name="waktu"
                        value="{{$data->created_at}}" readOnly />
                    <x-input-error :messages="$errors->get('waktu')" class="mt-2" />
                </div>

                <!-- Durasi -->
                <div class="mt-2">
                    <x-input-label for="durasi" :value="__('Durasi Parkir')" />
                    <x-text-input id="durasi" class="block mt-1 w-full" type="text" name="durasi"
                        value="{{floor((strtotime(date('Y-m-d H:i:s')) - strtotime($data->created_at))/3600).' Jam' }}"
                        readOnly />
                    <x-input-error :messages="$errors->get('durasi')" class="mt-2" />
                </div>

                <!-- tipe kendaraan  -->
                <div class="mt-2">
                    <label for="kendaraan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Pilih
                        tipe kendaraan</label>
                    <select id="kendaraan" name="kendaraan" onchange="setHarga()"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="-">Silahkan Pilih Kendaraan</option>
                        @forelse($kendaraan as $ride)
                        <option value="{{$ride->tarif}}">{{$ride->name}}</option>
                        @empty
                        <option value="0">Data kendaraan Belum ada</option>
                        @endforelse
                    </select>
                </div>

                <input type="hidden" id="kendaraan_nama" name="kendaraan_nama">

                <!-- Harga tarif -->
                <div class="mt-2">
                    <x-input-label for="tarif" :value="__('Tarif')" />
                    <x-text-input id="tarif" class="block mt-1 w-full" type="text" name="tarif" value="{{0}}"
                        readOnly />
                    <x-input-error :messages="$errors->get('Tarif')" class="mt-2" />
                </div>





                <div class="flex items-center justify-end mt-4">
                    <a href="{{route('tiket-keluar.index')}}"
                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Kembali</a>
                    <x-primary-button class="ml-4">
                        {{ __('Simpan') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

    <script>
    function setHarga() {
        let hargaDasar = document.getElementById("kendaraan").value;
        let durasiRaw = document.getElementById("durasi").value;
        let durasi =  parseFloat(durasiRaw.replace(" Jam", ""))

        let kendaraanSelect = document.getElementById("kendaraan")
     
    
        let bayar = parseFloat(hargaDasar) + ( durasi * 2000)

        

       document.getElementById("tarif").value = bayar;
       document.getElementById("kendaraan_nama").value = kendaraanSelect.options[kendaraanSelect.selectedIndex].text
    }
    </script>

</x-app-layout>