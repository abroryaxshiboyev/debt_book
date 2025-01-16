<?php

namespace App\Repositories;

use App\Models\Debtor;
use App\Repositories\Contracts\DebtorRepositoryInterface;

class DebtorRepository implements DebtorRepositoryInterface
{
    public function getAll()
    {
        return Debtor::all();
    }

    public function getPaginated(int $perPage = 10)
    {
        return Debtor::paginate($perPage);
    }

    public function getById($id)
    {
        return Debtor::findOrFail($id);
    }

    public function create(array $data)
    {
        return Debtor::create($data);
    }

    public function update($id, array $data)
    {
        $debtor = Debtor::findOrFail($id);
        $debtor->update($data);
        return $debtor;
    }

    public function delete($id)
    {
        $debtor = Debtor::findOrFail($id);
        $debtor->delete();
        return true;
    }
}
