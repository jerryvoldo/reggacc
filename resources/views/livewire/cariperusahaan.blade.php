<div>
    <div class="mb-4">
        Cari Perusahaan
        <x-input id="nama" class="bg-gray-100 block mt-1 w-full" type="text" name="cariperusahaan" wire:model="searchstring" wire:keydown="docariperusahaan" required autofocus />
    </div>
    <div wire:loading class="my-6 w-full bg-gray-100 p-4 text-center rounded-t-none shadow-lg">
        Searching...
    </div>
    <div class="mt-4 mb-2 flex justify-end">
        <a href="{{ route('form.daftar') }}" class="px-2 py-2 bg-green-400 rounded hover:bg-green-200 text-xs font-bold uppercase">Registrasi Baru</a>
    </div>
    <table class="border border-collapse w-full table-auto">
        <thead>
            <tr>
                <th class="border w-1/5 bg-gray-100 py-2">Nama Perusahaan</th>
                <th class="border w-1/5 bg-gray-100 py-2">Propinsi</th>
                <th class="border w-1/5 bg-gray-100 py-2">Jumlah Plant</th>
                <th class="border w-1/5 bg-gray-100 py-2">Jumlah Produk</th>
                <th class="border w-1/5 bg-gray-100 py-2"></th>
            </tr>
        </thead>
        <tbody>
            @if($daftar->isEmpty())
            <tr>
                <td class="border text-center py-6" colspan="4">
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
                <td class="border p-1">{{ $d->jumlah_plant }}</td>
                <td class="border p-1">{{ $d->jumlah_produk }}</td>
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
