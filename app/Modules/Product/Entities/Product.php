<?php

namespace App\Modules\Product\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'id_produk',
        'nama',
        'harga',
        'stock',
        'gambar',
    ];

    
    public $timestamps = true;
}
