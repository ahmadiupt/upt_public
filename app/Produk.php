<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
        'name',
        'description',
        'kategori_id',
        'photo',
        'port',
        'stok'
    ];

    public function kategori(){
        return $this->hasOne(Kategori::class,'id','kategori_id');
    }
}
