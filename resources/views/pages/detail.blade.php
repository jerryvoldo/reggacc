
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
                            <th class="border text-right px-3">Daftar Plant</th>
                            <td class="border p-3">
                                <div class="flex items-center justify-end mt-2 mb-2">
                                    <x-button class="ml-3" onclick="Livewire.emit('openModal', 'modaltambahplant', {{ json_encode(['perusahaan_id' => $perusahaan[0]->id] ) }})">
                                        {{ __('+ Tambah Plant') }}
                                    </x-button>
                                </div>
                                <table class="w-full">
                                    <thead>
                                        <tr>
                                            <th class="border bg-gray-100 p-1 w-1/5">Registrasi GACC</th>
                                            <th class="border bg-gray-100 p-1 w-1/5">Nama</th>
                                            <th class="border bg-gray-100 p-1 w-2/5">Alamat</th>
                                            <th class="border bg-gray-100 p-1 w-1/5">Propinsi</th>
                                            <th class="border bg-gray-100 p-1">Data Registrasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($plants as $plant)
                                        <tr>
                                            <td class="border p-1">
                                                @if(!isset($plant->nomor_registrasi))
                                                <div class="text-center bg-yellow-300 text-black rounded rounded-lg border border-yellow-100 px-2 uppercase font-bold text-xs">belum ada</div>
                                                @else
                                                <div class="text-center bg-green-300 text-whitek rounded rounded-lg border border-green-100 px-2 uppercase font-bold text-xs">{{ $plants[0]->nomor_registrasi }}</div>
                                                @endif
                                            </td>
                                            <td class="border p-1">{{ $plant->nama_plant }}</td>
                                            <td class="border p-1">Jl. {{ $plant->alamat_jalan }}, RT {{ $plant->alamat_rt }} RW {{ $plant->alamat_rw }}, Kelurahan {{ $plant->kelurahan }}, Kecamatan {{ $plant->kecamatan }}</td>
                                                <td class="border p-1">{{ $plant->propinsi }}</td>
                                            <td class="border p-1">
                                                <div class="border border-gray-100 p-0.5 text-center uppercase text-xs font-bold hover:bg-gray-400  rounded rounded-lg bg-gray-300"><a href="{{ route('daftar.show.plant', $plant->id) }}">Lihat</a></div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>