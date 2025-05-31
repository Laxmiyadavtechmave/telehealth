<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['schedulable_type', 'schedulable_id', 'day', 'start_time', 'end_time', 'is_available'];
    protected $casts = [
        'start_time' => 'datetime:H:i:s',
        'end_time' => 'datetime:H:i:s',
    ];
    public function schedulable()
    {
        return $this->morphTo();
    }
}
