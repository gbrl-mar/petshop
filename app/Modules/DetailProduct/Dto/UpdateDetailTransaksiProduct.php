<?php

namespace App\Modules\UpdateDetailProduk\Dto;
use App\Modules\DetailProduct\Requests\UpdateDetailTransaksiRequest;
use Carbon\carbon;
class UpdateDetailTransaksiProduct{

    private function __construct(
        public readonly int $id_transaksi_produk,
        public readonly int $id_produk,
        public readonly int $jumlah,
        public readonly float $sub_total,
    ){
      $this->id_produk = $id_produk;
      $this->id_transaksi_produk = $id_transaksi_produk;
      $this->jumlah = $jumlah;
      $this->sub_total = $sub_total;  
    }

    public function formRequest(UpdateDetailTransaksiRequest $request): self{
        return new self(
            $request->id_transaksi_produk,
            $request->id_produk,
            $request->jumlah,
            $request->sub_total
        );
    }

    public function toArray(): array{
        return [
            'id_produk' => $this->id_produk,
            'id_transaksi_produk' => $this->id_transaksi_produk,
            'jumlah' => $this->jumlah,
            'sub_total' => $this->sub_total,
        ];
    }
}