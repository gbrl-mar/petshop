<?php

namespace App\Modules\TransaksiProduk\Repositories;

use App\Modules\TransaksiProduk\Entities\TransaksiProduk;
use Illuminate\Support\Facades\DB;
use App\Modules\DetailProduct\Entities\detailTransaksiProduct; // Pastikan namespace ini benar

class TransaksiProdukRepository
{
   
    public function findAll()
    {
        return TransaksiProduk::with(['Customer', 'transaksi', 'Detailtransksi'])->get();
    }

    public function findById(int $id): ?TransaksiProduk
    {
        return TransaksiProduk::with(['Customer', 'transaksi', 'Detailtransksi'])->find($id);
    }

   
    public function create(array $transaksiData, array $detailData): TransaksiProduk
    {
        return DB::transaction(function () use ($transaksiData, $detailData) {
            $transaksiProduk = TransaksiProduk::create($transaksiData);

            $detailsToInsert = [];
            foreach ($detailData as $detail) {
                if (isset($detail['id_produk'], $detail['jumlah'], $detail['subtotal_per_produk'])) {
                     $detailsToInsert[] = [
                        'id_transaksi_produk' => $transaksiProduk->id,
                        'id_produk' => $detail['id_produk'],
                        'jumlah' => $detail['jumlah'],
                        'subtotal_per_produk' => $detail['subtotal_per_produk'],
                        'created_at' => now(), 
                        'updated_at' => now(), 
                    ];
                } else {
                     \Log::warning('Data detail transaksi tidak lengkap, dilewati:', $detail);
                }

            }

            if (!empty($detailsToInsert)) {
                 detailTransaksiProduct::insert($detailsToInsert);
            }
            $transaksiProduk->load(['Customer', 'transaksi', 'Detailtransksi']);

            return $transaksiProduk;
        });
    }

   
    public function update(int $id, array $transaksiData, array $detailData): ?TransaksiProduk
    {
        return DB::transaction(function () use ($id, $transaksiData, $detailData) {
            $transaksiProduk = $this->findById($id);
            if (!$transaksiProduk) {
                return null;
            }
            $transaksiProduk->update($transaksiData);
             detailTransaksiProduct::where('id_transaksi_produk', $id)->delete();
            $detailsToInsert = [];
             foreach ($detailData as $detail) {
                 if (isset($detail['id_produk'], $detail['jumlah'], $detail['subtotal_per_produk'])) {
                      $detailsToInsert[] = [
                         'id_transaksi_produk' => $transaksiProduk->id,
                         'id_produk' => $detail['id_produk'],
                         'jumlah' => $detail['jumlah'],
                         'subtotal_per_produk' => $detail['subtotal_per_produk'],
                         'created_at' => now(), 
                         'updated_at' => now(), 
                     ];
                 } else {
                    \Log::warning('Data detail transaksi tidak lengkap saat update, dilewati:', $detail);
                 }
             }


            if (!empty($detailsToInsert)) {
                  detailTransaksiProduct::insert($detailsToInsert);
            }

            $transaksiProduk->refresh()->load(['Customer', 'transaksi', 'Detailtransksi']);

            return $transaksiProduk;
        });
    }

  
    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            $transaksiProduk = $this->findById($id);
            if (!$transaksiProduk) {
                return false;
            }
             detailTransaksiProduct::where('id_transaksi_produk', $id)->delete();
            return $transaksiProduk->delete();
        });
    }
}