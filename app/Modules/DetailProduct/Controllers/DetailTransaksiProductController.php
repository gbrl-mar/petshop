<?php

namespace App\Http\Controllers;
use App\Modules\DetailProduct\Requests\StoreDetailTransaksi;
use App\Modules\DetailProduct\Models\DetailProduct;
use App\Modules\DetailProduct\Requests\StoreDetailTransaksiRequest;
use App\Modules\DetailProduct\Requests\UpdateDetailTransaksiRequest;
use App\Modules\DetailProduct\Services\DetailTransaksiServices;
use App\Modules\DetailTransaksiProduk\Dto\CreateDetailTransaksiProduct;

class DetailTransaksiProductController extends Controller{
    public function __construct(protected DetailTransaksiServices $service){}

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function show(int $id)
    {
        return response()->json($this->service->getById($id));
    }

    public function store(StoreDetailTransaksiRequest $request)
    {
        $dto = StoreDetailTransaksiRequest::fromRequest($request);
        return response()->json($this->service->create($dto));
    }

    public function update(UpdateDetailTransaksiRequest $request, int $id)
    {
        $dto = UpdateDetailTransaksiRequest::fromRequest($request);
        return response()->json($this->service->update($id, $dto));
    }

    public function destroy(int $id)
    {
        return response()->json(['deleted' => $this->service->delete($id)]);
    }
}
