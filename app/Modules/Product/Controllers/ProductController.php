<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Services\ProductServices;
use App\Modules\Product\Dto\CreateProductDTO;
use App\Modules\Product\Dto\UpdateProductDTO;



class ProductController extends Controller
{
    public function __construct(protected ProductServices $ProductServices)
    {
    }

    public function index()
    {
        return response()->json($this->ProductServices->listAllProducts());
    }

    public function show($id)
    {
        return response()->json($this->ProductServices->getProductDetails($id));
    }

    public function store(Request $request)
    {
        $dto = CreateProductDTO::fromRequest($request->all());
        return response()->json($this->ProductServices->addNewProduct($dto));
    }

    public function update(Request $request, $id)
    {
        $dto = UpdateProductDTO::fromRequest($request->all());
        return response()->json($this->ProductServices->modifyProduct($id, $dto));
    }
    
    public function destroy($id)
    {
        return response()->json($this->ProductServices->removeProduct($id));
    }

}
