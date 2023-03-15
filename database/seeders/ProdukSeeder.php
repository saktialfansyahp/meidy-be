<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produks')->insert([
            'gambar' => '',
            'nama_produk' => 'gamis',
            'harga' => 'Rp 100.000',
            'ukuran' => 'L',
            'warna' => 'hitam',
            'stok' => '5',
            'deskripsi' => 'bagus',
        ]);
    }
}
