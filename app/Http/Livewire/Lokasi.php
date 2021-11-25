<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Propinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class Lokasi extends Component
{

    public $propinsi;
    public $propinsi_id;
    public $kabupaten_id;
    public $kecamatan_id;
    public $kelurahan_id;
    public $daftarkabupaten;
    public $daftarkecamatan;
    public $daftarkelurahan;

    public function mount()
    {
        $this->propinsi = Propinsi::all();
    }

    public function loadKabupaten()
    {
        $this->daftarkabupaten = Kabupaten::select('id', 'nama')->where('propinsi_id', $this->propinsi_id)->get();
        $this->daftarkecamatan = null;
        $this->daftarkelurahan = null;
    }

    public function loadKecamatan()
    {
        $this->daftarkecamatan = Kecamatan::select('id', 'nama')->where('kabupaten_id', $this->kabupaten_id)->get();
        $this->daftarkelurahan = null;
    }

    public function loadKelurahan()
    {
        $this->daftarkelurahan = Kelurahan::select('id', 'nama')->where('kecamatan_id', $this->kecamatan_id)->get();
    }

    public function render()
    {
        
        return view('livewire.lokasi');
    }
}
