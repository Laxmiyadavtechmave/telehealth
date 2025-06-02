<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NurseExpertise extends Model
{
    protected $fillable = [
        'nurse_id',
        'area_of_expertise_id',
    ];

    public function expertiseName(){
        return $this->belongsTo(AreaOfExpertise::class,'area_of_expertise_id' , 'id');
    }
}
