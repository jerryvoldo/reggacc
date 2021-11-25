<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST">
                        @csrf
                        <div>
                            <x-label for="badan_hukum" :value="__('Badan Hukum')" />
                            <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="badan_hukum">
                                <option>--Pilih badan hukum--</option>
                                <option value="pt">PT</option>
                                <option value="cv">CV</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="nama" :value="__('Nama Perusahaan')" />
                            <x-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="tipeperusahaan" :value="__('Tipe Perusahaan')" />
                            <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="tipesarana">
                                <option>--Pilih tipe perusahaan--</option>
                                @foreach($tipesarana as $tipe)
                                <option value="{{ $tipe->id }}">{{ $tipe->tipe }}</option>
                                @endforeach
                            </select>
                        </div>

                        <p class="font-lg mt-5 mb-2">Lokasi Perusahaan</p>

                        <div class="mt-4">
                            <x-label for="jalan" :value="__('Jalan')" />
                            <x-input id="jalan" class="block mt-1 w-full" type="text" name="alamat_jalan" :value="old('alamat_jalan')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="rt" :value="__('RT')" />
                            <x-input id="jalan" class="block mt-1 w-full" type="text" name="alamat_rt" :value="old('alamat_rt')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="rw" :value="__('RW')" />
                            <x-input id="rw" class="block mt-1 w-full" type="text" name="alamat_rw" :value="old('alamat_rw')" required autofocus />
                        </div>
                        
                        @livewire('lokasi')

                        <div class="mt-4">
                            <x-label for="telepon_1" :value="__('Nomor Telepon 1')" />
                            <x-input id="telepon_1" class="block mt-1 w-full" type="text" name="telepon_1" :value="old('telepon_1')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="telepon_2" :value="__('Nomor Telepon 2')" />
                            <x-input id="telepon_2" class="block mt-1 w-full" type="text" name="telepon_2" :value="old('telepon_2')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-3">
                                {{ __('Simpan') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
