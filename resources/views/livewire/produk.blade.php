<div>
    @foreach($inputs as $key => $value)
    <div class="flex flex-row  gap-4" wire:key="kunci{{ $loop->index }}">
        <div class="mt-4 flex-1">
            <select wire:key="produk-nama-{{ $key }}" class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="produk[]">
                @foreach($produks as $produk)
                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 flex-1">
            <input wire:key="produk-hscode-{{ $key }}" id="hscode"  class="bg-gray-100 block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text"  name="hscode[]" required autofocus />
        </div>
        <div class="mt-4 flex-1">
            <input wire:key="produk-latesttrade-{{ $key }}" id="latesttrade" class="bg-gray-100 block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="date" name="latesttrade[]"  required autofocus />
        </div>
        <div class="flex items-center justify-end mt-4">
        @if($key == 0)
            <button wire:click.prevent="add({{ $i }})" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                +
            </button>
        @else
            <button wire:click.prevent="remove({{ $key }})" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                -
            </button>
        @endif
        </div>
    </div>
    @endforeach
</div>
