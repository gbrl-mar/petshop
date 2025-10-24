<?php
namespace App\Modules\Layanan\Dto;

use App\Modules\Layanan\Requests\UpdateLayananRequest;

class UpdateLayananDto
{
    private function __construct(
        public readonly string $nama,
        public readonly float $harga,
    ) {}

    public static function fromRequest(UpdateLayananRequest $request): self
    {
        return new self(
            $request->validated('nama'),
            (float) $request->validated('harga'),
        );
    }

    public function toArray(): array
    {
        return [
            'nama' => $this->nama,
            'harga' => $this->harga,
        ];
    }
}
