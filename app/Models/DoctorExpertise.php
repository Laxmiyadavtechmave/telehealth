<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorExpertise extends Model
{
    protected $fillable = ['doctor_id', 'expertise_id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function expertise()
    {
        return $this->belongsTo(AreaOfExpertise::class, 'expertise_id');
    }
}
