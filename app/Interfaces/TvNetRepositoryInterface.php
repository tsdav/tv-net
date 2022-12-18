<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface TvNetRepositoryInterface
{
    public function getAllItems();
    public function getItemById(int $id);
    public function createItem(array $details);
    public function deleteItem(int $id);
    public function updateItem(Model $model, array $details);
}
