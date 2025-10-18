<?php
namespace Modules\Hewan\Dto;

class UpdateHewanDto
{
    public function __construct(
        public string $nama,
        public string $jenis,
        public ?int $umur,
        public int $customer_id
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            $data['id_customer'],
            $data['nama'],
            $data['tanggal_lagir'],
            $data['jenis_hewan'],
        );
    }
}
