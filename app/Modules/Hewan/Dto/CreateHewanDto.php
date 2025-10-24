<?php
namespace App\Modules\Hewan\Dto;
use App\Modules\Hewan\Requests\StoreHewanRequest;
use Carbon\carbon;
class CreateHewanDto
{

    private function __construct(
        public readonly int $id_customer,
        public readonly string $nama,
        public readonly carbon $tanggal_lahir,
        public readonly string $jenis,
    ) {
        $this->id_customer = $id_customer;
        $this->nama= $nama;
        $this->tanggal_lahir = $tanggal_lahir;
        $this->jenis = $jenis;
    }

    public static function fromRequest(StoreHewanRequest $request): self{
        return new self(
            $request->validated('id_customer'),
            $request->validated('nama'),
            Carbon::parse($request->validated('tanggal_lahir')),
            $request->validated('jenis'),
        );
    }
    public function toArray(): array{
        return[
            'id_customer' => $this->id_customer,
            'nama' => $this->nama,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis' => $this->jenis,
        ];

    }
}
