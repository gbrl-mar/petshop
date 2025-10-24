<?php
namespace App\Modules\Layanan\Services;

use App\Modules\Layanan\Repositories\LayananRepository;
use App\Modules\Layanan\Dto\{CreateLayananDto, UpdateLayananDto};
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LayananService
{
    public function __construct(protected LayananRepository $repo) {}

    public function getAll()
    {
        return $this->repo->findAll();
    }

    public function getById(int $id)
    {
        $layanan = $this->repo->findById($id);
        if (!$layanan) {
            throw new ModelNotFoundException("Layanan dengan ID {$id} tidak ditemukan");
        }
        return $layanan;
    }

    public function create(CreateLayananDto $dto)
    {
        return $this->repo->create($dto->toArray());
    }

    public function update(int $id, UpdateLayananDto $dto)
    {
        $updated = $this->repo->update($id, $dto->toArray());
        if (!$updated) {
            throw new ModelNotFoundException("Layanan dengan ID {$id} tidak ditemukan");
        }
        return $updated;
    }

    public function delete(int $id)
    {
        if (!$this->repo->delete($id)) {
            throw new ModelNotFoundException("Layanan dengan ID {$id} tidak ditemukan");
        }
        return true;
    }
}
