<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'service_description',
        'service_details'
    ];

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class, 'service_id', 'id');
    }
}
