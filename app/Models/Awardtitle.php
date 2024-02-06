<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awardtitle extends Model
{
    use HasFactory;
    protected $table = 'awardtitles';
    protected $fillable = [
        'landholding_id',
        'lotNumber_id',
        'awardType_id',
        'fbOrcname',
        'serialNo',
        'aspArea',
        'genDate',
        'epebNo',
        'epebDate',
        'registerDate',
        'awardtitleNo',
        'distributeDate',
    ];
}
