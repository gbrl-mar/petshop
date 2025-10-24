<?php

namespace App\Modules\DetailProduct\Entities;
use App\Modules\Product\Entities\Product;
use App\Modules\TransaksiProduk\Entities\TransaksiProduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiProduct extends Model
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
        return $this->belongsTo(Product::class, 'id_produk');
    }
    public function transaksiProduk(){
        return $this->belongsTo(TransaksiProduk::class,'id_transaksi_produk');
    }
}
