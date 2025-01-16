<?php

namespace App\Repositories;

use App\Models\Debt;
use App\Repositories\Contracts\DebtRepositoryInterface;

class DebtRepository implements DebtRepositoryInterface
{
    public function getAll()
    {
        return Debt::all();
    }

    public function getPaginated(int $perPage = 10)
    {
        return Debt::paginate($perPage);
    }

    public function getById($id)
    {
        return Debt::findOrFail($id);
    }

    public function create(array $data)
    {
        return Debt::create($data);
    }

    public function update($id, array $data)
    {
        $debt = Debt::findOrFail($id);
        $debt->update($data);
        return $debt;
    }

    public function delete($id)
    {
        $debt = Debt::findOrFail($id);
        $debt->delete();
        return true;
    }
}
