<?php

namespace App\Modules\DetailProduct\Services;
use  App\Modules\DetailProduct\Repositories\DetailTransaksiProductRepositories;
use App\Modules\DetailTransaksiProduk\Dto\CreateDetailTransaksiProduct;
use App\Modules\UpdateDetailProduk\Dto\UpdateDetailTransaksiProduct;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DetailTransaksiServices{
    public function __construct(protected  DetailTransaksiProductRepositories $detailProductRepository){}

    public function getAll() {
        return $this->detailProductRepository->findAll();
    }
    public function getById($id) {
        return $this->detailProductRepository->findById($id);
    }

    public function create(CreateDetailTransaksiProduct $dto) {
        return $this->detailProductRepository->create($dto->toArray());
    }

    public function update(int $id, UpdateDetailTransaksiProduct $dto) {
        $update = $this->detailProductRepository->update($id, $dto->toArray());

        if(! $update){
            throw new ModelNotFoundException("Tidak Ditemukan");
        }
        return $update;
    }
    public function delete(int $id) {
        return $this->detailProductRepository->delete($id);
    }


}