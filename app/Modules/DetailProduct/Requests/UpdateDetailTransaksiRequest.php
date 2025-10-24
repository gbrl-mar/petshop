<?php

namespace App\Modules\DetailProduct\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailTransaksiRequest extends FormRequest{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'id_transaksi_produk' => 'required',
            'id_produk' => 'required',
            'jumlah'=> 'required',
            'subtotal_per_produk'=> 'required',
        ];
    }
}