<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Storage;
use DB;


class ProdukController extends Controller
{
/**
* Store a newly created resource in storage.
*
* @param \Illuminate\Http\Request $request
* @return \Illuminate\Http\Response
*/  

   public function index(request $request)
   {
      $data = Produk::all();
      $data = $data->map(function($value) { 
         $value->gambar = Storage::url($value->gambar);
         return $value;
         });
      return view('produk.index', compact('data')) ;
   }

   public function create(){
      $produk = Produk::count();
      return view('produk.create', compact('produk'));
   }

   public function store(Request $request)
   {
         $this->validate($request, [
            'gambar' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'ukuran' => 'required',
            'warna' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
         ]);
         
         $produk = Produk::create([
            'gambar' => '',
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'ukuran' => $request->ukuran,
            'warna' => $request->warna,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
         ]);

         if($request->hasfile('gambar')){
            $path = $request->file('gambar')->store('public/gambar');
            $produk->gambar = $path;
            $produk->save();
        }

      return redirect()->route('produk.index')->with('success', 'Data Berhasil Ditambahkan');
   }  

   /**
    * Show the form for editing the specified resource.
    *
    * @param \App\Models\Produk $produk
    * @return \Illuminate\Http\Response
    */
   public function edit($id){
      $data = Produk::find($id);
      $produk = Produk::count();
      return view('produk.edit', compact('data', 'produk'));
   }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Models\Produk $produk
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
      

      $produk = Produk::find($id);
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->ukuran = $request->ukuran;
        $produk->warna = $request->warna;
        $produk->stok = $request->stok;
        $produk->deskripsi = $request->deskripsi;

        if($request->hasfile('gambar')){
         Storage::delete($produk->gambar);
         $path = $request->file('gambar')->store('public/gambar');
         $produk->gambar = $path;
         $produk->save();
     }
           
        $produk->save(); 
        return redirect()->route('produk.index')->with('success', 'Data Berhasil Diubah');

    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param \App\Models\Produk $produk
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data Berhasil Dihapus');
    }
}





