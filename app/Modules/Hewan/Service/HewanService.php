<?php
namespace Modules\Hewan\Services;

use Modules\Hewan\Repositories\HewanRepository;
use Modules\Hewan\DTO\{CreateHewanDTO, UpdateHewanDTO};
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

    public function create(CreateHewanDTO $dto)
    {
        return $this->repo->create((array) $dto);
    }

    public function update(int $id, UpdateHewanDTO $dto)
    {
        $updated = $this->repo->update($id, (array) $dto);
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
