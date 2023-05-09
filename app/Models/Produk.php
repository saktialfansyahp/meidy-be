<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Produk extends Model
{
    use HasFactory;
    protected $primary = ['id'];
    protected $fillable = ['gambar', 'nama_produk', 'harga', 'ukuran', 'warna', 'stok', 'deskripsi'];
    protected $hidden = [];
    public function users()
    {
        return $this->belongsToMany(User::class,'carts', 'produk_id', 'user_id');
    }

}
