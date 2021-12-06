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


class Modaltambahplant extends ModalComponent
{
    public $tipesarana;
    public $nama_plant;
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

    private function insertregnumber($plant_id)
    {
        $propinsi_id = Plant::select('alamat_propinsi as propinsi')->where('id', $plant_id)->first();
        $newregnumber = new Register;
        $newregnumber->nomor_registrasi = $this->generateregnumber($propinsi_id->propinsi, $plant_id);
        $newregnumber->plant_id = $plant_id;

        $newregnumber->save();
    }

    private function generateregnumber($propinsi_id, $plant_id)
    {
        $urutan = '';
        $prefix = 'CR-IFDA-';
        $jumlah_digit = strlen ((string) $plant_id);
        switch ($jumlah_digit) {
            case 1:
                $urutan = '000'.$plant_id;
                break;

            case 2:
                $urutan = '00'.$plant_id;
                break;

            case 3:
                $urutan = '0'.$plant_id;
                break;

            case 4:
                $urutan = $plant_id;
                break;
        }
        $kode_cina = Propinsi::select('kode_cina')->where('id', $propinsi_id)->first();
        
        return $prefix.$urutan."-".$kode_cina->kode_cina;
    }

    public function mount($perusahaan_id)
    {
        $this->propinsi = Propinsi::all();
        $this->perusahaan_id = $perusahaan_id;
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
        return view('livewire.modaltambahplant');
    }
}
