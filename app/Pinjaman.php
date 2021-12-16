<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman';
    protected $fillable = [
        'produk_id',
        'description',
        'qty',
        'pinjamanby',
        'tanggalpinjam',
        'tanggalkembali',
        'user_id',
        'photo',
        'pegawai_id',
        'status'
    ];

    public function produk(){
        return $this->hasOne(Produk::class,'id','produk_id');
    }
    public function pegawai(){
        return $this->hasOne(Pegawai::class,'id','pegawai_id');
    }

}
