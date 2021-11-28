<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipesarana;
use App\Models\Kabupaten;
use App\Models\Perusahaan;
use App\Models\Perusahaanproduk;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function viewformdaftar()
    {
        
        $tipesarana = Tipesarana::all();
        return view('pages.form-daftar', ['tipesarana' => $tipesarana]);
    }

    public function storeformdaftar(Request $request)
    {
        $perusahaan = new Perusahaan;
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
            foreach($request->produk as $key=>$item)
            {
                $produk = new Perusahaanproduk;
                $produk->perusahaan_id = $perusahaan->id;
                $produk->produk_id = $item;
                $produk->hs_code = $request->hscode[$key];
                $produk->epoch_product_last_export = strtotime($request->latesttrade[$key]);
                $produk->save();
            }
        }
        return redirect()->route('daftar.daftar');    
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
