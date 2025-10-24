<?php

namespace App\Modules\Layanan\Repositories;

use App\Modules\Layanan\Entities\Layanan;

class LayananRepository
{
    public function findAll()
    {
        return Layanan::query()->get();
    }

    public function findById(int $id): ?Layanan
    {
        // findOrFail will respect primaryKey set on model (id_layanan)
        return Layanan::findOrFail($id);
    }

    public function create(array $data): Layanan
    {
        return Layanan::create($data);
    }

    public function update(int $id, array $data): ?Layanan
    {
        $layanan = $this->findById($id);
        if (!$layanan) {
            return null;
        }
        $layanan->update($data);
        return $layanan;
    }

    public function delete(int $id): bool
    {
        $layanan = $this->findById($id);
        return $layanan ? $layanan->delete() : false;
    }
}
