<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    protected $table = 'lots';
    protected $fillable = [
        'landholding_id',
        'lotNo',
        'lotType_id',
        'lotArea'
    ];
}
