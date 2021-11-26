<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk as Daftarproduk;

class Produk extends Component
{

    public $produks;
    public $i = 1;
    public $inputs = [1];

    public function mount()
    {
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
