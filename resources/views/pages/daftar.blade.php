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
                    <a href="{{ route('form.daftar') }}" class="px-1 py-2 bg-green-400 rounded mb-4 hover:bg-green-200 text-sm">Registrasi Baru</a>
                    <table class="border border-collapse w-full table-auto">
                        <thead>
                            <tr>
                                <th class="border w-1/4">No. Registrasi GACC</th>
                                <th class="border w-1/4">Nama Perusahaan</th>
                                <th class="border w-1/4">Provinsi</th>
                                <th class="border w-1/4">Detail</th>
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
                                <td class="border">{{ $d->nomor_registrasi }}</td>
                                <td class="border">{{ $d->nama }}</td>
                                <td class="border">{{ $d->provinsi }}</td>
                                <td class="border">detail</td>
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
