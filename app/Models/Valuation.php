<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    use HasFactory;
    protected $table = 'valuations';
    protected $fillable = [
        'landholding_id',
        'aocNo',
        'claimNo',
        'dateTransmitted',
        'dateofMov',
        'dateServed',
        'transmittalStatus',
        'stateReason',
    ];
}
