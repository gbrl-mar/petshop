<?php

namespace App\Modules\Product\Services;
use App\Modules\Product\Dto\UpdateProductDTO;
use App\Modules\Product\Repositories\ProductRepositories;
use App\Modules\Product\Dto\CreateProductDTO;

class ProductServices
{
    protected $productRepository;

    public function __construct(protected ProductRepositories $ProductRepository)
    {
    }

    public function listAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductDetails($id)
    {
        return $this->productRepository->getProductById($id);
    }

    public function addNewProduct(CreateProductDTO $dto)
    {
        return $this->productRepository->createProduct((array)$dto);
    }

    public function modifyProduct($id, UpdateProductDTO $dto)
    {
        return $this->productRepository->updateProduct((array)$id, (array)$dto);
    }

    public function removeProduct($id)
    {
        return $this->productRepository->deleteProduct($id);
    }
}
