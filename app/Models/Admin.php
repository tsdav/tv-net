<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable =  [
        'first_name',
        'last_name',
        'password',
        'created_at',
        'updated_at'
    ];
}
