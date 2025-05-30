<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NurseExpertise extends Model
{
    protected $fillable = [
        'nurse_id',
        'area_of_expertise_id',
    ];
}
