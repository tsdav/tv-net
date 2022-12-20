<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_name',
        'package_description',
        'package_details',
        'service_id',
        'created_at',
        'updated_at',
    ];

    public function services(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
