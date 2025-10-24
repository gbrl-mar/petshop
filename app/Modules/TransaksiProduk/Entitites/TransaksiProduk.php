<?php

namespace App\Modules\TransaksiProduk\Entities;
use App\Modules\DetailProduct\Entities\detailTransaksiProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class TransaksiProduk extends Model
{
    use HasFactory;
    protected $table = 'transaksi_produk';
    
    protected $fillable = ['id_customer',
                            'id_pegawai',
                            'id_pegawai_kasir', 
                            'id_pegawai_cs',
                            'tangal_transaksi',
                            'subtotal',
                            'diskon',
                            'total_bayar',
                            'status_pembayaran'
                         ];

    public function transaksi(){
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }
    public function Customer(){
        return $this->belongsTo(Customer::class, 'id_customer');
    }
    public function Detailtransksi(){
        return $this->hasMany(DetailTransaksiProduct::class,'id_transaksi_produk');
    }
}