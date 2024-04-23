<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landholding extends Model
{
    use HasFactory;

    protected $table = 'landholdings';
    protected $fillable = [
        'seqNo',
        'arbs_id',
        'awardtitle_id',
        'valuation_id',
        'firstname',
        'familyname',
        'middlename',
        'municipality_id',
        'barangay_id',
        'octNo',
        'lotNo',
        'surveyNo',
        'surveyArea',
        'taxNo',
        'modeOfAcquisition',
        'dfNo',
        'coverableArea',
        'carpableArea',
        'noncarpableArea',
        'retainedArea',
        'distributeArea',
        'landsize',
        'majorCrops',
        'phase',
        'upals',
        'yearAdded',
        'pipeline',
        'targetyear',
        'projectedDelivery',
        'maro_id',
        'paro_id',
        'carpo_id',
        'ceo_id',
        'manager_id',
        'rod_id',
        'title',
        'taxDocuments'
    ];
}
