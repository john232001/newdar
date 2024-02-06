<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateLog extends Model
{
    use HasFactory;

    protected $fillable = ['generation_date', 'landholding_id', 'form_identifier'];

    public function landholding()
    {
        return $this->belongsTo(Landholding::class);
    }

}
