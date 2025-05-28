<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Clinic extends Model
{

    use SoftDeletes,HasRoles;

    protected $guard_name = 'clinic'; // important

    protected $fillable = ['clinic_id', 'name', 'email', 'password', 'license_no', 'valid_from', 'valid_to', 'phone', 'web_url', 'address1', 'address2', 'city', 'country', 'postal_code', 'map_link', 'extra', 'status'];

    protected $dates = ['deleted_at'];

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
        return $this->hasMany(ClinicSchedule::class, 'clinic_id', 'id');
    }
}
