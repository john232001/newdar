<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asp extends Model
{
    use HasFactory;
    protected $table = 'asps';
    protected $fillable = [
        'landholding_id',
        'aspNo',
        'aspDate',
        'aspArea',
    ];
}
