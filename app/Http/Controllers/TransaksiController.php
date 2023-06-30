<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class TransaksiController extends Controller
{
    public function index()
    {
        // $data = DB::table('transaksi')->get();
        // join table transaksi column kode barang dan master_item, lalu ambil semua data
        $data = DB::table('transaksi')
        ->join('master_item', 'transaksi.kode_barang', '=', 'master_item.kode_barang')
        ->select('transaksi.*', 'master_item.nama_barang')->get();

        $dataMasterItem = DB::table('master_item')->get();

        return view ('listTransaksi', compact('data', 'dataMasterItem'));
    }

    public function post(Request $request)
    {
        // validasi inputan
        $request->validate([
            'kodeBarang' => 'required',
            'qty' => 'required|numeric|max:100'
        ]);

        $stmtPost = [
            'kode_barang' => $request->input('kodeBarang'),
            'qty' => $request->input('qty'),
        ];

        // insert by model Informasi
        $stmtInsert = DB::table('transaksi')->insert($stmtPost);
        if ($stmtInsert) {
            return redirect()->to('/')->with('message', '<script>alert("Berhasil tersimpan..!!");</script>');
        } else {
            return redirect()->to('/')->with('message', '<script>alert("Gagal tersimpan..!!");</script>');
        }
    }

    public function edit($item)
    {
        $itemTransaksi = DB::table('transaksi')->where('id', $item)->first();
        // dd($itemTransaksi);

        $dataMasterItem = DB::table('transaksi')
        ->join('master_item', 'transaksi.kode_barang', '=', 'master_item.kode_barang')
        ->select('master_item.kode_barang','master_item.nama_barang')->get();

        return view('edit', compact('itemTransaksi', 'dataMasterItem'));
    }

    public function update(Request $request, $item)
    {   
        $stmtUpdate = [
            'kode_barang' => $request->input('kodeBarang'),
            'qty' => $request->input('qty'),
        ];

        $stmtUpdate = DB::table('transaksi')->where('id', $item)->update($stmtUpdate);
        if ($stmtUpdate) {
            return redirect()->to('/')->with('message', '<script>alert("Berhasil diupdate..!!");</script>');
        } else {
            return redirect()->to('/')->with('message', '<script>alert("Gagal diupdate..!!");</script>');
        }
    }

    public function hapus($item)
    {
        // delete data
        DB::table('transaksi')->where('id', $item)->delete();
        return redirect()->to('/')->with('message', '<script>alert("Berhasil dihapus..!!");</script>');
    }
}
