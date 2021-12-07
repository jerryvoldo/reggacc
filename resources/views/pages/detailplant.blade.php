
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Produk Plant') }} {{ strtoupper($perusahaan->badan_hukum) }} {{ $perusahaan->nama }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="">
                        <tr>
                            <th align="left">Nama Plant</th>
                            <td>:</td>
                            <td>{{ $plants[0]->nama_plant }}</td>
                        </tr>
                        <tr>
                            <th align="left">No Registrasi GACC Plant</th>
                            <td>:</td>
                            <td>
                                @if(!isset($plants[0]->nomor_registrasi))
                                <div class="bg-yellow-300 text-black rounded rounded-lg border border-yellow-100 px-2 uppercase font-bold text-xs">belum ada</div>
                                @else
                                <div class="bg-green-300 text-black rounded rounded-lg border border-green-100 px-2 uppercase font-bold text-sm">{{ $plants[0]->nomor_registrasi }}</div>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <div class="flex items-center justify-end mt-4">
                        <x-button onclick="Livewire.emit('openModal', 'modaltambahprodukplant', {{ json_encode(['plant_id' => $plants[0]->id] ) }})" class="ml-3">
                            {{ __('+ Tambah Produk') }}
                        </x-button>
                    </div>
                    <table class="border border-collapse w-full table-auto mt-3">
                        <thead>
                            <tr>
                                <th class="border w-2/4 bg-gray-100 py-2">Jenis Produk</th>
                                <th class="border w-1/4 bg-gray-100 py-2">HS Code</th>
                                <th class="border w-1/4 bg-gray-100 py-2">Tanggal Ekspor Terakhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($produks->isEmpty())
                            <tr>
                                <td colspan="3" class="border px-3 text-center py-3">No Data</td>
                            </tr>
                            @else
                            @foreach($produks as $produk)
                            <tr>
                                <td class="border px-3">{{ $produk->nama }}</td>
                                <td class="border px-3">{{ $produk->hs_code }}</td>
                                <td class="border px-3">{{ date('d F Y', $produk->epoch_product_last_export) }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>