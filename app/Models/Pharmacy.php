<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Pharmacy extends Model
{
    use SoftDeletes, HasRoles;

    protected $fillable = ['pharmacy_id', 'name', 'email', 'password', 'license_no', 'valid_from', 'valid_to', 'phone', 'pharmacy_type', 'clinic_id', 'address1', 'address2', 'city', 'country', 'postal_code', 'map_link', 'extra', 'status'];

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
        return $this->hasMany(PharmacySchedule::class, 'pharmacy_id', 'id');
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(PharmacyImage::class, 'pharmacy_id', 'id'); // or whatever your model is
    }
}
