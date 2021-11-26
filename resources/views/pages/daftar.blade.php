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
                    <div class="mb-4 ">
                    <a href="{{ route('form.daftar') }}" class="px-1 py-2 bg-green-400 rounded hover:bg-green-200 text-sm">Registrasi Baru</a>
                    </div>
                    <table class="border border-collapse w-full table-auto">
                        <thead>
                            <tr>
                                <th class="border w-1/4 bg-gray-100 py-2">No. Registrasi GACC</th>
                                <th class="border w-1/4 bg-gray-100 py-2">Nama Perusahaan</th>
                                <th class="border w-1/4 bg-gray-100 py-2">Provinsi</th>
                                <th class="border w-1/4 bg-gray-100 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($daftar->isEmpty())
                            <tr>
                                <td class="border text-center" colspan="4">No data</td>
                            </tr>
                            @else
                            @foreach($daftar as $d)
                            <tr>
                                <td class="border p-1">
                                    @if($d->nomor_registrasi == null)
                                    <div class="bg-yellow-500 font-black text-xs uppercase border border-yellow-600 px-2 py-1 rounded rounded-lg text-center">belum ada</div>
                                    @else
                                    {{ $d->nomor_registrasi }}
                                    @endif
                                </td>
                                <td class="border">{{ strtoupper($d->badan_hukum) }} {{ $d->perusahaan_nama }}</td>
                                <td class="border">{{ $d->propinsi_nama }}</td>
                                <td class="border text-center">
                                    <a class="bg-gray-700 hover:bg-gray-400" href="{{ route('daftar.show', $d->id) }}">detail</a>
                                </td>
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
