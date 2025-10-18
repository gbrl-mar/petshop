<?php

namespace Modules\Hewan\Repositories;

use Modules\Hewan\Models\Hewan;

class HewanRepository
{
    public function findAll()
    {
        return Hewan::with('customer')->get();
    }

    public function findById(int $id): ?Hewan
    {
        return Hewan::with('customer')->findOrFail($id);
    }

    public function create(array $data): Hewan
    {
        return Hewan::create($data);
    }

    public function update(int $id, array $data): ?Hewan
    {
        $hewan = $this->findById($id);
        if (!$hewan) {
            return null;
        }
        $hewan->update($data);
        return $hewan;
    }

    public function delete(int $id): bool
    {
        $hewan = $this->findById($id);
        return $hewan ? $hewan->delete() : false;
    }
}
