<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Illuminate\Http\Request;
use App\Models\Tipesarana;
use App\Models\Plant;
use App\Models\Propinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Register;


class Updateplantdata extends ModalComponent
{
    public $tipesarana;
    public $nama_plant;
    public $plant_id;
    public $perusahaan_id;
    public $tipesarana_id;
    public $alamat_jalan;
    public $alamat_rt;
    public $alamat_rw;
    public $telepon_1;
    public $telepon_2;
    public $propinsi;
    public $propinsi_id;
    public $kabupaten_id;
    public $kecamatan_id;
    public $kelurahan_id;
    public $daftarkabupaten;
    public $daftarkecamatan;
    public $daftarkelurahan;
    public $email;

    public static function modalMaxWidth(): string
    {
        return '6xl';
    }

    public function addplantdata(Request $request)
    {
        $plant = new Plant;
        $plant->perusahaan_id = $this->perusahaan_id;
        $plant->nama_plant = $this->nama_plant;
        $plant->tipesarana_id = $this->tipesarana_id;
        $plant->alamat_jalan = $this->alamat_jalan;
        $plant->alamat_rt = $this->alamat_rt;
        $plant->alamat_rw = $this->alamat_rw;
        $plant->alamat_propinsi = $this->propinsi_id;
        $plant->alamat_kabupaten = $this->kabupaten_id;
        $plant->alamat_kecamatan = $this->kecamatan_id;
        $plant->alamat_kelurahan = $this->kelurahan_id;
        $plant->nomor_telepon_1 = $this->telepon_1;
        $plant->nomor_telepon_2 = $this->telepon_2;
        $plant->email = $this->email;
        
        if($plant->save())
        {
            $this->insertregnumber($plant->id);
        }

        $this->closeModal();
        return redirect(request()->header('Referer'));
    }

    public function updateplantdata(Request $request)
    {
        $plant = Plant::where('id', $this->plant_id);
        $plant->update(['nama_plant' => $this->nama_plant]);
        $plant->update(['tipesarana_id' => $this->tipesarana_id]);
        $plant->update(['alamat_jalan' => $this->alamat_jalan]);
        $plant->update(['alamat_rt' => $this->alamat_rt]);
        $plant->update(['alamat_rw' => $this->alamat_rw]);
        $plant->update(['alamat_propinsi' => $this->propinsi_id]);
        $plant->update(['alamat_kabupaten' => $this->kabupaten_id]);
        $plant->update(['alamat_kecamatan' => $this->kecamatan_id]);
        $plant->update(['alamat_kelurahan' => $this->kelurahan_id]);
        $plant->update(['nomor_telepon_1' => $this->telepon_1]);
        $plant->update(['nomor_telepon_2' => $this->telepon_2]);
        $plant->update(['email' => $this->email]);

        $this->closeModal();
        return redirect(request()->header('Referer'));
    }

    

    public function mount($plant_id)
    {
        $this->propinsi = Propinsi::all();
        $this->plant_id = $plant_id;
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
        $this->tipesarana = Tipesarana::all();
        $plant = Plant::select('plants.*', 'propinsis.nama as propinsi_nama', 'kabupatens.nama as kabupaten_nama', 'kecamatans.nama as kecamatan_nama', 'kelurahans.nama as kelurahan_nama')
                        ->leftJoin('kelurahans', 'plants.alamat_kelurahan', 'kelurahans.id')
                        ->leftJoin('kecamatans', 'plants.alamat_kecamatan', 'kecamatans.id')
                        ->leftJoin('kabupatens', 'plants.alamat_kabupaten', 'kabupatens.id')
                        ->leftJoin('propinsis', 'plants.alamat_propinsi', 'propinsis.id')
                        ->where('plants.id', $this->plant_id)->first();

         $this->tipesarana_id = $plant->tipesarana_id;
         $this->nama_plant = $plant->nama_plant;
         $this->alamat_jalan = $plant->alamat_jalan;
         $this->alamat_rt = $plant->alamat_rt;
         $this->alamat_rw = $plant->alamat_rw;
         $this->telepon_1 = $plant->nomor_telepon_1;
         $this->telepon_2 = $plant->nomor_telepon_2;
         $this->propinsi_id = $plant->alamat_propinsi;
         $this->kabupaten_id = $plant->alamat_kabupaten;
         $this->kecamatan_id = $plant->alamat_kecamatan;
         $this->kelurahan_id = $plant->alamat_kelurahan;
         $this->email = $plant->email;
        return view('livewire.updateplantdata');
    }
}
