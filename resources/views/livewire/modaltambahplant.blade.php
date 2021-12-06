<div class="p-4">
        <fieldset class="border border-gray-300 p-3 rounded-lg mt-5">
            <legend class="text-xs font-bold uppercase text-gray-500">Data Umum</legend>
            <div class="mt-4">
                <x-label for="nama" :value="__('Nama Plant')" />
                <x-input wire:model="nama_plant" id="nama" class="bg-gray-100 block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus />
            </div>
            <div class="mt-4">
                <x-label for="tipeperusahaan" :value="__('Tipe Plant')" />
                <select wire:model="tipesarana_id" class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="tipesarana">
                    <option>--Pilih tipe plant--</option>
                    @foreach($tipesarana as $tipe)
                    <option value="{{ $tipe->id }}">{{ $tipe->tipe }}</option>
                    @endforeach
                </select>
            </div>
        </fieldset>
        <fieldset class="border border-gray-300 p-3 rounded-lg mt-5">
            <legend class="text-xs font-bold uppercase text-gray-500">Alamat Plant</legend>
            <div class="mt-4">
                <x-label for="jalan" :value="__('Jalan')" />
                <x-input wire:model="alamat_jalan" id="jalan" class="bg-gray-100 block mt-1 w-full" type="text" name="alamat_jalan" :value="old('alamat_jalan')" required autofocus />
            </div>
            <div class="mt-4 flex flex-row gap-3">
                <div class="flex-1">
                    <x-label for="rt" :value="__('RT')" />
                    <x-input wire:model="alamat_rt" id="jalan" class="bg-gray-100 block mt-1 w-full" type="text" name="alamat_rt" :value="old('alamat_rt')" required autofocus />
                </div>
                <div class="flex-1">
                    <x-label for="rw" :value="__('RW')" />
                    <x-input wire:model="alamat_rw" id="rw" class="bg-gray-100 block mt-1 w-full" type="text" name="alamat_rw" :value="old('alamat_rw')" required autofocus />    
                </div>
            </div>
            <div class="flex flex-row mt-4 gap-2">
                <div class="flex-1">
                    <x-label for="propinsi" :value="__('Propinsi')" />
                    <select wire:model="propinsi_id" wire:change="loadKabupaten" class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_propinsi">
                        <option value="">--Pilih propinsi--</option>
                        @foreach($propinsi as $pro)
                        <option value="{{ $pro->id }}">{{ $pro->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <x-label for="kotakabupaten" :value="__('Kota/Kabupaten')" />
                    <select wire:model="kabupaten_id" wire:change="loadKecamatan" class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_kabupaten">
                        <option value="">--Pilih Kota/Kabupaten--</option>
                        @if($daftarkabupaten != null)
                            @foreach($daftarkabupaten as $kabupaten)
                            <option value="{{ $kabupaten->id }}">{{ $kabupaten->nama }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="flex-1">
                    <x-label for="kecamatan" :value="__('Kecamatan')" />
                    <select wire:model="kecamatan_id" wire:change="loadKelurahan" class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_kecamatan">
                        <option value="">--Pilih Kecamatan--</option>
                        @if($daftarkecamatan != null)
                            @foreach($daftarkecamatan as $kecamatan)
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="flex-1">
                    <x-label for="kelurahan" :value="__('Kelurahan')" />
                    <select wire:model = "kelurahan_id"  class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_kelurahan">
                        <option value="">--Pilih kelurahan--</option>
                        @if($daftarkelurahan != null)
                            @foreach($daftarkelurahan as $kelurahan)
                            <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </fieldset>
        <fieldset class="border border-gray-300 p-3 rounded-lg mt-5">
            <legend class="text-xs font-bold uppercase text-gray-500">Kontak Plant</legend>
            <div class="mt-4">
                <x-label for="telepon_1" :value="__('Nomor Telepon 1')" />
                <x-input wire:model="telepon_1" id="telepon_1" class="bg-gray-100 block mt-1 w-full" type="text" name="telepon_1" :value="old('telepon_1')" required autofocus />
            </div>
            <div class="mt-4">
                <x-label for="telepon_2" :value="__('Nomor Telepon 2')" />
                <x-input wire:model="telepon_2" id="telepon_2" class="bg-gray-100 block mt-1 w-full" type="text" name="telepon_2" :value="old('telepon_2')" required autofocus />
            </div>
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input wire:model="email" id="email" class="bg-gray-100 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
        </fieldset>
        <div class="flex items-center justify-end mt-4">
            <x-button wire:click.prevent="addplantdata" class="ml-3">
                {{ __('Simpan') }}
            </x-button>
        </div>
</div>
