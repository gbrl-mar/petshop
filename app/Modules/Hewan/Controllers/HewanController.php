<?php
namespace App\Modules\Hewan\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Hewan\Services\HewanService;
use App\Modules\Hewan\Requests\StoreHewanRequest;
use App\Modules\Hewan\Requests\UpdateHewanRequest;
use App\Modules\Hewan\Dto\{CreateHewanDto, UpdateHewanDto};

class HewanController extends Controller
{
    public function __construct(protected HewanService $service) {}

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function show(int $id)
    {
        return response()->json($this->service->getById($id));
    }

    public function store(StoreHewanRequest $request)
    {
        $dto = CreateHewanDto::fromRequest($request);
        return response()->json($this->service->create($dto));
    }

    public function update(UpdateHewanRequest $request, int $id)
    {
        $dto = UpdateHewanDto::fromRequest($request);
        return response()->json($this->service->update($id, $dto));
    }

    public function destroy(int $id)
    {
        return response()->json(['deleted' => $this->service->delete($id)]);
    }
}