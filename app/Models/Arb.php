<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arb extends Model
{
    use HasFactory;
    protected $table = 'arbs';
    protected $fillable = [
        'fname',
        'lname',
        'mname',
        'extension',
        'spousename',
        'datebirth',
        'gender_id',
        'address',
        'ownership_id',
        'dateOfOath',
    ];
}
