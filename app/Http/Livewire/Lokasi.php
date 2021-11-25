<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Propinsi;
use App\Models\Kabupaten;

class Lokasi extends Component
{

    public $propinsi;
    public $propinsi_id;
    public $kabupaten_id;
    public $kecamatan_id;
    public $kelurahan_id;
    public $daftarkabupaten;

    public function mount()
    {
        $this->propinsi = Propinsi::all();
        $this->daftarkabupaten = null;
    }

    public function loadKabupaten()
    {
        $this->daftarkabupaten = Kabupaten::select('id', 'nama')->where('propinsi_id', $this->propinsi_id)->get();
    }

    public function render()
    {
        
        return view('livewire.lokasi');
    }
}
