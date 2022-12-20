<?php

namespace App\Repositories;

use App\Interfaces\TvNetRepositoryInterface;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PackageRepository implements TvNetRepositoryInterface
{

    public function getAllItems(): Collection
    {
        return Package::all();
    }

    public function getItemById(int $id): Model|Collection|Builder|array|null
    {
        return Package::with('services')->findOrFail($id);
    }

    public function createItem(array $details)
    {
        return Package::create($details);
    }

    public function deleteItem(int $id)
    {
        Package::destroy($id);
    }

    public function updateItem(Model $model, array $details): bool
    {
        if(!($model instanceof Package)) {
            return false;
        }

        foreach ($details as $key => $detail) {
            $model->$key = $detail;
        }

        $model->save();

        return true;
    }

    public function getPackagesWithService(): Collection|array
    {
        return Package::with('services')->get();
    }

}
