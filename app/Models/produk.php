<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    //inisialisasi tabel produk
    protected $table = 'tb_produk';

    //inisialisasi primary key
    protected $primaryKey = 'id_produk';

    //inisialisasi timestamp
    protected $fillable = ['nama_produk','harga','stok','deskripsi_produk','kategori_id'];

    protected $guarded = ['id_produk'];
}
