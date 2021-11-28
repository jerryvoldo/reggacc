
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Perusahaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     @if($perusahaan[0]->nomor_registrasi != null)
                    <div class="mb-4 bg-green-500 border border-green-600 p-1 rounded rounded-xl text-white font-bold text-center text-2xl">
                        {{ $perusahaan[0]->nomor_registrasi }}
                    </div>
                    @endif
                    <table class="border border-collapse w-full table-auto">
                        <tr>
                            <th class="border text-right px-3 py-2">Nama Perusahaan</th>
                            <td class="border px-3">{{ strtoupper($perusahaan[0]->badan_hukum) }} {{ $perusahaan[0]->nama }}</td>
                        </tr>
                        <tr>
                            <th class="border text-right px-3 py-2">Alamat Perusahaan</th>
                            <td class="border px-3">Jl. {{ $perusahaan[0]->alamat_jalan }}, RT {{ $perusahaan[0]->alamat_rt }} RW {{ $perusahaan[0]->alamat_rw }}, Kelurahan {{ $perusahaan[0]->kelurahan }}, Kecamatan {{ $perusahaan[0]->kecamatan }}</td>
                        </tr>
                        <tr>
                            <th class="border text-right px-3 py-2">Kota/Kabupaten</th>
                            <td class="border px-3">{{ $perusahaan[0]->kabupaten }}</td>
                        </tr>
                        <tr>
                            <th class="border text-right px-3 py-2">Propinsi</th>
                            <td class="border px-3">{{ $perusahaan[0]->propinsi }}</td>
                        </tr>
                        <tr>
                            <th class="border text-right px-3 py-2">Tipe Perusahaan</th>
                            <td class="border px-3">{{ $perusahaan[0]->tipesarana }}</td>
                        </tr>
                        <tr>
                            <th class="border text-right px-3">Rincian Produk </th>
                            <td class="border p-3">
                                <table class="w-full">
                                    <thead>
                                        <tr>
                                            <th class="border bg-gray-100 p-1">Produk</th>
                                            <th class="border bg-gray-100 p-1">HS Code</th>
                                            <th class="border bg-gray-100 p-1">Tanggal Terakhir Ekspor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($perusahaan as $produk)
                                        <tr>
                                            <td class="border pl-2">{{ $produk->produk_nama }}</td>
                                            <td class="border text-center">{{ $produk->hs_code }}</td>
                                            <td class="border text-center">{{ date('d F Y', $produk->epoch_product_last_export) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <div>
                        @if($perusahaan[0]->nomor_registrasi == null)
                        <form method="POST" action="{{ route('daftar.insertregnumber') }}">
                            @csrf
                            <input type="hidden" name="perusahaan_id" value="{{ $perusahaan[0]->id }}">
                        <button type="submit" class="block w-full mt-4 hover:bg-green-400 uppercase text-xs hover:font-bold border-green-800 border bg-green-500 text-white p-1 rounded">Generate No Registrasi</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>