<?php

namespace App\Modules\TransaksiProduk\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreTransaksiProdukRequest extends FormRequest{
   public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_customer' => 'required',
            'id_pegawai' => 'required',
            'id_pegawai_kasir' => 'required', 
            'id_pegawai_cs' => 'required',
            'tangal_transaksi' => 'required',
            'subtotal' => 'required',
            'diskon' => 'required',
            'total_bayar' => 'required',
            'status_pembayaran' => 'required'
        ];
    }
}