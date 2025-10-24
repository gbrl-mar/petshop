<?php

namespace App\Modules\Product\Repositories;
use App\Modules\Product\Entities\Product;

class ProductRepositories
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getAllProducts()
    {
        return $this->model->all();
    }

    public function getProductById($id)
    {
        return $this->model->find($id);
    }

    public function createProduct(array $data)
    {
        return $this->model->create($data);
    }

    public function updateProduct($id, array $data)
    {
        $product = $this->model->find($id);
        if ($product) {
            $product->update($data);
            return $product;
        }
        return null;
    }

    public function deleteProduct($id)
    {
        $product = $this->model->find($id);
        if ($product) {
            return $product->delete();
        }
        return false;
    }
}