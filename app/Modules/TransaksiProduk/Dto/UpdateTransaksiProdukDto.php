<?php
namespace App\Modules\Hewan\Dto;
use App\Modules\TransaksiProduk\Requests\StoreTransaksiProdukRequest;
use Carbon\carbon;
use phpDocumentor\Reflection\Types\Boolean;
use Ramsey\Uuid\Type\Decimal;
class UpdateTransaksiProdukDto
{

    private function __construct(
        public readonly int $id_customer,
        public readonly int $id_pegawai,
        public readonly int $id_pegawai_cs,
        public readonly int $id_pegawai_kasir,
        public readonly carbon $tanggal_transaksi,
        public readonly Decimal $subtotal,
        public readonly Decimal $diskon,
        public readonly Decimal $total_bayar,
        public readonly String $status_pembayaran,
       
    ) {
        $this->id_customer = $id_customer;
        $this->id_pegawai = $id_pegawai;
        $this->id_pegawai_cs = $id_pegawai_cs;
        $this->id_pegawai_kasir = $id_pegawai_kasir;
        $this->tanggal_transaksi = $tanggal_transaksi;
        $this->subtotal = $subtotal;
        $this->diskon = $diskon;
        $this->total_bayar = $total_bayar;
        $this->status_pembayaran = $status_pembayaran;
    
    }

    public static function fromRequest(StoreTransaksiProdukRequest $request): self{
        return new self(
            $request->validated('id_customer'),
            $request->validated('id_pegawai'),
            $request->validated('id_pegawai_cs'),
            $request->validated('id_pegawai_kasir'),
            Carbon::parse($request->validated('tanggal_lahir')),
            $request->validated('subtotal'),
            $request->validated('diskon'),
            $request->validated('total_pembayaran'),
            $request->validated('status_pembayaran'),
        );
    }
    public function toArray(): array{
        return[
            'id_customer'=> $this->id_customer,
            'id_pegawai'=> $this->id_pegawai,
            'id_pegawai_cs'=> $this->id_pegawai_cs,
            'id_pegawai_kasir'=> $this->id_pegawai_kasir,
            'tanggal_transaksi'=> $this->tanggal_transaksi,
            'subtotal'=> $this->subtotal,
            'diskon'=> $this->diskon,
            'total_bayar'=> $this->total_bayar,
            'status_pembayaran'=> $this->status_pembayaran,
            
        ];

    }
}