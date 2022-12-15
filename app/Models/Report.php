<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable =  [
        'report_name',
        'report_date',
        'file_name',
        'created_at',
        'updated_at'
    ];
}
