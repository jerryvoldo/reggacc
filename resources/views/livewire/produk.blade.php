<div>
    <div class="flex flex-row gap-4">
        <div class="mt-4 flex-1">
            <x-label for="produk" :value="__('Produk')" />
            <select class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="produks.0">
                @foreach($produks as $produk)
                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 flex-1">
            <x-label for="hscode" :value="__('HS Code')" />
            <x-input id="hscode" class="bg-gray-100 block" type="text" name="hscode.0" :value="old('hscode')" required autofocus />
        </div>
        <div class="mt-4 flex-1">
            <x-label for="latesttrade" :value="__('Latest Date Of Trade to China')" />
            <x-input id="latesttrade" class="bg-gray-100 block" type="date" name="latesttrade.0" :value="old('latesttrade')" required autofocus />
        </div>
        <div class="flex items-center justify-end mt-4">
            <button wire:click.prevent="add({{ $i }})" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                +
            </button>
        </div>
    </div>

    @foreach($inputs as $key => $value)
    <div class="flex flex-row gap-4">
        <div class="mt-4 flex-1">
            <x-label for="produk" :value="__('Produk')" />
            <select class="bg-gray-100 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="produks.{{ $value }}">
                @foreach($produks as $produk)
                <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4 flex-1">
            <x-label for="hscode" :value="__('HS Code')" />
            <x-input id="hscode" class="bg-gray-100 block" type="text" name="hscode.{{ $value }}" :value="old('hscode')" required autofocus />
        </div>
        <div class="mt-4 flex-1">
            <x-label for="latesttrade" :value="__('Latest Date Of Trade to China')" />
            <x-input id="latesttrade" class="bg-gray-100 block" type="date" name="latesttrade.{{ $value }}" :value="old('latesttrade')" required autofocus />
        </div>
        <div class="flex items-center justify-end mt-4">
            <button wire:click.prevent="remove({{ $key }})" class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                -
            </button>
        </div>
    </div>
    @endforeach
</div>
