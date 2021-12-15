<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use App\Models\Plant;
use App\Models\Perusahaanproduk;

class RegisteredExport implements FromView
{

    protected $rekapitulasi;

    public function __construct(array $rekapitulasi)
    {
        $this->rekapitulasi = $rekapitulasi;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        // dd($this->rekapitulasi);
        return view('pages.eksporexcel', ['details' => $this->rekapitulasi]);   
    }
}
