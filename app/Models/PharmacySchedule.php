<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PharmacySchedule extends Model
{
    protected $fillable = ['pharmacy_id', 'day', 'start_time', 'end_time', 'is_available'];
}
