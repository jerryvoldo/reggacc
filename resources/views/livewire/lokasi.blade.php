<div>
    <div class="mt-4">
        <x-label for="propinsi" :value="__('Propinsi')" />
        <select wire:model="propinsi_id" wire:change="loadKabupaten" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_propinsi">
            <option value="" disabled>--Pilih propinsi--</option>
            @foreach($propinsi as $pro)
            <option value="{{ $pro->id }}">{{ $pro->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4">
        <x-label for="kotakabupaten" :value="__('Kota/Kabupaten')" />
        <select wire:model="kabupaten_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_kabupaten">
            @if($daftarkabupaten != null)
                @foreach($daftarkabupaten as $kabupaten)
                <option value="{{ $kabupaten->id }}">{{ $kabupaten->nama }}</option>
                @endforeach
            @else
                <option value="" disabled>--Pilih kota/kabupaten--</option>
            @endif
        </select>
    </div>
    <div class="mt-4">
        <x-label for="kecamatan" :value="__('Kecamatan')" />
        <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_kecamatan">
            <option value="" disabled>--Pilih kecamatan--</option>
            <option value="pt">PT</option>
            <option value="cv">CV</option>
        </select>
    </div>
    <div class="mt-4">
        <x-label for="kelurahan" :value="__('Kelurahan')" />
        <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_kelurahan">
            <option value="" disabled>--Pilih kelurahan--</option>
            <option value="pt">PT</option>
            <option value="cv">CV</option>
        </select>
    </div>
</div>
