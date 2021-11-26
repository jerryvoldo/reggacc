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
                    <table class="border border-collapse w-full table-auto">
                        <tr>
                            <th>Nama Perusahaan</th>
                            <td>{{ strtoupper($perusahaan[0]->badan_hukum) }} {{ $perusahaan[0]->nama }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Perusahaan</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Propinsi</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Kota/Kabupaten</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Tipe Perusahaan</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Rincian Produk </th>
                            <td>
                                <table>
                                    <thead>
                                        <th>Produk</th>
                                        <th>HS Code</th>
                                        <th>Tanggal Terakhir Ekspor</th>
                                    </thead>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>