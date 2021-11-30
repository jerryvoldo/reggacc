<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Perusahaan;
use App\Models\Propinsi;
use App\Models\Tipesarana;
use App\Models\Perusahaanproduk;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.daftar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($perusahaan_id)
    {
        //
        $perusahaan = Perusahaan::select('registers.nomor_registrasi', 'perusahaans.*', 'produks.nama as produk_nama', 'perusahaanproduks.hs_code', 'perusahaanproduks.epoch_product_last_export', 'kelurahans.nama as kelurahan', 'kecamatans.nama as kecamatan', 'kabupatens.nama as kabupaten', 'propinsis.nama as propinsi', 'tipesaranas.tipe as tipesarana')
                    ->leftJoin('perusahaanproduks', 'perusahaans.id', 'perusahaanproduks.perusahaan_id')
                    ->leftJoin('produks', 'perusahaanproduks.produk_id', 'produks.id')
                    ->leftJoin('kelurahans', 'perusahaans.alamat_kelurahan', 'kelurahans.id')
                    ->leftJoin('kecamatans', 'perusahaans.alamat_kecamatan', 'kecamatans.id')
                    ->leftJoin('kabupatens', 'perusahaans.alamat_kabupaten', 'kabupatens.id')
                    ->leftJoin('propinsis', 'perusahaans.alamat_propinsi', 'propinsis.id')
                    ->leftJoin('tipesaranas', 'perusahaans.tipesarana_id', 'tipesaranas.id')
                    ->leftJoin('registers', 'perusahaans.id', 'registers.perusahaan_id')
                    ->where('perusahaans.id', $perusahaan_id)
                    ->get();
        return view('pages.detail', ['perusahaan' => $perusahaan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($perusahaan_id)
    {
        //
        $tipesarana = Tipesarana::all();
        $perusahaan = Perusahaan::select('registers.nomor_registrasi', 'perusahaans.*', 'produks.nama as produk_nama', 'perusahaanproduks.hs_code', 'perusahaanproduks.epoch_product_last_export', 'kelurahans.nama as kelurahan', 'kecamatans.nama as kecamatan', 'kabupatens.nama as kabupaten', 'propinsis.nama as propinsi', 'tipesaranas.tipe as tipesarana')
                    ->leftJoin('perusahaanproduks', 'perusahaans.id', 'perusahaanproduks.perusahaan_id')
                    ->leftJoin('produks', 'perusahaanproduks.produk_id', 'produks.id')
                    ->leftJoin('kelurahans', 'perusahaans.alamat_kelurahan', 'kelurahans.id')
                    ->leftJoin('kecamatans', 'perusahaans.alamat_kecamatan', 'kecamatans.id')
                    ->leftJoin('kabupatens', 'perusahaans.alamat_kabupaten', 'kabupatens.id')
                    ->leftJoin('propinsis', 'perusahaans.alamat_propinsi', 'propinsis.id')
                    ->leftJoin('tipesaranas', 'perusahaans.tipesarana_id', 'tipesaranas.id')
                    ->leftJoin('registers', 'perusahaans.id', 'registers.perusahaan_id')
                    ->where('perusahaans.id', $perusahaan_id)
                    ->get();
        return view('pages.edit', ['perusahaan' => $perusahaan, 'tipesarana' => $tipesarana]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // dd($request);
        $perusahaan = Perusahaan::find($request->perusahaan_id);
        $perusahaan->badan_hukum = $request->badan_hukum;
        $perusahaan->nama = $request->nama;
        $perusahaan->tipesarana_id = $request->tipesarana;
        $perusahaan->alamat_jalan = $request->alamat_jalan;
        $perusahaan->alamat_rt = $request->alamat_rt;
        $perusahaan->alamat_rw = $request->alamat_rw;
        $perusahaan->alamat_propinsi = $request->alamat_propinsi;
        $perusahaan->alamat_kabupaten = $request->alamat_kabupaten;
        $perusahaan->alamat_kecamatan = $request->alamat_kecamatan;
        $perusahaan->alamat_kelurahan = $request->alamat_kelurahan;
        $perusahaan->nomor_telepon_1 = $request->telepon_1;
        $perusahaan->nomor_telepon_2 = $request->telepon_2;
        $perusahaan->email = $request->email;

        if($perusahaan->save())
        {
            foreach($request->perusahaanproduk_id as $key=>$item)
            {
                $produk = Perusahaanproduk::find($item);
                $produk->perusahaan_id = $perusahaan->id;
                $produk->hs_code = $request->hscode[$key];
                $produk->epoch_product_last_export = strtotime($request->latesttrade[$key]);
                $produk->save();
            }
        }
        return redirect()->route('daftar.daftar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $perusahaan = Perusahaan::find($request->perusahaan_id);
        if($perusahaan->delete())
        {
            $produk = Perusahaanproduk::find($request->perusahaan_id);
            $produk->delete();
        }
        return redirect()->route('daftar.daftar');
    }

    public function insertregnumber(Request $request)
    {
        $propinsi_id = Perusahaan::select('alamat_propinsi as propinsi')->where('id', $request->perusahaan_id)->first();
        $newregnumber = new Register;
        $newregnumber->nomor_registrasi = $this->generateregnumber($propinsi_id->propinsi, $request->perusahaan_id);
        $newregnumber->perusahaan_id = $request->perusahaan_id;

        $newregnumber->save();

        return redirect()->route('daftar.daftar');
    }

    private function generateregnumber($propinsi_id, $perusahaan_id)
    {
        $urutan = '';
        $prefix = 'CR-IFDA-';
        $jumlah_digit = strlen ((string) $perusahaan_id);
        switch ($jumlah_digit) {
            case 1:
                $urutan = '000'.$perusahaan_id;
                break;

            case 2:
                $urutan = '00'.$perusahaan_id;
                break;

            case 3:
                $urutan = '0'.$perusahaan_id;
                break;

            case 4:
                $urutan = $perusahaan_id;
                break;
        }
        $kode_cina = Propinsi::select('kode_cina')->where('id', $propinsi_id)->first();
        
        return $prefix.$urutan."-".$kode_cina->kode_cina;
    }
}
