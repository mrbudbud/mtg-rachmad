<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    public function index()
    {
        // get data asc 
        $dataMaster = DB::table('master_item')->orderBy('id', 'asc')->get();
        return view ('masterItem.index', compact('dataMaster'));
    }

    public function post(Request $request)
    {
        // validation 
        $this->validate($request, [
            'namaBarang' => 'required|min:3',
            'kodeBarang' => 'required|min:3',
            'status' => 'required|numeric'
        ]);

        // dd($request->all());
        $inputData = DB::table('master_item')->insert([
            'nama_barang' => $request->namaBarang,
            'kode_barang' => $request->kodeBarang,
            'status' => $request->status
        ]);

        if ($inputData) {
            return redirect()->to('/masterItem')->with('message', '<script>alert("Berhasil disimpan..!!");</script>');
        } else {
            return redirect()->to('/masterItem')->with('message', '<script>alert("Gagal disimpan..!!");</script>');
        }

        return redirect()->route('masterItem');
    }

    public function editMaster($item)
    {
        $itemMaster = DB::table('master_item')->where('id', $item)->first();
        // dd($itemMaster);

        return view('masterItem.edit', compact('itemMaster'));
    }

    public function updateMaster(Request $request, $item)
    {
        // validation 
        $this->validate($request, [
            'namaBarang' => 'required|min:3',
            'kodeBarang' => 'required|min:3',
            'status' => 'required|numeric'
        ]);

        // dd($request->all());
        $inputData = DB::table('master_item')->where('id', $item)->update([
            'nama_barang' => $request->namaBarang,
            'kode_barang' => $request->kodeBarang,
            'status' => $request->status
        ]);

        if ($inputData) {
            return redirect()->to('/masterItem')->with('message', '<script>alert("Berhasil Update..!!");</script>');
        } else {
            return redirect()->to('/masterItem')->with('message', '<script>alert("Gagal Update..!!");</script>');
        }

        return redirect()->route('masterItem');
    }

    public function hapusMaster($item)
    {
        // dd($item);
        $hapusData = DB::table('master_item')->where('id', $item)->delete();

        if ($hapusData) {
            return redirect()->to('/masterItem')->with('message', '<script>alert("Berhasil dihapus..!!");</script>');
        } else {
            return redirect()->to('/masterItem')->with('message', '<script>alert("Gagal dihapus..!!");</script>');
        }

        return redirect()->route('masterItem');
    }
}
