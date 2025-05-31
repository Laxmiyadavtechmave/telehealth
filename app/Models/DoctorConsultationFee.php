<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorConsultationFee extends Model
{
    protected $fillable = ['doctor_id', 'type','duration_minutes','price'];
}
