<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaOfExpertise extends Model
{
    protected $fillable = ['name', 'type', 'description'];

    public function doctorExpertises()
    {
        return $this->hasMany(DoctorExpertise::class, 'expertise_id', 'id');
    }
}
