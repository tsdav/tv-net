<?php

namespace App\Repositories;

use App\Interfaces\TvNetRepositoryInterface;
use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ServiceRepository implements TvNetRepositoryInterface
{

    public function getAllItems(): Collection
    {
        return Service::all();
    }

    public function getItemById(int $id)
    {
        return Service::findOrFail($id);
    }

    public function createItem(array $details)
    {
        return Service::create($details);
    }

    public function deleteItem(int $id)
    {
        Service::destroy($id);
    }

    public function updateItem(Model $model, array $details): bool
    {
        if(!($model instanceof Service)) {
            return false;
        }

        foreach ($details as $key => $detail) {
            $model->$key = $detail;
        }

        $model->save();

        return true;
    }
}
