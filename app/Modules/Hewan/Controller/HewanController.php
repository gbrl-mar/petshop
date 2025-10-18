<?php
namespace Modules\Hewan\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Hewan\Services\HewanService;
use Modules\Hewan\DTO\{CreateHewanDTO, UpdateHewanDTO};

class HewanController extends Controller
{
    public function __construct(protected HewanService $service) {}

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        if($keyword){
            return response()->json($this->service->search($keyword));
        }
        return response()->json($this->service->getAll());
    }

    public function show(int $id)
    {
        return response()->json($this->service->getById($id));
    }

    public function store(Request $request)
    {
        $dto = CreateHewanDTO::fromRequest($request->all());
        return response()->json($this->service->create($dto));
    }

    public function update(Request $request, int $id)
    {
        $dto = UpdateHewanDTO::fromRequest($request->all());
        return response()->json($this->service->update($id, $dto));
    }

    public function destroy(int $id)
    {
        return response()->json(['deleted' => $this->service->delete($id)]);
    }
}
