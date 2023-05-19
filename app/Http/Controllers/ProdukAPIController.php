<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ProdukAPIController extends Controller
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
      $value->gambar = 'http://localhost:8000'.Storage::url($value->gambar);
      return $value;
   });

   return response()-> json([
   'success' => true,
    'mesage' => 'list data post',
    'data' => $data
   ], 200);
}
public function show(request $request, $produkapi)
{
   $data = Produk::find($produkapi);

   // $data = $data->map(function($value) {
   //    $value->gambar = 'http://localhost:8000'.Storage::url($value->gambar);
   //    return $value;
   // });

   $data->gambar = 'http://localhost:8000'.Storage::url($data->gambar);

   return response()-> json([
   'success' => true,
    'mesage' => ' data post',
    'data' => $data
   ], 200);
}
}
