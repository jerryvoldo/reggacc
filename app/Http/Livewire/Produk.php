<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk as Daftarproduk;
use App\Models\Perusahaanproduk;

class Produk extends Component
{

    public $produks;
    public $produks_id = [];
    public $perusahaanproduk;
    public $i = 1;
    public $inputs = [];

    public function mount($perusahaan_id)
    {
        if(isset($perusahaan_id))
        {
            $a=0;
            $this->produks_id = [];
            $this->perusahaanproduk = Perusahaanproduk::select('id', 'produk_id', 'hs_code', 'epoch_product_last_export')->where('perusahaan_id', $perusahaan_id)->get();
            foreach($this->perusahaanproduk as $key => $value)
            {
                array_push($this->produks_id, $value->produk_id);
                $this->add($a);
            }
        }
        $this->produks = Daftarproduk::all();
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        return view('livewire.produk');
    }
}
