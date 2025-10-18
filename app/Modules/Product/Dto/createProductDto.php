<?php
namespace App\Modules\Product\Dto;
class CreateProductDTO
{
    public string $id_produk;
    public string $nama;
    public float $harga;
    public int $stock;
    public ?string $gambar;

    public function __construct(array $data)
    {
        $this->id_produk = $data['id_produk'];
        $this->nama = $data['nama'];
        $this->harga = $data['harga'];
        $this->stock = $data['stock'];
        $this->gambar = $data['gambar'] ?? null;
    }

    public static function fromRequest(array $data)
    {
        return new self($data);
    }
}