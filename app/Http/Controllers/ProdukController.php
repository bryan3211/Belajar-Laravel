<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(Request $request){
        $toko = [
            'nama_toko' => 'Makmur Jaya Abadi',
            'alamat' => 'Sidoarjo',
            'type' => 'Ruko'
        ];
        $query = $request->input('q');
        if ($query) {
            $produk = produk::where('nama_produk', 'like', "%$query%")
                ->orWhere('deskripsi_produk', 'like', "%$query%")
                ->orWhere('harga', 'like', "%$query%")
                ->get();
        } else {
            $produk = produk::get();
        }
        return view('pages.produk.show', [
            'data_toko'=>$toko,
            'data_produk'=>$produk,
            'query'=>$query,
        ]);
    }

    public function create(){
        return view('pages.produk.add');
    }

    public function store(Request $request){
        $request->validate([
            'nama_produk'=>'required|min:8|max:12',
            'harga_produk'=>'required',
            'deskripsi_produk'=>'required',
        ],[
            'nama_produk.min'=>'Nama Produk Minimal 8 Karakter',
            'nama_produk.max'=>'Nama Produk Maksimal 12 Karakter',
            'harga_produk.required'=>'Inputan Harga Produk Harus Diisi',
            'deskripsi_produk.required'=>'Inputan Deskripsi Produk Harus Diisi',
        ]);

        produk::create([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi_produk,
            'kategori_id'=>'1'
        ]);

        return redirect('/product')->with('message', 'Berhasil Menambahkan Data');
    }

    public function show($id){
        $data = produk::findOrFail($id);
        return view('pages.produk.detail', ['produk' => $data]);
    }

    public function edit($id){
        $data = produk::findOrFail($id);
        return view('pages.produk.edit', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nama_produk'=>'required|min:8',
            'harga_produk'=>'required',
            'deskripsi_produk'=>'required',
        ],[
            'nama_produk.min'=>'Nama Produk Minimal 8 Karakter',
            'harga_produk.required'=>'Inputan Harga Produk Harus Diisi',
            'deskripsi_produk.required'=>'Inputan Deskripsi Produk Harus Diisi',
        ]);
        produk::where('id_produk',$id)->update([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi_produk,
        ], $id);

        return redirect('/product')->with('message', 'Berhasil Mengupdate Data');
    }

    public function destroy($id){
        $produk = produk::findOrFail($id);
        $produk->delete();
        return redirect('/product')->with('message', 'Data berhasil dihapus!');
    }
}