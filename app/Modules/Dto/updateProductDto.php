<?php

namespace App\Modules\Product\Dto;

class UpdateProductDTO
{
    public ?string $nama;
    public ?float $harga;
    public ?int $stock;
    public ?string $gambar;

    public function __construct(array $data)
    {
        $this->nama = $data['nama'] ?? null;
        $this->harga = $data['harga'] ?? null;
        $this->stock = $data['stock'] ?? null;
        $this->gambar = $data['gambar'] ?? null;
    }

    public static function fromRequest(array $data)
    {
        return new self($data);
    }
}