<?php

namespace App\Modules\DetailProduct\Repositories;
use App\Modules\DetailProduct\Entities\detailTransaksiProduct;

class DetailTransaksiProductRepositories{
    public function findAll(){
        return detailTransaksiProduct::with('produk')->get();
    }

    public function findById(int $id){
        return detailTransaksiProduct::find($id);
    }

    public function create(array $data){
        return detailTransaksiProduct::create($data);
    }

    public function update(int $id, array $data){
        $detail= detailTransaksiProduct::find($id);
        if(!$detail){
            return null;
        }
        $detail->update($data);
        return $detail;
    }
    public function delete(int $id){
        $detail= detailTransaksiProduct::find($id);
        if(!$detail){
            return null;
        }
        $detail->delete();
        return true;
    }
}