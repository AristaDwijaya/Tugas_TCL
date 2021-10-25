<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('transaksi')->get();
        return view('index',['transaksi' => $transaksi]);
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('create',['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
        Kategori::create([
            'id' => $request->id_kategori,
            'nama' => $request->nama_kategori,

        ]);

        transaksi::create([
            'id' => $request->id,
            'nama_barang' => $request->nama_barang,
            'tahun_barang' => $request->tahun_barang,
            'id_kategori' => $request->id_kategori,
            'pengirim' => $request->pengirim

        ]);

        DB::commit();
        }catch (\Throwable $th) {

            //rollback jika terjadi kesalahan
            DB::rollback();
        }

        return redirect('/');
    }

}