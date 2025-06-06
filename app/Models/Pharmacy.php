<?php

namespace App\Models;

use App\Models\Clinic;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pharmacy extends Model
{
    use SoftDeletes, HasRoles;

    protected $fillable = ['pharmacy_id', 'name', 'img', 'email', 'password', 'license_no', 'valid_from', 'valid_to', 'phone', 'pharmacy_type', 'clinic_id', 'address1', 'address2', 'city', 'country', 'postal_code', 'map_link', 'extra', 'status'];

    protected $dates = ['deleted_at'];

    protected $casts = [
        'valid_from' => 'date',
        'valid_to' => 'date',
    ];

    public function scopeSearch($query, $value)
    {
        return $query->where(function ($q) use ($value) {
            $q->where('name', 'like', "%$value%")
                ->orWhere('email', 'like', "%$value%")
                ->orWhere('phone', 'like', "%$value%")
                ->orWhere('address1', 'like', "%$value%")
                ->orWhere('status', 'like', "%$value%");
        });
    }

    public function schedules()
    {
        return $this->morphMany(Schedule::class, 'schedulable');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }

    public function documents()
    {
        return $this->morphMany(Document::class, 'imageable');
    }
}
