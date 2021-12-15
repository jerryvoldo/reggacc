<div>
    <div class="mb-4">
        Cari Perusahaan
        <x-input id="nama" class="bg-gray-100 block mt-1 w-full" type="text" name="cariperusahaan" wire:model="searchstring" wire:keyup="docariperusahaan" required autofocus />
    </div>
    <div>
        <fieldset class="border border-gray-300 p-3 rounded-lg">
            <legend class="text-xs font-bold uppercase text-gray-500">Filter</legend>
            <div class="">
                <x-label for="epoch_created" :value="__('Tanggal Register')" />
                <div class="flex flex-row gap-2 items-center">
                    <x-input wire:model="epoch_created_begin" id="epoch_created_begin" class="bg-gray-100 block mt-1 w-full" type="date" name="epoch_created_begin" :value="old('epoch_created_begin')" required autofocus />
                    s.d
                    <x-input wire:model="epoch_created_end" id="epoch_created_end" class="bg-gray-100 block mt-1 w-full" type="date" name="epoch_created_end" :value="old('epoch_created_end')" required autofocus />
                </div>
                <div class="mt-2">
                    <x-label for="propinsi" :value="__('Propinsi')" />
                    <select wire:model="propinsi_id"  class="w-full bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="propinsi_id">
                        <option value="">--Pilih propinsi--</option>
                        @foreach($propinsi as $pro)
                        <option value="{{ $pro->id }}">{{ $pro->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-2">
                    <x-label for="jenisproduk" :value="__('Jenis Produk')" />
                    <select wire:model="produk_id" class="w-full bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="produk_id">
                        <option>--Pilih jenis produk--</option>
                        @foreach($jenis_produk as $produk)
                        <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button wire:click.prevent="docariperusahaan" class="ml-3">
                        {{ __('Filter') }}
                    </x-button>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="mt-4 mb-2 flex justify-end">
        <div class="flex flex-row gap-3">
            <a href="{{ route('form.daftar') }}" class="px-2 py-2 bg-blue-400 rounded hover:bg-blue-200 text-xs font-bold uppercase">Registrasi Baru</a>
            <a href="javascript:void(0);" wire:click="eksporpdf" class="px-2 py-2 bg-red-400 rounded hover:bg-red-200 text-xs font-bold uppercase">PDF</a>
            <a href="javascript:void(0);" wire:click="eksporexcel" class="px-2 py-2 bg-green-400 rounded hover:bg-green-200 text-xs font-bold uppercase">Excel</a>
        </div>
    </div>
    <table class="border border-collapse w-full table-auto">
        <thead>
            <tr>
                <th class="border w-1/5 bg-gray-100 py-2">Nama Perusahaan</th>
                <th class="border w-1/5 bg-gray-100 py-2">Propinsi</th>
                <th class="border bg-gray-100 py-2">Plant</th>
                <th class="border bg-gray-100 py-2">Produk</th>
                <th class="border w-1/5 bg-gray-100 py-2">Created at</th>
                <th class="border w-1/5 bg-gray-100 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @if($daftar->isEmpty())
            <tr>
                <td class="border text-center py-6" colspan="5">
                    <div class="mb-4 capitalize">
                        No data
                    </div>
                </td>
            </tr>
            @else
            @foreach($daftar as $d)
            <tr>
                <td class="border p-1">{{ strtoupper($d->badan_hukum) }} {{ $d->perusahaan_nama }}</td>
                <td class="border p-1">{{ $d->propinsi_nama }}</td>
                <td class="border p-1 text-right">{{ $d->jumlah_plant }}</td>
                <td class="border p-1 text-right">{{ $d->jumlah_produk }}</td>
                <td class="border p-1 text-center">{{ date('d-m-Y H:i', strtotime($d->created_at)) }}</td>
                <td class="border p-1 text-center flex flex-row gap-4">
                    <a class="bg-gray-700 hover:bg-gray-400 px-2 rounded text-white" href="{{ route('daftar.show', $d->id) }}">+ Plant</a>

                    <a class="bg-yellow-500 hover:bg-yellow-400 px-1 rounded text-white" href="{{ route('daftar.edit', $d->id) }}">Edit</a>

                    <form method="POST" action="{{ route('daftar.destroy', $d->id) }}">
                        @csrf
                        <input type="hidden" name="perusahaan_id" value="{{ $d->id }}">
                        <button type="submit" class="bg-red-700 hover:bg-red-400 px-1 rounded text-white">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
