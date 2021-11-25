<div class="flex flex-row gap-3 flex-1">
    <div class="mt-4 flex-1">
        <x-label for="propinsi" :value="__('Propinsi')" />
        <select wire:model="propinsi_id" wire:change="loadKabupaten" class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_propinsi">
            <option value="">--Pilih propinsi--</option>
            @foreach($propinsi as $pro)
            <option value="{{ $pro->id }}">{{ $pro->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-4 flex-1">
        <x-label for="kotakabupaten" :value="__('Kota/Kabupaten')" />
        <select wire:model="kabupaten_id" wire:change="loadKecamatan" class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_kabupaten">
            @if($daftarkabupaten != null)
                @foreach($daftarkabupaten as $kabupaten)
                <option value="{{ $kabupaten->id }}">{{ $kabupaten->nama }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="mt-4 flex-1">
        <x-label for="kecamatan" :value="__('Kecamatan')" />
        <select wire:model="kecamatan_id" wire:change="loadKelurahan" class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_kecamatan">
            @if($daftarkecamatan != null)
                @foreach($daftarkecamatan as $kecamatan)
                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="mt-4 flex-1">
        <x-label for="kelurahan" :value="__('Kelurahan')" />
        <select  class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat_kelurahan">
            @if($daftarkelurahan != null)
                @foreach($daftarkelurahan as $kelurahan)
                <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
