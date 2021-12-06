<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Perusahaanproduk;


class Modaltambahprodukplant extends ModalComponent
{
    public $produks;
    public $plant_id;
    public $produk_id;
    public $hscode;
    public $epoch_lasttrade;

    public function addplantproduk(Request $request)
    {
        $produks = new Perusahaanproduk;
        $produks->plant_id = $this->plant_id;
        $produks->produk_id = $this->produk_id;
        $produks->hs_code = $this->hscode;
        $produks->epoch_product_last_export = strtotime($this->epoch_lasttrade);
        $produks->save();
        $this->closeModal();
        return redirect(request()->header('Referer'));
    }

    public function mount($plant_id)
    {
        $this->plant_id = $plant_id;
    }

    public function render()
    {
        $this->produks = Produk::all();
        return view('livewire.modaltambahprodukplant');
    }

    
}
