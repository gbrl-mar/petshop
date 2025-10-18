<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id_produk',
        'nama',
        'harga',
        'stock',
        'gambar',
    ];

    
    public $timestamps = true;
}
