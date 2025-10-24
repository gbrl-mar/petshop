<?php
namespace App\Modules\Hewan\Services;

use App\Modules\Hewan\Repositories\HewanRepository;
use App\Modules\Hewan\Dto\{CreateHewanDto, UpdateHewanDto};
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HewanService
{
    public function __construct(protected HewanRepository $repo) {}

    public function getAll()
    {
        return $this->repo->findAll();
    }

    public function getById(int $id)
    {
        $hewan = $this->repo->findById($id);
        if (!$hewan) {
            throw new ModelNotFoundException("Hewan dengan ID {$id} tidak ditemukan");
        }
        return $hewan;
    }

    public function create(CreateHewanDto $dto)
    {
        return $this->repo->create($dto->toArray());
    }

    public function update(int $id, UpdateHewanDto $dto)
    {
        $updated = $this->repo->update($id, $dto->toArray());
        if (!$updated) {
            throw new ModelNotFoundException("Hewan dengan ID {$id} tidak ditemukan");
        }
        return $updated;
    }

    public function delete(int $id)
    {
        if (!$this->repo->delete($id)) {
            throw new ModelNotFoundException("Hewan dengan ID {$id} tidak ditemukan");
        }
        return true;
    }
}
