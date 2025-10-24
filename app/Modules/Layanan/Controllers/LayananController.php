<?php
namespace App\Modules\Layanan\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Layanan\Services\LayananService;
use App\Modules\Layanan\Requests\StoreLayananRequest;
use App\Modules\Layanan\Requests\UpdateLayananRequest;
use App\Modules\Layanan\Dto\{CreateLayananDto, UpdateLayananDto};

class LayananController extends Controller
{
    public function __construct(protected LayananService $service) {}

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function show(int $id)
    {
        return response()->json($this->service->getById($id));
    }

    public function store(StoreLayananRequest $request)
    {
        $dto = CreateLayananDto::fromRequest($request);
        return response()->json($this->service->create($dto));
    }

    public function update(UpdateLayananRequest $request, int $id)
    {
        $dto = UpdateLayananDto::fromRequest($request);
        return response()->json($this->service->update($id, $dto));
    }

    public function destroy(int $id)
    {
        return response()->json(['deleted' => $this->service->delete($id)]);
    }
}
