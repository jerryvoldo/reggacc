<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Perusahaan;

class Cariperusahaan extends Component
{
    public $daftar;
    public $searchstring;


    public function mount()
    {
         $this->daftar = Perusahaan::select('perusahaans.id', 'perusahaans.badan_hukum',  'perusahaans.nama as perusahaan_nama', 'propinsis.nama as propinsi_nama')
                    ->leftJoin('propinsis', 'perusahaans.alamat_propinsi', 'propinsis.id')
                    ->orderBy('perusahaans.nama', 'asc')
                    ->get();
    }

    public function docariperusahaan()
    {
        $this->daftar = Perusahaan::select('perusahaans.id', 'perusahaans.badan_hukum', 'registers.nomor_registrasi', 'perusahaans.nama as perusahaan_nama', 'propinsis.nama as propinsi_nama')
                    ->leftJoin('registers', 'perusahaans.id', 'registers.perusahaan_id')
                    ->leftJoin('propinsis', 'perusahaans.alamat_propinsi', 'propinsis.id')
                    ->where('perusahaans.nama', 'ilike', '%'.$this->searchstring.'%')
                    ->orderBy('perusahaans.nama', 'asc')
                    ->get();
    }

    public function render()
    {
        return view('livewire.cariperusahaan');
    }
}
