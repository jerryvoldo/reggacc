<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Perusahaan;

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
        $daftar = Perusahaan::select('perusahaans.id', 'perusahaans.badan_hukum', 'registers.nomor_registrasi', 'perusahaans.nama as perusahaan_nama', 'propinsis.nama as propinsi_nama')
                    ->leftJoin('registers', 'perusahaans.id', 'registers.perusahaan_id')
                    ->leftJoin('propinsis', 'perusahaans.alamat_propinsi', 'propinsis.id')
                    ->paginate(20);
        return view('pages.daftar', ['daftar' => $daftar]);
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
        $perusahaan = Perusahaan::select('perusahaans.*', 'produks.nama', 'perusahaanproduks.hs_code', 'perusahaanproduks.epoch_product_last_export')
                    ->leftJoin('perusahaanproduks', 'perusahaans.id', 'perusahaanproduks.perusahaan_id')
                    ->leftJoin('produks', 'perusahaanproduks.produk_id', 'produks.id')
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
