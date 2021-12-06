<div>
    <div class="flex items-center justify-end mt-2 mb-2">
        <x-button class="ml-3" wire:click.prevent="$emit('openModal', 'modaltambahplant')">
            {{ __('Tambah Plant') }}
        </x-button>
    </div>
    <table class="border border-collapse w-full table-auto">
        <thead>
            <tr>
                <th class="border w-1/5 bg-gray-100 py-2">No. Registrasi GACC</th>
                <th class="border w-2/5 bg-gray-100 py-2">Nama Plant</th>
                <th class="border w-1/5 bg-gray-100 py-2">Provinsi</th>
                <th class="border w-1/5 bg-gray-100 py-2"></th>
            </tr>
        </thead>
        <tbody>
            {{ var_dump($daftarplant) }}
            @if(empty($daftarplant))
            <tr>
                <td colspan="4" class="text-center">NO DATA</td>
            </tr>
            @else
            @foreach($daftarplant as $plant)
            <tr>
                <td>{{$plant->nama_plant}}</td>
                <td>{{$plant->nama_plant}}</td>
                <td>{{$plant->nama_plant}}</td>
                <td>{{$plant->nama_plant}}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
