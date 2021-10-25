<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table ='transaksi';
    protected $fillable =['id','nama_barang','tahun_barang','id_kategori','pengirim'];
}