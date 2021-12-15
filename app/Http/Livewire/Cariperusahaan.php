<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Perusahaan;
use App\Models\Plant;
use App\Models\Propinsi;
use App\Models\Produk;
use App\Models\Perusahaanproduk;
use Illuminate\Support\Facades\DB;

use App\Exports\RegisteredExport;
use Maatwebsite\Excel\Facades\Excel;

use PDF2;

class Cariperusahaan extends Component
{
    public $daftar;
    public $plants;
    public $produks;
    public $propinsi;
    public $propinsi_id;
    public $jenis_produk;
    public $epoch_created_begin;
    public $epoch_created_end;
    public $produk_id;
    public $rekapitulasi;
    public $searchstring;


    public function mount()
    {
         $rekapitulasi = [];
         $this->daftar = Perusahaan::select('perusahaans.id', 'perusahaans.created_at', 'perusahaans.badan_hukum',  'perusahaans.nama as perusahaan_nama', 'propinsis.nama as propinsi_nama', DB::raw('count(DISTINCT (plants.id)) as jumlah_plant'), DB::raw('count(perusahaanproduks.id) as jumlah_produk'))
                    ->leftJoin('propinsis', 'perusahaans.alamat_propinsi', 'propinsis.id')
                    ->leftJoin('plants', 'perusahaans.id', 'plants.perusahaan_id')
                    ->leftJoin('perusahaanproduks', 'plants.id', 'perusahaanproduks.plant_id')
                    ->groupBy('perusahaans.id', 'perusahaans.badan_hukum',  'perusahaans.nama', 'propinsis.nama')
                    ->orderBy('perusahaans.nama', 'asc')
                    ->get();
        foreach($this->daftar as $key_perusahaan=>$perusahaan)
        {
            $this->plants = Plant::select(
                                                'registers.nomor_registrasi', 
                                                'tipesaranas.tipe', 
                                                'plants.id', 
                                                'plants.nama_plant',
                                                'perusahaans.badan_hukum as perusahaan_badan_hukum', 
                                                'perusahaans.nama as perusahaan', 
                                                'plants.alamat_jalan', 
                                                'plants.alamat_rt', 
                                                'plants.alamat_rw', 
                                                'kelurahans.nama as kelurahan', 
                                                'kecamatans.nama as kecamatan', 
                                                'kabupatens.nama as kabupaten', 
                                                'propinsis.nama as propinsi'
                                            )
                                            ->leftJoin('tipesaranas', 'plants.tipesarana_id', 'tipesaranas.id')
                                            ->leftJoin('registers', 'plants.id', 'registers.plant_id')
                                            ->leftJoin('perusahaans', 'plants.perusahaan_id', 'perusahaans.id')
                                            ->leftJoin('kelurahans', 'plants.alamat_kelurahan', 'kelurahans.id')
                                            ->leftJoin('kecamatans', 'plants.alamat_kecamatan', 'kecamatans.id')
                                            ->leftJoin('kabupatens', 'plants.alamat_kabupaten', 'kabupatens.id')
                                            ->leftJoin('propinsis', 'plants.alamat_propinsi', 'propinsis.id')
                                            ->where('plants.perusahaan_id', $perusahaan->id)
                                            ->orderBy('perusahaans.id', 'asc')
                                            ->get()->toArray();
            

            foreach($this->plants as $key_plant => $plant)
            {
                $rekapitulasi[$key_perusahaan][$key_plant]= $plant;
                $produks = Perusahaanproduk::leftJoin('produks', 'perusahaanproduks.produk_id', 'produks.id')
                                            ->select('produks.nama as produk_nama',  'perusahaanproduks.*')
                                            ->where('perusahaanproduks.plant_id', $plant['id'])
                                            ->get()
                                            ->toArray();
                if(!isset($produks['produk_nama']))
                {
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['produk_nama'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['id'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['plant_id'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['produk_id'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['hs_code'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['epoch_product_last_export'] = "no data";
                }
                foreach($produks as $key_produk => $produk)
                {
                    $rekapitulasi[$key_perusahaan][$key_plant]['produks'][$key_produk] = $produk;
                }
            }
        }

        $this->rekapitulasi = $rekapitulasi;
    }

    public function docariperusahaan()
    {
        $rekapitulasi = [];
        $this->daftar = Perusahaan::select('perusahaans.id', 'perusahaans.created_at', 'perusahaans.badan_hukum',  'perusahaans.nama as perusahaan_nama', 'propinsis.nama as propinsi_nama', DB::raw('count(DISTINCT (plants.id)) as jumlah_plant'), DB::raw('count(perusahaanproduks.id) as jumlah_produk'))
                    ->leftJoin('propinsis', 'perusahaans.alamat_propinsi', 'propinsis.id')
                    ->leftJoin('plants', 'perusahaans.id', 'plants.perusahaan_id')
                    ->leftJoin('perusahaanproduks', 'plants.id', 'perusahaanproduks.plant_id')
                    ->where('perusahaans.nama', 'ilike', '%'.$this->searchstring.'%')
                    ->orWhere('perusahaans.npwp', 'like', '%'.$this->searchstring.'%')
                    ->orWhere('perusahaans.created_at', 'between', $this->epoch_created_begin. 'and'. $this->epoch_created_end)
                    ->groupBy('perusahaans.id', 'perusahaans.badan_hukum',  'perusahaans.nama', 'propinsis.nama')
                    ->orderBy('perusahaans.nama', 'asc')
                    ->get();

        foreach($this->daftar as $key_perusahaan=>$perusahaan)
        {
            $this->plants = Plant::select(
                                                'registers.nomor_registrasi', 
                                                'tipesaranas.tipe', 
                                                'plants.id', 
                                                'plants.nama_plant',
                                                'perusahaans.badan_hukum as perusahaan_badan_hukum', 
                                                'perusahaans.nama as perusahaan', 
                                                'plants.alamat_jalan', 
                                                'plants.alamat_rt', 
                                                'plants.alamat_rw', 
                                                'kelurahans.nama as kelurahan', 
                                                'kecamatans.nama as kecamatan', 
                                                'kabupatens.nama as kabupaten', 
                                                'propinsis.nama as propinsi'
                                            )
                                            ->leftJoin('tipesaranas', 'plants.tipesarana_id', 'tipesaranas.id')
                                            ->leftJoin('registers', 'plants.id', 'registers.plant_id')
                                            ->leftJoin('perusahaans', 'plants.perusahaan_id', 'perusahaans.id')
                                            ->leftJoin('kelurahans', 'plants.alamat_kelurahan', 'kelurahans.id')
                                            ->leftJoin('kecamatans', 'plants.alamat_kecamatan', 'kecamatans.id')
                                            ->leftJoin('kabupatens', 'plants.alamat_kabupaten', 'kabupatens.id')
                                            ->leftJoin('propinsis', 'plants.alamat_propinsi', 'propinsis.id')
                                            ->where('plants.perusahaan_id', $perusahaan->id)
                                            ->orderBy('perusahaans.id', 'asc')
                                            ->get()->toArray();
            

            foreach($this->plants as $key_plant => $plant)
            {
                $rekapitulasi[$key_perusahaan][$key_plant]= $plant;
                $produks = Perusahaanproduk::leftJoin('produks', 'perusahaanproduks.produk_id', 'produks.id')
                                            ->select('produks.nama as produk_nama',  'perusahaanproduks.*')
                                            ->where('perusahaanproduks.plant_id', $plant['id'])
                                            ->get()
                                            ->toArray();
                if(!isset($produks['produk_nama']))
                {
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['produk_nama'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['id'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['plant_id'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['produk_id'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['hs_code'] = "no data";
                     $rekapitulasi[$key_perusahaan][$key_plant]['produks'][0]['epoch_product_last_export'] = "no data";
                }
                foreach($produks as $key_produk => $produk)
                {
                    $rekapitulasi[$key_perusahaan][$key_plant]['produks'][$key_produk] = $produk;
                }
            }
        }

        $this->rekapitulasi = $rekapitulasi;
    }

    public function eksporexcel()
    {
        $export = new RegisteredExport($this->rekapitulasi);
        return Excel::download($export, 'registeredperusahaan.xlsx');
    }

    public function eksporpdf()
    {
        return response()->streamDownload(function () {
            $pdf = PDF2::loadview('pages.cetakdetail', ['details' => $this->rekapitulasi]);
            echo $pdf->stream();
        }, 'registered.pdf');
    }

    public function render()
    {
        $this->propinsi = Propinsi::orderBy('nama', 'asc')->get();
        $this->jenis_produk = Produk::orderBy('nama', 'asc')->get();
        return view('livewire.cariperusahaan');
    }
}
