<?php

namespace App\Modules\DetailTransaksiProduk\Dto;
use App\Modules\DetailProduct\Requests\StoreDetailTransaksiRequest;
class CreateDetailTransaksiProduct
{
    public function __construct(
        public readonly int $id_transaksi_produk,
        public readonly int $id_produk,
        public readonly int $jumlah,
        public readonly float $subtotal_per_produk,
    ) {
    }

    public static function fromRequest(StoreDetailTransaksiRequest $request): self
    {
        return new self(
            $request->id_transaksi_produk,
            $request->id_produk,
            $request->jumlah,
            $request->subtotal_per_produk
        );
    }

    public function toArray(): array
    {
        return [
            'id_transaksi_produk' => $this->id_transaksi_produk,
            'id_produk' => $this->id_produk,
            'jumlah' => $this->jumlah,
            'subtotal_per_produk' => $this->subtotal_per_produk,
        ];
    }
}
