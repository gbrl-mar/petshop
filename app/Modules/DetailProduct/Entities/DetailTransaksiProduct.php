<?php

namespace App\Modules\DetailProduct\Entities;
use App\Modules\Product\Entities\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailTransaksiProduct extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi_produk';

    protected $fillable = [
        'id_transaksi_produk',
        'id_produk',
        'jumlah',
        'subtotal_per_produk',
    ];

    
    public $timestamps = true;

    public function product()
    {
        return $this->belongsToMany(Product::class, 'id_produk', 'id_produk');
    }
}
