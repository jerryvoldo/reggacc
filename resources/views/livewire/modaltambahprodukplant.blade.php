<div class="p-4">
    <fieldset class="border border-gray-300 p-3 rounded-lg mt-5">
        <legend class="text-xs font-bold uppercase text-gray-500">Tambah Data Produk</legend>
        <div class="mt-4">
            <x-label for="tipeperusahaan" :value="__('Tipe Plant')" />
            <select wire:model="produk_id" class="w-full bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="tipesarana">
                <option>--Pilih jenis produk--</option>
                @foreach($produks as $produk)
                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <x-label for="hscode" :value="__('HS Code')" />
            <x-input wire:model="hscode" id="hscode" class="bg-gray-100 block mt-1 w-full" type="text" name="hscode" :value="old('hscode')" required autofocus />
        </div>
        <div class="mt-4">
            <x-label for="epoch_lasttrade" :value="__('Tanggal Terakhir Ekspor')" />
            <x-input wire:model="epoch_lasttrade" id="epoch_lasttrade" class="bg-gray-100 block mt-1 w-full" type="date" name="epoch_lasttrade" :value="old('epoch_lasttrade')" required autofocus />
        </div>
    </fieldset>
    <div class="flex items-center justify-end mt-4">
        <x-button wire:click.prevent="addplantproduk" class="ml-3">
            {{ __('Tambah') }}
        </x-button>
    </div>
</div>
